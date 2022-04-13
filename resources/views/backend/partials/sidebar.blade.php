<!-- START SIDEBAR-->
<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                @if(auth()->user()->image!=null)
                    <img src="{{ asset('user/profile/'.auth()->user()->image) }}" width="40" height="45" alt="profile Image" class="rounded-circle admin-block-img"/>
                @else
                    <img src="{{asset('/')}}backend/user/img/admin-avatar.png" lass="admin-block-img"/>
                @endif
            </div>
            <div class="admin-info">
                <div class="font-strong">{{ auth()->user()->name }}</div>
                <small>{{ auth()->user()->designation }}</small>
            </div>
        </div>
        <ul class="side-menu metismenu" id="leftCol">
            <li>
                <a class="active" href="{{ route('dashboard') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li class="heading">MENUS</li>
            @if(auth()->user()->role!="Viewer")
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-cogs"></i>
                    <span class="nav-label">Admin Setup</span><i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ route('users.index') }}">View All Users</a>
                    </li>
                    <li>
                        <a href="{{ route('users.create') }}">Create New User</a>
                    </li>
                    {{-- <li>
                        <a href="{{ route('locations.index') }}">Create Locations</a>
                    </li> --}}
                </ul>
            </li>
            @endif
        </ul>
    </div>
</nav>
<!-- END SIDEBAR-->
