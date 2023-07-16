@extends('front-page.master')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto card p-4 mt-5">
                @foreach ($languages as $language)
                    @if ($language->status == 1)
                        @if ($language->language == 'en')
                            <h2 class="text-center my-4">Add Product</h2>
                        @elseif($language->language == 'gr')
                            <h2 class="text-center my-4">Produkt hinzufügen</h2>
                        @endif
                    @endif
                @endforeach
                <p class="text-center text-danger">{{session('message')}}</p>
                <form class="row g-3 needs-validation" action="{{ route('save.inHouseProduct') }}" method="POST"
                      enctype="multipart/form-data" novalidate>
                    @csrf
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <div class=" mb-3">

                        @foreach ($languages as $language)
                            @if ($language->status == 1)
                                @if ($language->language == 'en')
                                    {{-- <div class="col-md-12"> --}}
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                           placeholder="title">
                                    <div class="invalid-feedback">
                                        You must fill out this field.
                                    </div>
                                    {{-- </div> --}}
                                @elseif($language->language == 'gr')
                                    {{-- <div class="col-md-12"> --}}
                                    <label for="title" class="form-label">Titel</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                           placeholder="titel">
                                    <div class="invalid-feedback">
                                        Sie müssen dieses Feld ausfüllen.
                                    </div>
                                    {{-- </div> --}}
                                @endif
                            @endif
                        @endforeach
                            <input type="hidden" name="category_id" value="{{$category_id}}">
                            <input type="hidden" name="sub_category_id" value="{{$sub_category_id}}">
                            <input type="hidden" name="sub_sub_category_id" value="{{$sub_sub_category_id}}">

{{--                        @foreach ($languages as $language)--}}
{{--                            @if ($language->status == 1)--}}
{{--                                @if ($language->language == 'en')--}}
{{--                                    <label for="" class="form-label d-block">Condition</label>--}}
{{--                                @elseif($language->language == 'gr')--}}
{{--                                    <label for="" class="form-label d-block">Zustand</label>--}}
{{--                                @endif--}}
{{--                            @endif--}}
{{--                        @endforeach--}}
{{--                        <div class=" form-check-inline">--}}
{{--                            <input class="form-check-input ms-1" type="radio" name="condition" id="condition1" value="used"--}}
{{--                                   required>--}}

{{--                            @foreach ($languages as $language)--}}
{{--                                @if ($language->status == 1)--}}
{{--                                    @if ($language->language == 'en')--}}
{{--                                        <label class="form-check-label ms-2" for="condition1">Used</label>--}}
{{--                                    @elseif($language->language == 'gr')--}}
{{--                                        <label class="form-check-label ms-2" for="condition1">Gebraucht</label>--}}
{{--                                    @endif--}}
{{--                                @endif--}}
{{--                            @endforeach--}}

{{--                        </div>--}}
{{--                        <div class=" form-check-inline">--}}
{{--                            <input class="form-check-input ms-3" type="radio" name="condition" id="condition2" value="new"--}}
{{--                                   required>--}}
{{--                            @foreach ($languages as $language)--}}
{{--                                @if ($language->status == 1)--}}
{{--                                    @if ($language->language == 'en')--}}
{{--                                        <label class="form-check-label ms-2" for="condition2">New</label>--}}
{{--                                    @elseif($language->language == 'gr')--}}
{{--                                        <label class="form-check-label ms-2" for="condition2">Neu</label>--}}
{{--                                    @endif--}}
{{--                                @endif--}}
{{--                            @endforeach--}}
{{--                        </div>--}}


                    </div>
{{--                    @foreach ($languages as $language)--}}
{{--                        @if ($language->status == 1)--}}
{{--                            @if ($language->language == 'en')--}}
{{--                                <div class="col-md-12 form-check">--}}
{{--                                    <label for="" class="form-label d-block">Authenticity</label>--}}
{{--                                    <div class=" form-check-inline">--}}
{{--                                        <input class="form-check-input ms-1" type="radio" name="authenticity"--}}
{{--                                               id="Authenticity1" value="original" required>--}}
{{--                                        <label class="form-check-label ms-2" for="Authenticity1">Original</label>--}}

