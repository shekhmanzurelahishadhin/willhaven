@include('admin.admincdn')
@extends('layouts.app')
@section('body_content')

<br>

<?php
    use Stichoza\GoogleTranslate\GoogleTranslate;
    $lang = new GoogleTranslate('de');
?>

<div class="container-fluid" style="width:75vw;">
    <h1 class="h3 mb-2 text-gray-800"><a href="{{route('addjobs')}}" class="btn btn-secondary">Add New</a></h1>

    @foreach($languages as $language)
        @if($language->status==1)
            @if($language->language=='en')
                {{-- EN code starts --}}
                @foreach ($jobs as $job)
                <form action="{{route('viewJob')}}" method="GET">
                    <input type="text" name="jobID" id="jobID" value="{{$job->id}}" required readonly hidden>
                    <button class="card mb-3 p-3" type="submit" style="display:flex; flex-direction:row; width:100%; align-items:center; justify-content:center;">
                        <div class="col" style="text-align:left;">
                            <h2 class="m-0">{{$job->title}}</h2>
                            <h3 class="m-0"><i>{{$job->company}}</i></h3>
                            <p class="m-0">{{$job->type}}</p>
                            <p class="m-0">{{$job->location}}</p>
                            <h4 class="m-0"><b>{{$job->salary}}</b></h4>
                        </div>
                        <div>
                            <img src="uploads/jobs/{{$job->imglogo}}" alt="" height="150px" width="150px">
                        </div>
                    </button>
                </form>
                @endforeach
                {{-- EN code ends --}}

            @elseif($language->language=='gr')
                {{-- GR code starts --}}
                {{-- GR code ends --}}
            @endif
        @endif
    @endforeach
</div>
@endsection


<style>
    button:hover{
        border: 1px solid skyblue;
    }
</style>