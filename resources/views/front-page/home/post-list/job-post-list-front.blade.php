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
                <h6 class="text-center my-4">market place post list</h6>
                <table class="table">
                    <thead>

                    @foreach ($languages as $language)
                        @if ($language->status == 1)
                            @if ($language->language == 'en')
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Categories</th>
                                    <th scope="col">Sub Categories</th>
                                    <th scope="col">Sub Sub Categories</th>
                                    <th scope="col">Brand</th>
                                    <th scope="col">Price</th>
                                    {{--                                    <th scope="col">Action</th>--}}
                                </tr>
                            @elseif($language->language == 'gr')
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Bild</th>
                                    <th scope="col">Titel</th>
                                    <th scope="col">Kategorien</th>
                                    <th scope="col">Unterkategorien</th>
                                    <th scope="col">Unter-Unter-Kategorien</th>
                                    <th scope="col">Marke</th>
                                    <th scope="col">Preis</th>
                                    {{--                                    <th scope="col">Aktion</th>--}}
                                </tr>
                            @endif
                        @endif
                    @endforeach
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>

    </section>

@endsection
