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
                <form class="row g-3" method="POST" action="{{route('save.main.features')}}">
                    @csrf
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
                        <input type="text" class="form-control" name="features_name" id="inputCategory">
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
@endsection
