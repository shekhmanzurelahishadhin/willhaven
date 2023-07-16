@include('admin.admincdn')
@extends('layouts.app')
@section('body_content')

<br>

<?php
    use Stichoza\GoogleTranslate\GoogleTranslate;
    $lang = new GoogleTranslate('de');
?>

<div class="container-fluid" style="width:75vw;">
    <div class="container">
        @foreach($languages as $language)
        @if($language->status==1)
        @if($language->language=='en')
        {{-- EN code starts --}}
        <table class="table table-bordered">
        <a href="{{route('addQua')}}" class="btn btn-primary my-3">Create</a>
        @if(Session::has('scc'))
        <p class="alert alert-success" style="font-weight:bold;">{{Session::get('scc')}}</p>
        @endif
        <thead>
        <tr>
        <th scope="col" style="width:
        auto; text-align: center;">ID</th>
        <th scope="col" style="width:
        50vw; text-align: center;">Qualification</th>
        <th scope="col" style="width:
        auto; text-align: center;">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($qua as $q=>$value)
        <tr>
        <th scope="row" style="text-align: center; font-style: italic;">{{$value->id}}</th>
        <td style="font-size:18px;">{{$value->qua}}</td>
        <td style="text-align: center;">
        <a href="{{url('/edit-qua/'.$value->id)}}" class="btn btn-success" style="width: 120px;">Edit</a>
        <a href="{{url('/del-qua/'.$value->id)}}" onclick = "return confirm('Are you really want to delete?')" class="btn btn-danger" style="width: 120px;">Delete</a>
        </td>
        </tr>
        @endforeach
        </tbody>
        </table>
        {{-- EN code ends --}}
        @elseif($language->language=='gr')
        {{-- GR code starts --}}
        {{-- GR code ends --}}
        @endif
        @endif
        @endforeach
    </div>
</div>
@endsection


<style>
    button:hover{
        border: 1px solid skyblue;
    }
</style>