{{--Top Bar--}}

<header class="header black-bg print-hidden">
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
    </div>

    <a href="{{ route('dashboard') }}" class="logo hidden-xs"><strong></strong></a>

    <div class="top-menu">
        <ul class="nav pull-right top-menu">
            <li class="hidden-print"><a class="logout" href="{{ url('logout') }}">Logout</a></li>
        </ul>
    </div>
</header>

{{--End Top Bar--}}