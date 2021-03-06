<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--Stylesheets-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js">
        </script>
    </head>

    <body class="d-flex flex-column min-vh-100">
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #9BDCB4;">
            <div class="container-fluid">
                <!--Hamburger Button-->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <!--Search Form-->
                    <form class="row row-cols-lg-auto align-items-center">
                        <div class="col-12">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" placeholder="Find Job">
                                <button class="btn btn-secondary" type="button" id="button-search">
                                	<div>Search</div>
                                </button>
                            </div>
                        </div>
                    </form>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('home')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('jobs')}}">Jobs</a>
                        </li>
                        <!--Someway get this to change to the user's name when they log in-->
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('myprofile')}}">My Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('logout')}}">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>