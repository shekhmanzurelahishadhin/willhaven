<nav id="sidebar" aria-label="Main Navigation">
    <div class="content-header bg-white-5">
{{--        <a class="font-w600 text-dual" href="{{route('dashboard')}}">--}}
{{--            <span class="smini-visible">--}}
{{--                <i class="fa fa-circle-notch text-primary"></i>--}}
{{--            </span>--}}
{{--            @php--}}
{{--                $frontend=App\Models\BusinessSetting::all()->first();--}}
{{--            @endphp--}}
{{--            <span class="smini-hide font-size-h5 tracking-wider">{{$frontend->company_name}}<span class="font-w400"></span>--}}
{{--            </span>--}}
{{--        </a>--}}

        <div>
            <a class="d-lg-none btn btn-sm btn-dual ml-1" data-toggle="layout" data-action="sidebar_close"
                href="javascript:void(0)">
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
                                    <a class="nav-main-link" href="">
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
                                    <a class="nav-main-link" href="">
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
                                    <a class="nav-main-link" href="">
                                        <span class="nav-main-link-name">Sub Sub category List</span>
                                    </a>
                                </li>
                            </ul>

                        </li>
                    @else
                        <h5 class="text-light text-center">market place nav</h5>
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
                            <h5 class="text-light text-center">Property place Category</h5>
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
                                        <a class="nav-main-link" href="">
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
                                        <a class="nav-main-link" href="">
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
                                        <a class="nav-main-link" href="">
                                            <span class="nav-main-link-name">Sub Sub category List</span>
                                        </a>
                                    </li>
                                </ul>

                            </li>
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
                                        <a class="nav-main-link" href="">
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
                                        <a class="nav-main-link" href="">
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
                                        <a class="nav-main-link" href="">
                                            <span class="nav-main-link-name">Sub Sub category List</span>
                                        </a>
                                    </li>
                                </ul>

                            </li>
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


                        @if(Auth::user()->is_admin == 1)
                            <h5 class="text-light text-center">Job place Category</h5>
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
                                        <a class="nav-main-link" href="">
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
                                        <a class="nav-main-link" href="">
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
                                        <a class="nav-main-link" href="">
                                            <span class="nav-main-link-name">Sub Sub category List</span>
                                        </a>
                                    </li>
                                </ul>

                            </li>
                        @else
                            <h5 class="text-light text-center">Job place nav</h5>
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
                @elseif($sidebarCheck == "category")
                    <ul class="nav-main">


                        @if(Auth::user()->is_admin == 1)
                            <h5 class="text-light text-center">Manage Category</h5>
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
                                        <a class="nav-main-link" href="">
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
                                        <a class="nav-main-link" href="">
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
                                        <a class="nav-main-link" href="">
                                            <span class="nav-main-link-name">Sub Sub category List</span>
                                        </a>
                                    </li>
                                </ul>

                            </li>
                        @endif
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
                        </ul>
                @elseif($sidebarCheck == "seller")
                        <ul class="nav-main">
                            <h5 class="text-light text-center">seller nav</h5>
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
{{--        <ul class="nav-main">--}}
{{--        <li class="nav-main-item">--}}
{{--                    <a class="nav-main-link active" href="{{route('dashboard')}}">--}}
{{--                        <i class="nav-main-link-icon si si-speedometer"></i>--}}
{{--                        <span class="nav-main-link-name"><span class="rounded p-1 ">Dashboard</span></span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-main-item">--}}
{{--                    <a class="nav-main-link active" href="{{route('admin.settings')}}">--}}
{{--                        <i class="nav-main-link-icon fas fa-cog"></i>--}}
{{--                        <span class="nav-main-link-name"><span class="rounded p-1 ">Settings</span></span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                --}}
{{--                <li class="nav-main-item">--}}
{{--                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">--}}
{{--                        <i class="nav-main-link-icon fab fa-atlassian"></i>--}}
{{--                        <span class="nav-main-link-name">Member</span>--}}
{{--                    </a>--}}
{{--                    <ul class="nav-main-submenu">--}}

{{--                        <li class="nav-main-item">--}}
{{--                            <a class="nav-main-link" href="{{route('member.add')}}">--}}
{{--                                <span class="nav-main-link-name">Add Member</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                       --}}
{{--                        <li class="nav-main-item">--}}
{{--                            <a class="nav-main-link" href="{{route('member.list')}}">--}}
{{--                                <span class="nav-main-link-name">Member List</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                      --}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li class="nav-main-item">--}}
{{--                    <a class="nav-main-link nav-main-link-submenu active" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">--}}
{{--                        <i class="nav-main-link-icon fab fa-atlassian"></i>--}}
{{--                        <span class="nav-main-link-name">Expired Member</span>--}}
{{--                    </a>--}}
{{--                    <ul class="nav-main-submenu">--}}

{{--                        <li class="nav-main-item">--}}
{{--                            <a class="nav-main-link" href="{{route('member.expired')}}">--}}
{{--                                <span class="nav-main-link-name">Expired Member list</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                       --}}
{{--                       --}}
{{--                      --}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--               --}}
{{--               --}}
{{--                --}}
{{--            </ul>--}}

        </div>
    </div>
</nav>

