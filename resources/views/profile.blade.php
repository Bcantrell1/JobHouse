@extends('layouts.logged')

@section('title')
My Profile
@endsection()

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" style="text-align: center;">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4b8lTxKzkRKsS4G2HuGTIFRRWW_u2nco-bQ&usqp=CAU" style="height:280px; width:280px;">
                    <h4 class="card-title">{{ $user->FIRSTNAME . " " . $user->LASTNAME }}</h4>
                    <h6 class="text-muted card-subtitle mb-2">Position | Current Job</h6>
                    <a href="{{ url('/users', $user->id) }}/resume" class="btn btn-info">Resume</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title text-primary">{{ $user->FIRSTNAME . " " . $user->LASTNAME }}</h4>
                        <a href="{{ url('/users', $user->id) }}/profile/edit " class="btn btn-info">Edit</a>
                    </div>
                    <h6 class="text-muted card-subtitle mb-2">Date Joined:</h6>
                    <p class="card-text">{{ $user->JOINED }}</p>
                    <h6 class="text-muted card-subtitle mb-2">Home Country:</h6>
                    <p class="card-text">{{ $user->COUNTRY }}</p>
                    <h6 class="text-muted card-subtitle mb-2">Email:</h6>
                    <p class="card-text">{{ $user->EMAIL }}</p>
                    <h6 class="text-muted card-subtitle mb-2">Phone Number:</h6>
                    <p class="card-text">{{ $user->PNUMBER }}</p>
                    
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">My Groups</h4>
                        @foreach($groups as $row)
                            @if($row->JOINED === true)
                                <div class="card mt-3">
                                    <h4 class="card-title">{{ $row->NAME }}</h4>
                                    <div>{{ $row->DESCRIPTION }}</div>
                                </div>
                            @endif
                        @endforeach()
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">My Jobs</h4>
                    @foreach($jobs as $row)
                        <div class="row mt-3">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="{{ url('/jobs') }}?selected={{ $row->id }}">{{ $row->NAME }}</a></h4>
                                        <h6 class="text-muted card-subtitle mb-3">{{ $row->ORGANIZATION }}</h6>
                                        <p class="text-muted card-subtitle mb-3">{{ $row->DESCRIPTION }}</p>
                                    </div>
                                    <form action="{{ url('/jobs', $row->id) }}/edit" method="get">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger mx-3">Edit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach()
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
