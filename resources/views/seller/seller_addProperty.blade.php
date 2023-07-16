@include('seller.cdn')
@extends('layouts.app')
@section('body_content')

<br>

<?php
    use Stichoza\GoogleTranslate\GoogleTranslate;
    $lang = new GoogleTranslate('de');
?>

<div class="container-fluid" style="width:75vw;">
    <!-- Page Heading -->

    @foreach($languages as $language)
        @if($language->status==1)
            @if($language->language=='en')
                {{-- EN code starts --}}
                    @if(Session::has('scc'))
                        <p class="alert alert-success" style="font-weight:bold;">{{Session::get('scc')}}</p>
                    @endif

                    <div class="row">
                        <form action="{{route('storingProperty')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card shadow p-2 mb-2">
                                <h3 class="m-2 p-2" style="border-bottom:1px solid rgb(240, 240, 240);">Basic Information</h3>

                                <input type="text" name="userid" id="userid" value="<?php echo Auth::user()->id; ?>" readonly hidden>
                                <div class="mb-3 pl-3 pr-3">
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="title" id="title" placeholder="Enter property title" required>
                                </div>

                                <div class="row pl-3 pr-3">
                                    <div class="mb-3 col-md-6">
                                        <label for="type">Type <span class="text-danger">*</span></label>
                                        <select name="type" id="type" class="form-control" required>
                                            <option value="" selected hidden>Select property type</option>
                                            @foreach ($pTypes as $type=>$x1)
                                                <option value="{{$x1->name}}">{{$x1->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="purpose">Purpose <span class="text-danger">*</span></label>
                                        <select name="purpose" id="purpose" class="form-control" required>
                                            <option value="" selected hidden>Select property purpose</option>
                                            @foreach ($pPurpose as $purpose=>$x2)
                                                <option value="{{$x2->name}}">{{$x2->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="division">Division <span class="text-danger">*</span></label>
                                        <select name="division" id="division" class="form-control" required>
                                            <option value="" selected hidden>Select Division</option>
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

                                    <div class="mb-3 col-md-6">
                                        <label for="address">Address <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="address" id="address" placeholder="Enter property address" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="phone">Phone <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="phone" id="phone" placeholder="Enter your phone" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="email" id="email" placeholder="Enter your email" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="price">Price <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="price" id="price" placeholder="Enter property price" required>
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow p-2 mb-2">
                                <h3 class="m-2 p-2" style="border-bottom:1px solid rgb(240, 240, 240);">Other Information</h3>

                                <div class="row pl-3 pr-3">
                                    <div class="mb-3 col-md-6">
                                        <label for="area">Area (Square feet) <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="area" id="area" placeholder="Enter property area" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="unit">Unit <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="unit" id="unit" placeholder="Enter total unit(s)" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="room">Room <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="room" id="room" placeholder="Enter total room(s)" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="washroom">Washroom <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="washroom" id="washroom" placeholder="Enter total washroom(s)" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="floor">Floor <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="floor" id="floor" placeholder="Enter total floor(s)" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="bedroom">Bedroom <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="bedroom" id="bedroom" placeholder="Enter total bedroom(s)" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="kitchen">Kitchen <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="kitchen" id="kitchen" placeholder="Enter total kitchen(s)" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="parking">Parking Place <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="parking" id="parking" placeholder="Enter total parking place/slot(s)" required>
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow p-2 mb-2">
                                <h3 class="m-2 p-2" style="border-bottom:1px solid rgb(240, 240, 240);">Image & Video</h3>

                                <div class="row pl-3 pr-3">
                                    <div class="mb-3 col-md-6">
                                        <label for="img">Image <span class="text-danger">*</span></label>
                                        <input type="file" name="img" class="form-control-file" accept="image/*" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="video_link">YouTube Video URL <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="video_link" id="video_link" placeholder="Enter YouTube video link" required>
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow p-2 mb-2">
                                <h3 class="m-2 p-2" style="border-bottom:1px solid rgb(240, 240, 240);">Amenities</h3>

                                <div class="row pl-3 pr-3">
                                    <div class="mb-3 col-md-6">
                                        @foreach ($pAmenities as $amenities=>$x3)
                                            <div>
                                                <input value="{{$x3->name}}" type="checkbox" name="aminities[]">
                                                <label class="mx-1" for="{{$x3->name}}">{{$x3->name}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow p-2 mb-2">
                                <h3 class="m-2 p-2" style="border-bottom:1px solid rgb(240, 240, 240);">Nearest Location</h3>

                                <div class="row pl-3 pr-3">
                                    <div class="col-8" id="nearest-place-box">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Nearest Locations</label>
                                                    <select name="nlocations[]" class="form-control">
                                                        <option value="" hidden selected>Select Nearest Location</option>
                                                        @foreach ($nlocations as $nlocation=>$nl)
                                                            <option value="{{$nl->name}}">{{$nl->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Distance (km)</label>
                                                    <input type="text" class="form-control" name="distance[]" placeholder="Enter distance">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button id="addNearestPlaceRow" type="button" class="btn btn-success btn-sm nearest-row-btn"><i class="fas fa-plus" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="hidden-location-box" class="d-none pl-3 pr-3">
                                    <div class="delete-dynamic-location">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Nearest Locations</label>
                                                    <select name="nlocations[]" id="" class="form-control">
                                                        <option value="" selected hidden>Select Nearest Location</option>
                                                        @foreach ($nlocations as $nlocation=>$nl)
                                                            <option value="{{$nl->name}}">{{$nl->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Distance(km)</label>
                                                    <input type="text" class="form-control" name="distance[]" placeholder="Enter distance">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-danger btn-sm nearest-row-btn removeNearestPlaceRow"><i class="fas fa-trash" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow p-2 mb-2">
                                <h3 class="m-2 p-2" style="border-bottom:1px solid rgb(240, 240, 240);">Google Maps</h3>

                                <div class="row pl-3 pr-3">
                                    <div class="mb-3 col-md-6">
                                        <div class="form-group">
                                            <label>Google Maps Code</label>
                                            <textarea class="form-control" rows="2" name="google_maps_code" id="google_maps_code" placeholder="Enter the location code"></textarea>
                                        </div>

                                        <div class="form-group mt-3">
                                            <label for="description">Description <span class="text-danger">*</span></label>
                                            <textarea class="form-control" rows="5" name="descriptions" id="descriptions" placeholder="Enter descriptions" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow p-2 mb-2">
                                <h3 class="m-2 p-2" style="border-bottom:1px solid rgb(240, 240, 240);">Other Details</h3>

                                <div class="row pl-3 pr-3">
                                    <div class="form-group">
                                        <label for="featured">Featured <span class="text-danger">*</span></label>
                                        <select name="featured" id="featured" class="form-control" required>
                                            <option value="No">No</option>
                                            <option value="Yes">Yes</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="top_property">Top Property <span class="text-danger">*</span></label>
                                        <select name="top_property" id="top_property" class="form-control" required>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="urgent_property">Urgent Property <span class="text-danger">*</span></label>
                                        <select name="urgent_property" id="urgent_property" class="form-control" required>
                                            <option value="No">No</option>
                                            <option value="Yes">Yes</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <input type="submit" name="submit" name="submit" id="submit" value="Add" class="btn btn-success mt-2">
                            </div>
                        </form>
                    </div>
                {{-- EN code ends --}}


            @elseif($language->language=='gr')
                {{-- GR code starts --}}
                    <h1 class="h3 mb-2 text-gray-800"><a href="{{route('allProperty')}}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> Alles Eigentum </a></h1>

                    @if(Session::has('scc'))
                        <p class="alert alert-success" style="font-weight:bold;"><?php echo $lang->translate(Session::get('scc')); ?></p>
                    @endif

                    <div class="row">
                        <form action="{{route('storingProperty')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card shadow p-2 mb-2">
                                <h3 class="m-2 p-2" style="border-bottom:1px solid rgb(240, 240, 240);">Grundinformation</h3>

                                <input type="text" name="userid" id="userid" value="<?php echo Auth::user()->id; ?>" readonly hidden>
                                <div class="mb-3 pl-3 pr-3">
                                    <label for="title">Titel <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="title" id="title" placeholder="Eigentumstitel eingeben" required>
                                </div>

                                <div class="row pl-3 pr-3">
                                    <div class="mb-3 col-md-6">
                                        <label for="type">Typ <span class="text-danger">*</span></label>
                                        <select name="type" id="type" class="form-control" required>
                                            <option value="" selected hidden>Eigenschaftstyp auswählen</option>
                                            @foreach ($pTypes as $type=>$x1)
                                                <option value="{{$x1->name}}">
                                                    <?php
                                                        echo $lang->translate($x1->name);
                                                    ?>
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="purpose">Purpose <span class="text-danger">*</span></label>
                                        <select name="purpose" id="purpose" class="form-control" required>
                                            <option value="" selected hidden>Objektzweck auswählen</option>
                                            @foreach ($pPurpose as $purpose=>$x2)
                                                <option value="{{$x2->name}}">
                                                    <?php
                                                        echo $lang->translate($x2->name);
                                                    ?>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="division">Division <span class="text-danger">*</span></label>
                                        <select name="division" id="division" class="form-control" required>
                                            <option value="" selected hidden>Sparte wählen</option>
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

                                    <div class="mb-3 col-md-6">
                                        <label for="address">Adresse <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="address" id="address" placeholder="Geben Sie die Adresse der Immobilie ein" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="phone">Telefon <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="phone" id="phone" placeholder="Geben Sie Ihr Telefon ein" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="email" id="email" placeholder="Geben sie ihre E-Mail Adresse ein" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="price">Preis <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="price" id="price" placeholder="Grundstückspreis eingeben" required>
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow p-2 mb-2">
                                <h3 class="m-2 p-2" style="border-bottom:1px solid rgb(240, 240, 240);">Andere Informationen</h3>

                                <div class="row pl-3 pr-3">
                                    <div class="mb-3 col-md-6">
                                        <label for="area">Bereich (Quadratfuß) <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="area" id="area" placeholder="Grundstücksbereich betreten" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="unit">Einheit <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="unit" id="unit" placeholder="Gesamteinheiten eingeben" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="room">Zimmer <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="room" id="room" placeholder="Geben Sie die Gesamtzahl der Zimmer ein" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="washroom">Waschraum <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="washroom" id="washroom" placeholder="Geben Sie die gesamten Badezimmer ein" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="floor">Boden <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="floor" id="floor" placeholder="Geben Sie die Gesamtgeschosse ein" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="bedroom">Schlafzimmer <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="bedroom" id="bedroom" placeholder="Geben Sie die Gesamtzahl der Schlafzimmer ein" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="kitchen">Küche <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="kitchen" id="kitchen" placeholder="Gesamtküchen eingeben" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="parking">Parkplatz <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="parking" id="parking" placeholder="Gesamtparkplatz/Slot eingeben" required>
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow p-2 mb-2">
                                <h3 class="m-2 p-2" style="border-bottom:1px solid rgb(240, 240, 240);">Bild & Video</h3>

                                <div class="row pl-3 pr-3">
                                    <div class="mb-3 col-md-6">
                                        <label for="img">Bild <span class="text-danger">*</span></label>
                                        <input type="file" name="img" id="img" class="form-control-file" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="video_link">YouTube Video URL <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="video_link" id="video_link" placeholder="Geben Sie den YouTube Video link ein" required>
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow p-2 mb-2">
                                <h3 class="m-2 p-2" style="border-bottom:1px solid rgb(240, 240, 240);">Ausstattung</h3>

                                <div class="row pl-3 pr-3">
                                    <div class="mb-3 col-md-6">
                                        @foreach ($pAmenities as $amenities=>$x3)
                                            <div>
                                                <input value="{{$x3->name}}" type="checkbox" name="aminities[]">
                                                <label class="mx-1" for="{{$x3->name}}">
                                                    <?php
                                                        echo $lang->translate($x3->name);
                                                    ?>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow p-2 mb-2">
                                <h3 class="m-2 p-2" style="border-bottom:1px solid rgb(240, 240, 240);">Nächster Standort</h3>

                                <div class="row pl-3 pr-3">
                                    <div class="col-8" id="nearest-place-box">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Nächstgelegene Standorte</label>
                                                    <select name="nlocations[]" class="form-control">
                                                        <option value="" hidden selected>Wählen Sie Nächster Standort</option>
                                                        {{-- nearest location loop STARTS --}}
                                                        @foreach ($nlocations as $nlocation=>$nl)
                                                            <option value="{{$nl->name}}">{{$nl->name}}</option>
                                                        @endforeach
                                                        {{--nearest location loop ENDS  --}}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Distanz (km)</label>
                                                    <input type="text" class="form-control" name="distance[]" placeholder="Distanz eingeben">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button id="addNearestPlaceRow" type="button" class="btn btn-success btn-sm nearest-row-btn"><i class="fas fa-plus" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="hidden-location-box" class="d-none pl-3 pr-3">
                                    <div class="delete-dynamic-location">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Nächstgelegene Standorte</label>
                                                    <select name="nlocations[]" id="" class="form-control">
                                                        <option value="" selected hidden>Wählen Sie Nächster Standort</option>
                                                        {{-- nearest location loop STARTS --}}
                                                        @foreach ($nlocations as $nlocation=>$nl)
                                                            <option value="{{$nl->name}}">{{$nl->name}}</option>
                                                        @endforeach
                                                        {{--nearest location loop ENDS  --}}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Distanz (km)</label>
                                                    <input type="text" class="form-control" name="distance[]" placeholder="Distanz eingeben">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-danger btn-sm nearest-row-btn removeNearestPlaceRow"><i class="fas fa-trash" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow p-2 mb-2">
                                <h3 class="m-2 p-2" style="border-bottom:1px solid rgb(240, 240, 240);">Google Maps</h3>

                                <div class="row pl-3 pr-3">
                                    <div class="mb-3 col-md-6">
                                        <div class="form-group">
                                            <label>Google Maps Code</label>
                                            <textarea class="form-control" rows="2" name="google_maps_code" id="google_maps_code" placeholder="Geben Sie den Standortcode ein"></textarea>
                                        </div>

                                        <div class="form-group mt-3">
                                            <label for="description">Beschreibung <span class="text-danger">*</span></label>
                                            <textarea class="form-control" rows="5" name="descriptions" id="descriptions" placeholder="Geben Sie Beschreibungen ein"></textarea required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow p-2 mb-2">
                                <h3 class="m-2 p-2" style="border-bottom:1px solid rgb(240, 240, 240);">Andere Details</h3>

                                <div class="row pl-3 pr-3">
                                    <div class="form-group">
                                        <label for="featured">Hervorgehoben <span class="text-danger">*</span></label>
                                        <select name="featured" id="featured" class="form-control" required>
                                            <option value="No">NEIN</option>
                                            <option value="Yes">Ja</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="top_property">Top-Eigenschaft <span class="text-danger">*</span></label>
                                        <select name="top_property" id="top_property" class="form-control" required>
                                            <option value="Yes">Ja</option>
                                            <option value="No">NEIN</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="urgent_property">Dringendes Eigentum <span class="text-danger">*</span></label>
                                        <select name="urgent_property" id="urgent_property" class="form-control" required>
                                            <option value="No">NEIN</option>
                                            <option value="Yes">Ja</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <input type="submit" name="submit" name="submit" id="submit" value="Hinzufügen" class="btn btn-success mt-2">
                            </div>
                        </form>
                    </div>
                {{-- GR code ends --}}
            @endif
        @endif
    @endforeach

    <script>
        (function($) {
        "use strict";
        $(document).ready(function() {
            // $("#title").on("focusout",function(e){
            //     $("#slug").val(convertToSlug($(this).val()));
            // })

            // $("#purpose").on("change",function(){
            //     var purposeId=$(this).val()
            //     if(purposeId==2){
            //         $("#period_box").removeClass('d-none');
            //     }else if(purposeId==1){
            //         $("#period_box").addClass('d-none');
            //     }
            // })


            //start dynamic nearest place add and remove

            $("#addNearestPlaceRow").on("click",function(){
                var new_row=$("#hidden-location-box").html();
                $("#nearest-place-box").append(new_row)

            })
            $(document).on('click', '.removeNearestPlaceRow', function() {
                $(this).closest('.delete-dynamic-location').remove();
            });
            //end dynamic nearest place add and remove



        });

        })(jQuery);

        // function convertToSlug(Text)
        // {
        //     return Text
        //         .toLowerCase()
        //         .replace(/[^\w ]+/g,'')
        //         .replace(/ +/g,'-');
        // }
    </script>


    </div>
@endsection
