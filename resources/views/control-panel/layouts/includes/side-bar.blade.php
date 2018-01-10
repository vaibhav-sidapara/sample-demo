{{--Side Bar--}}

<aside class="hidden-print">
    <div id="sidebar" class="nav-collapse">

        <ul class="sidebar-menu" id="nav-accordion">

            <li class="sub-menu"><h5 class="centered">{{ Auth::user()->name }}</h5></li>
            <li class="sub-menu"><h6 class="centered" style="color: white">{{ Auth::user()->role }}</h6></li>

            <li class="sub-menu">
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            @if( Auth::user()->role == 'Admin')
                <li class="sub-menu">
                    <a href="{{ route('user.show') }}">
                        <i class="fa fa-users"></i>
                        <span>Users</span>
                    </a>
                </li>
            @endif

        </ul>

    </div>
</aside>

{{--End Side Bar--}}