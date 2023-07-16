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
    <title>Edit Amnity</title>
  </head>
  <body>
    <div class="container">
      @foreach($languages as $language)
        @if($language->status==1)
            @if($language->language=='en')
                {{-- EN code starts --}}
                <a href="{{route('allProperty')}}" class="btn btn-secondary my-3">Return</a>

                <form action="{{url('/property_update_property/'.$eData->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <div class="mb-3">
                        <label for="title" style="font-size:17px; font-weight:bold;">Title:</label>
                        <input type="text" class="form-control" name="title" value="{{$eData->title}}" placeholder="Enter property title" required>
                      </div>

                      <div class="mb-3">
                        <label for="type" style="font-size:17px; font-weight:bold;">Type:</label>
                        <select name="type" id="type" class="form-control" required>
                            <option value="{{$eData->type}}" selected hidden>{{$eData->type}}</option>
                            @foreach ($pTypes as $type=>$x1)
                                <option value="{{$x1->name}}">{{$x1->name}}</option>
                            @endforeach
                        </select>
                      </div>

                      <div class="mb-3">
                        <label for="purpose" style="font-size:17px; font-weight:bold;">Purpose:</label>
                        <select name="purpose" id="purpose" class="form-control" required>
                          <option value="{{$eData->purpose}}" selected hidden>{{$eData->purpose}}</option>
                          @foreach ($pPurpose as $pPurpose=>$x2)
                              <option value="{{$x2->name}}">{{$x2->name}}</option>
                          @endforeach
                        </select>
                      </div>

                      <div class="mb-3">
                        <label for="division" style="font-size:17px; font-weight:bold;">Division:</label>
                        <select name="division" id="division" class="form-control" required>
                          <option value="{{$eData->division}}" selected hidden>{{$eData->division}}</option>
                          <option value="Barisal">Barisal</option>
                          <option value="Chittagong">Chittagong</option>
                          <option value="Dhaka">Dhaka</option>
                          <option value="Khulna">Khulna</option>
                          <option value="Mymensingh">Mymensingh</option>
                          <option value="Rajshahi">Rajshahi</option>
                          <option value="Rangpur">Rangpur</option>
                          <option value="Sylhet">Sylhet</option>
                        </select>
                      </div>

                      <div class="mb-3">
                        <label for="address" style="font-size:17px; font-weight:bold;">Address:</label>
                        <input type="text" class="form-control" name="address" value="{{$eData->address}}" placeholder="Enter property address" required>
                      </div>

                      <div class="mb-3">
                        <label for="phone" style="font-size:17px; font-weight:bold;">Phone:</label>
                        <input type="text" class="form-control" name="phone" value="{{$eData->phone}}" placeholder="Enter phone number" required>
                      </div>

                      <div class="mb-3">
                        <label for="email" style="font-size:17px; font-weight:bold;">Email:</label>
                        <input type="text" class="form-control" name="email" value="{{$eData->email}}" placeholder="Enter email address" required>
                      </div>

                      <div class="mb-3">
                        <label for="price" style="font-size:17px; font-weight:bold;">Price:</label>
                        <input type="number" class="form-control" name="price" value="{{$eData->price}}" placeholder="Enter property's price" required>
                      </div>

                      <div class="mb-3">
                        <label for="area" style="font-size:17px; font-weight:bold;">Area (Square Feet):</label>
                        <input type="number" class="form-control" name="area" value="{{$eData->area}}" placeholder="Enter property's area" required>
                      </div>

                      <div class="mb-3">
                        <label for="unit" style="font-size:17px; font-weight:bold;">Total Unit(s):</label>
                        <input type="number" class="form-control" name="unit" value="{{$eData->unit}}" placeholder="Enter total unit" required>
                      </div>

                      <div class="mb-3">
                        <label for="room" style="font-size:17px; font-weight:bold;">Total Room(s):</label>
                        <input type="number" class="form-control" name="room" value="{{$eData->room}}" placeholder="Enter total room" required>
                      </div>

                      <div class="mb-3">
                        <label for="bedroom" style="font-size:17px; font-weight:bold;">Total Bedroom(s):</label>
                        <input type="number" class="form-control" name="bedroom" value="{{$eData->bedroom}}" placeholder="Enter total bedroom" required>
                      </div>

                      <div class="mb-3">
                        <label for="washroom" style="font-size:17px; font-weight:bold;">Total Washroom(s):</label>
                        <input type="number" class="form-control" name="washroom" value="{{$eData->washroom}}" placeholder="Enter total washroom" required>
                      </div>

                      <div class="mb-3">
                        <label for="kitchen" style="font-size:17px; font-weight:bold;">Total Kitchen(s):</label>
                        <input type="number" class="form-control" name="kitchen" value="{{$eData->kitchen}}" placeholder="Enter total kitchen" required>
                      </div>

                      <div class="mb-3">
                        <label for="parking" style="font-size:17px; font-weight:bold;">Total Parking Slot(s):</label>
                        <input type="number" class="form-control" name="parking" value="{{$eData->parking}}" placeholder="Enter total parking" required>
                      </div>

                      {{-- <div class="mb-3">
                        <label for="newImg" style="font-size:17px; font-weight:bold;">Change Image:</label>
                        <input type="file" name="newImg" id="newImg" class="form-control-file">
                      </div> --}}

                      <div class="mb-3">
                        <label for="video_link" style="font-size:17px; font-weight:bold;">YouTube Video URL:</label>
                        <input class="form-control" type="text" name="video_link" id="video_link" value="{{$eData->video_link}}" placeholder="Enter YouTube video link">
                      </div>

                      <div class="mb-3">
                        {{-- <label for="" style="font-size:17px; font-weight:bold;">Amenities:</label> --}}
                        <div class="d-none">
                          {{-- all checked Amenities from database [properties table] --}}
                        </div>

                        {{-- @foreach ($pAmenities as $amenities=>$x3)
                            <div class="pl-4">
                                <input value="{{$x3->name}}" type="checkbox" name="aminities[]">
                                <label class="mx-1" for="{{$x3->name}}">{{$x3->name}}</label>
                            </div>
                        @endforeach --}}
                      </div>

                      <div class="mb-3">
                        {{-- nearest location --}}
                      </div>

                      <div class="mb-3">
                        <label for="maps" style="font-size:17px; font-weight:bold;">Google Map Embed Code:</label>
                        <input class="form-control" type="text" name="maps" id="maps" value="{{$eData->google_map_embed_code}}" placeholder="Enter Google Map Embed Code">
                      </div>

                      <div class="mb-3">
                        <label for="descriptions" style="font-size:17px; font-weight:bold;">Description:</label>
                        <input class="form-control" type="text" name="descriptions" id="descriptions" value="{{$eData->descriptions}}" placeholder="Enter descriptions">
                      </div>

                      <div class="mb-3">
                        <label for="featured" style="font-size:17px; font-weight:bold;">Featured</label>
                        <select name="featured" id="featured" class="form-control">
                          <option value="{{$eData->featured}}" selected hidden>{{$eData->featured}}</option>
                          <option value="0">No</option>
                          <option value="1">Yes</option>
                        </select>
                      </div>

                      <div class="mb-3">
                        <label for="top_property" style="font-size:17px; font-weight:bold;">Top Property</label>
                        <select name="top_property" id="top_property" class="form-control">
                          <option value="{{$eData->top_property}}" selected hidden>{{$eData->top_property}}</option>
                          <option value="0">No</option>
                          <option value="1">Yes</option>
                        </select>
                      </div>

                      <div class="mb-3">
                        <label for="urgent_property" style="font-size:17px; font-weight:bold;">Urgent Property</label>
                        <select name="urgent_property" id="urgent_property" class="form-control">
                          <option value="{{$eData->urgent_property}}" selected hidden>{{$eData->urgent_property}}</option>
                          <option value="1">Yes</option>
                          <option value="0">No</option>
                        </select>
                      </div>

                      @error('name')
                        <span style="font-weight:bold;" class="text-danger">{{$message}}</span>
                      @enderror
                    </div>

                    <input type="submit" class="btn btn-primary" name="update" id="update" value="Update">
                </form>
                {{-- EN code ends --}}

            @elseif($language->language=='gr')
                {{-- GR code starts --}}
                <a href="{{route('allProperty')}}" class="btn btn-secondary my-3">Zurückkehren</a>

                <form action="{{url('/property_update_property/'.$eData->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <div class="mb-3">
                        <label for="title" style="font-size:17px; font-weight:bold;">Titel:</label>
                        <input type="text" class="form-control" name="title" value="{{$eData->title}}" placeholder="Eigentumstitel eingeben" required>
                      </div>

                      <div class="mb-3">
                        <label for="type" style="font-size:17px; font-weight:bold;">Typ:</label>
                        <select name="type" id="type" class="form-control" required>
                            <option value="{{$eData->type}}" selected hidden><?php echo $lang->translate($eData->type); ?></option>
                            @foreach ($pTypes as $type=>$x1)
                                <option value="{{$x1->name}}"><?php echo $lang->translate($x1->name); ?></option>
                            @endforeach
                        </select>
                      </div>

                      <div class="mb-3">
                        <label for="purpose" style="font-size:17px; font-weight:bold;">Zweck:</label>
                        <select name="purpose" id="purpose" class="form-control" required>
                          <option value="{{$eData->purpose}}" selected hidden><?php echo $lang->translate($eData->purpose); ?></option>
                          @foreach ($pPurpose as $pPurpose=>$x2)
                              <option value="{{$x2->name}}"><?php echo $lang->translate($x2->name); ?></option>
                          @endforeach
                        </select>
                      </div>

                      <div class="mb-3">
                        <label for="division" style="font-size:17px; font-weight:bold;">Aufteilung:</label>
                        <select name="division" id="division" class="form-control" required>
                          <option value="{{$eData->division}}" selected hidden><?php echo $lang->translate($eData->division); ?></option>
                          <option value="Barisal">Barisal</option>
                          <option value="Chittagong">Chittagong</option>
                          <option value="Dhaka">Dhaka</option>
                          <option value="Khulna">Khulna</option>
                          <option value="Mymensingh">Mymensingh</option>
                          <option value="Rajshahi">Rajshahi</option>
                          <option value="Rangpur">Rangpur</option>
                          <option value="Sylhet">Sylhet</option>
                        </select>
                      </div>

                      <div class="mb-3">
                        <label for="address" style="font-size:17px; font-weight:bold;">Adresse:</label>
                        <input type="text" class="form-control" name="address" value="{{$eData->address}}" placeholder="Geben Sie die Adresse der Immobilie ein" required>
                      </div>

                      <div class="mb-3">
                        <label for="phone" style="font-size:17px; font-weight:bold;">Telefon:</label>
                        <input type="text" class="form-control" name="phone" value="{{$eData->phone}}" placeholder="Telefonnummer eingeben" required>
                      </div>

                      <div class="mb-3">
                        <label for="email" style="font-size:17px; font-weight:bold;">Email:</label>
                        <input type="text" class="form-control" name="email" value="{{$eData->email}}" placeholder="E-Mail Adresse eingeben" required>
                      </div>

                      <div class="mb-3">
                        <label for="price" style="font-size:17px; font-weight:bold;">Preis:</label>
                        <input type="number" class="form-control" name="price" value="{{$eData->price}}" placeholder="Geben Sie den Preis der Immobilie ein" required>
                      </div>

                      <div class="mb-3">
                        <label for="area" style="font-size:17px; font-weight:bold;">Bereich (Quadratfuß):</label>
                        <input type="number" class="form-control" name="area" value="{{$eData->area}}" placeholder="Geben Sie den Bereich der Immobilie ein" required>
                      </div>

                      <div class="mb-3">
                        <label for="unit" style="font-size:17px; font-weight:bold;">Gesamteinheit:</label>
                        <input type="number" class="form-control" name="unit" value="{{$eData->unit}}" placeholder="Gesamteinheit eingeben" required>
                      </div>

                      <div class="mb-3">
                        <label for="room" style="font-size:17px; font-weight:bold;">Gesamtraum:</label>
                        <input type="number" class="form-control" name="room" value="{{$eData->room}}" placeholder="Gesamtraum eingeben" required>
                      </div>

                      <div class="mb-3">
                        <label for="bedroom" style="font-size:17px; font-weight:bold;">Gesamtes Schlafzimmer:</label>
                        <input type="number" class="form-control" name="bedroom" value="{{$eData->bedroom}}" placeholder="Geben Sie das gesamte Schlafzimmer ein" required>
                      </div>

                      <div class="mb-3">
                        <label for="washroom" style="font-size:17px; font-weight:bold;">Totaler Waschraum:</label>
                        <input type="number" class="form-control" name="washroom" value="{{$eData->washroom}}" placeholder="Geben Sie den gesamten Waschraum ein" required>
                      </div>

                      <div class="mb-3">
                        <label for="kitchen" style="font-size:17px; font-weight:bold;">Totale Küche:</label>
                        <input type="number" class="form-control" name="kitchen" value="{{$eData->kitchen}}" placeholder="Geben Sie die Gesamtküche ein" required>
                      </div>

                      <div class="mb-3">
                        <label for="parking" style="font-size:17px; font-weight:bold;">Gesamtparkplatz:</label>
                        <input type="number" class="form-control" name="parking" value="{{$eData->parking}}" placeholder="Gesamtparkplatz eingeben" required>
                      </div>

                      {{-- <div class="mb-3">
                        <label for="newImg" style="font-size:17px; font-weight:bold;">Change Image:</label>
                        <input type="file" name="newImg" id="newImg" class="form-control-file">
                      </div> --}}

                      <div class="mb-3">
                        <label for="video_link" style="font-size:17px; font-weight:bold;">YouTube Video URL:</label>
                        <input class="form-control" type="text" name="video_link" id="video_link" value="{{$eData->video_link}}" placeholder="Geben Sie den YouTube Video link ein">
                      </div>

                      <div class="mb-3">
                        {{-- <label for="" style="font-size:17px; font-weight:bold;">Amenities:</label> --}}
                        <div class="d-none">
                          {{-- all checked Amenities from database [properties table] --}}
                        </div>

                        {{-- @foreach ($pAmenities as $amenities=>$x3)
                            <div class="pl-4">
                                <input value="{{$x3->name}}" type="checkbox" name="aminities[]">
                                <label class="mx-1" for="{{$x3->name}}">{{$x3->name}}</label>
                            </div>
                        @endforeach --}}
                      </div>

                      <div class="mb-3">
                        {{-- nearest location --}}
                      </div>

                      <div class="mb-3">
                        <label for="maps" style="font-size:17px; font-weight:bold;">Google Map-Einbettungscode:</label>
                        <input class="form-control" type="text" name="maps" id="maps" value="{{$eData->google_map_embed_code}}" placeholder="Geben Sie den Google Map-Einbettungscode ein">
                      </div>

                      <div class="mb-3">
                        <label for="descriptions" style="font-size:17px; font-weight:bold;">Beschreibung:</label>
                        <input class="form-control" type="text" name="descriptions" id="descriptions" value="{{$eData->descriptions}}" placeholder="Geben Sie Beschreibungen ein">
                      </div>

                      <div class="mb-3">
                        <label for="featured" style="font-size:17px; font-weight:bold;">Hervorgehoben</label>
                        <select name="featured" id="featured" class="form-control">
                          <option value="{{$eData->featured}}" selected hidden>{{$eData->featured}}</option>
                          <option value="No">NEIN</option>
                          <option value="Yes">Ja</option>
                        </select>
                      </div>

                      <div class="mb-3">
                        <label for="top_property" style="font-size:17px; font-weight:bold;">Top-Eigenschaft</label>
                        <select name="top_property" id="top_property" class="form-control">
                          <option value="{{$eData->top_property}}" selected hidden>{{$eData->top_property}}</option>
                          <option value="No">NEIN</option>
                          <option value="Yes">Ja</option>
                        </select>
                      </div>

                      <div class="mb-3">
                        <label for="urgent_property" style="font-size:17px; font-weight:bold;">Dringendes Eigentum</label>
                        <select name="urgent_property" id="urgent_property" class="form-control">
                          <option value="{{$eData->urgent_property}}" selected hidden>{{$eData->urgent_property}}</option>
                          <option value="yes">Ja</option>
                          <option value="No">NEIN</option>
                        </select>
                      </div>

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
