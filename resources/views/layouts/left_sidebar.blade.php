<nav id="sidebar" aria-label="Main Navigation">
    <div class="content-header bg-white-5">
        {{-- <a class="font-w600 text-dual" href="{{route('dashboard')}}">--}}
        {{-- <span class="smini-visible">--}}
        {{-- <i class="fa fa-circle-notch text-primary"></i>--}}
        {{-- </span>--}}
        {{-- @php--}}
        {{-- $frontend=App\Models\BusinessSetting::all()->first();--}}
        {{-- @endphp--}}
        {{-- <span class="smini-hide font-size-h5 tracking-wider">{{$frontend->company_name}}<span class="font-w400"></span>--}}
        {{-- </span>--}}
        {{-- </a>--}}

        <div>
            <a class="d-lg-none btn btn-sm btn-dual ml-1" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                <i class="fa fa-fw fa-times"></i>
            </a>
        </div>
    </div>
    <div class="js-sidebar-scroll">
        <div class="content-side">
            @if(isset($sidebarCheck))
            @if($sidebarCheck == "marketplace")
            <ul class="nav-main">


                @if(Auth::user()->is_admin == 1)

                <h5 class="text-light text-center">market place Category</h5>

                @foreach($languages as $language)
                @if($language->status==1)
                @if($language->language=='en')
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                        <span class="nav-main-link-name">Category</span>
                    </a>
                    <ul class="nav-main-submenu">

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('add.category')}}">
                                <span class="nav-main-link-name">Add Category</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('manage.category')}}">
                                <span class="nav-main-link-name">Category List</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                        <span class="nav-main-link-name">Sub Category</span>
                    </a>
                    <ul class="nav-main-submenu">

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('add.sub.category')}}">
                                <span class="nav-main-link-name">Add sub category</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('manage.sub.category')}}">
                                <span class="nav-main-link-name">Sub category List</span>
                            </a>
                        </li>
                    </ul>

                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                        <span class="nav-main-link-name">Sub Sub Category</span>
                    </a>
                    <ul class="nav-main-submenu">

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('add.sub.sub.category')}}">
                                <span class="nav-main-link-name">Add sub Sub category</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('manage.sub.sub.category')}}">
                                <span class="nav-main-link-name">Sub Sub category List</span>
                            </a>
                        </li>
                    </ul>

                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                        <span class="nav-main-link-name">Brand</span>
                    </a>
                    <ul class="nav-main-submenu">

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('add.brand')}}">
                                <span class="nav-main-link-name">Add Brand</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('manage.brand')}}">
                                <span class="nav-main-link-name">Brand List</span>
                            </a>
                        </li>
                    </ul>

                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                        <span class="nav-main-link-name">Model</span>
                    </a>
                    <ul class="nav-main-submenu">

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('add.model')}}">
                                <span class="nav-main-link-name">Add Model</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('manage.model')}}">
                                <span class="nav-main-link-name">Model List</span>
                            </a>
                        </li>
                    </ul>

                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                        <span class="nav-main-link-name">Features</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('main.features')}}">
                                <span class="nav-main-link-name">Add Feature</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('manage.main.features')}}">
                                <span class="nav-main-link-name">Manage Feature</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('features')}}">
                                <span class="nav-main-link-name">Add Feature Property</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('manage.features')}}">
                                <span class="nav-main-link-name">Manage Feature Property</span>
                            </a>
                        </li>
                    </ul>

                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                        <span class="nav-main-link-name">Product</span>
                    </a>
                    <ul class="nav-main-submenu">

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('add.inHouseProduct')}}">
                                <span class="nav-main-link-name">In-House Product</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('manage.inhouse')}}">
                                <span class="nav-main-link-name">Manage In-House Product</span>
                            </a>
                        </li>
                    </ul>

                </li>

                @elseif($language->language=='gr')
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                        <span class="nav-main-link-name">Kategorie</span>
                    </a>
                    <ul class="nav-main-submenu">

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('add.category')}}">
                                <span class="nav-main-link-name">Kategorie hinzufügen</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('manage.category')}}">
                                <span class="nav-main-link-name">Kategorieliste</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                        <span class="nav-main-link-name">Unterkategorie</span>
                    </a>
                    <ul class="nav-main-submenu">

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('add.sub.category')}}">
                                <span class="nav-main-link-name">Unterkategorie hinzufügen</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('manage.sub.category')}}">
                                <span class="nav-main-link-name">Unterkategorieliste</span>
                            </a>
                        </li>
                    </ul>

                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                        <span class="nav-main-link-name">Unter-Unter-Kategorie</span>
                    </a>
                    <ul class="nav-main-submenu">

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('add.sub.sub.category')}}">
                                <span class="nav-main-link-name">Unterkategorie hinzufügen</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('manage.sub.sub.category')}}">
                                <span class="nav-main-link-name">Sub Unterkategorieliste</span>
                            </a>
                        </li>
                    </ul>

                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                        <span class="nav-main-link-name">Marke</span>
                    </a>
                    <ul class="nav-main-submenu">

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('add.brand')}}">
                                <span class="nav-main-link-name">Marke hinzufügen</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('manage.brand')}}">
                                <span class="nav-main-link-name">Markenliste</span>
                            </a>
                        </li>
                    </ul>

                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                        <span class="nav-main-link-name">Modell</span>
                    </a>
                    <ul class="nav-main-submenu">

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('add.model')}}">
                                <span class="nav-main-link-name">Modell hinzufügen</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('manage.model')}}">
                                <span class="nav-main-link-name">Modellliste</span>
                            </a>
                        </li>
                    </ul>

                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                        <span class="nav-main-link-name">Merkmale</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('main.features')}}">
                                <span class="nav-main-link-name">Funktion hinzufügen</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('manage.main.features')}}">
                                <span class="nav-main-link-name">Funktion verwalten</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('features')}}">
                                <span class="nav-main-link-name">Feature-Eigenschaft hinzufügen</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('manage.features')}}">
                                <span class="nav-main-link-name">Feature-Eigenschaft verwalten</span>
                            </a>
                        </li>
                    </ul>

                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                        <span class="nav-main-link-name">Produkt</span>
                    </a>
                    <ul class="nav-main-submenu">

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('add.inHouseProduct')}}">
                                <span class="nav-main-link-name">Eigenes Produkt</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('manage.inhouse')}}">
                                <span class="nav-main-link-name">Eigenes Produkt verwalten</span>
                            </a>
                        </li>
                    </ul>

                </li>

                @endif
                @endif
                @endforeach


                @else
                <h5 class="text-light text-center">market place seller</h5>
                    <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fab fa-atlassian"></i>
                            <span class="nav-main-link-name">Product</span>
                        </a>
                        <ul class="nav-main-submenu">

                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{route('add.inHouseProduct')}}">
                                    <span class="nav-main-link-name">Add Product</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{route('manage.inhouse')}}">
                                    <span class="nav-main-link-name">Manage In-House Product</span>
                                </a>
                            </li>

                        </ul>

                    </li>
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="">
                        <i class="nav-main-link-icon si si-speedometer"></i>
                        <span class="nav-main-link-name"><span class="rounded p-1 ">Dashboard</span></span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="">
                        <i class="nav-main-link-icon fas fa-cog"></i>
                        <span class="nav-main-link-name"><span class="rounded p-1 ">Settings</span></span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                        <span class="nav-main-link-name">Member</span>
                    </a>
                    <ul class="nav-main-submenu">

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="">
                                <span class="nav-main-link-name">Add Member</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="">
                                <span class="nav-main-link-name">Member List</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                        <span class="nav-main-link-name">Expired Member</span>
                    </a>
                    <ul class="nav-main-submenu">

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="">
                                <span class="nav-main-link-name">Expired Member list</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
            @elseif($sidebarCheck == "property")
            <ul class="nav-main">


                @if(Auth::user()->is_admin == 1)
                    @foreach($languages as $language)
                        @if($language->status==1)
                            @if($language->language=='en')
                                <h5 class="text-light text-center">Property place Category</h5>
                                <li class="nav-main-item">
                                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                                        <span class="nav-main-link-name">Real Estate</span>
                                    </a>
                                    <ul class="nav-main-submenu">

                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('addproperty')}}">
                                            <span class="nav-main-link-name">Add Property</span>
                                            </a>
                                        </li>

                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('myProperty')}}">
                                                <span class="nav-main-link-name">My Property</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('purpose')}}">
                                                <span class="nav-main-link-name">Property Purpose</span>
                                            </a>
                                        </li>

                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('types')}}">
                                                <span class="nav-main-link-name">Property Types</span>
                                            </a>
                                        </li><li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('nearest_location')}}">
                                                <span class="nav-main-link-name">Nearest Locations</span>
                                            </a>
                                        </li>

                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('aminity')}}">
                                                <span class="nav-main-link-name">Aminities</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('viewDivisions')}}">

                                                <span class="nav-main-link-name">Divisions</span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>

                            @elseif($language->language=='gr')
                                <h5 class="text-light text-center">Eigenschaft Ort Kategorie</h5>
                                <li class="nav-main-item">
                                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                                        <span class="nav-main-link-name">Immobilie</span>
                                    </a>
                                    <ul class="nav-main-submenu">

                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('addproperty')}}"">
                                            <span class="nav-main-link-name">Eigenschaft hinzufügen</span>
                                            </a>
                                        </li>

                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('myProperty')}}">
                                                <span class="nav-main-link-name">Mein Eigentum</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('purpose')}}">
                                                <span class="nav-main-link-name">Eigentumszweck</span>
                                            </a>
                                        </li>

                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('types')}}">
                                                <span class="nav-main-link-name">Eigenschaftstypen</span>
                                            </a>
                                        </li><li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('nearest_location')}}">
                                                <span class="nav-main-link-name">Nächstgelegene Standorte</span>
                                            </a>
                                        </li>

                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('aminity')}}">
                                                <span class="nav-main-link-name">Ausstattung</span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>

                            @endif
                        @endif
                    @endforeach
                @else
                <h5 class="text-light text-center">Property place nav</h5>
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="">
                        <i class="nav-main-link-icon si si-speedometer"></i>
                        <span class="nav-main-link-name"><span class="rounded p-1 ">Dashboard</span></span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="">
                        <i class="nav-main-link-icon fas fa-cog"></i>
                        <span class="nav-main-link-name"><span class="rounded p-1 ">Settings</span></span>
                    </a>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                        <span class="nav-main-link-name">Member</span>
                    </a>
                    <ul class="nav-main-submenu">

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="">
                                <span class="nav-main-link-name">Add Member</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="">
                                <span class="nav-main-link-name">Member List</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                        <span class="nav-main-link-name">Expired Member</span>
                    </a>
                    <ul class="nav-main-submenu">

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="">
                                <span class="nav-main-link-name">Expired Member list</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
            @elseif($sidebarCheck == "carMotor")
            <ul class="nav-main">
                @if(Auth::user()->is_admin == 1)
                <h5 class="text-light text-center">Car Motor place Category</h5>
                    @foreach($languages as $language)
                        @if($language->status==1)
                            @if($language->language=='en')
                                <li class="nav-main-item">
                                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                                        <span class="nav-main-link-name">Category</span>
                                    </a>
                                    <ul class="nav-main-submenu">

                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('add.car.motor.category')}}">
                                                <span class="nav-main-link-name">Add Category</span>
                                            </a>
                                        </li>

                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('manage.car.motor.category')}}">
                                                <span class="nav-main-link-name">Category List</span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                                        <span class="nav-main-link-name">Sub Category</span>
                                    </a>
                                    <ul class="nav-main-submenu">

                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('add.car.motor.sub.category')}}">
                                                <span class="nav-main-link-name">Add sub category</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('manage.car.motor.sub.category')}}">
                                                <span class="nav-main-link-name">Sub category List</span>
                                            </a>
                                        </li>
                                    </ul>

                                </li>

                                <li class="nav-main-item">
                                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                                        <span class="nav-main-link-name">Brand</span>
                                    </a>
                                    <ul class="nav-main-submenu">

                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('add.car.motor.brand')}}">
                                                <span class="nav-main-link-name">Add Brand</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('manage.car.motor.brand')}}">
                                                <span class="nav-main-link-name">Brand List</span>
                                            </a>
                                        </li>
                                    </ul>

                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                                        <span class="nav-main-link-name">Model</span>
                                    </a>
                                    <ul class="nav-main-submenu">

                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('add.car.motor.model')}}">
                                                <span class="nav-main-link-name">Add Model</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('manage.car.motor.model')}}">
                                                <span class="nav-main-link-name">Model List</span>
                                            </a>
                                        </li>
                                    </ul>

                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                                        <span class="nav-main-link-name">Features</span>
                                    </a>
                                    <ul class="nav-main-submenu">
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('main.car.motor.features')}}">
                                                <span class="nav-main-link-name">Add Feature</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('manage.car.motor.features')}}">
                                                <span class="nav-main-link-name">Manage Feature</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('car.motor.features.property')}}">
                                                <span class="nav-main-link-name">Add Feature Property</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('manage.car.motor.features.property')}}">
                                                <span class="nav-main-link-name">Manage Feature Property</span>
                                            </a>
                                        </li>
                                    </ul>

                                </li>

                                <li class="nav-main-item">
                                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                                        <span class="nav-main-link-name">Product</span>
                                    </a>
                                    <ul class="nav-main-submenu">

                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('add.car.motor.post')}}">
                                                <span class="nav-main-link-name">In-House Product</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('manage.inhouse')}}">
                                                <span class="nav-main-link-name">Manage In-House Product</span>
                                            </a>
                                        </li>
                                    </ul>

                                </li>

                            @elseif($language->language=='gr')
                                <li class="nav-main-item">
                                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                                        <span class="nav-main-link-name">Kategorie</span>
                                    </a>
                                    <ul class="nav-main-submenu">

                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('add.car.motor.category')}}">
                                                <span class="nav-main-link-name">Kategorie hinzufügen</span>
                                            </a>
                                        </li>

                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('manage.car.motor.category')}}">
                                                <span class="nav-main-link-name">Kategorieliste</span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                                        <span class="nav-main-link-name">Unterkategorie</span>
                                    </a>
                                    <ul class="nav-main-submenu">

                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('add.car.motor.sub.category')}}">
                                                <span class="nav-main-link-name">Unterkategorie hinzufügen</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('manage.car.motor.sub.category')}}">
                                                <span class="nav-main-link-name">Unterkategorieliste</span>
                                            </a>
                                        </li>
                                    </ul>

                                </li>

                                <li class="nav-main-item">
                                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                                        <span class="nav-main-link-name">Marke</span>
                                    </a>
                                    <ul class="nav-main-submenu">

                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('add.car.motor.brand')}}">
                                                <span class="nav-main-link-name">Marke hinzufügen</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('manage.car.motor.brand')}}">
                                                <span class="nav-main-link-name">Markenliste</span>
                                            </a>
                                        </li>
                                    </ul>

                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                                        <span class="nav-main-link-name">Modell</span>
                                    </a>
                                    <ul class="nav-main-submenu">

                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('add.car.motor.model')}}">
                                                <span class="nav-main-link-name">Modell hinzufügen</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('manage.car.motor.model')}}">
                                                <span class="nav-main-link-name">Modellliste</span>
                                            </a>
                                        </li>
                                    </ul>

                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                                        <span class="nav-main-link-name">Features</span>
                                    </a>
                                    <ul class="nav-main-submenu">
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('main.car.motor.features')}}">
                                                <span class="nav-main-link-name">Feature hinzufügen</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('manage.car.motor.features')}}">
                                                <span class="nav-main-link-name">Funktionen verwalten</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('car.motor.features.property')}}">
                                                <span class="nav-main-link-name">Feature -Eigenschaft hinzufügen</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('manage.car.motor.features.property')}}">
                                                <span class="nav-main-link-name">Feature -Eigenschaft verwalten</span>
                                            </a>
                                        </li>
                                    </ul>

                                </li>

                                <li class="nav-main-item">
                                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                                        <span class="nav-main-link-name">Produkt</span>
                                    </a>
                                    <ul class="nav-main-submenu">

                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('add.car.motor.post')}}">
                                                <span class="nav-main-link-name">Eigenes Produkt</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="{{route('manage.inhouse')}}">
                                                <span class="nav-main-link-name">Eigenes Produkt verwalten</span>
                                            </a>
                                        </li>
                                    </ul>

                                </li>

                            @endif
                        @endif
                    @endforeach
                @else
                <h5 class="text-light text-center">Car Motor place nav</h5>
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="">
                        <i class="nav-main-link-icon si si-speedometer"></i>
                        <span class="nav-main-link-name"><span class="rounded p-1 ">Dashboard</span></span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="">
                        <i class="nav-main-link-icon fas fa-cog"></i>
                        <span class="nav-main-link-name"><span class="rounded p-1 ">Settings</span></span>
                    </a>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                        <span class="nav-main-link-name">Member</span>
                    </a>
                    <ul class="nav-main-submenu">

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="">
                                <span class="nav-main-link-name">Add Member</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="">
                                <span class="nav-main-link-name">Member List</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                        <span class="nav-main-link-name">Expired Member</span>
                    </a>
                    <ul class="nav-main-submenu">

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="">
                                <span class="nav-main-link-name">Expired Member list</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
            @elseif($sidebarCheck == "job")
                    <ul class="nav-main">
                        @foreach($languages as $language)
                            @if($language->status==1)
                                @if($language->language=='en')
                                    @if(Auth::user()->is_admin == 1)
                                        <h5 class="text-light text-center">Job place Category</h5>

                                        <li class="nav-main-item">
                                            <a class="nav-main-link active" href="{{route('admin.home')}}">
                                                <i class="nav-main-link-icon si si-speedometer"></i>
                                                <span class="nav-main-link-name">Dashboard</span>
                                            </a>
                                        </li>

                                        <li class="nav-main-item">
                                            <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                                <i class="nav-main-link-icon fab fa-atlassian"></i>
                                                <span class="nav-main-link-name">Jobs</span>
                                            </a>
                                            <ul class="nav-main-submenu">
                                                <li class="nav-main-item">
                                                    <a class="nav-main-link" href="{{route('allJobs')}}">
                                                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                                                        <span class="nav-main-link-name">View All Jobs</span>
                                                    </a>
                                                </li>
                                                <li class="nav-main-item">
                                                    <a class="nav-main-link" href="{{route('addjobs')}}">
                                                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                                                        <span class="nav-main-link-name">Publish a Job</span>
                                                    </a>
                                                </li>
                                                <li class="nav-main-item">
                                                    <a class="nav-main-link" href="{{route('viewjobtype')}}">
                                                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                                                        <span class="nav-main-link-name">Job Types</span>
                                                    </a>
                                                </li>
                                                <li class="nav-main-item">
                                                    <a class="nav-main-link" href="{{route('viewDivisions')}}">
                                                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                                                        <span class="nav-main-link-name">Divisions</span>
                                                    </a>
                                                </li>
                                                <li class="nav-main-item">
                                                    <a class="nav-main-link" href="{{route('viewQua')}}">
                                                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                                                        <span class="nav-main-link-name">Qualifications</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    @else
                                        <h5 class="text-light text-center">Job place nav</h5>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link active" href="{{route('admin.home')}}">
                                                <i class="nav-main-link-icon si si-speedometer"></i>
                                                <span class="nav-main-link-name">Dashboard</span>
                                            </a>
                                        </li>

                                        <li class="nav-main-item">
                                            <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                                <i class="nav-main-link-icon fab fa-atlassian"></i>
                                                <span class="nav-main-link-name">Jobs</span>
                                            </a>
                                            <ul class="nav-main-submenu">
                                                <li class="nav-main-item">
                                                    <a class="nav-main-link" href="{{route('allJobs')}}">
                                                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                                                        <span class="nav-main-link-name">View All Jobs</span>
                                                    </a>
                                                </li>
                                                <li class="nav-main-item">
                                                    <a class="nav-main-link" href="{{route('addjobs')}}">
                                                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                                                        <span class="nav-main-link-name">Publish a Job</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    @endif

                                @elseif($language->language=='gr')
                                    {{-- German code start --}}
                                    {{-- German code end --}}
                                @endif

                            @endif
                        @endforeach
                    </ul>

            @elseif($sidebarCheck == "user")
            <ul class="nav-main">
                <h5 class="text-light text-center">user nav</h5>
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="">
                        <i class="nav-main-link-icon si si-speedometer"></i>
                        <span class="nav-main-link-name"><span class="rounded p-1 ">Dashboard</span></span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="">
                        <i class="nav-main-link-icon fas fa-cog"></i>
                        <span class="nav-main-link-name"><span class="rounded p-1 ">Settings</span></span>
                    </a>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                        <span class="nav-main-link-name">Member</span>
                    </a>
                    <ul class="nav-main-submenu">

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="">
                                <span class="nav-main-link-name">Add Member</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="">
                                <span class="nav-main-link-name">Member List</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                        <span class="nav-main-link-name">Expired Member</span>
                    </a>
                    <ul class="nav-main-submenu">

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="">
                                <span class="nav-main-link-name">Expired Member list</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            @elseif($sidebarCheck == "admin")
            <ul class="nav-main">

                <h5 class="text-light text-center">Admin Dashboard</h5>
                <li class="nav-main-item">
                    @foreach($languages as $language)
                    @if($language->status==1)
                    @if($language->language=='en')
                    <a class="nav-main-link active" href="{{route('front.page')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill nav-main-link-icon" viewBox="0 0 16 16">
                            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/>
                        </svg>
                        <span class="nav-main-link-name"><span class="rounded p-1 ">Home</span></span>
                    </a>
                                <a class="nav-main-link active" href="">
                        <i class="nav-main-link-icon si si-speedometer"></i>
                        <span class="nav-main-link-name"><span class="rounded p-1 ">Dashboard</span></span>
                    </a>
                    @elseif($language->language=='gr')
                                <a class="nav-main-link active" href="{{route('front.page')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill nav-main-link-icon" viewBox="0 0 16 16">
                                        <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/>
                                    </svg>
                                    <span class="nav-main-link-name"><span class="rounded p-1 ">Heim</span></span>
                                </a>
                    <a class="nav-main-link active" href="">
                        <i class="nav-main-link-icon si si-speedometer"></i>
                        <span class="nav-main-link-name"><span class="rounded p-1 ">Armaturenbrett</span></span>
                    </a>
                    @endif
                    @endif
                    @endforeach

                </li>
                <li class="nav-main-item">
                    @foreach($languages as $language)
                    @if($language->status==1)
                    @if($language->language=='en')
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fas fa-cog"></i>
                        <span class="nav-main-link-name">Settings</span>
                    </a>
                    @elseif($language->language=='gr')
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fas fa-cog"></i>
                        <span class="nav-main-link-name">Einstellungen</span>
                    </a>
                    @endif
                    @endif
                    @endforeach

                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('website.logo')}}">
                                <span class="nav-main-link-name">Website Settings</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <div class="row">
                                <div class="col-md-12">
                                    @foreach($languages as $language)
                                    @if($language->status==1)
                                    @if($language->language=='en')
                                    <strong>Select Language: </strong>
                                    @elseif($language->language=='gr')
                                    <strong>Sprache auswählen: </strong>
                                    @endif
                                    @endif
                                    @endforeach

                                </div>
                                <div class="col-md-10">
                                    <select class="form-control changeLang">
                                        {{-- <option selected disabled>Please select</option>--}}
                                        @foreach($languages as $language)
                                        <option value="{{$language->language}}" {{$language->status=='1'?'selected':''}}>{{$language->language_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </li>


                    </ul>
                </li>
                @foreach($languages as $language)
                    @if($language->status==1)
                        @if($language->language=='en')
                            <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fab fa-atlassian"></i>
                                    <span class="nav-main-link-name">Location</span>
                                </a>
                                <ul class="nav-main-submenu">

                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{route('add.district')}}">
                                            <span class="nav-main-link-name">District</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{route('mange.district')}}">
                                            <span class="nav-main-link-name">District List</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{route('add.sub.district')}}">
                                            <span class="nav-main-link-name">Sub-Districts</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{route('manage.sub.district')}}">
                                            <span class="nav-main-link-name">Sub-Districts List</span>
                                        </a>
                                    </li>
                                </ul>

                            </li>
                        @elseif($language->language=='gr')
                            <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fab fa-atlassian"></i>
                                    <span class="nav-main-link-name">Standort</span>
                                </a>
                                <ul class="nav-main-submenu">

                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{route('add.district')}}">
                                            <span class="nav-main-link-name">Bezirk</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{route('mange.district')}}">
                                            <span class="nav-main-link-name">Bezirksliste</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{route('add.sub.district')}}">
                                            <span class="nav-main-link-name">Unterbezirke</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{route('manage.sub.district')}}">
                                            <span class="nav-main-link-name">Liste der Unterbezirke</span>
                                        </a>
                                    </li>
                                </ul>

                            </li>
                        @endif
                    @endif
                @endforeach

            </ul>
            @elseif($sidebarCheck == "seller")
            <ul class="nav-main">
                <h5 class="text-light text-center">seller nav</h5>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                        <span class="nav-main-link-name">Product</span>
                    </a>
                    <ul class="nav-main-submenu">

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('add.inHouseProduct')}}">
                                <span class="nav-main-link-name">Add Product</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('manage.inhouse')}}">
                                <span class="nav-main-link-name">Manage In-House Product</span>
                            </a>
                        </li>

                    </ul>

                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="">
                        <i class="nav-main-link-icon si si-speedometer"></i>
                        <span class="nav-main-link-name"><span class="rounded p-1 ">Dashboard</span></span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="">
                        <i class="nav-main-link-icon fas fa-cog"></i>
                        <span class="nav-main-link-name"><span class="rounded p-1 ">Settings</span></span>
                    </a>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                        <span class="nav-main-link-name">Member</span>
                    </a>
                    <ul class="nav-main-submenu">

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="">
                                <span class="nav-main-link-name">Add Member</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="">
                                <span class="nav-main-link-name">Member List</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fab fa-atlassian"></i>
                        <span class="nav-main-link-name">Expired Member</span>
                    </a>
                    <ul class="nav-main-submenu">

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="">
                                <span class="nav-main-link-name">Expired Member list</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            @endif
            @else
            @endif

        </div>
    </div>
</nav>
