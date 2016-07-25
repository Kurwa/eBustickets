@extends('layouts.main')
@section('title')
    Dashboard
@endsection
@section('second')
    {{ ucfirst(Sentinel::getUser()->username) }} Dashboard
@endsection
@section('last')
Home
@endsection
@section('heading')
    Dashboard
@endsection

@section('contents')
    <style type="text/css">
        .stats-number{
            font-size: 20px !important;
            color: black;
            font-weight: bold;
        }
        .stats-icon{
            float: right !important;
        }
        .lead-stats{
            text-decoration: none !important;
            font-family: DejaVu Sans, 'trebuchet ms', verdana, sans-serif;
            color: black;
        }
    </style>
    <div class="row"><!-- .row start -->
        <div class="col-lg-3 col-md-6 col-xs-6 col-small-enlarge"><!-- col-md-6 start here -->
            <div id="dash_0" class="panel panel-default"><!-- Start .panel -->
                <div class="panel-body">
                    <a class="lead-stats" href="#">
                        <span class="stats-number today">{{ number_format($today) }}</span>
                        <span class="stats-icon"><i class="fa fa-money fa-3x color-green"></i></span>
                        <h5>Today earnings</h5>
                    </a>
                </div>
            </div><!-- End .panel -->
        </div><!-- col-md-6 end here -->
        <div class="col-lg-3 col-md-6 col-xs-6 col-small-enlarge"><!-- col-md-6 start here -->
            <div id="dash_1" class="panel panel-default"><!-- Start .panel -->
                <div class="panel-body">
                    <a class="lead-stats" href="#">
                        <span class="stats-number users">{{ number_format($users) }}</span>
                        <span class="stats-icon"><i class="fa fa-group fa-3x color-yellow-dark"></i></span>
                        <h5>Users</h5>
                    </a>
                </div>
            </div><!-- End .panel -->
        </div><!-- col-md-6 end here -->
        <div class="col-lg-3 col-md-6 col-xs-6 col-small-enlarge"><!-- col-md-4 start here -->
            <div id="dash_2" class="panel panel-default"><!-- Start .panel -->
                <div class="panel-body">
                    <a class="lead-stats" href="#">
                        <span class="stats-number agents">{{ number_format($agents) }}</span>
                        <span class="stats-icon"><i class="fa fa-bank fa-3x color-blue"></i></span>
                        <h5>Agents</h5>
                    </a>
                </div>
            </div><!-- End .panel -->
        </div><!-- col-md-4 end here -->
        <div class="col-lg-3 col-md-6 col-xs-6 col-small-enlarge"><!-- col-md-4 start here -->
            <div id="dash_3" class="panel panel-default"><!-- Start .panel -->
                <div class="panel-body">
                    <a class="lead-stats" href="#">
                        <span class="stats-number buses">{{ number_format($buses) }}</span>
                        <span class="stats-icon"><i class="fa fa-bus fa-3x"></i></span>
                        <h5>Customers</h5>
                    </a>
                </div>
            </div><!-- End .panel -->
        </div><!-- col-md-4 end here -->
    </div>    <!-- / page-content-wrapper -->
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <!-- col-lg-6 start here -->
            <div id="dyn_1" class="panel panel-default plain toggle panelClose panelRefresh"> <!-- Start .panel -->
                <div class="panel-heading white-bg">
                    <h4 class="panel-title"><i class="fa fa-calendar"></i> Today's Agents Amount</h4>
                    <div class="panel-controls panel-controls-right">
                        <a href="#" class="panel-refresh">
                            <i class="fa fa-circle-o"></i></a><a href="#" class="toggle panel-minimize">
                            <i class="fa fa-angle-up"></i></a><a href="#" class="panel-close">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-condensed">
                        <thead>
                        <tr>
                            <th class="per5">S/N</th>
                            <th class="per40">Agent Name</th>
                            {{--<th class="per40">Location</th>--}}
                            <th class="per15">Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Jacob Olsen</td>
                            {{--<td>Developer</td>--}}
                            <td>2530$</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End .panel -->
        </div>
        <!-- col-lg-6 end here -->
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <!-- col-lg-6 start here -->
            <div id="dyn_2" class="panel panel-default plain toggle panelClose panelRefresh">
                <!-- Start .panel -->
                <div class="panel-heading white-bg">
                    <h4 class="panel-title"><i class="fa fa-list"></i> Monthly Earning this Year</h4>
                    <div class="panel-controls panel-controls-right">
                        <a href="#" class="panel-refresh"><i class="fa fa-circle-o"></i></a>
                        <a href="#" class="toggle panel-minimize"><i class="fa fa-angle-up"></i></a>
                        <a href="#" class="panel-close"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-hover table-condensed">
                        <thead>
                        <tr>
                            <th class="per5">S/N</th>
                            <th class="per60">Month</th>
                            <th class="per35">Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>january</td>
                            <td>2530$</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End .panel -->
        </div>
        <!-- col-lg-6 end here -->
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <!-- col-lg-6 start here -->
            <div id="dyn_2" class="panel panel-default plain toggle panelClose panelRefresh">
                <!-- Start .panel -->
                <div class="panel-heading white-bg">
                    <h4 class="panel-title"><i class="glyphicon glyphicon-time"></i> Year to Date</h4>
                    <div class="panel-controls panel-controls-right"><a href="#" class="panel-refresh"><i class="fa fa-circle-o"></i></a><a href="#" class="toggle panel-minimize"><i class="fa fa-angle-up"></i></a><a href="#" class="panel-close"><i class="fa fa-times"></i></a></div></div>
                <div class="panel-body">
                    <table class="table table-hover table-condensed">
                        <thead>
                        <tr>
                            <th class="per5">S/N</th>
                            <th class="per40">Agents</th>
                            <th class="per40">Position</th>
                            <th class="per15">Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Jacob Olsen</td>
                            <td>Developer</td>
                            <td>2530$</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End .panel -->
        </div>
        <!-- col-lg-6 end here -->
    </div>
@endsection