@extends('front-page.master')
@section('content')
    <div class="container ">
        <h5 class="mt-4 mb-3">Category</h5>
        <div class="row row-cols-1 row-cols-md-2 row-cols-md-3 g-4">
            @foreach($types as $type)
                <div class="col ">
                    <a href="{{route('product.by.type',['id'=>$type->id])}}" class="text-decoration-none" style="color: black !important;">
                        <div class="card ">
                            <div class="d-flex align-items-center">
                                <div class="card-body text-center">
                                    <h5 class="card-title ">{{$type->name}}</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <h5 class="mt-4 mb-3">Property</h5>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mb-5">

            @foreach($properties as $property)


                <div class="col">
                    @php $images=json_decode($property->img) @endphp
                    <div class="card product-card">
                        {{--                        @foreach(json_decode($product->images) as $image)--}}
                        <img src="{{asset($images[0])}}" height="300px" class="card-img-top" alt="...">
                        {{--                        @endforeach--}}
                        <div class="card-body">
                            <h5 class="card-title">{{$product->title}}</h5>
                            <p class="card-text">Description: {{$property->description}}</p>
                            <p class="card-text">Price: {{$property->price}} tk</p>
                        </div>
                    </div>
                </div>


            @endforeach

        </div>


    </div>
@endsection
