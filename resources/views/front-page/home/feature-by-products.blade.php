@extends('front-page.master')
@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Post List</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        @foreach($languages as $language)
                            @if($language->status==1)
                                @if($language->language=='en')
                                    <li><a href="{{route('front.page')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
                                            </svg> Home</a></li>
                                @elseif($language->language=='gr')
                                    <li><a href="{{route('front.page')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
                                            </svg> Heim</a></li>
                                @endif
                            @endif
                        @endforeach

                        <li><a href="{{route('product.by.category',['id'=>$category->id])}}">{{$category->category_name}}</a></li>
                        <li><a href="">{{$feature_data}}</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="container py-4">
        @foreach($languages as $language)
            @if($language->status==1)
                @if($language->language=='en')
                    <h5 class="mt-4 mb-3">Category</h5>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">

                        <div class="col">
                            <a href="{{route('product.by.category',['id'=>$category->id])}}" class="text-decoration-none me-4" style="color: black !important;">
                                <div class="d-flex justify-content-center">
                                    <div class="d-flex justify-content-center "><img src="{{asset($category->image)}}" width="50px" height="50px"  alt="..."></div>
                                    <div class="text-center ms-4">
                                        <h6 class="">{{$category->category_name}}</h6>
                                        <p class="text-start">{{App\Models\InHouseProduct::where('category_id',$category->id)->count()}} Ads</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>


                    <div class="brand-section">
                        <h5 class="mt-4 mb-3">Sub Category</h5>
                        @foreach($subcategories as $subcategory)
                            <a href="{{route('product.by.subCategory',['id'=>$subcategory->id])}}">{{$subcategory->sub_category_name}}</a>
                        @endforeach
                    </div>
                    <div class="brand-section">
                        <h5 class="mt-4 mb-3">Sub Sub Category</h5>
                        @foreach($subsubcategories as $subsubcategory)
                            <a href="{{route('product.by.subSubCategory',['id'=>$subsubcategory->id])}}">{{$subsubcategory->sub_sub_category_name}}</a>
                        @endforeach
                    </div>

                @elseif($language->language=='gr')
                    <h5 class="mt-4 mb-3">Kategorie</h5>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">

                        <div class="col">
                            <a href="{{route('product.by.category',['id'=>$category->id])}}" class="text-decoration-none me-4" style="color: black !important;">
                                <div class="d-flex justify-content-center">
                                    <div class="d-flex justify-content-center "><img src="{{asset($category->image)}}" width="50px" height="50px"  alt="..."></div>
                                    <div class="text-center ms-4">
                                        <h6 class="">{{$category->category_name}}</h6>
                                        <p class="text-start">{{App\Models\InHouseProduct::where('category_id',$category->id)->count()}} Ads</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>


                    <div class="brand-section">
                        <h5 class="mt-4 mb-3">Unterkategorie</h5>
                        @foreach($subcategories as $subcategory)
                            <a href="{{route('product.by.subCategory',['id'=>$subcategory->id])}}">{{$subcategory->sub_category_name}}</a>
                        @endforeach
                    </div>
                    <div class="brand-section">
                        <h5 class="mt-4 mb-3">Unter-Unter-Kategorie</h5>
                        @foreach($subsubcategories as $subsubcategory)
                            <a href="{{route('product.by.subSubCategory',['id'=>$subsubcategory->id])}}">{{$subsubcategory->sub_sub_category_name}}</a>
                        @endforeach
                    </div>

                @endif
            @endif
        @endforeach

    </div>
    <section class="product-grids section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12">

                    <div class="product-sidebar">

                        <div class="single-widget search">

                            @foreach($languages as $language)
                                @if($language->status==1)
                                    @if($language->language=='en')
                                        <h3>Search Product</h3>
                                    @elseif($language->language=='gr')
                                        <h3>Produkt suchen</h3>
                                    @endif
                                @endif
                            @endforeach
                            <form action="">
                                <input type="search" name="search" placeholder="Search Here..." value="{{$search??""}}">
                                <input type="hidden" name="category_id" value="{{$category_id}}">
                                <input type="hidden" name="feature_property" value="{{$feature_data}}">
                                <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                    </svg></button>
                            </form>
                        </div>

                        <div class="single-widget condition">

                            @foreach($languages as $language)
                                @if($language->status==1)
                                    @if($language->language=='en')
                                        <h3>Filter by Brand</h3>
                                    @elseif($language->language=='gr')
                                        <h3>Nach Marke filtern</h3>
                                    @endif
                                @endif
                            @endforeach
                            <ul class="list">
                                @php $p_brands = [] @endphp
                                @foreach($products as $product)
                                    @php array_push($p_brands,$product->brand_id) @endphp
                                @endforeach
                                {{--                                    @php print_r(array_unique($p_brands)) @endphp--}}
                                @foreach($brands as $brand)
                                    @foreach(array_unique($p_brands) as $i)
                                        @if($i == $brand->id)
                                            <li>
                                                <form action="{{route('product.by.brand',['id'=>$brand->id])}}" method="get">
                                                    {{--                                            <a href="{{route('product.by.brand',['id'=>$brand->id])}}">{{$brand->brand_name}} </a>--}}
                                                    <input type="hidden" name="category_id" value="{{$category_id}}">
                                                    <button type="submit" class="data-btn">{{$brand->brand_name}}</button>
                                                </form>
                                            </li>
                                        @endif
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>
                        <div class="single-widget">

                            @foreach($languages as $language)
                                @if($language->status==1)
                                    @if($language->language=='en')
                                        <h3>All Categories</h3>
                                    @elseif($language->language=='gr')
                                        <h3>Alle Kategorien</h3>
                                    @endif
                                @endif
                            @endforeach
                            <ul class="list">
                                @foreach($categories as $category)
                                    <li>
                                        <a href="{{route('product.by.category',['id'=>$category->id])}}">{{$category->category_name}} </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="single-widget">

                            @foreach($languages as $language)
                                @if($language->status==1)
                                    @if($language->language=='en')
                                        <h3>All Sub Categories</h3>
                                    @elseif($language->language=='gr')
                                        <h3>Alle Unterkategorien</h3>
                                    @endif
                                @endif
                            @endforeach
                            <ul class="list">
                                @foreach($subcategories as $subcategory)
                                    <li>
                                        <a href="{{route('product.by.subCategory',['id'=>$subcategory->id])}}">{{$subcategory->sub_category_name}} </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="single-widget">

                            @foreach($languages as $language)
                                @if($language->status==1)
                                    @if($language->language=='en')
                                        <h3>All Sub Sub Categories</h3>
                                    @elseif($language->language=='gr')
                                        <h3>Alle Unterkategorien</h3>
                                    @endif
                                @endif
                            @endforeach
                            <ul class="list">
                                @foreach($subsubcategories as $subsubcategory)
                                    <li>
                                        <a href="{{route('product.by.subSubCategory',['id'=>$subsubcategory->id])}}">{{$subsubcategory->sub_sub_category_name}} </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>


                        <div class="single-widget range">

                            @foreach($languages as $language)
                                @if($language->status==1)
                                    @if($language->language=='en')
                                        <h3>Price Range</h3>
                                    @elseif($language->language=='gr')
                                        <h3>Preisklasse</h3>
                                    @endif
                                @endif
                            @endforeach

                            <form action="{{route('product.by.price')}}" method="GET">
                                @csrf
                                <input type="hidden" name="category_id" value="{{$category_id}}">

                                <div class="row">
                                    <div class="col-6">
                                        <input class="form-control" min="0" type="number" value="{{$request->start??"0"}}" name="start">
                                    </div>
                                    <div class="col-6">
                                        <input class="form-control" min="0" type="number" value="{{$request->end??"0"}}" name="end">
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-sm my-4" type="submit">Find</button>
                            </form>
                        </div>



