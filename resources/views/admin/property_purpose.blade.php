@include('admin.admincdn')
@extends('layouts.app')
@section('body_content')

<br><br><br><br>

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
                <table class="table table-bordered">
                  <a href="{{route('create_PropertyPurpose')}}" class="btn btn-primary my-3">Create</a>
                  @if(Session::has('scc'))
                    <p class="alert alert-success" style="font-weight:bold;">{{Session::get('scc')}}</p>
                  @endif

                  <thead>
                    <tr>
                      <th scope="col" style="width:
                      auto; text-align: center;">ID</th>
                      <th scope="col" style="width:
                      50vw; text-align: center;">Purpose</th>
                      <th scope="col" style="width:
                      auto; text-align: center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $key=>$value)
                      <tr>
                        <th scope="row" style="text-align: center; font-style: italic;">{{$value->id}}</th>
                        <td style="font-size:18px;">{{$value->name}}</td>
                        <td style="text-align: center;">
                          <a href="{{url('/property_edit_purpose/'.$value->id)}}" class="btn btn-success" style="width: 120px;">Edit</a>
                          <a href="{{url('/property_del_purpose/'.$value->id)}}" onclick = "return confirm('Are you really want to delete?')" class="btn btn-danger" style="width: 120px;">Delete</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                {{-- EN code ends --}}

            @elseif($language->language=='gr')
                {{-- GR code starts --}}
                <table class="table table-bordered">
                  <a href="{{route('create_PropertyPurpose')}}" class="btn btn-primary my-3">Erstellen</a>
                  @if(Session::has('scc'))
                    <p class="alert alert-success" style="font-weight:bold;"><?php echo $lang->translate(Session::get('scc')); ?></p>
                  @endif

                  <thead>
                    <tr>
                      <th scope="col" style="width:
                      auto; text-align: center;">Ausweis</th>
                      <th scope="col" style="width:
                      50vw; text-align: center;">Zweck</th>
                      <th scope="col" style="width:
                      auto; text-align: center;">Aktion</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $key=>$value)
                      <tr>
                        <th scope="row" style="text-align: center; font-style: italic;">{{$value->id}}</th>
                        <td style="font-size:18px;"><?php echo $lang->translate($value->name); ?></td>
                        <td style="text-align: center;">
                          <a href="{{url('/property_edit_purpose/'.$value->id)}}" class="btn btn-success" style="width: 120px;">Bearbeiten</a>
                          <a href="{{url('/property_del_purpose/'.$value->id)}}" onclick = "return confirm('Wollen Sie wirklich löschen?')" class="btn btn-danger" style="width: 120px;">Löschen</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                {{-- GR code ends --}}
            @endif
        @endif
      @endforeach

    </div>

</html>
@endsection
