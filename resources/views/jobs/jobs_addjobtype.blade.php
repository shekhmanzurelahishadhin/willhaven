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
                <a href="{{route('viewjobtype')}}" class="btn btn-primary my-3">Return</a>

                @if(Session::has('scc'))
                    <p class="alert alert-success" style="font-weight:bold;">{{Session::get('scc')}}</p>
                @endif

                <form action="{{route('storeJobType')}}" method="GET">
                    @csrf
                    <div class="form-group">
                        <label for="title">Type</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter job type">

                        @error('title')
                          <span style="font-weight:bold;" class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Submit">
                </form>
                {{-- EN code ends --}}

            @elseif($language->language=='gr')
                {{-- GR code starts --}}
                <a href="{{route('job')}}" class="btn btn-primary my-3">Zurückkehren</a>

                @if(Session::has('scc'))
                    <p class="alert alert-success" style="font-weight:bold;"><?php echo $lang->translate(Session::get('scc')); ?></p>
                @endif

                <form action="{{route('storeJobType')}}" method="GET">
                    @csrf
                    <div class="form-group">
                        <label for="title">Typ</label>
                        <input type="text" class="form-control" name="title" placeholder="Geben Sie den Jobtyp ein">

                        @error('title')
                          <span style="font-weight:bold;" class="text-danger">@php echo $lang->translate($message); @endphp</span>
                        @enderror
                    </div>

                    <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Submit">
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
