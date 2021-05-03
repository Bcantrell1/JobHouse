<!DOCTYPE html>
<html>

<head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Stylesheets / Scripts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #9BDCB4;">
        <div class="container-fluid">
            <!--Hamburger Button-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse mx-5" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" style="color:#F58A07;" href="{{url('home')}}"><strong>Home</strong></a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="{{url('home')}}">Dashboard</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="{{url('myprofile')}}">My Profile</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="{{url('jobs')}}">Jobs</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="{{url('/groups')}}">Groups</a>
                    </li>
                    <li class="nav-item ms-5">
                        <a class="btn btn-primary" style="background-color:#F58A07; border:none; href="{{url('logout')}}">logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>