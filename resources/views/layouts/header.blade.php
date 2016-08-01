<!DOCTYPE html>
<html class="no-js">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8">
    <title style="font-family :'DejaVu Sans Mono'"> eBus Ticketing | @yield('title') </title>
    {{--<!-- Mobile specific metas -->--}}
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="x-ua-compatible" content="IE=9" />
    <!--[endif] -->
    <meta name="author" content="" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="application-name" content="" />

    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" />
    {{--<!-- Bootstrap stylesheets (included template modifications) -->--}}
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" />
    {{--<!-- Plugins stylesheets (all plugin custom css) -->--}}
    <link href="{{ asset('assets/css/plugins.css')}}" rel="stylesheet" />
    {{--<!-- Main stylesheets (template main css file) -->--}}
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" />
    {{--<!-- Custom stylesheets ( Put your own changes here ) -->--}}
    <link href="{{ asset('assets/css/custom.css')}}" rel="stylesheet" />
    {{--<!-- Fav and touch icons -->--}}
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}" type="image/png">
    {{--<!-- Windows8 touch icon ( http://www.buildmypinnedsite.com/ )-->--}}
    <meta name="msapplication-TileColor" content="#3399cc" />
    <script src="{{ asset('assets/js/Chart.bundle.js') }}"></script>
    <!-- Added Plugins from the Website  -->
    <link rel="stylesheet" href="{{  asset('assets/css/jquery-ui.css') }}">

    <script type="text/javascript" src=" {{  asset('assets/js/jquery-1.9.1.min.js') }}"></script>

    <script type="text/javascript" src=" {{  asset('assets/js/jquery-ui-1.9.2.min.js') }}"></script>

    <link href="{{ asset('assets/datepicker/jquery.datetimepicker.css')}}" rel="stylesheet" media="screen">
    <script type="text/javascript" src="{{ asset('assets/datepicker/jquery.datetimepicker.full.min.js')}}" charset="UTF-8"></script>

    <link href="{{ asset('assets/js/chosen.min.css') }}" rel="stylesheet" />

    <script src="{{ asset('assets/js/tinymce/tinymce.min.js') }}"></script>

    <script type="text/javascript" src=" {{  asset('assets/js/jscolor.min.js') }}"></script>
</head>