@php
$unread_messages = \App\Models\Contact::query()->where('read', '=', 0)->count();;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    <title>{{ $__title }}</title>--}}

    @yield('head-top')
    {{-- Google Font: Source Sans Pro --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    {{-- Font Awesome Icons --}}
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/fontawesome-free/css/all.min.css') }}">
    {{-- Flag Icon CSS --}}
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/flag-icon-css/css/flag-icon.min.css') }}">
    {{-- Toastr --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @yield('head-center')
    {{-- Theme style --}}
    <link rel="stylesheet" href="{{ asset('admin-assets/css/adminlte.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    @yield('head-bottom')
    <title>{{ $__title }}</title>
</head>
{{--<body class="hold-transition sidebar-mini">--}}
sidebar-mini control-sidebar-slide-open layout-navbar-fixed
<body class="hold-transition sidebar-mini control-sidebar-slide-open layout-navbar-fixed text-sm">
<div class="wrapper">

    {{-- Navbar --}}
    @include('dashboard._layout.static.nav')

    {{-- Main Sidebar Container --}}
    @include('dashboard._layout.static.sidebar')

    {{-- Content Wrapper. Contains page content --}}
    <div class="content-wrapper bg-gradient-white p-4">
        {{-- Content Header (Page header) --}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $__title }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.homepage') }}">Yönetim Paneli</a></li>
                            <li class="breadcrumb-item active">{{ $__title }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        {{-- Main content --}}
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

    @include('dashboard._layout.static.footer')
</div>
{{-- ./wrapper --}}

{{-- REQUIRED SCRIPTS --}}

@yield('footer-top')
{{-- jQuery --}}
<script src="{{ asset('admin-assets/plugins/jquery/jquery.min.js') }}"></script>
{{-- Bootstrap 4 --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
{{-- Toastr --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- bs-custom-file-input -->
{{--<script src="{{ asset('admin-assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>--}}
@yield('footer-center')
{{-- AdminLTE App --}}
<script src="{{ asset('/admin-assets/js/adminlte.js') }}"></script>
<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>
@yield('footer-bottom')
</body>
</html>
