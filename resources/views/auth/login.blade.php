@section('title')
    Login
@endsection

@include('layouts.header')
<body class="login-page">
<!-- Start login container -->
<div class="container login-container">

    <div class="login-panel panel panel-default plain animated bounceIn">

        @if(Session::has('error'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ Session::get('error') }}
            </div>
        @elseif(Session::has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ Session::get('message') }}
            </div>
            @endif
                    <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title text-center">
                    <img id="logo" src="{{ asset('assets/img/logo1.png') }}" width="300" height="108" alt="eBus Ticketing">
                </h4>
            </div>
            <div class="panel-body">
                {{--<hr style="margin-top: 0px">--}}
                <!-- <form class="form-horizontal mt0" role="form" id="login-form" method="POST" action="{{ url('/login') }}"> -->
                {{ Form::open(array('class' => 'form-horizontal mt0', 'autocomplete' => 'off')) }}

                <div class="form-group">
                    <div class="col-lg-12">
                        <div class="input-group input-icon">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="username" required class="form-control" value="{{ old('username') }}" placeholder="Your Username ...">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <div class="input-group input-icon">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input type="password" name="password" id="password" class="form-control" value="" placeholder="Your password ...">
                        </div>
                        <span class="help-block text-right"><a href="#">Forgout password ?</a></span>
                    </div>
                </div>
                <hr style="margin-top: 0px">
                <div class="form-group mb0">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-8">
                        <div class="checkbox-custom">
                            <input type="checkbox" name="remember" id="remember" value="option">
                            <label for="remember">Remember me ?</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-4 mb25">
                        {{ Form::submit('Login', array('class' => 'btn btn-primary pull-right')) }}
                    </div>
                </div>
                </form>
            </div>
    </div>
    <!-- End .panel -->
</div>
<!-- End login container -->
<div class="container">
    <div class="footer">
        {{--Copyright © 2016 Rudra Softech. All rights reserved--}}
        <p class="text-center">  Copyright  &copy; 2001 - {{ date('Y') }} <a style="text-decoration: none" target="_blank" href="http://makgroup.co.tz" class="color-blue strong">MAKGROUP</a><br> All right reserved !!!</p>
    </div>
</div>
<script src="{{ asset('assets/js/ecollection.js') }}"></script>
@include('layouts.footer')