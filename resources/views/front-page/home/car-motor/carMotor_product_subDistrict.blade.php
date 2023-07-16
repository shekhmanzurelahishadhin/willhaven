@extends('front-page.master')
@section('content')

    <section class="ad-front-section">
        <div class="container">
            @foreach($languages as $language)
                @if($language->status==1)
                    @if($language->language=='en')
                        <h5 class="text-center">Welcome {{Auth::user()->name}}! Lets Post and Ad</h5>
                        <p class="text-center">Choose any option bellow</p>

                    @elseif($language->language=='gr')
                        <h5 class="text-center">Willkommen {{Auth::user()->name}}! Lässt Post und Anzeige</h5>
                        <p class="text-center">Wählen Sie unten eine beliebige Option</p>
                    @endif
                @endif
            @endforeach
            <div class="row row-cols-1 row-cols-md-2 g-4 my-5" style="padding-bottom: 130px">
                <div class="col">
                    <div class="card">

                        <div class="card-body">
                            @foreach($languages as $language)
                                @if($language->status==1)
                                    @if($language->language=='en')
                                        <h5 class="card-title">Select a District</h5>


                                    @elseif($language->language=='gr')
                                        <h5 class="card-title">Wählen Sie einen Bezirk aus</h5>
                                    @endif
                                @endif
                            @endforeach
                            <hr>
                            @foreach($districts as $district)
                                    <form action="{{route('get.carMotor.subDistrict',['district_id'=>$district->id])}}" method="GET">

                                        <input type="hidden" name="category_id" value="{{$category_id}}">

                                        @if(isset($sub_category_id))
                                            <input type="hidden" name="sub_category_id" value="{{$sub_category_id}}">
                                        @endif
                                        <button class="data-btn {{$district->id==$district_id?'active_link':''}}">{{$district->district_name}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                            </svg></button>
                                    </form>
                                <hr>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">

                        <div class="card-body">
                            @foreach($languages as $language)
                                @if($language->status==1)
                                    @if($language->language=='en')
                                        <h5 class="card-title">Select a Sub District</h5>
                                    @elseif($language->language=='gr')
                                        <h5 class="card-title">Wählen Sie einen Unterbezirk aus</h5>
                                    @endif
                                @endif
                            @endforeach
                            <hr>
                            @foreach($sub_districts as $sub_district)
                                <form action="{{route('add.carMotor.frontEnd')}}" method="GET">

                                    <input type="hidden" name="category_id" value="{{$category_id}}">

                                    @if(isset($sub_category_id))
                                        <input type="hidden" name="sub_category_id" value="{{$sub_category_id}}">
                                    @endif
                                    <input type="hidden" name="district_id" value="{{$district_id}}">
                                    <input type="hidden" name="sub_district_id" value="{{$sub_district->id}}">
                                    <button class="data-btn">{{$sub_district->sub_district_name}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                        </svg></button>
                                </form>
                                <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
