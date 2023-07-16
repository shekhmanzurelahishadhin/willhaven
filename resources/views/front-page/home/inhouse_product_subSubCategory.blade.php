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
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 my-5" style="padding-bottom: 130px">
                <div class="col">
                    <div class="card">

                        <div class="card-body">
                            @foreach($languages as $language)
                                @if($language->status==1)
                                    @if($language->language=='en')
                                        <h5 class="card-title">Select a Category</h5>

                                    @elseif($language->language=='gr')
                                        <h5 class="card-title">Wählen Sie eine Kategorie</h5>
                                    @endif
                                @endif
                            @endforeach
                            <hr>
                            @foreach($categories as $category)
                                <a href="{{route('add.inHouseProduct.subCategory',['category_id'=>$category->id])}}" class="{{$category->id==$category_id?'active_link':''}}">{{$category->category_name}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg></a>
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
                                        <h5 class="card-title">Select a Sub Category</h5>

                                    @elseif($language->language=='gr')
                                        <h5 class="card-title">Wähle eine Unterkategorie</h5>
                                    @endif
                                @endif
                            @endforeach
                            <hr>
                            @foreach($sub_categories as $sub_category)
                                <a href="{{route('add.inHouseProduct.subSubCategory',['sub_category_id'=>$sub_category->id])}}" class="{{$sub_category->id==$sub_category_id?'active_link':''}}">{{$sub_category->sub_category_name}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg></a>
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
                                        <h5 class="card-title">Select a Sub Sub Category</h5>

                                    @elseif($language->language=='gr')
                                        <h5 class="card-title">Wählen Sie eine Unter-Unter-Kategorie aus</h5>
                                    @endif
                                @endif
                            @endforeach
                            <hr>
                            @foreach($sub_sub_categories as $sub_sub_category)


                                <form action="{{route('add.inHouseProduct.district')}}" method="GET">

                                    <input type="hidden" name="category_id" value="{{$category_id}}">
                                    <input type="hidden" name="sub_category_id" value="{{$sub_category_id}}">
                                    <input type="hidden" name="sub_sub_category_id" value="{{$sub_sub_category->id}}">
                                    <button class="data-btn">{{$sub_sub_category->sub_sub_category_name}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
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

        @foreach($languages as $language)
            @if($language->status==1)
                @if($language->language=='en')
                    <h3>Filter by Model</h3>

                @elseif($language->language=='gr')
                    <h3>Nach Modell filtern</h3>
                @endif
            @endif
        @endforeach
    </section>

@endsection
