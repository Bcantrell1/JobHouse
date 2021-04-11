@extends('layouts.logged')

@section('title')
    Affinity Main
@endsection()

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>Id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Type</th>
                            </thead>
                            <tbody>
                                @foreach($groups as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->NAME }}</td>
                                    <td>{{ $row->DESCRIPTION }}</td>
                                    <td>{{ $row->TYPE }}</td>
                                </tr>
                                @endforeach()
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection()