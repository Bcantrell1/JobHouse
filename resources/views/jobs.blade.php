@extends('layouts.logged')

@section('title')
    Search For Jobs
@endsection()

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <form action="{{ url('jobs') }}" method="get">
                <div class="row mb-3 mt-5">
                    <div class="col-md-5 col-sm-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text" style="background-color:#F9AB55">Job Title</span>
                            <input type="text" class="form-control" name="name" value="{{ $name }}" placeholder="Enter a Job title">
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12 mb-3">
                        <div class="input-group">
                            <span class="input-group-text" style="background-color:#F9AB55">Company</span>
                            <input type="text" class="form-control" name="organization" value="{{ $organization }}" placeholder='Enter a company name here'>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-12 text-center">
                        <button type="submit" class="btn" style="background-color:#F58A07;">Filter Jobs</button>
                    </div>
                </div>
            </form>
            <div class="col-md-12 col-xs-12 text-center">
                <a href="{{ url('/jobs/create')}}" class="btn m-3" style="background-color:#5CFF7C;">Post A Job</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-lg-6 col-xl-6">
        @foreach($jobs as $row)
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><a href="{{ url('/jobs') }}?selected={{ $row->id }}">{{ $row->NAME }}</a></h4>
                            <h6 class="text-muted card-subtitle mb-3">{{ $row->ORGANIZATION }}</h6>
                            <h6 class="text-muted card-subtitle mb-2">{{ $row->TYPE }}</h6>
                            <p class="card-text">Starts:
                                <?php
                                    if($row->START_DATE) {
                                        ?>
                                        <h6 class="text-muted card-subtitle mb-2"> {{$row->START_DATE}}</h6>
                                        <?php
                                    } else echo "N/A"
                                ?>
                            </p>
                        </div>
                        <form action="{{ url('/jobs', $row->id) }}/edit" method="get">
                        	{{ csrf_field() }}
                            <button type="submit" class="btn btn-danger mx-3">Edit</button>
            			</form>
                    </div>
                </div>
            </div>
        @endforeach()
        </div>
        @if(isset($selected) and isset($item))
        <div class="col-md-6 col-lg-6 col-xl-6">
        <div class="card mb-2">
            <h1 class="text-center ">Selected Job details</h1>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $item->NAME }}</h4>
                    <h6 class="text-muted card-subtitle mb-2">{{ $item->ORGANIZATION }}</h6>
                    <hr>
                    <p class="card-text" style="max-height: 1000px; overflow-y: auto;">Ideal Start Date:
                        <?php
                            if($row->START_DATE) {
                                ?>
                                <h6 class="text-muted card-subtitle mb-2"> {{$row->START_DATE}}</h6>
                                <?php
                            } else echo "N/A"
                        ?>
                    </p>
                    <p class="card-text" style="max-height: 1000px; overflow-y: auto;">
                        Description: 
                        <h6 class="text-muted card-subtitle mb-2">{{ $item->DESCRIPTION }}</h6>
                    </p>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>


@endsection()