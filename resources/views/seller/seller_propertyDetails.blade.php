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
                    @if(Session::has('scc'))
                        <p class="alert alert-success" style="font-weight:bold;">{{Session::get('scc')}}</p>
                    @endif
                    <a href="{{route('seller_myProperty')}}" class="btn btn-primary my-3">Return</a>
                    
                        <div class="card shadow p-2 mb-2">
                            <table>
                                <tbody>
                                    <tr>
                                        <td style="width:200px;"><b>Title:</b></td>
                                        <td>{{$myproperty->title}}</td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Type:</b></td>
                                        <td>{{$myproperty->type}}</td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Purpose:</b></td>
                                        <td>{{$myproperty->purpose}}</td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Division:</b></td>
                                        <td>{{$myproperty->division}}</td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Address:</b></td>
                                        <td>{{$myproperty->address}}</td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Phone:</b></td>
                                        <td>{{$myproperty->phone}}</td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Email:</b></td>
                                        <td>{{$myproperty->email}}</td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Price:</b></td>
                                        <td>{{$myproperty->price}}</td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Area:</b></td>
                                        <td>{{$myproperty->area}} Square Feet</td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Unit:</b></td>
                                        <td>{{$myproperty->unit}}</td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Total Room:</b></td>
                                        <td>{{$myproperty->room}}</td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Total Bedroom:</b></td>
                                        <td>{{$myproperty->bedroom}}</td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Total Washroom:</b></td>
                                        <td>{{$myproperty->washroom}}</td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Total Floor:</b></td>
                                        <td>{{$myproperty->floor}}</td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Total Kitchen:</b></td>
                                        <td>{{$myproperty->kitchen}}</td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Parking Slots:</b></td>
                                        <td>{{$myproperty->parking}}</td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Video:</b></td>
                                        <td><a href="{{$myproperty->video_link}}" target="_blank">View</a></td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Amenities:</b></td>
                                        <td>
                                            @php
                                                $amn = json_decode($myproperty->amenities);
                                            @endphp
                                            @foreach($amn as $a)
                                                {{$a}}
                                                <br>
                                            @endforeach
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Nearest Locations:</b></td>
                                        <td>
                                            @php
                                                $l = json_decode($myproperty->locations);
                                                $d = json_decode($myproperty->distance);
                                            @endphp
                                            <table>
                                                <tr class="nostyle">
                                                    <td class="nostyle" >
                                                        @foreach($l as $location)
                                                            @if($location != null)
                                                                {{$location}}
                                                                <br>
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="nostyle">
                                                        @foreach($d as $distance)
                                                            @if($distance != null)
                                                                : {{$distance}}km
                                                                <br>
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Google Map:</b></td>
                                        <td><a href="{{$myproperty->google_map_embed_code}}" target="_blank">Click here</a></td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Description:</b></td>
                                        <td>{{$myproperty->descriptions}}</td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Image:</b></td>
                                        <td>
                                            <a href="../uploads/img/{{$myproperty->img}}" target="_blank"><img src="../uploads/img/{{$myproperty->img}}" alt="property_image" height="180px" width="300px" style="border-radius:10px;"></a>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>

                            <div>
                                <a href="{{url('/seller_delProperty/'.$myproperty->id)}}" onclick = "return confirm('Are you really want to delete?')" class="btn btn-danger float-end m-2" style="width: 120px;">Delete</a>
                                <a href="{{url('/seller_editProperty/'.$myproperty->id)}}" class="btn btn-success float-end m-2" style="width: 120px;">Edit</a>
                            </div>
                        </div>
                    {{-- EN code ends --}}

                @elseif($language->language=='gr')
                    {{-- GR code starts --}}
                    <a href="{{route('addproperty')}}" class="btn btn-primary my-3">Erstellen</a>

                    @if(Session::has('scc'))
                        <p class="alert alert-success" style="font-weight:bold;"><?php echo $lang->translate(Session::get('scc')); ?></p>
                    @endif

                    @foreach ($myproperties as $myproperty=>$p)
                        <div class="card shadow p-2 mb-2">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td style="width:200px;"><b>Titel:</b></td>
                                        <td>{{$p->title}}</td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Typ:</b></td>
                                        <td><?php echo $lang->translate($p->type); ?></td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Zweck:</b></td>
                                        <td><?php echo $lang->translate($p->purpose); ?></td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Aufteilung:</b></td>
                                        <td>{{$p->division}}</td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Adresse:</b></td>
                                        <td>{{$p->address}}</td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Telefon:</b></td>
                                        <td>{{$p->phone}}</td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Email:</b></td>
                                        <td>{{$p->email}}</td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Preis:</b></td>
                                        <td>{{$p->price}}</td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Bereich:</b></td>
                                        <td>{{$p->area}} Square Feet</td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Einheit:</b></td>
                                        <td>{{$p->unit}}</td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Zimmer:</b></td>
                                        <td>{{$p->room}}</td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Schlafzimmer:</b></td>
                                        <td>{{$p->bedroom}}</td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Waschraum:</b></td>
                                        <td>{{$p->washroom}}</td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Boden:</b></td>
                                        <td>{{$p->floor}}</td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Küche:</b></td>
                                        <td>{{$p->kitchen}}</td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Parkplätze:</b></td>
                                        <td>{{$p->parking}}</td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Ausstattung:</b></td>
                                        <td>
                                            @php
                                                $amn = json_decode($p->amenities);
                                            @endphp
                                            @foreach($amn as $a)
                                                {{$lang->translate($a)}}
                                                <br>
                                            @endforeach
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Video:</b></td>
                                        <td><a href="{{$p->video_link}}" target="_blank">Sicht</a></td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Nächstgelegene Standorte:</b></td>
                                        <td>
                                            @php
                                                $l = json_decode($p->locations);
                                                $d = json_decode($p->distance);
                                            @endphp
                                            <table>
                                                <tr class="nostyle">
                                                    <td class="nostyle" >
                                                        @foreach($l as $location)
                                                            @if($location != null)
                                                                {{$lang->translate($location)}}
                                                                <br>
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="nostyle">
                                                        @foreach($d as $distance)
                                                            @if($distance != null)
                                                                : {{$distance}}km
                                                                <br>
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Google Map:</b></td>
                                        <td><a href="{{$p->google_map_embed_code}}" target="_blank">Click here</a></td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Beschreibung:</b></td>
                                        <td>{{$p->descriptions}}</td>
                                    </tr>

                                    <tr>
                                        <td style="width:200px;"><b>Bild:</b></td>
                                        <td>
                                            <a href="uploads/img/{{$p->img}}" target="_blank"><img src="uploads/img/{{$p->img}}" alt="property_image" height="180px" width="300px" style="border-radius:10px;"></a>
                                        </td>                                    </tr>
                                </tbody>

                            </table>

                            <div>
                                <a href="{{url('/property_del_property/'.$p->id)}}" onclick = "return confirm('Are you really want to delete?')" class="btn btn-danger float-end m-2" style="width: 120px;">Löschen</a>
                                <a href="{{url('/property_edit_property/'.$p->id)}}" class="btn btn-success float-end m-2" style="width: 120px;">Bearbeiten</a>
                            </div>
                        </div>
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
