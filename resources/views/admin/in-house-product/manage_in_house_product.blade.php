@extends('layouts.app')
@section('body_content')
    <head>
        <link href="{{asset('assets')}}/dist/css/style.min.css" rel="stylesheet">
    </head>
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto card p-4 mt-5">

                @foreach ($languages as $language)
                    @if ($language->status == 1)
                        @if ($language->language == 'en')
                            <h2 class="text-center my-4">Manage Inhouse Product</h2>
                        @elseif($language->language == 'gr')
                            <h2 class="text-center my-4">Eigenes Produkt verwalten</h2>
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

                                    @foreach ($inhouse as $product)
                                        @if($product->user_id== Auth::user()->id)
                                            <tr>
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
                                                                   href="{{ route('edit.inhouse.product', ['id' => $product->id]) }}">Edit</a>
                                                            @elseif($language->language == 'gr')
                                                                <a class="btn btn-primary btn-sm"
                                                                   href="{{ route('edit.inhouse.product', ['id' => $product->id]) }}">Bearbeiten</a>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

@endsection