{{--                        <div class="single-widget condition">--}}

{{--                            @foreach($languages as $language)--}}
{{--                                @if($language->status==1)--}}
{{--                                    @if($language->language=='en')--}}
{{--                                        <h3>Filter by Condition</h3>--}}
{{--                                        <ul class="list">--}}

{{--                                            <li> <form action="{{route('product.by.condition',['condition'=>'new'])}}" method="get">--}}
{{--                                                    <input type="hidden" name="category_id" value="{{$category_id}}">--}}
{{--                                                    <button type="submit" class="data-btn">New</button>--}}
{{--                                                </form>--}}
{{--                                            </li>--}}
{{--                                            <li> <form action="{{route('product.by.condition',['condition'=>'used'])}}" method="get">--}}
{{--                                                    <input type="hidden" name="category_id" value="{{$category_id}}">--}}
{{--                                                    <button type="submit" class="data-btn">Used</button>--}}
{{--                                                </form>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    @elseif($language->language=='gr')--}}
{{--                                        <h3>Nach Zustand filtern</h3>--}}
{{--                                        <ul class="list">--}}

{{--                                            <li> <form action="{{route('product.by.condition',['condition'=>'new'])}}" method="get">--}}
{{--                                                    <input type="hidden" name="category_id" value="{{$category_id}}">--}}
{{--                                                    <button type="submit" class="data-btn">Neu</button>--}}
{{--                                                </form>--}}
{{--                                            </li>--}}
{{--                                            <li> <form action="{{route('product.by.condition',['condition'=>'used'])}}" method="get">--}}
{{--                                                    <input type="hidden" name="category_id" value="{{$category_id}}">--}}
{{--                                                    <button type="submit" class="data-btn">Gebraucht</button>--}}
{{--                                                </form>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    @endif--}}
{{--                                @endif--}}
{{--                            @endforeach--}}

