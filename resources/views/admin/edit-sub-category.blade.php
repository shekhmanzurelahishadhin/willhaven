@extends('layouts.app')
@section('body_content')
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto card p-4 mt-5">

                @foreach($languages as $language)
                    @if($language->status==1)
                        @if($language->language=='en')
                            <h2 class="text-center my-4">Update Sub Category</h2>
                        @elseif($language->language=='gr')
                            <h2 class="text-center my-4">Unterkategorie aktualisieren</h2>
                        @endif
                    @endif
                @endforeach
                <form class="row g-3" method="POST" action="{{route('update.sub.category')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$subCategory->id}}">
                    <div class="col-md-12">
                        @foreach($languages as $language)
                            @if($language->status==1)
                                @if($language->language=='en')
                                    <label for="inputState" class="form-label">Category</label>
                                @elseif($language->language=='gr')
                                    <label for="inputState" class="form-label">
                                        Kategorie</label>
                                @endif
                            @endif
                        @endforeach
                        <select id="inputState" name="category_id" class="form-select form-control">
                            @foreach($languages as $language)
                                @if($language->status==1)
                                    @if($language->language=='en')
                                        <option selected>Choose Category...</option>
                                    @elseif($language->language=='gr')
                                        <option selected>Kategorie auswählen...</option>
                                    @endif
                                @endif
                            @endforeach
                            @foreach($categories as $category)
                                <option  value="{{$category->id}}" {{$category->id==$subCategory->category_id?'selected':''}}>{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        @foreach($languages as $language)
                            @if($language->status==1)
                                @if($language->language=='en')
                                    <label for="inputCategory" class="form-label">Sub Category Name</label>
                                @elseif($language->language=='gr')
                                    <label for="inputCategory" class="form-label">
                                        Name der Unterkategorie</label>
                                @endif
                            @endif
                        @endforeach
                        <input type="text" class="form-control" name="sub_category_name" value="{{$subCategory->sub_category_name}}" id="inputCategory">
                    </div>
                    <div class="col-12 my-3">
                        @foreach($languages as $language)
                            @if($language->status==1)
                                @if($language->language=='en')

                                    <button type="submit" class="btn btn-primary">Update Sub Category</button>
                                @elseif($language->language=='gr')

                                    <button type="submit" class="btn btn-primary">Unterkategorie aktualisieren</button>
                                @endif
                            @endif
                        @endforeach

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
