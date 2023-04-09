@extends('layouts.app')
@section('body_content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">

                        {{$sidebarCheck}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
