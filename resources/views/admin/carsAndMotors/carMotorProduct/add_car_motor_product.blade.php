@extends('layouts.app')
@section('body_content')

    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto card p-4 mt-5">
                @foreach ($languages as $language)
                    @if ($language->status == 1)
                        @if ($language->language == 'en')
                            <h2 class="text-center my-4">Add Car Motor Product</h2>
                        @elseif($language->language == 'gr')
                            <h2 class="text-center my-4">Automotorprodukt hinzufügen</h2>
                        @endif
                    @endif
                @endforeach
                <form class="row g-3 needs-validation" action="{{ route('save.carMotorProduct') }}" method="POST"
                      enctype="multipart/form-data" novalidate>
                    @csrf
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    @foreach ($languages as $language)
                        @if ($language->status == 1)
                            @if ($language->language == 'en')
                                <div class="col-md-12">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                           placeholder="title">
                                    <div class="invalid-feedback">
                                        You must fill out this field.
                                    </div>
                                </div>

                            @elseif($language->language == 'gr')
                                <div class="col-md-12">
                                    <label for="title" class="form-label">Titel</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                           placeholder="titel">
                                    <div class="invalid-feedback">
                                        Sie müssen dieses Feld ausfüllen.
                                    </div>
                                </div>

                            @endif
                        @endif
                    @endforeach

                    @foreach ($languages as $language)
                        @if ($language->status == 1)
                            @if ($language->language == 'en')
                                <div class="col-md-12">
                                    <label for="category" class="form-label">Category</label>
                                    <select id="category" name="category_id" class="form-select form-control" required>
                                        <option selected disabled value="">Choose Category...</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                        You must fill out this field.
                                    </div>
                                </div>

                            @elseif($language->language == 'gr')
                                <div class="col-md-12">
                                    <label for="category" class="form-label">Kategorien</label>
                                    <select id="category" name="category_id" class="form-select form-control" required>
                                        <option selected disabled value="">Category...</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                        Sie müssen dieses Feld ausfüllen.
                                    </div>
                                </div>

                            @endif
                        @endif
                    @endforeach
                    @foreach ($languages as $language)
                        @if ($language->status == 1)
                            @if ($language->language == 'en')
                                <div class="col-md-12">
                                    <label for="sub_category" class="form-label">Sub Category</label>

                                    <select id="subCategory" name="sub_category_id" class="form-select form-control">


                                    </select>

                                    <div class="invalid-feedback">
                                        You must fill out this field.
                                    </div>
                                </div>
                            @elseif($language->language == 'gr')
                                <div class="col-md-12">
                                    <label for="sub_category" class="form-label">Unterkategorien</label>
                                    <select id="subCategory" name="sub_category_id" class="form-select form-control">


                                    </select>

                                    <div class="invalid-feedback">
                                        Sie müssen dieses Feld ausfüllen.
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endforeach
                    <div class="col-md-12">
                        @foreach ($languages as $language)
                            @if ($language->status == 1)
                                @if ($language->language == 'en')
                                    <label for="" class="form-label d-block mt-3">Condition</label>

                                @elseif($language->language == 'gr')
                                    <label for="" class="form-label d-block mt-3">Zustand</label>

                                @endif
                            @endif
                        @endforeach

                        <div class=" form-check-inline">
                            <input class="form-check-input" type="radio" name="condition" id="condition1" value="used"
                                   required>

                            @foreach ($languages as $language)
                                @if ($language->status == 1)
                                    @if ($language->language == 'en')
                                        <label class="form-check-label" for="condition1">Used</label>
                                    @elseif($language->language == 'gr')
                                        <label class="form-check-label" for="condition1">Gebraucht</label>
                                    @endif
                                @endif
                            @endforeach

                        </div>
                        <div class=" form-check-inline">
                            <input class="form-check-input" type="radio" name="condition" id="condition2" value="new"
                                   required>
                            @foreach ($languages as $language)
                                @if ($language->status == 1)
                                    @if ($language->language == 'en')
                                        <label class="form-check-label" for="condition2">New</label>
                                    @elseif($language->language == 'gr')
                                        <label class="form-check-label" for="condition2">Neu</label>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                        <div class=" form-check-inline">
                            <input class="form-check-input" type="radio" name="condition" id="condition3" value="reconditioned"
                                   required>
                            @foreach ($languages as $language)
                                @if ($language->status == 1)
                                    @if ($language->language == 'en')
                                        <label class="form-check-label" for="condition3">Reconditioned</label>
                                    @elseif($language->language == 'gr')
                                        <label class="form-check-label" for="condition3">Überholt</label>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>



                    @foreach ($languages as $language)
                        @if ($language->status == 1)
                            @if ($language->language == 'en')
                                <div class="col-md-12">
                                    <label for="brand" class="form-label">Brand</label>
                                    <select id="brand" name="brand_id" class="form-select form-control" required>
                                        <option selected disabled value="">Choose Brand...</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                        You must fill out this field.
                                    </div>
                                </div>
                            @elseif($language->language == 'gr')
                                <div class="col-md-12">
                                    <label for="brand" class="form-label">Marke</label>
                                    <select id="brand" name="brand_id" class="form-select form-control" required>
                                        <option selected disabled value="">Choose Brand...</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                        Sie müssen dieses Feld ausfüllen.
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endforeach

                    @foreach ($languages as $language)
                        @if ($language->status == 1)
                            @if ($language->language == 'en')
                                <div class="col-md-12">

                                    <label for="model" class="form-label">Model</label>
                                    <select id="model" name="model_id" class="form-select form-control" required>


                                    </select>


                                    <div class="invalid-feedback">
                                        You must fill out this field.
                                    </div>
                                </div>
                            @elseif($language->language == 'gr')
                                <div class="col-md-12">

                                    <label for="model" class="form-label">Modell</label>
                                    <select id="model" name="model_id" class="form-select form-control" required>

                                    </select>

                                    <div class="invalid-feedback">
                                        Sie müssen dieses Feld ausfüllen.
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endforeach

                    <div class="col-md-12 mb-3">
                        @foreach ($languages as $language)
                            @if ($language->status == 1)
                                @if ($language->language == 'en')
                                    <label for="validationCustom01" class="form-label">Edition (optional)</label>
                                @elseif($language->language == 'gr')
                                    <label for="validationCustom01" class="form-label">Ausgabe (optional)</label>
                                @endif
                            @endif
                        @endforeach

                        <input type="text" class="form-control" id="validationCustom01" name="edition">

                    </div>

                    <div class="col-md-12 mb-3">
                        @foreach ($languages as $language)
                            @if ($language->status == 1)
                                @if ($language->language == 'en')
                                    <label for="validationCustom01" class="form-label">Year of Manufacture</label>
                                @elseif($language->language == 'gr')
                                    <label for="validationCustom01" class="form-label">Herstellungsjahr</label>
                                @endif
                            @endif
                        @endforeach

                        <input type="number" class="form-control" id="validationCustom01" name="manufacture_year">

                    </div>

                    <div class="col-md-12 mb-3">
                        @foreach ($languages as $language)
                            @if ($language->status == 1)
                                @if ($language->language == 'en')
                                    <label for="validationCustom01" class="form-label">Kilometers run (km)</label>
                                @elseif($language->language == 'gr')
                                    <label for="validationCustom01" class="form-label">Gelaufene Kilometer (km)</label>
                                @endif
                            @endif
                        @endforeach

                        <input type="number" class="form-control" id="validationCustom01" name="kilomertes_run">

                    </div>
                    <div class="col-md-12 mb-3">
                        @foreach ($languages as $language)
                            @if ($language->status == 1)
                                @if ($language->language == 'en')
                                    <label for="validationCustom01" class="form-label">Engine capacity (cc)</label>
                                @elseif($language->language == 'gr')
                                    <label for="validationCustom01" class="form-label">Hubraum (cm³)</label>
                                @endif
                            @endif
                        @endforeach

                        <input type="number" class="form-control" id="validationCustom01" name="engine_capacity">

                    </div>

                    <div class="col-12">

                        @foreach ($languages as $language)
                            @if ($language->status == 1)
                                @if ($language->language == 'en')
                                    <label class="form-check-label mb-3" for="invalidCheck">Features (optional)</label>
                                @elseif($language->language == 'gr')
                                    <label class="form-check-label mb-3" for="invalidCheck">Funktionen (optional)</label>
                                @endif
                            @endif
                        @endforeach
                        <div class="form-check">
                            <div class="row mb-4">
                                <div class="col-12 col-md-12" id="feature-section">

                                </div>
                            </div>
                        </div>

                        @foreach ($languages as $language)
                            @if ($language->status == 1)
                                @if ($language->language == 'en')
                                    <div class="">
                                        <label for="" class="form-label d-block mt-3">Transmission</label>
                                        <div class=" form-check-inline">
                                            <input class="form-check-input" type="radio" name="transmission"
                                                   id="Authenticity1" value="manual" required>
                                            <label class="form-check-label" for="Authenticity1">Manual</label>

                                        </div>
                                        <div class=" form-check-inline">
                                            <input class="form-check-input" type="radio" name="transmission"
                                                   id="Authenticity2" value="automatic" required>
                                            <label class="form-check-label" for="Authenticity2">Automatic</label>
                                        </div>
                                        <div class=" form-check-inline">
                                            <input class="form-check-input" type="radio" name="transmission"
                                                   id="Authenticity3" value="other_transmission" required>
                                            <label class="form-check-label" for="Authenticity3">Other transmission</label>
                                        </div>
                                    </div>
                                @elseif($language->language == 'gr')
                                    <div class="">
                                        <label for="" class="form-label d-block mt-3">Übertragung</label>
                                        <div class=" form-check-inline">
                                            <input class="form-check-input" type="radio" name="transmission"
                                                   id="Authenticity1" value="manual" required>
                                            <label class="form-check-label" for="Authenticity1">Handbuch</label>

                                        </div>
                                        <div class=" form-check-inline">
                                            <input class="form-check-input" type="radio" name="transmission"
                                                   id="Authenticity2" value="automatic" required>
                                            <label class="form-check-label" for="Authenticity2">Automatisch</label>
                                        </div>
                                        <div class=" form-check-inline">
                                            <input class="form-check-input" type="radio" name="transmission"
                                                   id="Authenticity3" value="other_transmission" required>
                                            <label class="form-check-label" for="Authenticity3">Andere Übertragung</label>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                        <div class=" mb-3">
                            @foreach ($languages as $language)
                                @if ($language->status == 1)
                                    @if ($language->language == 'en')
                                        <label for="validationCustom01" class="form-label">Registration year (optional)</label>
                                    @elseif($language->language == 'gr')
                                        <label for="validationCustom01" class="form-label">Registrierungsjahr (optional)</label>
                                    @endif
                                @endif
                            @endforeach

                            <input type="number" class="form-control" id="validationCustom01" name="registration_year">

                        </div>
                        <div class="mb-3">

                            @foreach ($languages as $language)
                                @if ($language->status == 1)
                                    @if ($language->language == 'en')
                                        <label for="validationCustom03" class="form-label">Description</label>
                                    @elseif($language->language == 'gr')
                                        <label for="validationCustom03" class="form-label">Beschreibung</label>
                                    @endif
                                @endif
                            @endforeach
                            <textarea type="text" class="form-control" name="description" id="validationCustom03" required></textarea>
                            <div class="invalid-feedback">

                                @foreach ($languages as $language)
                                    @if ($language->status == 1)
                                        @if ($language->language == 'en')
                                            You must fill out this field.
                                        @elseif($language->language == 'gr')
                                            Sie müssen dieses Feld ausfüllen.
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        @foreach ($languages as $language)
                            @if ($language->status == 1)
                                @if ($language->language == 'en')
                                    <div class="mb-3">
                                        <label for="validationCustom03" class="form-label">Price</label>
                                        <input type="number" class="form-control" min="0" name="price"
                                               id="validationCustom03" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid price.
                                        </div>
                                    </div>
                                @elseif($language->language == 'gr')
                                    <div class="mb-3">
                                        <label for="validationCustom03" class="form-label">Preis</label>
                                        <input type="number" class="form-control" min="0" name="price"
                                               id="validationCustom03" required>
                                        <div class="invalid-feedback">

                                            Bitte geben Sie einen gültigen Preis an.
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endforeach

                        @foreach ($languages as $language)
                            @if ($language->status == 1)
                                @if ($language->language == 'en')
                                    <div class="">
                                        <label for="district" class="form-label">District</label>
                                        <select id="district" name="district_id" class="form-select form-control" required>
                                            <option selected disabled value="">Choose District...</option>
                                            @foreach ($districts as $district)
                                                <option value="{{ $district->id }}">{{ $district->district_name }}</option>
                                            @endforeach
                                        </select>

                                        <div class="invalid-feedback">
                                            You must fill out this field.
                                        </div>
                                    </div>
                                @elseif($language->language == 'gr')
                                    <div class="">
                                        <label for="district" class="form-label">Bezirk</label>
                                        <select id="district" name="district_id" class="form-select form-control" required>
                                            <option selected disabled value="">Bezirk wählen...</option>
                                            @foreach ($districts as $district)
                                                <option value="{{ $district->id }}">{{ $district->district_name }}</option>
                                            @endforeach
                                        </select>

                                        <div class="invalid-feedback">
                                            Sie müssen dieses Feld ausfüllen.
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endforeach


                        @foreach ($languages as $language)
                            @if ($language->status == 1)
                                @if ($language->language == 'en')
                                    <div class="">
                                        <label for="sub_district" class="form-label">Sub District</label>
                                        <select id="sub_district" name="sub_district_id" class="form-select form-control" >


                                        </select>

                                        <div class="invalid-feedback">
                                            You must fill out this field.
                                        </div>
                                    </div>
                                @elseif($language->language == 'gr')
                                    <div class="">
                                        <label for="sub_district" class="form-label">Unterbezirk</label>
                                        <select id="sub_district" name="sub_district_id" class="form-select form-control" >


                                        </select>

                                        <div class="invalid-feedback">
                                            Sie müssen dieses Feld ausfüllen.
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                        @foreach ($languages as $language)
                            @if ($language->status == 1)
                                @if ($language->language == 'en')
                                    <div class=" mt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="yes" name="negotiable"
                                                   id="negotiable">
                                            <label class="form-check-label" for="negotiable">
                                                Negotiable
                                            </label>
                                        </div>
                                    </div>
                                @elseif($language->language == 'gr')
                                    <div class=" mt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="yes" name="negotiable"
                                                   id="negotiable">
                                            <label class="form-check-label" for="negotiable">

                                                Verhandelbar
                                            </label>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                        <div class=" mt-3">
                            @foreach ($languages as $language)
                                @if ($language->status == 1)
                                    @if ($language->language == 'en')
                                        <label for="validationCustomVideo" class="form-label">Video Url</label>
                                    @elseif($language->language == 'gr')
                                        <label for="validationCustomVideo" class="form-label">Video-URL</label>
                                    @endif
                                @endif
                            @endforeach
                            <textarea type="text" class="form-control" name="video_url" id="validationCustomVideo"></textarea>

                        </div>
                        <div class=" mt-3">
                            @foreach ($languages as $language)
                                @if ($language->status == 1)
                                    @if ($language->language == 'en')
                                        <div class=" mb-3">
                                            <label for="validationCustomCharge" class="form-label">Delivery Charge</label>
                                        </div>
                                    @elseif($language->language == 'gr')
                                        <div class=" mb-3">
                                            <label for="validationCustomCharge" class="form-label">Zustellgebühr</label>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                            <input type="number" class="form-control" min="0" name="delivery_charge" id="validationCustomCharge" >

                        </div>

                        <div class=" my-2">
                            @foreach ($languages as $language)
                                @if ($language->status == 1)
                                    @if ($language->language == 'en')
                                        <label for="inputCategory" class="form-label d-block">Add upto 5 image</label>
                                    @elseif($language->language == 'gr')
                                        <label for="inputCategory" class="form-label d-block">Fügen Sie bis zu 5 Bilder
                                            hinzu</label>
                                    @endif
                                @endif
                            @endforeach

                            <input class="my-2" id="image" name="images[]" type="file" multiple="multiple" />

                        </div>
                        <div class=" my-2">
                            @foreach ($languages as $language)
                                @if ($language->status == 1)
                                    @if ($language->language == 'en')
                                        <label for="inputCategory" class="form-label d-block">Contact Details</label>
                                        <small>Name</small>
                                        <h6>{{ Auth::user()->name }}</h6>
                                        <small>Email</small>
                                        <h6>{{ Auth::user()->email }}</h6>
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                               placeholder="phone">
                                        <div class="invalid-feedback">
                                            You must fill out this field.
                                        </div>
                                    @elseif($language->language == 'gr')
                                        <label for="inputCategory" class="form-label d-block">Kontaktdetails</label>
                                        <small>Name</small>
                                        <h6>{{ Auth::user()->name }}</h6>
                                        <small>Email</small>
                                        <h6>{{ Auth::user()->email }}</h6>
                                        <label for="phone" class="form-label">Telefon</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                               placeholder="telefon">
                                        <div class="invalid-feedback">
                                            Sie müssen dieses Feld ausfüllen.
                                        </div>
                                    @endif
                                @endif
                            @endforeach




                        </div>
                        @foreach ($languages as $language)
                            @if ($language->status == 1)
                                @if ($language->language == 'en')
                                    <div class="">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="yes"
                                                   name="term_condition" id="term_condition" required>
                                            <label class="form-check-label" for="term_condition">
                                                I have read and accept the <a href="">Terms and Conditions</a>
                                            </label>
                                            <div class="invalid-feedback">
                                                You must agree before submitting.
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" mt-4">
                                        <button class="btn btn-primary" type="submit">Submit Post</button>
                                    </div>
                                @elseif($language->language == 'gr')
                                    <div class="">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="yes"
                                                   name="term_condition" id="term_condition" required>
                                            <label class="form-check-label" for="term_condition">

                                                Ich habe die gelesen und akzeptiere sie <a
                                                    href="">Geschäftsbedingungen</a>
                                            </label>
                                            <div class="invalid-feedback">

                                                Sie müssen vor dem Absenden zustimmen.
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" mt-4">
                                        <button class="btn btn-primary" type="submit">Beitrag einreichen</button>
                                    </div>
                    @endif
                    @endif
                    @endforeach

                </form>
            </div>
        </div>
    </div>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()

        $(document).ready(function() {
            $('#brand').change(function() {

                var url = '/get-car-motor-model/' + $(this).val();
                axios.get(url).then((res) => {
                    var categoryOptions =
                        "<option selected disabled value=\"\">Choose Model..</option>";
                    $.each(res.data, function(index, value) {
                        // $('#subCategory').html('<option  value="'+value.id+'">'+value.sub_category_name+'</option>');
                        categoryOptions += '<option  value="' + value.id + '">' + value
                            .model_name + '</option>';
                        console.log(value)
                    });
                    document.getElementById("model").innerHTML = categoryOptions;
                });
            })

            $('#category').change(function () {

                var url = '/get-car-motor-sub-category/'+$(this).val();
                axios.get(url).then((res)=>{

                    var categoryOptions = "<option selected>Choose Sub Sub Category...</option>";
                    $.each(res.data, function (index, value) {
                        // $('#subCategory').html('<option  value="'+value.id+'">'+value.sub_category_name+'</option>');
                        categoryOptions += '<option  value="'+value.id+'">'+value.sub_category_name+'</option>';
                        // console.log(value)
                    });
                    document.getElementById("subCategory").innerHTML = categoryOptions;
                });
            })
            $('#category').change(function () {

                var url = '/get-car-motor-features/'+$(this).val();
                axios.get(url).then((res)=>{

                    var featuresOptions = "";
                    console.log(url)

                    $.each(res.data, function (index, value) {
                        property = JSON.parse(value.features_property)
                        console.log(property)
                        // featuresOptions += '<option  value="'+value.id+'">'+value.sub_category_name+'</option>';
                        {{--featuresOptions += '<lable>'+value.features_name+'</lable></br>@foreach($property as $data)<input class="form-check-input" type="checkbox" value="'+value.id+'"name="features[]" id="'+value.id+'"> <label class="form-check-label" for="'+value.id+'">'+value.features_name+'</label><br>@endforeach';--}}
                        console.log(value)
                    });
                    document.getElementById("feature-section").innerHTML = featuresOptions;
                });
            })


            $('#district').change(function () {

                var url = '/get-sub-district/'+$(this).val();
                axios.get(url).then((res)=>{

                    var subDistrictOptions = "<option selected>Choose Sub Sub Category...</option>";
                    $.each(res.data, function (index, value) {
                        // $('#subCategory').html('<option  value="'+value.id+'">'+value.sub_category_name+'</option>');
                        subDistrictOptions += '<option  value="'+value.id+'">'+value.sub_district_name+'</option>';
                        console.log(value)
                    });
                    document.getElementById("sub_district").innerHTML = subDistrictOptions;
                });
            })
        })
    </script>
@endsection
