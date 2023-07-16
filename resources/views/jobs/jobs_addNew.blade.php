@include('admin.admincdn')
@extends('layouts.app')
@section('body_content')

<br>

<?php
    use Stichoza\GoogleTranslate\GoogleTranslate;
    $lang = new GoogleTranslate('de');
?>

<div class="container-fluid" style="width:75vw;">
    @foreach($languages as $language)
        @if($language->status==1)
            @if($language->language=='en')
                {{-- EN code starts --}}
                    <h1 class="h3 mb-2 text-gray-800"><a href="{{route('allJobs')}}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> All Jobs</a></h1>

                    @if(Session::has('scc'))
                        <p class="alert alert-success" style="font-weight:bold;">{{Session::get('scc')}}</p>
                    @endif

                    <div class="row">
                        <form action="{{route('newJob')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card shadow p-2 mb-2">
                                <h3 class="m-2 p-2" style="border-bottom:1px solid rgb(240, 240, 240);">Basic Information</h3>

                                <input type="text" name="publisher" id="publisher" value="<?php echo Auth::user()->name; ?>" readonly hidden>

                                <div class="row pl-3 pr-3">
                                    <div class="mb-3 col-md-6">
                                        <label for="title">Job Title <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="title" id="title" placeholder="Enter job title" required>
                                    </div>
                                    
                                    <div class="mb-3 col-md-6">
                                        <label for="company">Company Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="company" id="company" placeholder="Enter company name" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="type">Job Type <span class="text-danger">*</span></label>
                                        <select name="type" id="type" class="form-control" required>
                                            <option value="" selected hidden>Select job type</option>
                                            @foreach ($jTypes as $type=>$x1)
                                                <option value="{{$x1->title}}">{{$x1->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="role">Role</label>
                                        <input class="form-control" type="text" name="role" id="role" placeholder="Enter role">
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
                                        <label for="division">Division <span class="text-danger">*</span></label>
                                        <select name="division" id="division" class="form-control" required>
                                            <option value="" selected hidden>Select division</option>
                                            @foreach($divisions as $d)
                                                <option value="{{$d->name}}">{{$d->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="map">Map <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="map" id="map" placeholder="Enter google map embed link" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="img">Image/Logo <span class="text-danger">*</span></label>
                                        <input type="file" name="imglogo" id="imglogo" class="form-control-file" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="website">Website</label>
                                        <input class="form-control" type="text" name="website" id="website" placeholder="Enter company's website">
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow p-2 mb-2">
                                <h3 class="m-2 p-2" style="border-bottom:1px solid rgb(240, 240, 240);">Work Details and Qualification</h3>

                                <div class="row pl-3 pr-3">
                                    <div class="mb-3 col-md-6">
                                        <label for="exp">Work Experience <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="exp" id="exp" placeholder="Enter required work experience" required>
                                    </div>
                                </div>

                                <div>
                                    <div class="row pl-3 pr-3">
                                        <div class="col-8" id="nearest-place-box">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Edu. Qualification <span class="text-danger">*</span></label>
                                                        <select name="qualification[]" class="form-control" required>
                                                            <option value="" hidden selected>Select required qualifications</option>
                                                            @foreach($qualifications as $q)
                                                                <option value="{{$q->qua}}">{{$q->qua}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Result <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="result[]" placeholder="E.g.: 4.50 out of 5.00" required>
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
                                                        <label for="">Qualification</label>
                                                        <select name="qualification[]" class="form-control">
                                                            <option value="" hidden selected>Select educational qualifications</option>
                                                            @foreach($qualifications as $q)
                                                                <option value="{{$q->qua}}">{{$q->qua}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Result</label>
                                                        <input type="text" class="form-control" name="result[]" placeholder="E.g.: 4.50 out of 5.00">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-danger btn-sm nearest-row-btn removeNearestPlaceRow"><i class="fas fa-trash" aria-hidden="true"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow p-2 mb-2">
                                <h3 class="m-2 p-2" style="border-bottom:1px solid rgb(240, 240, 240);">Other Details</h3>
                                <div class="row pl-3 pr-3">
                                    <div class="mb-3 col-md-6">
                                        <label for="area">Salary <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="salary" id="salary" placeholder="Enter salary" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="unit">Deadline <span class="text-danger">*</span></label>
                                        <input class="form-control" type="date" name="deadline" id="deadline" placeholder="Enter deadline" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control" rows="5" name="descriptions" id="descriptions" placeholder="Enter descriptions" required></textarea>
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
                    <h1 class="h3 mb-2 text-gray-800"><a href="" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> Alle Jobs</a></h1>

                    @if(Session::has('scc'))
                        <p class="alert alert-success" style="font-weight:bold;"><?php echo $lang->translate(Session::get('ssc')) ?></p>
                    @endif

                    <div class="row">
                        <form action="{{route('storeJob')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card shadow p-2 mb-2">
                                <h3 class="m-2 p-2" style="border-bottom:1px solid rgb(240, 240, 240);">Grundinformation</h3>

                                <input type="text" name="employerID" id="employerID" value="<?php echo Auth::user()->id; ?>" readonly hidden>
                                <input type="text" name="employer" id="employer" value="<?php echo Auth::user()->name; ?>" readonly hidden>

                                <div class="mb-3 pl-3 pr-3">
                                    <label for="title">Titel <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="title" id="title" placeholder="Berufsbezeichnung eingeben" required>
                                </div>

                                <div class="row pl-3 pr-3">
                                    <div class="mb-3 col-md-6">
                                        <label for="type">Auftragstyp <span class="text-danger">*</span></label>
                                        <select name="type" id="type" class="form-control" required>
                                            <option value="" selected hidden>Wählen Sie den Jobtyp aus</option>
                                            @foreach ($jTypes as $type=>$x1)
                                                <option value="{{$x1->name}}">
                                                    <?php echo $lang->translate($x1->title) ?>
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="address">Standort <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="location" id="location" placeholder="Ort eingeben" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="phone">Telefon <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="phone" id="phone" placeholder="Geben Sie Ihr Telefon ein" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="email" id="email" placeholder="Geben sie ihre E-Mail Adresse ein" required>
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow p-2 mb-2">
                                <h3 class="m-2 p-2" style="border-bottom:1px solid rgb(240, 240, 240);">Arbeitsdetails und Qualifikation</h3>

                                <div class="row pl-3 pr-3">
                                    <div class="mb-3 col-md-6">
                                        <label for="area">Arbeitserfahrung <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="area" id="area" placeholder="Geben Sie die erforderliche Erfahrung ein" required>
                                    </div>
                                </div>

                                <div>
                                    <div class="row pl-3 pr-3">
                                        <div class="col-8" id="nearest-place-box">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Schulische Qualifikation <span class="text-danger">*</span></label>
                                                        <select name="qualification[]" class="form-control" required>
                                                            <option value="" hidden selected>Qualifikationen auswählen</option>
                                                            <option value="Master's">Master-Studium</option>
                                                            <option value="Bachelor">Bachelor-Abschluss</option>
                                                            <option value="Higher Secondary">Höhere Sekundarstufe</option>
                                                            <option value="Secondary">Sekundarstufe</option>
                                                            <option value="Primary">Grundschule</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Ergebnis <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="result[]" placeholder="Beispiel: 4.50 von 5.00" required>
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
                                                        <label for="">Qualifikation</label>
                                                        <select name="qualification[]" class="form-control">
                                                            <option value="" hidden selected>Qualifikationen auswählen</option>
                                                            <option value="Master's">Master-Studium</option>
                                                            <option value="Bachelor">Bachelor-Abschluss</option>
                                                            <option value="Higher Secondary">Höhere Sekundarstufe</option>
                                                            <option value="Secondary">Sekundarstufe</option>
                                                            <option value="Primary">Grundschule</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Ergebnis <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="result[]" placeholder="Beispiel: 4.50 von 5.00" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-danger btn-sm nearest-row-btn removeNearestPlaceRow"><i class="fas fa-trash" aria-hidden="true"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow p-2 mb-2">
                                <h3 class="m-2 p-2" style="border-bottom:1px solid rgb(240, 240, 240);">Andere Details</h3>
                                <div class="row pl-3 pr-3">
                                    <div class="mb-3 col-md-6">
                                        <label for="area">Gehalt <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="salary" id="salary" placeholder="Gehalt eingeben" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="unit">Termin <span class="text-danger">*</span></label>
                                        <input class="form-control" type="date" name="deadline" id="deadline" placeholder="Geben Sie die Frist ein" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Beschreibung <span class="text-danger">*</span></label>
                                        <textarea class="form-control" rows="5" name="descriptions" id="descriptions" placeholder="Geben Sie Beschreibungen ein" required></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <input type="submit" name="submit" name="submit" id="submit" value="Add" class="btn btn-success mt-2">
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
