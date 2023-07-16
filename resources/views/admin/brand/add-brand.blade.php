@extends('layouts.app')
@section('body_content')
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto card p-4 mt-5">

                @foreach($languages as $language)
                    @if($language->status==1)
                        @if($language->language=='en')
                            <h2 class="text-center my-4">Add Brand</h2>
                        @elseif($language->language=='gr')
                            <h2 class="text-center my-4">Marke hinzufügen</h2>
                        @endif
                    @endif
                @endforeach
                <form class="row g-3" method="POST" action="{{route('save.brand')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="col-md-12">

                        @foreach($languages as $language)
                            @if($language->status==1)
                                @if($language->language=='en')
                                    <label for="inputCategory" class="form-label">Brand Name</label>
                                @elseif($language->language=='gr')
                                    <label for="inputCategory" class="form-label">Markenname</label>
                                @endif
                            @endif
                        @endforeach
                        <input type="text" class="form-control" name="brand_name" id="inputCategory">
                    </div>
                    <div class="col-md-12 my-2">

                        @foreach($languages as $language)
                            @if($language->status==1)
                                @if($language->language=='en')
                                    <label for="inputCategory" class="form-label d-block">Image</label>
                                @elseif($language->language=='gr')
                                    <label for="inputCategory" class="form-label d-block">Bild</label>
                                @endif
                            @endif
                        @endforeach
                        <input class="" id="image" name="image" type="file"  />
                    </div>
                    <div class="col-12 my-3">

                        @foreach($languages as $language)
                            @if($language->status==1)
                                @if($language->language=='en')
                                    <button type="submit" class="btn btn-primary">Add Brand</button>
                                @elseif($language->language=='gr')
                                    <button type="submit" class="btn btn-primary">Marke hinzufügen</button>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
