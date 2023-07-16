@extends('front-page.master')
@section('content')

 <section class="ad-front-section">
     <div class="container">
         @foreach($languages as $language)
             @if($language->status==1)
                 @if($language->language=='en')
                     <h5 class="text-center">Welcome {{Auth::user()->name}}! Lets Post and Ad</h5>
                     <p class="text-center">Choose any option bellow</p>

                 @elseif($language->language=='gr')
                     <h5 class="text-center">Willkommen {{Auth::user()->name}}! Lässt Post und Anzeige</h5>
                     <p class="text-center">Wählen Sie unten eine beliebige Option</p>
                 @endif
             @endif
         @endforeach


             @foreach($languages as $language)
                 @if($language->status==1)
                     @if($language->language=='en')
                         <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 my-5" style="padding-bottom: 130px">
                             <div class="col">
                                 <div class="card">

                                     <div class="card-body">
                                         <h5 class="card-title">Marketplace</h5>
                                         <hr>
                                         <a href="{{route('add.inHouseProduct.category')}}">Sell an item</a>

                                     </div>
                                 </div>
                             </div>
                             <div class="col">
                                 <div class="card">

                                     <div class="card-body">
                                         <h5 class="card-title">Property</h5>
                                         <hr>
                                         <a href="">Sell or Rent a property</a>

                                     </div>
                                 </div>
                             </div>
                             <div class="col">
                                 <div class="card">

                                     <div class="card-body">
                                         <h5 class="card-title">Car and Motors</h5>
                                         <hr>
                                         <a href="{{route('add.carMotor.category')}}">Sell an item</a>
                                     </div>
                                 </div>
                             </div>
                             <div class="col">
                                 <div class="card">

                                     <div class="card-body">
                                         <h5 class="card-title">Job</h5>
                                         <hr>
                                         <a href="">Post a Job in Germany</a>
                                     </div>
                                 </div>
                             </div>

                         </div>

                     @elseif($language->language=='gr')
                         <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 my-5" style="padding-bottom: 130px">
                             <div class="col">
                                 <div class="card">

                                     <div class="card-body">
                                         <h5 class="card-title">Marktplatz</h5>
                                         <hr>
                                         <a href="{{route('add.inHouseProduct.category')}}">Verkaufe einen Artikel</a>

                                     </div>
                                 </div>
                             </div>
                             <div class="col">
                                 <div class="card">

                                     <div class="card-body">
                                         <h5 class="card-title">Eigentum</h5>
                                         <hr>
                                         <a href="">Verkaufen oder vermieten Sie eine Immobilie</a>

                                     </div>
                                 </div>
                             </div>
                             <div class="col">
                                 <div class="card">

                                     <div class="card-body">
                                         <h5 class="card-title">Auto und Motoren</h5>
                                         <hr>
                                         <a href="{{route('add.carMotor.category')}}">Verkaufe einen Artikel</a>
                                     </div>
                                 </div>
                             </div>
                             <div class="col">
                                 <div class="card">

                                     <div class="card-body">
                                         <h5 class="card-title">Arbeit</h5>
                                         <hr>
                                         <a href="">Veröffentlichen Sie einen Job in Deutschland</a>
                                     </div>
                                 </div>
                             </div>

                         </div>
                     @endif
                 @endif
             @endforeach
     </div>

 </section>

@endsection
