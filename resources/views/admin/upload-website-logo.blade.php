@extends('layouts.app')
@section('body_content')
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto card p-4 mt-5">

                @foreach ($languages as $language)
                    @if ($language->status == 1)
                        @if ($language->language == 'en')
                            <h2 class="text-center my-4">Upload Website Logo</h2>
                        @elseif($language->language == 'gr')
                            <h2 class="text-center my-4">Laden Sie das Website-Logo hoch</h2>
                        @endif
                    @endif
                @endforeach
                <form class="row g-3" method="POST" action="{{ route('save.website.logo') }}" enctype="multipart/form-data">
                    @csrf
                    @if($logo!=null)
                    <input type="hidden" name="id" value="{{$logo->id}}">
                    @endif
                    <div class="col-md-12">
                        @foreach ($languages as $language)
                            @if ($language->status == 1)
                                @if ($language->language == 'en')
                                    <label for="inputCategory" class="form-label">Select Image</label>
                                @elseif($language->language == 'gr')
                                    <label for="inputCategory" class="form-label">Bild auswählen</label>
                                @endif
                            @endif
                        @endforeach
                        <input type="file" class="form-control" name="image" id="inputCategory">
                    </div>
                    <div class="col-12 my-3">
                        @foreach ($languages as $language)
                            @if ($language->status == 1)
                                @if ($language->language == 'en')
                                    <button type="submit" class="btn btn-primary">Upload now</button>
                                @elseif($language->language == 'gr')
                                    <button type="submit" class="btn btn-primary">Jetzt hochladen</button>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
