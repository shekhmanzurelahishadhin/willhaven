@extends('front-page.master')
@section('content')
    <div class="container ">
        <h1>Property</h1>

        <div class="col row-cols-1 g-4">
            <h3 class="mt-4 mb-3">Purpose</h3>
            <div class="row">
                @foreach($purposes as $purpose)
                    <div class="col">
                        <a href="{{url('/property-by-purpose/'.$purpose->name)}}" class="text-decoration-none" style="color: black !important;">
                            <div class="card">
                                <div class="d-flex align-items-center">
                                    <div class="card-body text-center">
                                        <h5 class="card-title ">{{$purpose->name}}</h5>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <h3 class="mt-4 mb-4">Properties</h3>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mb-5">
                @foreach($properties as $property)
                    <div class="card border-0">
                        <div class="col p-3 border" style="border-radius:5px;">
                            <img src="../uploads/img/{{$property->img}}" height="300px" class="card-img-top" style="border-radius:5px;">
                            <div class="card mt-2 border-0">
                                <h5 class="card-title">{{$property->title}}</h5>
                                <p class="card-text"><b>Address:</b> {{$property->address}}</p>
                                <p class="card-text"><b>Purpose:</b> {{$property->purpose}}</p>
                                <p class="card-text"><b>Type:</b> {{$property->type}}</p>
                                <p class="card-text"><b>Price:</b> {{$property->price}} tk</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
