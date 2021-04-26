@extends('layouts.logged')

@section('title')
			Edit Profile Info
@endsection()

@section('content')
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center" style="margin: 100px 0px 0px 0px;">
                    <h2 class="text-center" style="margin: 0px 0px 30px;">Modify Profile</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit User {{ $user->EMAIL }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/users', $user->id) }}/profile/update" method="POST">
                            {{ csrf_field() }}
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-8">
                                    <div class="form-group" style="text-align:left;">
                                        <label>First Name</label>
                                        <input type="text" name="firstname" value="{{ $user->FIRSTNAME }}" class="form-control">
                                    </div>
                                    <div class="form-group" style="text-align:left;">
                                        <label>Last Name</label>
                                        <input type="text" name="lastname" value="{{ $user->LASTNAME }}" class="form-control">
                                    </div>
                                    <div class="form-group" style="text-align:left;">
                                        <label>Email</label>
                                        <input type="text" name="email" value="{{ $user->EMAIL }}" class="form-control">
                                    </div>
                                    <div class="form-group" style="text-align:left;">
                                        <label>Joined</label>
                                        <input type="date" name="joined" value="{{ $user->JOINED }}" class="form-control">
                                    </div>
                                    <div class="form-group" style="text-align:left;">
                                        <label>Country</label>
                                        <input type="text" name="country" value="{{ $user->COUNTRY }}" class="form-control">
                                    </div>
                                    <div class="form-group" style="text-align:left;">
                                        <label>Phone Number</label>
                                        <input type="text" name="pnumber" value="{{ $user->PNUMBER }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="Submit" class="btn btn-success">Submit</button>
                            <a href="{{ url('/myprofile') }}" class="btn btn-danger">Cancel</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="container">
            <div class="row-md-12" style="margin: 2in 5px;">
            </div>
        </div>
    </div>
@endsection()

@section('scripts')


@endsection()
