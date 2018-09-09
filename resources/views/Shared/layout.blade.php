<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@if(isset($title))
        {{ $title}}
        @else
        {{ config('app.name')}} 
        @endif
    </title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    
    <!-- Bootstrap Core Css -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    
    <!-- Waves Effect Css -->
    <link href="{{ asset('plugins/node-waves/waves.css')}}" rel="stylesheet" />
    
    <!-- Animation Css -->
    <link href="{{ asset('plugins/animate-css/animate.css')}}" rel="stylesheet" />
    
    <!-- Custom Css -->
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('css/MyStyle.css')}}" rel="stylesheet">
    <link href="{{ asset('css/general-style.css')}}" rel="stylesheet">
    <link href="{{ asset('plugins/waitme/waitMe.css')}}" rel="stylesheet" />
    <link href="{{ asset('plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('css/themes/all-themes.css')}}" rel="stylesheet" />
    
    <!-- Jquery Core Js -->
    <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
    
    <!-- Bootstrap Core Js -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
    
    <!-- Customize JS -->
    <script src="{{ asset('js/MyJquery.js')}}"></script>
    
</head>
<body class="theme-red">
    @include('Shared.header')
    @include('Shared.sidebar')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                {{-- Div Alert Message --}}
                <div class="div_alert_message"></div>
                @include('Shared.alert')
                @yield('content')
                
            </div>
        </section>
        
        
        
        <!-- Select Plugin Js -->
        <script src="{{ asset('plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
        
        <!-- Slimscroll Plugin Js -->
        <script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
        
        <!-- Waves Effect Plugin Js -->
        <script src="{{ asset('plugins/node-waves/waves.js')}}"></script>
        
        <!-- Custom Js -->
        <script src="{{ asset('js/admin.js')}}"></script>
        
        <!-- Demo Js -->
        <script src="{{ asset('js/demo.js')}}"></script>
    </body>
    
    </html>