@extends('layouts.app')

@section('body_content')

    <div class="container my-5">
        <div class="row row-cols-1 row-cols-md-2 g-4 ">
            <div class="col mb-4">
                <a href="{{route('marketplace')}}">
                    <div class="card ">

                        <div class="card-body">
                            @foreach($languages as $language)
                                @if($language->status==1)
                                    @if($language->language=='en')
                                        <h5 class="card-title text-center py-5">Marketplace</h5>
                                    @elseif($language->language=='gr')
                                        <h5 class="card-title text-center py-5">Marktplatz</h5>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                </a>
            </div>
            <div class="col mb-4">
                <a href="{{route('property')}}">
                    <div class="card">

                        <div class="card-body">

                            @foreach($languages as $language)
                                @if($language->status==1)
                                    @if($language->language=='en')
                                        <h5 class="card-title text-center py-5">Property</h5>
                                    @elseif($language->language=='gr')
                                        <h5 class="card-title text-center py-5">Eigentum</h5>
                                    @endif
                                @endif
                            @endforeach


                        </div>
                    </div>
                </a>
            </div>
            <div class="col mb-4">
                <a href="{{route('car.motor')}}">
                    <div class="card">

                        <div class="card-body">
                            @foreach($languages as $language)
                                @if($language->status==1)
                                    @if($language->language=='en')
                                        <h5 class="card-title text-center py-5">Car and Motors</h5>
                                    @elseif($language->language=='gr')
                                        <h5 class="card-title text-center py-5">Auto und Motoren</h5>
                                    @endif
                                @endif
                            @endforeach

                        </div>
                    </div>
                </a>
            </div>
            <div class="col mb-4">
                <a href="{{route('job')}}">
                    <div class="card">

                        <div class="card-body">


                            @foreach($languages as $language)
                                @if($language->status==1)
                                    @if($language->language=='en')
                                        <h5 class="card-title text-center py-5">Job</h5>
                                    @elseif($language->language=='gr')
                                        <h5 class="card-title text-center py-5">Arbeit</h5>
                                    @endif
                                @endif
                            @endforeach

                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
