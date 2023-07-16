@extends('layouts.app')
@section('body_content')
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto card p-4 mt-5">

                @foreach($languages as $language)
                    @if($language->status==1)
                        @if($language->language=='en')
                            <h2 class="text-center my-4">Edit Sub District</h2>
                        @elseif($language->language=='gr')
                            <h2 class="text-center my-4">Unterbezirk bearbeiten</h2>
                        @endif
                    @endif
                @endforeach
                <form class="row g-3" method="POST" action="{{route('update.sub.district')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$sub_district->id}}">
                    <div class="col-md-12">

                        @foreach($languages as $language)
                            @if($language->status==1)
                                @if($language->language=='en')
                                    <label for="inputState" class="form-label">Division</label>
                                @elseif($language->language=='gr')
                                    <label for="inputState" class="form-label">Bezirk</label>
                                @endif
                            @endif
                        @endforeach
                        <select id="inputState" name="district_id" class="form-select form-control">

                            @foreach($languages as $language)
                                @if($language->status==1)
                                    @if($language->language=='en')
                                        <option selected disabled>Choose District...</option>
                                    @elseif($language->language=='gr')
                                        <option selected disabled>Bezirk wählen...</option>
                                    @endif
                                @endif
                            @endforeach
                            @foreach($districts as $district)
                                <option  value="{{$district->id}}" {{$district->id == $sub_district->district_id?'selected':''}}>{{$district->district_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">

                        @foreach($languages as $language)
                            @if($language->status==1)
                                @if($language->language=='en')
                                    <label for="inputCategory" class="form-label">Sub District Name</label>
                                @elseif($language->language=='gr')
                                    <label for="inputCategory" class="form-label">Name des Unterdistrikts</label>
                                @endif
                            @endif
                        @endforeach
                        <input type="text" class="form-control" value="{{$sub_district->sub_district_name}}" name="sub_district_name" id="inputCategory">
                    </div>
                    <div class="col-12 my-3">
                        @foreach($languages as $language)
                            @if($language->status==1)
                                @if($language->language=='en')
                                    <button type="submit" class="btn btn-primary">Add Sub District</button>
                                @elseif($language->language=='gr')
                                    <button type="submit" class="btn btn-primary">Unterbezirk hinzufügen</button>
                                @endif
                            @endif
                        @endforeach

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
