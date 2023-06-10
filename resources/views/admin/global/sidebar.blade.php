<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="{{asset('admin/assets/brand/coreui.svg#full')}}"></use>
        </svg>
        <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="{{asset('admin/assets/brand/coreui.svg#signet')}}"></use>
        </svg>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item"><a class="nav-link" href="{{ route('dashboardAdmin') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{asset('admin/vendors/@coreui/icons/svg/free.svg#cil-speedometer')}}"></use>
                </svg> Dashboard</a>
        </li>

        <li class="nav-title">Users & Comments</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="{{ route('userAdmin') }}">
                <svg class="nav-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                </svg> Users</a>
            <ul class="nav-group-items">
                <li class="nav-item"><a class="nav-link" href="{{route('userAdmin')}}"><span class="nav-icon"></span> Show Users</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('userCreateAdmin')}}"><span class="nav-icon"></span> Create User</a></li>
            </ul>
        </li>

        <li class="nav-group"><a class="nav-link nav-group-toggle" href="{{ route('commentsAdmin') }}">
                <svg class="nav-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                </svg> Comments</a>
            <ul class="nav-group-items">
                <li class="nav-item"><a class="nav-link" href="{{ route('commentsAdmin') }}"><span class="nav-icon"></span> Show Comments</a></li>
            </ul>
        </li>

        <li class="nav-title">Profile</li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('AdminLogout')}}">
                <svg class="nav-icon">
                    <use xlink:href="{{asset('admin/vendors/@coreui/icons/svg/free.svg#cil-drop')}}"></use>
                </svg> Logout
            </a>
        </li>

    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>
