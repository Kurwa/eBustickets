@include('layouts.header')
<body>
<!-- .page-navbar -->
<div id="header" class="page-navbar">
    <!-- .navbar-brand -->
    <a href="#" class="navbar-brand hidden-xs hidden-sm">
        <img src="{{ asset('assets/img/logo.png') }}" width="191" height="48" class="logo hidden-xs" alt="MakGroup Logo">
        {{--<img src="{{ asset('assets/img/logosm.png') }}" class="logo-sm hidden-lg hidden-md" alt="MakGroup Logo">--}}
        <i class="fa fa-cubes logo-sm hidden-lg hidden-md"></i>
    </a>
    <!-- / navbar-brand -->
    <!-- .no-collapse -->
    <div id="navbar-no-collapse" class="navbar-no-collapse">
        <!-- top left nav -->
        <ul class="nav navbar-nav">
            <li class="toggle-sidebar">
                <a href="#">
                    <i class="fa fa-reorder"></i>
                    <span class="sr-only">Collapse sidebar</span>
                </a>
            </li>
            <li>
                <a href="#" class="reset-layout tipB" title="Reset panel position for this page"><i class="fa fa-history"></i></a>
            </li>
        </ul>
        <!-- / top left nav -->
        <!-- top right nav -->
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i>
                    <span class="sr-only">Notifications</span>
                    <span class="badge badge-danger">1</span>
                </a>
                <ul class="dropdown-menu right dropdown-notification" role="menu">
                    <li><a href="#" class="dropdown-menu-header">Notifications</a></li>
                    <li><a href="#"><i class="l-basic-life-buoy"></i> 2 support request</a></li>
                    <li><a href="#"><i class="l-basic-gear"></i> Settings is changed</a></li>
                    <li><a href="#" class="view-all">View all <i class="l-arrows-right"></i></a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" data-toggle="dropdown">
                    <i class="fa fa-cog"></i>
                    <span class="sr-only">Settings</span>
                </a>
                <ul class="dropdown-menu dropdown-form dynamic-settings right" role="menu">
                    <li><a href="#" class="dropdown-menu-header">System settings</a>
                    </li>
                    <li>
                        <div class="toggle-custom">
                            <label class="toggle" data-on="ON" data-off="OFF">
                                <input type="checkbox" id="fixed-header-toggle" name="fixed-header-toggle" checked>
                                <span class="button-checkbox"></span>
                            </label>
                            <label for="fixed-header-toggle">Fixed header</label>
                        </div>
                    </li>
                    <li>
                        <div class="toggle-custom">
                            <label class="toggle" data-on="ON" data-off="OFF">
                                <input type="checkbox" id="fixed-left-sidebar" name="fixed-left-sidebar" checked>
                                <span class="button-checkbox"></span>
                            </label>
                            <label for="fixed-left-sidebar">Fixed Left Sidebar</label>
                        </div>
                    </li>
                    <li>
                        <div class="toggle-custom">
                            <label class="toggle" data-on="ON" data-off="OFF">
                                <input type="checkbox" id="fixed-right-sidebar" name="fixed-right-sidebar" checked>
                                <span class="button-checkbox"></span>
                            </label>
                            <label for="fixed-right-sidebar">Fixed Right Sidebar</label>
                        </div>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ url('logout') }}">
                    <i class="fa fa-power-off"></i>
                    <span class="sr-only">Logout</span>
                </a>
            </li>
            <li>
                <a id="toggle-right-sidebar" href="#" class="tipB" title="Toggle right sidebar">
                    <i class="l-software-layout-sidebar-right"></i>
                    <span class="sr-only">Toggle right sidebar</span>
                </a>
            </li>
        </ul>
        <!-- / top right nav -->
    </div>
    <!-- / collapse -->
</div>
<!-- / page-navbar -->
<!-- #wrapper -->
<div id="wrapper">

    @include('layouts.leftnav')
    <!-- / page-sidebar -->
    @include('layouts.rightnav')
    <!-- .page-content -->
    <div class="page-content sidebar-page right-sidebar-page clearfix">
        <!-- .page-content-wrapper -->
        <div class="page-content-wrapper">
            <div class="page-content-inner">
                <!-- Start .page-content-inner -->
                <div id="page-header" class="clearfix">
                    <div class="page-header">
                        <h4>@yield('heading')</h4>
                        {{--<span class="txt">Represent big amount of data</span>--}}
                    </div>
                    <ol class="breadcrumb pull-right hidden-xs hidden-sm hidden-md">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">@yield('second')</a></li>
                        <li class="active">@yield('last')</li>
                    </ol>
                </div>
                @if(Session::has('error'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ Session::get('error') }}
                    </div>
                @elseif(Session::has('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{--<ul>--}}
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        {{--</ul>--}}
                    </div>
                @endif
                @yield('contents')
                </div>
            </div>
    </div>
    <!-- / page-content -->
</div>
<!-- / #wrapper -->
<div id="footer" class="clearfix sidebar-page right-sidebar-page">
    <!-- Start #footer  -->
    <p class="pull-left">
        Copyrights &copy; <?= date('Y')?> <a href="http://makgroup.co.tz/" class="color-blue strong" target="_blank">MAKGROUP</a>. All rights reserved.
    </p>
    <p class="pull-right">
        <a href="#" class="mr5">Terms of use</a>
        |
        <a href="#" class="ml5 mr25">Privacy police</a>
    </p>
</div>
<!-- End #footer  -->
<!-- Back to top -->
<div id="back-to-top"><a href="#">Back to Top</a>
</div>
@include('layouts.footer')