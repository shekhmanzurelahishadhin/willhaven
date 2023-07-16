@extends('layouts.app')
@section('body_content')
    <head>
        <link href="{{asset('assets')}}/dist/css/style.min.css" rel="stylesheet">
    </head>

    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto card p-4 mt-5">

                @foreach($languages as $language)
                    @if($language->status==1)
                        @if($language->language=='en')
                            <h2 class="text-center my-4">Manage Category</h2>
                        @elseif($language->language=='gr')
                            <h2 class="text-center my-4">Kategorie verwalten</h2>
                        @endif
                    @endif
                @endforeach

                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive m-t-40">
                            <table id="config-table" class="table display table-striped border no-wrap">
                                <thead>
                                @foreach($languages as $language)
                                    @if($language->status==1)
                                        @if($language->language=='en')
                                            <tr>

                                                <th scope="col">Category Name</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        @elseif($language->language=='gr')
                                            <tr>

                                                <th scope="col">
                                                    Kategoriename</th>
                                                <th scope="col">
                                                    Bild</th>
                                                <th scope="col">
                                                    Aktion</th>
                                            </tr>
                                        @endif
                                    @endif
                                @endforeach
                                </thead>
                                <tbody>

                                @foreach($categories as $category)
                                    <tr>

                                        <td>
                                        {{$category->category_name}}
                                        <td><img src="{{asset($category->image)}}" height="60px" width="60px" alt=""></td>
                                        <td>

                                            @foreach($languages as $language)
                                                @if($language->status==1)
                                                    @if($language->language=='en')
                                                        <a class="btn btn-primary btn-sm" href="{{route('edit.car.motor.category',['category_id'=>$category->id])}}">Edit</a>
                                                    @elseif($language->language=='gr')
                                                        <a class="btn btn-primary btn-sm" href="{{route('edit.car.motor.category',['category_id'=>$category->id])}}">
                                                            Bearbeiten</a>
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
    </div>
@endsection
