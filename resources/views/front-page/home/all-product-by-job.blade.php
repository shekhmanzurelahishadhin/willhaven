@extends('front-page.master')
@section('content')
    <div class="container ">
        <h1>Job</h1>
        <h3 class="mt-4 mb-3">Types</h3>
        <div class="row row-cols-1 row-cols-md-2 row-cols-md-3 g-4 ">

            @foreach($types as $type)
                <div class="col ">
                    <a href="{{route('job.by.type',['title'=>$type->title])}}" class="text-decoration-none" style="color: black !important;">
                        <div class="card ">
                            <div class="d-flex align-items-center">
                                <div class="card-body text-center">
                                    <h5 class="card-title ">{{$type->title}}</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <h3 class="mt-4 mb-3">Jobs</h3>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mb-5">

            @foreach($jobs as $job)
                <div class="col">
                    <div class="card">
                        <img src="uploads/jobs/{{$job->imglogo}}" height="300px" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$job->title}}</h5>
                            <p class="card-text">Type: {{$job->type}}</p>
                            <p class="card-text">Company: {{$job->company}} tk</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>


    </div>
@endsection
