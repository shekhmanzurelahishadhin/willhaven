@include('admin.admincdn')
@extends('layouts.app')
@section('body_content')

<br>

<?php
  use Stichoza\GoogleTranslate\GoogleTranslate;
  $lang = new GoogleTranslate('de');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      @foreach($languages as $language)
        @if($language->status==1)
            @if($language->language=='en')
                {{-- EN code starts --}}
                <a href="{{route('nearest_location')}}" class="btn btn-primary my-3">Return</a>

                <form action="{{url('/property_update_nearestlocation/'.$eData->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Purpose</label>
                        <input type="text" class="form-control" name="name" value="{{$eData->name}}" placeholder="Enter a nearest location">

                        @error('name')
                          <span style="font-weight:bold;" class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <input type="submit" class="btn btn-primary" name="update" id="update" value="Update">
                </form>
                {{-- EN code ends --}}

            @elseif($language->language=='gr')
                {{-- GR code starts --}}
                <a href="{{route('nearest_location')}}" class="btn btn-primary my-3">Zurückkehren</a>

                <form action="{{url('/property_update_nearestlocation/'.$eData->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Zweck</label>
                        <input type="text" class="form-control" name="name" value="{{$eData->name}}" placeholder="Geben Sie den Immobilientyp ein">

                        @error('name')
                          <span style="font-weight:bold;" class="text-danger"><?php echo $lang->translate($message); ?></span>
                        @enderror
                    </div>

                    <input type="submit" class="btn btn-primary" name="update" id="update" value="Aktualisieren">
                </form>
                {{-- GR code ends --}}
            @endif
        @endif
      @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>

@endsection
