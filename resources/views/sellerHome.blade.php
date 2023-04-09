@extends('layouts.app')

@section('body_content')
    <div class="container my-5">
        <div class="row row-cols-1 row-cols-md-2 g-4 ">
            <div class="col mb-4">
                <a href="{{route('marketplace')}}">
                    <div class="card ">

                        <div class="card-body">
                            <h5 class="card-title text-center py-5">Marketplace</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col mb-4">
                <a href="{{route('property')}}">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title text-center py-5">Property</h5>

                        </div>
                    </div>
                </a>
            </div>
            <div class="col mb-4">
                <a href="{{route('car.motor')}}">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title text-center py-5">Car and Motors</h5>

                        </div>
                    </div>
                </a>
            </div>
            <div class="col mb-4">
                <a href="{{route('job')}}">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title text-center py-5">Job</h5>

                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
