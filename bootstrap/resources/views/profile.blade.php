@extends('layouts.logged')

@section('title')
My Profile
@endsection()

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" style="text-align: center;"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4b8lTxKzkRKsS4G2HuGTIFRRWW_u2nco-bQ&usqp=CAU" style="height:280px; width:280px;">
                    <h4 class="card-title">{{ $user->FIRSTNAME . " " . $user->LASTNAME }}</h4>
                    <h6 class="text-muted card-subtitle mb-2">Position | Current Job</h6>
                    <a href="{{ url('/users', $user->id)}}/resume" class="btn btn-info ">Resume</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $user->FIRSTNAME . " " . $user->LASTNAME }}</h4> 
                    <h6 class="text-muted card-subtitle mb-2">Date Joined:</h6>
                    <p class="card-text">{{ $user->JOINED }}</p>
                    <h6 class="text-muted card-subtitle mb-2">Home Country:</h6>
                    <p class="card-text">{{ $user->COUNTRY }}</p>
                    <h6 class="text-muted card-subtitle mb-2">Email:</h6>
                    <p class="card-text">{{ $user->EMAIL }}</p>
                    <h6 class="text-muted card-subtitle mb-2">Phone Number:</h6>
                    <p class="card-text">{{ $user->PNUMBER }}</p>
                </div>
                <a href="{{ url('/users', $user->id) }}/profile/edit " class="btn btn-info">Edit</a>
            </div>
        </div>
        <div class="col-md-6 col-xl-8">
            <h4 class="card-title text-center">My Jobs</h4>
                <!--      For Each Start    -->
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Job 1 (where applied jobs will go eventually)</h5>
                </div>
                <!--      For Each End      -->
            </div>
        </div>
    </div>
</div>

@endsection