
{{--<nav class="main-header navbar navbar-expand navbar-white navbar-light">--}}
<nav class="main-header navbar navbar-expand navbar-dark navbar-primary">
    {{-- Left navbar links --}}
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('front.homepage') }}" class="nav-link">Siteye Geri Dön</a>
        </li>
    </ul>

    {{-- Right navbar links --}}
    <ul class="navbar-nav ml-auto">

        {{-- Messages Dropdown Menu --}}
        <li class="nav-item dropdown">
            <a class="nav-link" href="{{ route('admin.contact') }}">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge {{ $unread_messages == 0 ? 'invisible' : null }}">{{ $unread_messages }}</span>
            </a>
        </li>

        {{-- Notifications Dropdown Menu --}}
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge"></span>
            </a>
        </li>

        {{-- Full Screen Button--}}
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

        {{-- Language Menu --}}
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="flag-icon flag-icon-tr"></i>
            </a>
        </li>

        {{-- User Menu--}}
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <span class="d-none d-md-inline" style="padding-right: 5px">{{ Auth::user()->name }}</span>
                <img src="{{ asset('/admin-assets/img/user2-160x160.jpg') }}" class="user-image img-circle elevation-2" alt="User Image">
            </a>
            <div class="dropdown-menu dropdown-menu-lg  dropdown-menu-right" style="min-width: 200px!important; width: auto">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    Sign Out
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
