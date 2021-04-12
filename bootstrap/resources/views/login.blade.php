@extends('layouts.layout')

@section('title')
Job House | Login
@endsection()

@section('content')

<br><br>
<div class="container d-flex flex-column justify-content-center align-items-center" id="login-box">
    <div class="login-box-header">
        <h4 style="color:rgb(139,139,139);font-weight:400;font-size:27px;">Login</h4>
    </div>
    <?php
        if (isset($msg)) {
            echo '<div class="alert alert-danger fade show" role="alert">
          <strong>ERROR:</strong> <i>Looks like you made some mistakes, fix the errors and try again please.</i> <br><br>';
            echo $msg . "<br/>";
            echo '</div>';
        }
    ?>
    <form action="{{url('doLogin')}}" method="post">
    {{ csrf_field() }}
    <div class="email-login" style="background-color:#ffffff;">
    	<input type="email" name="email" class="email-imput form-control" style="margin-top:10px;" placeholder="Email">
        <input name="password" type="password" class="password-input form-control" style="margin-top:10px;" placeholder="Password">
    </div>
    <div class="submit-row" style="margin-bottom:8px;padding-top:0px;">
        <button class="btn btn-block" id="submit-id-submit" type="submit" style="background-color:#F58A07;">
        	Login
         </button>
        <div class="d-flex justify-content-between">
            <div class="form-check form-check-inline" id="form-check-rememberMe">
                <input class="form-check-input" type="checkbox" id="formCheck-1" style="cursor:pointer;" name="check">
                <label class="form-check-label" for="formCheck-1">
                	<span class="label-text">Stay logged in</span>
                </label>
            </div>
            <a id="forgot-password-link" href="#">Cant remember your password?</a>
        </div>
    </div>
    </form>
    <div id="login-box-footer" style="padding:10px 20px;padding-bottom:23px;padding-top:18px;">
        <p style="margin-bottom:0px;">Don't you have an account yet?<a id="register-link" href="{{ url('register') }}">Register Now!</a></p>
    </div>
</div>
@endsection()