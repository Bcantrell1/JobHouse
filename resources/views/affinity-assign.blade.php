@extends('layouts.logged')

@section('title')
    Affinity Group Finder
@endsection()

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header text-center">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    Job House Affinity Groups
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <!-- fetch table data -->
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
                                    <td>
                                        @if($row->JOINED)
                                        <form action="{{ url('/groups', $row->id) }}/{{ $userId }}/delete" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger">Leave</button>
                                        </form>
                                        @else
                                        <form action="{{ url('/groups', $row->id) }}/{{ $userId }}/add" method="POST">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-primary">Join</button>
                                        </form>
                                        @endif
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