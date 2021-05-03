@extends('layouts.logged')

@section('title')
 Dashboard
@endsection()

@section('content')
<main role="main">
    <div class="jumbotron mt-5">
        <div class="container text-center">
            <h1 class="display-3">Welcome, <span class="text-primary">{{$user->FIRSTNAME . " " . $user->LASTNAME}}</span></h1>
            <h3>Thanks for being a loyal Job House user! Choose from the options below depending on your needs!</h3>
        </div>
    </div>

    <div class="container">
    <div class="row text-center">
        <div class="card mt-5">
            <h2>Jobs</h2>
            <p class="card-body">Let's find you a job to fit your wants and needs. It's important to us for all individuals seeking a job from job house find something they are passionate about! Together we will make sure we can do that for you too!</p>
            <p><a class="btn btn-primary" href="{{url('jobs')}}" role="button">Jobs »</a></p>
        </div>
        <div class="card my-5">
            <h2>Groups</h2>
            <p class="card-body">Job House believes that to best find success in the job market we must gain connections. We believe the best way to accomplish that is by means of affinity groups! Look around for a group that might fit your wants and needs!</p>
            <p><a class="btn btn-danger" href="{{url('groups')}}" role="button">Groups »</a></p>
        </div>
        <div class="card mb-5">
            <h2>Profile</h2>
            <p class="card-body">Let's make you look amazing! Here we can edit our personal information so employers can learn a little about us. Additionally, we can create a custom resume so we can apply to jobs!</p>
            <p><a class="btn btn-success" href="{{url('myprofile')}}" role="button">My Profile »</a></p>
        </div>
    </div>
</main>
@endsection()