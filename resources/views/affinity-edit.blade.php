@extends('layouts.logged')

@section('title')
Affinity Editor
@endsection()

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Group {{ $item->NAME }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/groups/edit',$item->id)}}/update" method="POST">
                        {{ csrf_field() }}
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $item->NAME }}" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <input type="text" name="description" class="form-control" value="{{ $item->DESCRIPTION }}" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Type</label>
                                <input type="text" name="type" class="form-control" value="{{ $item->TYPE }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger">UPDATE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @endsection()

    @section('scripts')
    @endsection()