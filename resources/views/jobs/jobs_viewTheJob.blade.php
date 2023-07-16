@include('admin.admincdn')
@extends('layouts.app')
@section('body_content')

<br>

<?php
    use Stichoza\GoogleTranslate\GoogleTranslate;
    $lang = new GoogleTranslate('de');
?>

<div class="container-fluid" style="width:75vw;">
    <h1 class="h3 mb-2 text-gray-800"><a href="{{route('allJobs')}}" class="btn btn-secondary">Return</a></h1>

    @foreach($languages as $language)
        @if($language->status==1)
            @if($language->language=='en')
                {{-- EN code starts --}}
                @foreach ($thejob as $j)
                    <div class="card mt-2 p-2" style="display:flex; flex-direction:row;">
                        <div class="p-2" style="display:flex; align-items:center; justify-content:center;">
                            <img src="uploads/jobs/{{$j->imglogo}}" alt="" height="100px" width="100px">
                        </div>
                        <div class="p-2" style="display:flex; flex-direction:column; align-items:flex-start; justify-content:center;">
                            <h1 class="m-0">{{$j->title}}</h1>
                            <p class="m-0"><i>{{$j->type}}</i></p>
                            <p class="m-0"><b>{{$j->company}}</b></p>
                            <a href="{{$j->website}}" target="_blank">{{$j->website}}</a>
                        </div>
                    </div>

                    @php
                        $qualification = json_decode($j->qualification);
                        $result = json_decode($j->result);
                    @endphp
                    <div class="card mt-2 p-4 mb-0">
                        <p><b>Employer:</b> {{$j->employer}}</p>
                        <p><b>Email: </b>{{$j->email}}</p>
                        <p><b>Contact: </b>{{$j->phone}}</p>
                        <p><b>Location:</b><br>{!! $j->map !!}</p>
                        <p></p>
                        <p><b>Description:</b> {{$j->description}}</p>
                        <p><b>Qualification:</b> 
                            @foreach($qualification as $q)
                                @if($q != null)
                                    {{$q}}
                                    @endif
                            @endforeach    
                        </p>
                        <p><b>Required CGPA/GPA: </b> 
                            @foreach($result as $r)
                                @if($r != null)
                                    {{$r}}
                                @endif
                            @endforeach    
                        </p>
                        <p><b>Work Experience: </b> {{$j->experience}} year(s)</p>
                        <p><b>Salary: </b>BDT {{$j->salary}}/month</p>

                        <?php
                            $date = $j->deadline;
                        ?>

                        <p><b>Application Deadline: </b><?php echo date("d M Y", strtotime($date)); ?></p>
                    </div>

                    <div>
                        <a href="{{url('/delete-job/'.$j->id)}}" onclick = "return confirm('Are you really want to delete?')" class="btn btn-danger float-end m-2" style="width: 120px;">Delete</a>
                        <a href="{{url('/edit-job/'.$j->id)}}" class="btn btn-success float-end m-2" style="width: 120px;">Edit</a>
                    </div>
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