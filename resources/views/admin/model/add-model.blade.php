@extends('layouts.app')
@section('body_content')
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto card p-4 mt-5">

                @foreach($languages as $language)
                    @if($language->status==1)
                        @if($language->language=='en')
                            <h2 class="text-center my-4">Add Model</h2>
                        @elseif($language->language=='gr')
                            <h2 class="text-center my-4">Modell hinzufügen</h2>
                        @endif
                    @endif
                @endforeach
                <form class="row g-3" method="POST" action="{{route('save.model')}}">
                    @csrf
                    <div class="col-md-12">

                        @foreach($languages as $language)
                            @if($language->status==1)
                                @if($language->language=='en')
                                    <label for="inputState" class="form-label">Brand</label>
                                @elseif($language->language=='gr')
                                    <label for="inputState" class="form-label">Marke</label>
                                @endif
                            @endif
                        @endforeach
                        <select id="inputState" name="brand_id" class="form-select form-control">
                            <option selected>Choose brand...</option>
                            @foreach($brands as $brand)
                                <option  value="{{$brand->id}}">{{$brand->brand_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        @foreach($languages as $language)
                            @if($language->status==1)
                                @if($language->language=='en')
                                    <label for="inputCategory" class="form-label">Model Name</label>
                                @elseif($language->language=='gr')
                                    <label for="inputCategory" class="form-label">Modellname</label>
                                @endif
                            @endif
                        @endforeach
                        <input type="text" class="form-control" name="model_name" id="inputCategory">
                    </div>
                    <div class="col-12 my-3">

                        @foreach($languages as $language)
                            @if($language->status==1)
                                @if($language->language=='en')
                                    <button type="submit" class="btn btn-primary">Add Model</button>
                                @elseif($language->language=='gr')
                                    <button type="submit" class="btn btn-primary">Modell hinzufügen</button>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
