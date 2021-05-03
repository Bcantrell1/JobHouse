@extends('layouts.logged')

@section('title')
My Resume
@endsection()

@section('content')

<div class="container ">
    <div class="row">
        <div class="col-md-12 my-auto">
            <div class="card my-5">
				<h2 class="card-title text-center">{{ $user->FIRSTNAME . " " . $user->LASTNAME}}</h2>
                <h6 class="card-subtitle text-muted text-center"> {{ $user->EMAIL }}</h6>
                <h6 class="card-subtitle text-muted text-center m-1"> {{ $user->PNUMBER }}</h6>
                <hr>
                <h6 class="card-title text-center my-1">Jobs</h6>
				@foreach($jobs as $row)
				<div class="container">
    				<div class="card my-3 p-2">
                        <div class="card-body d-flex justify-content-between">
                            <div>{{ $row->NAME }}</div>
                            <div>{{ $row->DESCRIPTION }}</div>
                            <div>{{ $row->ORGANIZATION }}</div>
        					<div>{{ $row->START_DATE }}</div>
        					<div>{{ $row->END_DATE }}</div>
                        </div>
                    </div>
                </div>
                @endforeach()
                <h6 class="card-title text-center my-3">Education</h6>
				@foreach($education as $row)
				<div class="container">
					<div class="card my-3 p-2">
                        <div class="card-body d-flex justify-content-between">
                            <div>{{ $row->NAME }}</div>
                            <div>{{ $row->DESCRIPTION }}</div>
                            <div>{{ $row->ORGANIZATION }}</div>
        					<div>{{ $row->START_DATE }}</div>
        					<div>{{ $row->END_DATE }}</div>
                        </div>
                    </div>
                </div>
                @endforeach()
				<h6 class="card-title text-center my-3">Talents</h6>
                @foreach($talent as $row)
				<div class="container">
					<div class="card my-3 p-2">
                        <div class="card-body d-flex justify-content-between">
                            <div>{{ $row->NAME }}</div>
                            <div>{{ $row->DESCRIPTION }}</div>
                        </div>
                    </div>
                </div>
                @endforeach()
                <hr>
                <a href="{{ url('/users', $user->id) }}/add " class="btn btn-info m-1">Add Item</a>
                <a href="{{ url('/users', $user->id) }}/edit " class="btn btn-primary m-1">Edit Items</a>
            </div>
        </div>
    </div>
</div>

@endsection