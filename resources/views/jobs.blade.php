@extends('layouts.logged')

@section('title')
Search For Jobs
@endsection()

@section('content')

<div class="container">
    <div class="row">
        <form action="/jobs" method="get">
        	<div class="col-md-12">
                <div class="col-md-2 col-xs-12">
                    <a href="{{ url('/jobs/create')}}" class="btn m-3" style="background-color:#5CFF7C;">Post A Job</a>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-8 col-lg-7 col-xl-7">
        @foreach($jobs as $row)
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ $row->NAME }}</h4>
                            <h6 class="text-muted card-subtitle mb-2">{{ $row->ORGANIZATION }}</h6>
                            <p class="card-text">Starts:
                                <?php
                                    if($row->START_DATE) {
                                        echo $row->START_DATE;
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
        <div class="col-md-4 col-lg-5 col-xl-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">J{{ $item->NAME }}</h4>
                    <h6 class="text-muted card-subtitle mb-2">{{ $item->ORGANIZATION }}</h6>
                    <hr>
                    <p class="card-text" style="max-height: 1000px; overflow-y: auto;">Ideal Start Date:
                     <?php
                        if($item->START_DATE) {
                            echo $item->START_DATE;
                        } else echo "N/A"
                    ?>
                    </p>
                    <a class="text-danger" href="mailto:{{ $item->CONTACT }}">Contact Poster</a>
                    <p class="card-text" style="max-height: 1000px; overflow-y: auto;">{{ $item->DESCRIPTION }}</p>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>


@endsection()