@include('seller.cdn')
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
                    <a href="{{route('seller_addProperty')}}" class="btn btn-primary my-3">Return</a>

                    @if(Session::has('scc'))
                        <p class="alert alert-success" style="font-weight:bold;">{{Session::get('scc')}}</p>
                    @endif

                    @foreach ($myproperties as $myproperty=>$p)
                        <li class="list-group-item shadow mb-2 rounded-2">
                            <!-- Custom content-->
                            <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                <div class="media-body order-2 order-lg-1">
                                    <h5 class="mt-0 font-weight-bold mb-2">{{$p->title}}</h5>
                                    <p class="font-italic text-muted mb-0 small">{{$p->address}}</p>
                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                        <h6 class="font-weight-bold my-2">{{$p->price}} BDT</h6>
                                    </div>
                                </div>
                                <a href="uploads/img/{{$p->img}}" target="_blank" class="ml-lg-5 order-1 order-lg-2">
                                    <img src="uploads/img/{{$p->img}}" alt="property_image" height="180px" width="300px" style="border-radius:5px;" >
                                </a>
                            </div> <!-- End -->
                            <div class="text-center">
                                <a href="{{url('/seller_propertyDetails/'.$p->id)}}">Click here for Details</a>
                            </div>
                        </li> <!-- End -->
                    @endforeach
                    {{-- EN code ends --}}

                @elseif($language->language=='gr')
                    {{-- GR code starts --}}
                    <a href="{{route('addproperty')}}" class="btn btn-primary my-3">Erstellen</a>

                    @if(Session::has('scc'))
                        <p class="alert alert-success" style="font-weight:bold;"><?php echo $lang->translate(Session::get('scc')); ?></p>
                    @endif

                    @foreach ($myproperties as $myproperty=>$p)
                    <li class="list-group-item shadow mb-2 rounded-2">
                        <!-- Custom content-->
                        <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                            <div class="media-body order-2 order-lg-1">
                                <h5 class="mt-0 font-weight-bold mb-2">{{$p->title}}</h5>
                                <p class="font-italic text-muted mb-0 small">{{$p->address}}</p>
                                <div class="d-flex align-items-center justify-content-between mt-1">
                                    <h6 class="font-weight-bold my-2">{{$p->price}} BDT</h6>
                                </div>
                            </div>
                            <a href="uploads/img/{{$p->img}}" target="_blank" class="ml-lg-5 order-1 order-lg-2">
                                <img src="uploads/img/{{$p->img}}" alt="property_image" height="180px" width="300px" style="border-radius:5px;" >
                            </a>
                        </div> <!-- End -->
                        <div class="text-center">
                            <a href="{{url('/seller_propertyDetails/'.$p->id)}}">Hier klicken für Details</a>
                        </div>
                    </li> <!-- End -->
                    @endforeach
                    {{-- GR code ends --}}
                @endif
            @endif
        @endforeach
    </div>
  </body>
  <style>
    tr{
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        justify-content: flex-start;
        padding: 5px;
        border-bottom: 1px solid rgb(209, 209, 209)
    }
    td{
        font-size: 16px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        padding: 10px;
    }
    .nostyle{
        padding: 0;
        border-bottom: none;
    }
  </style>
</html>
@endsection
