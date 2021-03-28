<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
    </head>

    <body class="d-flex flex-column min-vh-100">
        <nav class="navbar navbar-light navbar-expand" style="background-color: #9BDCB4;">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-start" id="navbarText">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"><a class="nav-link active" style="color:#F58A07;" href="{{ url('index') }}"><h5>JobHouse</h5></a></li>
                    	<li class="nav-item"><a class="nav-link active" href="#">Find Jobs</a></li>
                    </ul>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navbarText">
                    <ul class="nav navbar-nav">
                        <li class="nav-item " style="text-align: center;"><a class="nav-link" href="{{ url('login') }}">Login</a></li>
                    	<li class="nav-item pull-right" style="text-align: center;"><a class="nav-link" href="{{ url('register') }}">Register</a></li>
                    </ul>
                </div>
            </div>
        </nav>