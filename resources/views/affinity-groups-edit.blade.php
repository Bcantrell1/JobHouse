@extends('layouts.logged')

@section('title')
Affinity Groups Edit
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
                    <a href="{{ url('/groups/edit/create') }}" class="btn btn-success">Create New Group</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>Id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Type</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>
                                @foreach($groups as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->NAME }}</td>
                                    <td>{{ $row->DESCRIPTION }}</td>
                                    <td>{{ $row->TYPE }}</td>
                                    <td>
                                        <a href="{{ url('/groups/edit',$row->id) }}/edit" class="btn btn-success">EDIT</a>
                                    </td>
                                    <td>
                                        <form action="{{ url('/groups/edit',$row->id) }}/delete" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger">DELETE</button>
                                        </form>
                                    </td>
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