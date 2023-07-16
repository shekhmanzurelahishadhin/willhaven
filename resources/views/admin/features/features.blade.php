@extends('layouts.app')
@section('body_content')
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto card p-4 mt-5">

                @foreach($languages as $language)
                    @if($language->status==1)
                        @if($language->language=='en')
                            <h2 class="text-center my-4">Add Features</h2>
                        @elseif($language->language=='gr')
                            <h2 class="text-center my-4">Funktionen hinzufügen</h2>
                        @endif
                    @endif
                @endforeach
                <form class="row g-3" method="POST" action="{{route('save.features')}}">
                    @csrf
                    <div class="col-md-12">

                        @foreach($languages as $language)
                            @if($language->status==1)
                                @if($language->language=='en')
                                    <label for="inputState" class="form-label">Category</label>
                                @elseif($language->language=='gr')
                                    <label for="inputState" class="form-label">Kategorie</label>
                                @endif
                            @endif
                        @endforeach
                        <select id="inputState" name="category_id" class="form-select form-control">
                            <option selected>Choose Category...</option>
                            @foreach($categories as $category)
                                <option  value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">

                        @foreach($languages as $language)
                            @if($language->status==1)
                                @if($language->language=='en')
                                    <label for="inputCategory" class="form-label">Features Name</label>
                                @elseif($language->language=='gr')
                                    <label for="inputCategory" class="form-label">Funktionsname</label>
                                @endif
                            @endif
                        @endforeach
                            <select id="inputState" name="features_id" class="form-select form-control">
                                <option selected>Choose feature...</option>
                                @foreach($features as $feature)
                                    <option  value="{{$feature->id}}">{{$feature->features_name}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="col-md-12">
                        <div class=" mb-2">
                            @foreach($languages as $language)
                                @if($language->status==1)
                                    @if($language->language=='en')
                                        <label for="inputCategory" class="form-label">Features Property</label>
                                    @elseif($language->language=='gr')
                                        <label for="inputCategory" class="form-label">Eigenschaften-Eigenschaft</label>
                                    @endif
                                @endif
                            @endforeach

                            <div class="row ">
                                <div class="col-12" id="nearest-place-box">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <input type="text" class="form-control" name="features_property[]" id="inputCategory">
                                        </div>
                                        <div class="col-md-1">
                                            <button id="addFeaturesRow" type="button" class="btn btn-success btn-sm nearest-row-btn"><i class="fas fa-plus" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="hidden-location-box" class="d-none pl-3 pr-3">
                                <div class="delete-dynamic-location">
                                    <div class="row mt-2">
                                        <div class="col-md-11">
                                            <input type="text" class="form-control" name="features_property[]" id="inputCategory">
                                        </div>
                                        <div class="col-md-1">
                                            <button type="button" class="btn btn-danger btn-sm nearest-row-btn removeNearestPlaceRow"><i class="fas fa-trash" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 my-3">

                        @foreach($languages as $language)
                            @if($language->status==1)
                                @if($language->language=='en')
                                    <button type="submit" class="btn btn-primary">Add Features</button>
                                @elseif($language->language=='gr')
                                    <button type="submit" class="btn btn-primary">Funktionen hinzufügen</button>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                $("#addFeaturesRow").on("click",function(){
                    var new_row=$("#hidden-location-box").html();
                    $("#nearest-place-box").append(new_row)

                })
                $(document).on('click', '.removeNearestPlaceRow', function() {
                    $(this).closest('.delete-dynamic-location').remove();
                });
                //end dynamic nearest place add and remove



            });

        })(jQuery);

    </script>
@endsection