{{--                        </div>--}}
{{--                        <div class="single-widget condition">--}}

{{--                            @foreach($languages as $language)--}}
{{--                                @if($language->status==1)--}}
{{--                                    @if($language->language=='en')--}}
{{--                                        <h3>Filter by Authenticity</h3>--}}
{{--                                        <ul class="list">--}}

{{--                                            <li> <form action="{{route('product.by.authenticity',['authenticity'=>'original'])}}" method="get">--}}
{{--                                                    <input type="hidden" name="category_id" value="{{$category_id}}">--}}
{{--                                                    <button type="submit" class="data-btn">Original</button>--}}
{{--                                                </form>--}}
{{--                                            </li>--}}
{{--                                            <li> <form action="{{route('product.by.authenticity',['authenticity'=>'refurbished'])}}" method="get">--}}
{{--                                                    <input type="hidden" name="category_id" value="{{$category_id}}">--}}
{{--                                                    <button type="submit" class="data-btn">Refurbished</button>--}}
{{--                                                </form>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    @elseif($language->language=='gr')--}}
{{--                                        <h3>Filtern Sie nach Authentizität</h3>--}}
{{--                                        <ul class="list">--}}

{{--                                            <li> <form action="{{route('product.by.authenticity',['authenticity'=>'original'])}}" method="get">--}}

{{--                                                    <input type="hidden" name="category_id" value="{{$category_id}}">--}}
{{--                                                    <button type="submit" class="data-btn">Original</button>--}}

{{--                                                </form>--}}
{{--                                            </li>--}}
{{--                                            <li> <form action="{{route('product.by.authenticity',['authenticity'=>'refurbished'])}}" method="get">--}}

{{--                                                    <input type="hidden" name="category_id" value="{{$category_id}}">--}}
{{--                                                    <button type="submit" class="data-btn">Renoviert</button>--}}

{{--                                                </form>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    @endif--}}
{{--                                @endif--}}
{{--                            @endforeach--}}

