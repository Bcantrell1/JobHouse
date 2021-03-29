@extends('layouts.logged')

@section('title')
			Edit User
@endsection()

@section('content')
<nav class="navbar navbar-dark navbar-expand" style="background-color: #F58A07;">
    <div class="container">
      <div class=" collapse navbar-collapse justify-content-center" id="navbarText">
        <h1 class="navbar-brand text-center">Welcome Admin</h1>
      </div>
    </div>
</nav>
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 align-self-center" style="margin: 100px 0px 0px 0px;">
                <h2 class="text-center" style="margin: 0px 0px 30px;">Modify User</h2>
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
                    <form action="{{ url('/admin/update', $user->ID) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
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
                            </div>
                            <div class="col-md-4">
                                <div class='form-group' style="text-align:left;">
                                    <div class="form-check form-switch">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Suspended</label>
                                        <input class="form-check-input" name="suspended" type="checkbox" id="flexSwitchCheckDefault" {{ $user->SUSPENDED == 1 ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <div class="form-group" style="text-align:left;">
                                    <label>Update Role</label>
                                    <select name="role" class="form-control" value="{{ $user->ROLE }}">
                                        <option value="ADMIN">ADMIN</option>
                                        <option value="USER">USER</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="Submit" class="btn btn-success">Submit</button>
                        <a href="{{ url('admin') }}" class="btn btn-danger">Return</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection()

@section('scripts')


@endsection()