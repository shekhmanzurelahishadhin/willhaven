@include('admin.admincdn')
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
                    <h1 class="h3 mb-2 text-gray-800"><a href="{{route('allJobs')}}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> All Jobs</a></h1>

                    @if(Session::has('scc'))
                        <p class="alert alert-success" style="font-weight:bold;">{{Session::get('scc')}}</p>
                    @endif

                    @foreach($job as $j)
                        <div class="row">
                            <form action="{{url('/update-Jobs/'.$j->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card shadow p-2 mb-2">
                                    <h3 class="m-2 p-2" style="border-bottom:1px solid rgb(240, 240, 240);">Basic Information</h3>

                                    <input type="text" name="publisher" id="publisher" value="{{$j->employer}}" readonly hidden>

                                    <div class="row pl-3 pr-3">
                                        <div class="mb-3 col-md-6">
                                            <label for="title">Job Title <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="title" id="title" placeholder="Enter job title" value="{{$j->title}}" required>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label for="company">Company Name <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="company" id="company" placeholder="Enter company name" value="{{$j->company}}" required>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label for="type">Job Type <span class="text-danger">*</span></label>
                                            <select name="type" id="type" class="form-control" required>
                                                <option value="{{$j->type}}" selected hidden>{{$j->type}}</option>
                                                @foreach ($jTypes as $type=>$x1)
                                                    <option value="{{$x1->title}}">{{$x1->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <div class="mb-3 col-md-6">
                                            <label for="role">Role</label>
                                            <input class="form-control" type="text" name="role" id="role" value="{{$j->role}}" placeholder="Enter role">
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label for="phone">Phone <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="phone" id="phone" value="{{$j->phone}}" placeholder="Enter your phone" required>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label for="email">Email <span class="text-danger">*</span></label>
                                            <input class="form-control" type="email" name="email" id="email" value="{{$j->email}}" placeholder="Enter your email" required>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label for="division">Division <span class="text-danger">*</span></label>
                                            <select name="division" id="division" class="form-control" required>
                                                <option value="{{$j->division}}" selected hidden>{{$j->division}}</option>
                                                @foreach($divisions as $d)
                                                    <option value="{{$d->name}}">{{$d->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
    
                                        <div class="mb-3 col-md-6">
                                            <label for="map">Map <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="map" id="map" value="{{$j->map}}" placeholder="Enter google map embed link" required>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label for="website">Website</label>
                                            <input class="form-control" type="text" name="website" id="website" value="{{$j->website}}" placeholder="Enter company's website">
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label for="date">Deadline <span class="text-danger">*</span></label>
                                            <input class="form-control" type="date" name="deadline" id="deadline" value="{{$j->deadline}}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="card shadow p-2 mb-2">
                                    <h3 class="m-2 p-2" style="border-bottom:1px solid rgb(240, 240, 240);">Work Details and Qualification</h3>

                                    <div class="row pl-3 pr-3">
                                        <div class="mb-3 col-md-6">
                                            <label for="exp">Work Experience <span class="text-danger">*</span></label>
                                            <input class="form-control" type="number" name="exp" id="exp" value="{{$j->experience}}" placeholder="Enter required work experience" required>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label for="area">Salary <span class="text-danger">*</span></label>
                                            <input class="form-control" type="number" name="salary" id="salary" value="{{$j->salary}}" placeholder="Enter salary" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Description <span class="text-danger">*</span></label>
                                            <textarea class="form-control" rows="8" name="descriptions" id="descriptions" placeholder="Enter descriptions" required>{{$j->description}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <input type="submit" name="submit" name="submit" id="submit" value="Update" class="btn btn-success mt-2">
                                </div>
                            </form>
                        </div>
                    @endforeach
                {{-- EN code ends --}}


            @elseif($language->language=='gr')
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
