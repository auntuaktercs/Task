<!-- START HEADER-->
<header class="header">
            <div class="page-brand">
                <a class="link" href="{{route('dashboard')}}">
                    <span class="brand">App&nbsp;
                        <span class="brand-tip">Control API</span>
                    </span>
                    <span class="brand-mini">BRT</span>
                </a>
            </div>
            <div class="flexbox flex-1">
                <!-- START TOP-LEFT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li>
                        {{-- <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a> --}}
                    </li>
                </ul>
                <h4>App Controlling API Management System</h4>
                <!-- END TOP-LEFT TOOLBAR-->
                <!-- START TOP-RIGHT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li class="dropdown dropdown-user">
                        <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                            @if(auth()->user()->image!=null)
                                <img src="{{ asset('user/profile/'.auth()->user()->image) }}" alt="profile Image" class="dropdown-user-img"/>
                            @else
                                <img src="{{asset('/')}}backend/user/img/admin-avatar.png" class="dropdown-user-img"/>
                            @endif
                            <span></span>{{ auth()->user()->name }}<i class="fa fa-angle-down m-l-5"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right text-center">
                            <a class="dropdown-item" href="{{ route('users.edit',auth()->user()->id) }}"><i class="fa fa-user"></i>Profile</a>
                            <li class="dropdown-divider"></li>
                            <a class="dropdown-item" href="{{ route('user.password',auth()->user()->id) }}"><i class="fa fa-key"></i>Password</a>
                            <li class="dropdown-divider"></li>
                            <a class="dropdown-item" href="{{ route('logout') }}"><i class="fa fa-power-off"></i>Logout</a>
                        </ul>
                    </li>
                </ul>
                <!-- END TOP-RIGHT TOOLBAR-->
            </div>
        </header>
        <!-- END HEADER-->

