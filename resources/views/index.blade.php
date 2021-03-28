@extends('layouts.layout')

@section('title')
Job House | Home
@endsection()

@section('content')

<div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="container-fluid mt-5">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <div>
                                <h1>Welcome to JobHouse.com!</h1>
                                <h3>The place for employers and employees to find the right fit!</h3>
                            </div>
                            <p> Here at JobHouse we strive to make it effortless for not only employers but
                              also future employees to find the right place to move there careers forward.</p>
                            <a class="btn btn-lg text-white mb-2" style="background-color:#F58A07;" href="{{ url('register') }}" role="button">
                                Register
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 align-self-center" style="margin: 100px 0px 0px 0px;">
                        <h2 class="text-center" style="margin: 0px 0px 30px;">Find A Job, Post A Job, or Find An Employee!</h2>
                    </div>
                </div>
                <form>
                    <div class="row mb-5">
                        <div class="col-md-5 col-sm-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text" style="background-color:#F9AB55">What</span>
                                <input type="text" class="form-control" placeholder="Keywords, Job Title, or Company">
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-12">
                            <div class="input-group">
                                <span class="input-group-text" style="background-color:#F9AB55">Location</span>
                                <input type="text" class="form-control" placeholder='City, State, or Zip Code'>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <button type="submit" class="btn btn-lg mb-3" style="background-color:#F58A07;">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection()