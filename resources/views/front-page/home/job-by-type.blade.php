@extends('front-page.master')
@section('content')
    <div class="container ">
        <h5 class="mt-4 mb-3">Type</h5>
        <div class="d-flex category-section">
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

        <h5 class="mt-4 mb-3">Jobs</h5>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mb-5">

            @foreach($thejob as $j)


                <div class="col">
                    <div class="card product-card">
                        {{--                        @foreach(json_decode($product->images) as $image)--}}
                        <img src="../uploads/jobs/{{$j->imglogo}}" height="300px" class="card-img-top" alt="...">
                        {{--                        @endforeach--}}
                        <div class="card-body">
                            <h5 class="card-title">{{$j->title}}</h5>
                            <p class="card-text">Type: {{$j->type}}</p>
                            <p class="card-text">Company: {{$j->company}} tk</p>
                        </div>
                    </div>
                </div>


            @endforeach

        </div>


    </div>
@endsection
