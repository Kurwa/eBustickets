<!-- .page-sidebar -->
<aside id="sidebar" class="page-sidebar hidden-md hidden-sm hidden-xs">
    <!-- Start .sidebar-inner -->
    <div class="sidebar-inner">
        <!-- Start .sidebar-scrollarea -->
        <div class="sidebar-scrollarea">
            <div class="sidebar-panel">
                <h5 class="sidebar-panel-title">Profile</h5>
            </div>
            <!-- / .sidebar-panel -->
            <div class="user-info clearfix">
                <img src="{{ asset('assets/img/person.gif') }}" alt="avatar">
                <span class="name">{{ ucfirst(Sentinel::getUser()->username) }}</span>
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-xs"><i class="l-basic-gear"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">settings <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu right" role="menu">
                        <li><a href="{{ url('user-profile') }}"><i class="fa fa-edit"></i>Edit profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ url('logout') }}"><i class="fa fa-power-off"></i>Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--  .sidebar-panel -->
            <div class="sidebar-panel">
                <h5 class="sidebar-panel-title">Navigation</h5>
            </div>
            <div class="side-nav">
                <ul class="nav">
                        <li><a href="{{ url('/') }}">
                                <i class="fa fa-home"></i><span class="txt">Dashboard</span></a>
                        </li>
                    @if(\Cartalyst\Sentinel\Laravel\Facades\Sentinel::inRole('super') || \Cartalyst\Sentinel\Laravel\Facades\Sentinel::inRole('admin'))
                    <li class="">
                        <a href="#"><i class="fa   fa-code-fork"></i><span class="txt">Manage Routes</span></a>
                        <ul class="sub">
                            <li><a href="{{ url('routes/routes-lists') }}"><span class="txt">Routes Lists</span></a></li>
                            <li><a href="{{ url('routes/routes-assign') }}"><span class="txt">Routes Assign</span></a></li>
                         </ul>
                        </li>
                        <li class="">
                            <a href="#"><i class="fa  fa-bus"></i><span class="txt"> Manage Buses</span></a>
                            <ul class="sub">
                                <li><a href="{{ url('buses/buses-lists') }}"><span class="txt">Buses Lists</span></a></li>
                                <li><a href="{{ url('buses/buses-inspections') }}"><span class="txt">Inspections</span></a></li>
                                <li><a href="{{ url('buses/buses-maintenance') }}"><span class="txt">Maintenance</span></a></li>
                                <li><a href="{{ url('buses/buses-insurances') }}"><span class="txt">Insurance</span></a></li>
                            </ul>
                        </li>
                    @endif
                        @if(\Cartalyst\Sentinel\Laravel\Facades\Sentinel::inRole('agents') || \Cartalyst\Sentinel\Laravel\Facades\Sentinel::inRole('admin'))
                        <li class="">
                            <a href="#"><i class="fa  fa-ticket"></i> <span class="txt">Tickets</span></a>
                            <ul class="sub">
                                <li><a href="{{ url('tickets') }}"><span class="txt">Tickets</span></a></li>
                                <li><a href="{{ url('tickets/bookings') }}"><span class="txt">Booking List</span></a></li>
{{--                                <li><a href="{{ url('tickets/templates') }}"><span class="txt">Ticket Template</span></a></li>--}}

                            </ul>
                        </li>
                        @endif
                        <li class="">
                            <a href="{{ url('passengers') }}"><i class="fa fa-male"></i> <span class="txt">Passengers</span></a>
                            {{--<ul class="sub">--}}
                            {{--<li><a href="email-inbox.html"><span class="txt">Inbox</span></a>--}}
                            {{--</li>--}}
                            {{--<li><a href="email-read.html"><span class="txt">Read email</span></a>--}}
                            {{--</li>--}}
                            {{--<li><a href="email-write.html"><span class="txt">Write email</span></a>--}}
                            {{--</li>--}}
                            {{--</ul>--}}
                        </li>
                        @if(\Cartalyst\Sentinel\Laravel\Facades\Sentinel::inRole('super'))
                         <li class="">
                            <a href="{{ url('customers-lists') }}"><i class="fa  fa-user"></i> <span class="txt">Customers</span></a>
                            {{--<ul class="sub">--}}
                                {{--<li><a href="email-inbox.html"><span class="txt">Inbox</span></a>--}}
                                {{--</li>--}}
                                {{--<li><a href="email-read.html"><span class="txt">Read email</span></a>--}}
                                {{--</li>--}}
                                {{--<li><a href="email-write.html"><span class="txt">Write email</span></a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        </li>
                        @endif
                        @if(\Cartalyst\Sentinel\Laravel\Facades\Sentinel::inRole('super') || \Cartalyst\Sentinel\Laravel\Facades\Sentinel::inRole('admin'))
                            <li class="">
                                <a href="{{ url('agents') }}"><i class="fa  fa-group"></i> <span class="txt">Agents</span></a>
                                {{--<ul class="sub">--}}
                                    {{--<li><a href="email-inbox.html"><span class="txt">Inbox</span></a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="email-read.html"><span class="txt">Read email</span></a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="email-write.html"><span class="txt">Write email</span></a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            </li>
                            <li class="disabled">
                                <a href="#"><i class=" l-ecommerce-graph2"></i><span class="txt">Reports Center</span></a>
                                <ul class="sub">
                                    {{--<li><a href="maps-google.html"><span class="txt">Google maps</span></a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="maps-vector.html"><span class="txt">Vector maps</span></a>--}}
                                    {{--</li>--}}
                                </ul>
                            </li>
                            <li class="">
                                <a href="#"><i class="fa fa-cogs"></i><span class="txt">Configurations</span></a>
                                <ul class="sub">
                                    <li><a href="{{ url('system-configuration') }}"><span class="txt">System Config</span></a>
                                    </li>
                                    <li><a href="{{ url('configurations/users') }}"><span class="txt">Users</span></a>
                                    <li><a href="{{ url('configurations/roles') }}"><span class="txt">Roles</span></a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                </ul>
            </div>
            {{--<!-- / side-nav -->--}}
            {{--<!--  .sidebar-panel -->--}}
            {{--<div class="sidebar-panel">--}}
                {{--<h5 class="sidebar-panel-title">Server stats</h5>--}}
                {{--<div class="sidebar-panel-content">--}}
                    {{--<div class="sidebar-stat mb10">--}}
                        {{--<p class="color-white mb5 mt5"><i class="fa fa-hdd-o mr5"></i> Disk Space <span class="pull-right small">30%</span>--}}
                        {{--</p>--}}
                        {{--<div class="progress flat transparent progress-bar-xs">--}}
                            {{--<div class="progress-bar progress-bar-white" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>--}}
                        {{--</div>--}}
                        {{--<span class="dib s12 mt5 per100 text-center">3001.56 / 10000 MB</span>--}}
                    {{--</div>--}}
                    {{--<div class="sidebar-stat">--}}
                        {{--<p class="color-white mb5 mt5"><i class="glyphicon glyphicon-transfer mr5"></i> Bandwidth Transfer <span class="pull-right small">78%</span>--}}
                        {{--</p>--}}
                        {{--<div class="progress flat transparent progress-bar-xs">--}}
                            {{--<div class="progress-bar progress-bar-white" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%;"></div>--}}
                        {{--</div>--}}
                        {{--<span class="dib s12 mb10 mt5 per100 text-center">87565.12 / 120000 MB</span>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
        <!-- End .sidebar-scrollarea -->
    </div>
    <!-- End .sidebar-inner -->
</aside>