@extends('front-page.master')
@section('content')

    <section class="ad-front-section">
        <div class="container">
            @foreach($languages as $language)
                @if($language->status==1)
                    @if($language->language=='en')
                        <h5 class="text-center mt-4">Welcome {{Auth::user()->name}}! Lets Post and Ad</h5>
                        <p class="text-center">Choose any option bellow</p>

                    @elseif($language->language=='gr')
                        <h5 class="text-center mt-4">Willkommen {{Auth::user()->name}}! Lässt Post und Anzeige</h5>
                        <p class="text-center">Wählen Sie unten eine beliebige Option</p>
                    @endif
                @endif
            @endforeach

            <div class="card p-4 my-5">
                <div class="row my-3">
                    <div class="col-12 col-md-4">
                        <a href="{{route('my.account.frontend')}}" class="active_link">My Account <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                            </svg></a>
                        <hr>
                        <a href="{{route('add.front')}}">Add new Post <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                            </svg></a>
                        <hr>
                        <a href="{{route('post.list.frontend')}}">Post List <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                            </svg></a>
                        <hr>
                    </div>
                    <div class="col-12 col-md-8">


                    </div>
                </div>
            </div>

        </div>

    </section>

@endsection
