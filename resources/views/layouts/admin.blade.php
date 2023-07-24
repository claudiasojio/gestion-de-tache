<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="{{ asset('admin/img/logo/logo.png') }}" rel="icon">
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" ></script>
    <link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/css/ruang-admin.min.css') }}" rel="stylesheet">

    @livewireStyles
</head>
<body id="page-top">
    
    <div id="wrapper">     
        @include('layouts.partials.admin.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">    
            <div id="content">
                @include('layouts.partials.admin.header')
                <div class="container-fluid page-body-wrapper">
                   <div class="comtainer-fluid" id="container-wrapper">   
                      @yield('content') 
                    </div>
                </div>    
            </div>
        </div> 
    </div>
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('admin/js/ruang-admin.min.js') }}"></script>
    @livewireScripts
    @stack('script')
</body>
</html>