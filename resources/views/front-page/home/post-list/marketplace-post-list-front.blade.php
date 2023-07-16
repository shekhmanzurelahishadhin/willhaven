@extends('front-page.master')
@section('content')
    <head>
        <link href="{{asset('assets')}}/dist/css/style.min.css" rel="stylesheet">
    </head>

    <section class="ad-front-section">
        <div class="container">
            @foreach($languages as $language)
                @if($language->status==1)
                    @if($language->language=='en')
                        <h5 class="text-center mt-4">Welcome {{Auth::user()->name}}! Lets Post and Ad</h5>
                        <p class="text-center">Choose any option bellow</p>

                    @elseif($language->language=='gr')
                        <h5 class="text-center mt-4">Willkommen {{Auth::user()->name}}! Lässt Post und Anzeige</h5>
                        <p class="text-center">Wählen Sie unten eine beliebige Option</p>
                    @endif
                @endif
            @endforeach
            <div class="card p-4 my-5">
                @foreach($languages as $language)
                    @if($language->status==1)
                        @if($language->language=='en')
                            <h6 class="text-center my-4">market place post list</h6>
                        @elseif($language->language=='gr')
                            <h6 class="text-center my-4">Marktplatz-Post-Liste</h6>
                        @endif
                    @endif
                @endforeach

                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive m-t-40">
                            <table id="config-table" class="table display table-striped border no-wrap">
                                <thead>
                                @foreach ($languages as $language)
                                    @if ($language->status == 1)
                                        @if ($language->language == 'en')
                                            <tr>
{{--                                                <th scope="col">SL</th>--}}
                                                <th scope="col">Title</th>
                                                <th scope="col">Image</th>

                                                <th scope="col">Categories</th>
                                                <th scope="col">Sub Categories</th>
                                                <th scope="col">Sub Sub Categories</th>
                                                <th scope="col">Brand</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        @elseif($language->language == 'gr')
                                            <tr>
{{--                                                <th scope="col">SL</th>--}}
                                                <th scope="col">Titel</th>
                                                <th scope="col">Bild</th>

                                                <th scope="col">Kategorien</th>
                                                <th scope="col">Unterkategorien</th>
                                                <th scope="col">Unter-Unter-Kategorien</th>
                                                <th scope="col">Marke</th>
                                                <th scope="col">Preis</th>
                                                <th scope="col">Aktion</th>
                                            </tr>
                                        @endif
                                    @endif
                                @endforeach
                                </thead>
                                <tbody>
                                @php $i =1 @endphp
                                @foreach ($products as $product)


                                    <tr>
{{--                                        <th scope="row">{{ $loop->iteration }}</th>--}}
                                        <td>{{ $product->title }}</td>
                                        <td>
                                            @if($product->images!='null')
                                                @foreach(json_decode($product->images) as $image)
                                                    <img src="{{ asset($image) }}" height="60px" width="60px" alt="">
                                                @endforeach
                                            @endif
                                        </td>

                                        <td>{{ $product->category_name }}</td>
                                        <td>{{ $product->sub_category_name }}</td>
                                        <td>{{ $product->sub_sub_category_name }}</td>
                                        <td>{{ $product->brand_name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>
                                            @foreach ($languages as $language)
                                                @if ($language->status == 1)
                                                    @if ($language->language == 'en')
                                                        <a class="btn btn-primary btn-sm"
                                                           href="{{ route('edit.inHouseProduct.frontEnd', ['id' => $product->id]) }}">Edit</a>
                                                    @elseif($language->language == 'gr')
                                                        <a class="btn btn-primary btn-sm"
                                                           href="{{ route('edit.inHouseProduct.frontEnd', ['id' => $product->id]) }}">Bearbeiten</a>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