{{--                        </div>--}}
                        <div class="single-widget condition">

                            @foreach($languages as $language)
                                @if($language->status==1)
                                    @if($language->language=='en')
                                        <h3>Filter by Features</h3>

                                    @elseif($language->language=='gr')
                                        <h3>Nach Ausgabe filtern</h3>
                                    @endif
                                @endif
                            @endforeach
                            <ul class="list">
                                @foreach($features as $feature)
                                    <li>
                                        {{--                                            <form action="{{route('product.by.feature',['id'=>$feature->id])}}" method="get">--}}
                                        {{--                                                <input type="hidden" name="category_id" value="{{$category_data}}">--}}
                                        {{--                                                <button type="submit" class="data-btn">{{ $feature->features_name }}</button>--}}
                                        {{--                                            </form>--}}

                                        <lable><b class="pb-3">{{$feature->features_name}}</b></lable>
                                        <br>
                                        <ul class="list">
                                            @foreach(json_decode($feature->features_property) as $data)
                                                <li>
                                                    {{--                                                        @dd(gettype('7'))--}}
                                                    <form action="{{route('product.by.feature')}}" method="get">
                                                        <input type="hidden" name="category_id" value="{{$category_id}}">
                                                        <input type="hidden" name="feature_property" value="{{$data}}">
                                                        <input type="hidden" name="feature_id" value="{{$feature->id}}">
                                                        <button type="submit" class="data-btn">{{$data}}</button>
                                                    </form>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="single-widget condition">

                            @foreach($languages as $language)
                                @if($language->status==1)
                                    @if($language->language=='en')
                                        <h3>Filter by Edition</h3>

                                    @elseif($language->language=='gr')
                                        <h3>Nach Ausgabe filtern</h3>
                                    @endif
                                @endif
                            @endforeach
                            <ul class="list">
                                @php $edition = [] @endphp
                                @foreach($products as $product)
                                    @php array_push($edition,$product->edition) @endphp
                                @endforeach
                                @foreach(array_unique($edition) as $i)
                                    @if($i!= NULL)
                                        <li> <form action="{{route('product.by.edition',['edition'=>$i])}}" method="get">
                                                <input type="hidden" name="category_id" value="{{$category_id}}">
                                                <button type="submit" class="data-btn">{{$i}}</button>
                                            </form>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="single-widget condition">

                            @foreach($languages as $language)
                                @if($language->status==1)
                                    @if($language->language=='en')
                                        <h3>Filter by Features</h3>

                                    @elseif($language->language=='gr')
                                        <h3>Nach Ausgabe filtern</h3>
                                    @endif
                                @endif
                            @endforeach
                            <ul class="list">
                                @foreach($features as $f)
                                    <li>
                                        <form action="{{route('product.by.feature',['id'=>$f->id])}}" method="get">
                                            <input type="hidden" name="category_id" value="{{$category_id}}">
                                            <button type="submit" class="data-btn">{{ $f->features_name }}</button>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="single-widget condition">

                            @foreach($languages as $language)
                                @if($language->status==1)
                                    @if($language->language=='en')
                                        <h3>Filter by District</h3>

                                    @elseif($language->language=='gr')
                                        <h3>Nach Bezirk filtern</h3>
                                    @endif
                                @endif
                            @endforeach
                            <ul class="list">
                                @php $districts = [] @endphp
                                @foreach($products as $product)
                                    @php array_push($districts,$product->district_id) @endphp
                                @endforeach
                                @foreach(array_unique($districts) as $i)
                                    @foreach($product_districts as $d)
                                        @if($i == $d->id)
                                            <li> <form action="{{route('product.by.district',['district'=>$d->id])}}" method="get">
                                                    <input type="hidden" name="category_id" value="{{$category_id}}">
                                                    <input type="hidden" name="district_name" value="{{$d->district_name}}">
                                                    <button type="submit" class="data-btn">{{$d->district_name}}</button>
                                                </form>
                                            </li>
                                        @endif
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>

                    </div>

                </div>
                <div class="col-lg-9 col-12">
                    <div class="product-grids-head">
                        <div class="product-grid-topbar">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-8 col-12">
                                    <div class="product-sorting">
                                        <h3 class="total-show-product">Showing: <span>1 - 10 items</span></h3>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-4 col-12">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link " id="nav-grid-tab" data-bs-toggle="tab" data-bs-target="#nav-grid" type="button" role="tab" aria-controls="nav-grid" aria-selected="true">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-grid" viewBox="0 0 16 16">
                                                    <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
                                                </svg>
                                            </button>
                                            <button class="nav-link active" id="nav-list-tab" data-bs-toggle="tab" data-bs-target="#nav-list" type="button" role="tab" aria-controls="nav-list" aria-selected="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                                                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                                    <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
                                <div class="row">

                                    @foreach($products as $product)


                                        @if($product->features_property!= null)

                                        @if(in_array($feature_data, json_decode($product->features_property)))
                                        <div class="col-lg-4 col-md-6 col-12">

                                            <div class="single-product">
                                                <div class="product-image">
                                                    @php $images=json_decode($product->images) @endphp
                                                    <img src="{{asset($images[0])}}" height="200px" alt="#">
                                                    <div class="button">
                                                        <a href="{{route('product.details',['id'=>$product->id])}}" class="btn">Details</a>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <span class="category">{{$product->category_name}}</span>
                                                    <h4 class="title">
                                                        <a href="">{{$product->title}}</a>
                                                    </h4>
                                                    <ul class="review">
                                                        <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                            </svg></li>
                                                        <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                            </svg></li>
                                                        <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                            </svg></li>
                                                        <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                            </svg></li>
                                                        <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-half" viewBox="0 0 16 16">
                                                                <path d="M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z"/>
                                                            </svg></li>
                                                        <li><span>4.0 Review(s)</span></li>
                                                    </ul>
                                                    <div class="price">
                                                        <span>${{$product->price}}</span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        @endif
                                        @endif
                                    @endforeach

                                </div>
                                {{$products->links()}}
                            </div>
                            <div class="tab-pane show active fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                                <div class="row">
                                    @foreach($products as $product)
                                        @if($product->features_property!= null)
                                        @if(in_array($feature_data, json_decode($product->features_property)))
                                        <div class="col-lg-12 col-md-12 col-12">

                                            <div class="single-product">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-4 col-md-4 col-12">
                                                        <div class="product-image">
                                                            @php $images=json_decode($product->images) @endphp
                                                            <img src="{{asset($images[0])}}" height="200px" alt="#">
                                                            <div class="button">
                                                                <a href="{{route('product.details',['id'=>$product->id])}}" class="btn">Details</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-12">
                                                        <div class="product-info">
                                                            <span class="category">{{$product->category_name}}</span>
                                                            <h4 class="title">
                                                                <a href="">{{$product->title}}</a>
                                                            </h4>
                                                            <ul class="review">
                                                                <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                                    </svg></li>
                                                                <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                                    </svg></li>
                                                                <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                                    </svg></li>
                                                                <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                                    </svg></li>
                                                                <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-half" viewBox="0 0 16 16">
                                                                        <path d="M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z"/>
                                                                    </svg></li>
                                                                <li><span>4.0 Review(s)</span></li>
                                                            </ul>
                                                            <div class="price">
                                                                <span>${{$product->price}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        @endif
                                        @endif
                                    @endforeach
                                </div>
                                {{$products->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