{{--                                    </div>--}}
{{--                                    <div class=" form-check-inline">--}}
{{--                                        <input class="form-check-input ms-3" type="radio" name="authenticity"--}}
{{--                                               id="Authenticity2" value="refurbished" required>--}}
{{--                                        <label class="form-check-label ms-2" for="Authenticity2">Refurbished</label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @elseif($language->language == 'gr')--}}
{{--                                <div class="col-md-12 form-check">--}}
{{--                                    <label for="" class="form-label d-block">Authentizität</label>--}}
{{--                                    <div class=" form-check-inline">--}}
{{--                                        <input class="form-check-input ms-1" type="radio" name="authenticity"--}}
{{--                                               id="Authenticity1" value="original" required>--}}
{{--                                        <label class="form-check-label ms-2" for="Authenticity1">Original</label>--}}

{{--                                    </div>--}}
{{--                                    <div class=" form-check-inline">--}}
{{--                                        <input class="form-check-input ms-3" type="radio" name="authenticity"--}}
{{--                                               id="Authenticity2" value="refurbished" required>--}}
{{--                                        <label class="form-check-label ms-2" for="Authenticity2">Renoviert</label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                        @endif--}}
{{--                    @endforeach--}}

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
                                <div class="col-12 col-md-12">
                                    @foreach ($features as $feature)
{{--                                        <input class="form-check-input" type="checkbox" value="{{ $feature->features_name }}"--}}
{{--                                               name="features[]" id="{{ $feature->features_name }}">--}}
                                        <label class="form-check-label my-3" for="invalidCheck">{{$feature->features_name}}</label>
                                        <br>
                                        @foreach(json_decode($feature->features_property) as $property)
                                            @if($property != null)
                                                <input class="form-check-input" type="checkbox" value="{{ $property }}" name="features_property[]" id="{{ $property }}">
                                                <label class="form-check-label" for="{{ $property }}">
                                                    {{ $property }}
                                                </label>
                                                <br>
                                            @endif
                                        @endforeach
                                    @endforeach
{{--                                    <select id="feature" name="feature_id" class="form-select form-control" required>--}}
{{--                                        <option selected disabled value="">Choose feature...</option>--}}
{{--                                        @foreach ($features as $feature)--}}
{{--                                            <option value="{{ $feature->features_name }}">{{ $feature->features_name }}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}

                                </div>
                            </div>
                        </div>


{{--                            @foreach ($languages as $language)--}}
{{--                                @if ($language->status == 1)--}}
{{--                                    @if ($language->language == 'en')--}}
{{--                                        <label class="form-check-label mb-3" for="invalidCheck">Features Property</label>--}}
{{--                                    @elseif($language->language == 'gr')--}}
{{--                                        <label class="form-check-label mb-3" for="invalidCheck">Eigenschaften-Eigenschaft</label>--}}
{{--                                    @endif--}}
{{--                                @endif--}}
{{--                            @endforeach--}}
                            <div class="form-check">
                                <div class="row mb-4">
                                    <div class="col-12 col-md-12">
                                        <div id="feature_property">

                                        </div>

                                    </div>
                                </div>
                            </div>

                        <div class="col-md-12 mb-3">

                            @foreach ($languages as $language)
                                @if ($language->status == 1)
                                    @if ($language->language == 'en')
                                        <label for="validationCustom03" class="form-label">Description</label>
                                    @elseif($language->language == 'gr')
                                        <label for="validationCustom03" class="form-label">Beschreibung</label>
                                    @endif
                                @endif
                            @endforeach
                                <textarea id="tinymce" class="editor form-control" col="10" row="3" name="description"></textarea>
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
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom03" class="form-label">Price</label>
                                        <input type="number" class="form-control" min="0" name="price"
                                               id="validationCustom03" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid price.
                                        </div>
                                    </div>
                                @elseif($language->language == 'gr')
                                    <div class="col-md-12 mb-3">
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

                            <input type="hidden" name="district_id" value="{{$district_id}}">
                            <input type="hidden" name="sub_district_id" value="{{$sub_district_id}}">

                        @foreach ($languages as $language)
                            @if ($language->status == 1)
                                @if ($language->language == 'en')
                                    <div class="col-12 mt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="yes" name="negotiable"
                                                   id="negotiable">
                                            <label class="form-check-label" for="negotiable">
                                                Negotiable
                                            </label>
                                        </div>
                                    </div>
                                @elseif($language->language == 'gr')
                                    <div class="col-12 mt-3">
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
                            <div class="col-12 mt-3">
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
                            <div class="col-12 mt-3">
                                @foreach ($languages as $language)
                                    @if ($language->status == 1)
                                        @if ($language->language == 'en')
                                            <div class="col-md-12 mb-3">
                                                <label for="validationCustomCharge" class="form-label">Delivery Option</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="delivery_option" value="pickup">
                                                <label class="form-check-label" for="inlineCheckbox1">Pickup</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="delivery_option" value="home_delivery">
                                                <label class="form-check-label" for="inlineCheckbox2">Home Delivery</label>
                                            </div>
                                        @elseif($language->language == 'gr')
                                            <div class="col-md-12 mb-3">
                                                <label for="validationCustomCharge" class="form-label">Liefermöglichkeit</label>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach


                            </div>
                            <div class="col-12 mt-3">
                                @foreach ($languages as $language)
                                    @if ($language->status == 1)
                                        @if ($language->language == 'en')
                                            <div class="col-md-12 mb-3">
                                                <label for="validationCustomCharge" class="form-label">Delivery Charge</label>
                                            </div>
                                        @elseif($language->language == 'gr')
                                            <div class="col-md-12 mb-3">
                                                <label for="validationCustomCharge" class="form-label">Zustellgebühr</label>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                                <input type="number" class="form-control" min="0" name="delivery_charge" value="" id="validationCustomCharge" >

                            </div>


                        <div class="col-md-12 my-2">
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
                        <div class="col-md-12 my-2">
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
                                               placeholder="phone" required>
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
                                               placeholder="telefon" required>
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
                                    <div class="col-12">
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
                                    <div class="col-12 mt-4">
                                        <button class="btn btn-primary" type="submit">Submit Post</button>
                                    </div>
                                @elseif($language->language == 'gr')
                                    <div class="col-12">
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
                                    <div class="col-12 mt-4">
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

                var url = '/get-model/' + $(this).val();
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

                var url = '/get-sub-category/'+$(this).val();
                axios.get(url).then((res)=>{

                    var categoryOptions = "<option selected>Choose Sub Sub Category...</option>";
                    $.each(res.data, function (index, value) {
                        // $('#subCategory').html('<option  value="'+value.id+'">'+value.sub_category_name+'</option>');
                        categoryOptions += '<option  value="'+value.id+'">'+value.sub_category_name+'</option>';
                        console.log(value)
                    });
                    document.getElementById("subCategory").innerHTML = categoryOptions;
                });
            })
            $('#subCategory').change(function () {

                var url = '/get-sub-sub-category/'+$(this).val();
                axios.get(url).then((res)=>{

                    var categoryOptions = "<option selected>Choose Sub Sub Category...</option>";
                    $.each(res.data, function (index, value) {
                        // $('#subCategory').html('<option  value="'+value.id+'">'+value.sub_category_name+'</option>');
                        categoryOptions += '<option  value="'+value.id+'">'+value.sub_sub_category_name+'</option>';
                        console.log(value)
                    });
                    document.getElementById("sub_sub_category_id").innerHTML = categoryOptions;
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

                //
                // $('#feature').change(function() {
                //
                //     var url = '/get-features-property/' + $(this).val();
                //     axios.get(url).then((res) => {
                //         var categoryOptions = "";
                //         console.log(res.data)
                //         var feature_property_data = JSON.parse(res.data.features_property)
                //         $.each(feature_property_data, function(index, value) {
                //             // $('#subCategory').html('<option  value="'+value.id+'">'+value.sub_category_name+'</option>');
                //             if (value != null){
                //             categoryOptions += '<input class="form-check-input" type="checkbox" value="'+value+'" name="features_property[]" id="'+value+'"> <label class="form-check-label" for="'+value+'">'+value+'</label><br>';
                //             }
                //             console.log(value)
                //         });
                //         console.log(categoryOptions);
                //         document.getElementById("feature_property").innerHTML = categoryOptions;
                //     });
                // })
        })
    </script>

@endsection
