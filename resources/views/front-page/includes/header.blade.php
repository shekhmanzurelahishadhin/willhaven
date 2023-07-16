<div class="nav-section">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{route('front.page')}}"><img src="{{asset($logo->image)}}" height="70px" width="130px" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            @foreach($languages as $language)
                @if($language->status==1)
                    @if($language->language=='en')
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            @if (Route::has('login'))

                                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                    @auth
                                        @if(auth()->user()->is_admin == 0)
                                            <li class="nav-item">
                                                <a href="{{ url('/home') }}" class="text-sm nav-link text-decoration-none ms-3" style="color: grey">Dashboard</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('add.front') }}" class="text-sm nav-link text-decoration-none ms-3" style="color: grey">Post a new Add</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('my.account.frontend') }}" class="text-sm nav-link text-decoration-none ms-3" style="color: grey">My Account</a>
                                            </li>
                                            <li class="nav-item dropdown ms-3">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    {{Auth::user()->name}}
                                                </a>

                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    <li class="ps-3"><a class="dropdown-item" href="#">Profile</a></li>
                                                    <li ><hr class="dropdown-divider"></li>

                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between ps-3" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                                            <span class="font-size-sm font-w500">Log Out</span>
                                                        </a>
                                                    </form>
                                                </ul>
                                            </li>
                                            <li  class="ms-3">
                                                <select class="form-control changeLang">
                                                    {{-- <option selected disabled>Please select</option>--}}
                                                    @foreach($languages as $language)
                                                        <option value="{{$language->language}}" {{$language->status=='1'?'selected':''}}>{{$language->language_name}}</option>
                                                    @endforeach
                                                </select>
                                            </li

                                        @elseif(auth()->user()->is_admin == 1)
                                            <li class="nav-item">
                                                <a href="{{ url('admin/home') }}" class="text-sm nav-link text-decoration-none ms-3" style="color: grey">Dashboard</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('add.front') }}" class="text-sm nav-link text-decoration-none ms-3" style="color: grey">Post a new Add</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('my.account.frontend') }}" class="text-sm nav-link text-decoration-none ms-3" style="color: grey">My Account</a>
                                            </li>

                                            <li class="nav-item dropdown ms-3">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    {{Auth::user()->name}}
                                                </a>

                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    <li class="ps-3"><a class="dropdown-item" href="#">Profile</a></li>
                                                    <li ><hr class="dropdown-divider"></li>

                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between ps-3" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                                            <span class="font-size-sm font-w500">Log Out</span>
                                                        </a>
                                                    </form>
                                                </ul>
                                            </li>
                                            <li class="ms-3">
                                                <select class="form-control changeLang">
                                                    {{-- <option selected disabled>Please select</option>--}}
                                                    @foreach($languages as $language)
                                                        <option value="{{$language->language}}" {{$language->status=='1'?'selected':''}}>{{$language->language_name}}</option>
                                                    @endforeach
                                                </select>
                                            </li>

                                        @elseif(auth()->user()->is_admin == 2)
                                            <li class="nav-item">
                                                <a href="{{ url('seller/home') }}" class="text-sm nav-link text-decoration-none ms-3" style="color: grey">Dashboard</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('add.front') }}" class="text-sm nav-link text-decoration-none ms-3" style="color: grey">Post a new Add</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('my.account.frontend') }}" class="text-sm nav-link text-decoration-none ms-3" style="color: grey">My Account</a>
                                            </li>
                                            <li class="nav-item dropdown ms-3">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    {{Auth::user()->name}}
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    <li class="ps-3"><a class="dropdown-item" href="#">Profile</a></li>
                                                    <li ><hr class="dropdown-divider"></li>

                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between ps-3" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                                            <span class="font-size-sm font-w500">Log Out</span>
                                                        </a>
                                                    </form>
                                                </ul>
                                            </li>
                                            <li  class="ms-3">
                                                <select class="form-control changeLang">
                                                    {{-- <option selected disabled>Please select</option>--}}
                                                    @foreach($languages as $language)
                                                        <option value="{{$language->language}}" {{$language->status=='1'?'selected':''}}>{{$language->language_name}}</option>
                                                    @endforeach
                                                </select>
                                            </li

                                        @endif
                                    @else
                                        <li class="nav-item">
                                            <a href="{{ route('add.front') }}" class="text-sm nav-link text-decoration-none ms-3" style="color: grey">Post a new Add</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="{{ route('login') }}" class="text-sm nav-link text-decoration-none ms-3" style="color: grey">Login</a>
                                        </li>



                                        @if (Route::has('register'))

                                            <li class="nav-item">
                                                <a href="{{ route('register') }}" class="text-sm nav-link text-decoration-none ms-3" style="color: grey">Register</a>
                                            </li>
                                        @endif
                                        <li  class="ms-3">
                                            <select class="form-control changeLang">
                                                {{-- <option selected disabled>Please select</option>--}}
                                                @foreach($languages as $language)
                                                    <option value="{{$language->language}}" {{$language->status=='1'?'selected':''}}>{{$language->language_name}}</option>
                                                @endforeach
                                            </select>
                                        </li
                                    @endif
                                </ul>

                            @endif

                        </div>
                    @elseif($language->language=='gr')
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            @if (Route::has('login'))

                                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                    @auth
                                        @if(auth()->user()->is_admin == 0)
                                            <li class="nav-item">
                                                <a href="{{ url('/home') }}" class="text-sm nav-link text-decoration-none ms-3" style="color: grey">Armaturenbrett</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('add.front') }}" class="text-sm nav-link text-decoration-none ms-3" style="color: grey">Poste ein neues Add</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('my.account.frontend') }}" class="text-sm nav-link text-decoration-none ms-3" style="color: grey">Mein Konto</a>
                                            </li>
                                            <li class="nav-item dropdown ms-3">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    {{Auth::user()->name}}
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    <li class="ps-3"><a class="dropdown-item" href="#">Profil</a></li>
                                                    <li ><hr class="dropdown-divider"></li>

                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between ps-3" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                                            <span class="font-size-sm font-w500">Ausloggen</span>
                                                        </a>
                                                    </form>
                                                </ul>

                                            </li>
                                            <li  class="ms-3">
                                                <select class="form-control changeLang">
                                                    {{-- <option selected disabled>Please select</option>--}}
                                                    @foreach($languages as $language)
                                                        <option value="{{$language->language}}" {{$language->status=='1'?'selected':''}}>{{$language->language_name}}</option>
                                                    @endforeach
                                                </select>
                                            </li

                                        @elseif(auth()->user()->is_admin == 1)
                                            <li class="nav-item">
                                                <a href="{{ url('admin/home') }}" class="text-sm nav-link text-decoration-none ms-3" style="color: grey">Armaturenbrett</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('add.front') }}" class="text-sm nav-link text-decoration-none ms-3" style="color: grey">Poste ein neues Add</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('my.account.frontend') }}" class="text-sm nav-link text-decoration-none ms-3" style="color: grey">Mein Konto</a>
                                            </li>
                                            <li class="nav-item dropdown ms-3">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    {{Auth::user()->name}}
                                                </a>

                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    <li class="ps-3"><a class="dropdown-item" href="#">Profil</a></li>
                                                    <li ><hr class="dropdown-divider"></li>

                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between ps-3" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                                            <span class="font-size-sm font-w500">Ausloggen</span>
                                                        </a>
                                                    </form>
                                                </ul>
                                            </li>
                                            <li  class="ms-3">
                                                <select class="form-control changeLang">
                                                    {{-- <option selected disabled>Please select</option>--}}
                                                    @foreach($languages as $language)
                                                        <option value="{{$language->language}}" {{$language->status=='1'?'selected':''}}>{{$language->language_name}}</option>
                                                    @endforeach
                                                </select>
                                            </li>

                                        @elseif(auth()->user()->is_admin == 2)
                                            <li class="nav-item">
                                                <a href="{{ url('seller/home') }}" class="text-sm nav-link text-decoration-none ms-3" style="color: grey">Armaturenbrett</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('add.front') }}" class="text-sm nav-link text-decoration-none ms-3" style="color: grey">Poste ein neues Add</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('my.account.frontend') }}" class="text-sm nav-link text-decoration-none ms-3" style="color: grey">Mein Konto</a>
                                            </li>
                                            <li class="nav-item dropdown ms-3">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    {{Auth::user()->name}}
                                                </a>

                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    <li class="ps-3"><a class="dropdown-item" href="#">Profil</a></li>
                                                    <li ><hr class="dropdown-divider"></li>

                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between ps-3" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                                            <span class="font-size-sm font-w500">Ausloggen</span>
                                                        </a>
                                                    </form>
                                                </ul>
                                            </li>
                                            <li  class="ms-3">
                                                <select class="form-control changeLang">
                                                    {{-- <option selected disabled>Please select</option>--}}
                                                    @foreach($languages as $language)
                                                        <option value="{{$language->language}}" {{$language->status=='1'?'selected':''}}>{{$language->language_name}}</option>
                                                    @endforeach
                                                </select>
                                            </li

                                        @endif
                                    @else
                                        <li class="nav-item">
                                            <a href="{{ route('add.front') }}" class="text-sm nav-link text-decoration-none ms-3" style="color: grey">Poste ein neues Add</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="{{ route('login') }}" class="text-sm nav-link text-decoration-none ms-3" style="color: grey">Anmeldung</a>
                                        </li>



                                        @if (Route::has('register'))

                                            <li class="nav-item">
                                                <a href="{{ route('register') }}" class="text-sm nav-link text-decoration-none ms-3" style="color: grey">Registrieren</a>
                                            </li>
                                        @endif
                                        <li  class="ms-3">
                                            <select class="form-control changeLang">
                                                {{-- <option selected disabled>Please select</option>--}}
                                                @foreach($languages as $language)
                                                    <option value="{{$language->language}}" {{$language->status=='1'?'selected':''}}>{{$language->language_name}}</option>
                                                @endforeach
                                            </select>
                                        </li
                                    @endif
                                </ul>

                            @endif

                        </div>
                    @endif
                @endif
            @endforeach

        </div>
    </nav>
    <hr>

    @foreach($languages as $language)
        @if($language->status==1)
            @if($language->language=='en')
                @if(isset($state))
                    <div class=" sub-nav py-3">
                        <div class="container">
                            <ul class="nav justify-content-center">
                                <li class="nav-item">
                                    <a class="nav-link {{$state == 'marketplace' ? 'active-nav' : ''}}" aria-current="page" href="{{route('frontend.marketplace')}}">MarketPlace ({{App\Models\InHouseProduct::get()->count()}})</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{$state == 'property' ? 'active-nav' : ''}}}" href="{{route('frontend.property')}}">Property ({{App\Models\Property::get()->count()}})</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{$state == 'carAndMotors' ? 'active-nav' : ''}}" href="{{route('frontend.carMotor')}}">Car and Motors ({{App\Models\CarMotorProduct::get()->count()}})</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{$state == 'job' ? 'active-nav' : ''}}" href="{{route('frontend.job')}}">Job</a>
                                </li>

                            </ul>
                        </div>
                @else
                            <div class=" sub-nav py-3">
                                <div class="container">
                                    <ul class="nav justify-content-center">
                                        <li class="nav-item">
                                            <a class="nav-link {{Request::routeIs('frontend.marketplace') ? 'active-nav' : ''}}" aria-current="page" href="{{route('frontend.marketplace')}}">MarketPlace ({{App\Models\InHouseProduct::get()->count()}})</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{Request::routeIs('frontend.property') ? 'active-nav' : ''}}" href="{{route('frontend.property')}}">Property ({{App\Models\Property::get()->count()}})</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{Request::routeIs('frontend.carMotor') ? 'active-nav' : ''}}" href="{{route('frontend.carMotor')}}">Car and Motors ({{App\Models\CarMotorProduct::get()->count()}})</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{Request::routeIs('frontend.job') ? 'active-nav' : ''}}" href="{{route('frontend.job')}}">Job</a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                @endif

            @elseif($language->language=='gr')
                            @if(isset($state))
                                <div class=" sub-nav py-3">
                                    <div class="container">
                                        <ul class="nav justify-content-center">
                                            <li class="nav-item">
                                                <a class="nav-link {{$state == 'marketplace' ? 'active-nav' : ''}}" aria-current="page" href="{{route('frontend.marketplace')}}">Marktplatz ({{App\Models\InHouseProduct::get()->count()}})</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link {{$state == 'property' ? 'active-nav' : ''}}" href="{{route('frontend.property')}}">Eigentum ({{App\Models\Property::get()->count()}})</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link {{$state == 'carAndMotors' ? 'active-nav' : ''}}" href="{{route('frontend.carMotor')}}">Auto und Motoren ({{App\Models\CarMotorProduct::get()->count()}})</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link {{$state == 'job' ? 'active-nav' : ''}}" href="{{route('frontend.job')}}">Arbeits</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                    @else

                                        <div class=" sub-nav py-3">
                                            <div class="container">
                                                <ul class="nav justify-content-center">
                                                    <li class="nav-item">
                                                        <a class="nav-link {{Request::routeIs('frontend.marketplace') ? 'active-nav' : ''}}" aria-current="page" href="{{route('frontend.marketplace')}}">Marktplatz ({{App\Models\InHouseProduct::get()->count()}})</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link {{Request::routeIs('frontend.property') ? 'active-nav' : ''}}" href="{{route('frontend.property')}}">Eigentum ({{App\Models\Property::get()->count()}})</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link {{Request::routeIs('frontend.carMotor') ? 'active-nav' : ''}}" href="{{route('frontend.carMotor')}}">Auto und Motoren ({{App\Models\CarMotorProduct::get()->count()}})</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link {{Request::routeIs('frontend.job') ? 'active-nav' : ''}}" href="{{route('frontend.job')}}">Arbeits</a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    @endif

            @endif
        @endif
    @endforeach

</div>

