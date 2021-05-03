@extends('layouts.layout')

@section('title')
Job House | Home
@endsection()

@section('content')

<div class="container ">
        <div class="row text-center">
            <div class="col-lg-12">
                <div class="container-fluid mt-5">
                    <div class="row mb-2">
                        <div class="col-md-12 text-center">
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
            </div>
        </div>
    </div>
@endsection()