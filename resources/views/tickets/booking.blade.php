@extends('layouts.main')
@section('heading')
    Booking Lists
@endsection
@section('title')
    Booking Lists
@stop
@section('second')
    Booking
@stop
@section('last')
    Booking Lists
@stop
@section('contents')
    <script type="application/javascript">
        $(document).ready(function(){

            document.getElementById('input-name').value = "{{ \Illuminate\Support\Facades\Input::get('name') }}";
            document.getElementById('traveldate').value = "{{ \Illuminate\Support\Facades\Input::get('date') }}";
            document.getElementById('buses').value = "{{ \Illuminate\Support\Facades\Input::get('buses') }}";

            $(".traveldate").datetimepicker({
                format : "Y-m-d"
            });

            $("#routes").change(function(){
                $("#data").val($('#routes').val());
                $.ajax({
                    type:"GET",
                    url:"{{ url('tickets/routes-taking') }}",
                    data:{
                        routes_id : $('#routes').val(),
                    },
                    success:function(response){
                    $(".initial_destination").html(response);
                    }
                });
            });
        });

        function SelectLocation () {
            $.ajax({
                url:"{{ url('tickets/routes-location') }}",
                data: {
                    data : $('#data').val(),
                    location : $('#location').val()
                },
                type: "GET",
                success:function(data){
                    $("#destination").html(data);
                }
            });
        }
        $(document).ready(function(){
            $('#vehicleradio').change(function(){
                $( "#vehicletyres" ).show();
            });
            $(".date").datepicker({
                 minDate: 1,
                //sets minDate to dt1 date + 1
                dateFormat: "yy-mm-dd",
            });
            $('.cost').keyup(function (event) {
                // skip for arrow keys
                if (event.which >= 37 && event.which <= 40) return;
                // format number
                $(this).val(function (index, value) {
                    return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                });
            });
        });
        function SeatingPlan(){
            $.ajax({
                type:"GET",
                url:"{{ url('tickets/seats-plan') }}",
                data:{
                    buses : $("#data1").val(),
                    date : $("#travelday").val(),
                    route: $("#data2").val()
                },
                success:function(response){
                    if(response){
                        $("#template").html(response);
                    }
                    else{
                        $("#template").html();
                    }
                }
            });
        }
        function BusesCheck(){
            $("#data1").val($('#busesid').val());
        }
        function RouteCheck(){
            $("#data2").val($('#routes').val());
        }
        function CheckSeating(argument){
            $("#seatno").val(argument);
            $('#Modal').modal('toggle');
        }
        function Seating(argument){
            alert(argument + 'Taken');
        }
    </script>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                {{ Form::open(['method'=>'GET']) }}
                <div class="col-sm-3">
                    <div class="form-group">
                        {{--<label class="control-label" for="input-price">Price</label>--}}
                        <input name="name" value="" placeholder="Name" id="input-name" class="form-control" type="text">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        {{--<label class="control-label" for="input-price">Price</label>--}}
                        {!! Form::select('buses',
                            (['' => 'Select Number'] + $buses),
                                null,
                                ['class' => 'form-control','id'=>'buses']) !!}
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        {{--<label class="control-label" for="input-price">Price</label>--}}
                        <input name="date" value="" placeholder="Date of Travel" id="traveldate" class="form-control traveldate" type="text">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {{--<label class="control-label" for="input-price">Price</label>--}}
                        {{--<input name="agent" value="" placeholder="Agent" id="input-price" class="form-control " type="text">--}}
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="btn-group">
                        <a type="button" class="btn btn btn-default"><i class="fa fa-print"></i> Print</a>
                        <button type="submit" id="button-filter" class="btn btn-primary pull-right"><i class="fa fa-search"></i> Filter</button>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <div id="dyn_7" class="panel panel-lime plain">
        <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-search"></i>  View Booking List</h4>
            <div class="panel-controls panel-controls-right">
                <button class="btn btn-info mr5 mb10 btn-sm" style="margin-top: 10px"
                data-toggle="modal" data-target="#myLargeModal" onclick="">
                <i class="fa fa-plus"></i> Add</button>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-responsive table-strip table-bordered table-condensed" width="100%" style="overflow: visible">
                <thead>
                <tr>
                    <th width="4%">S/N</th>
                    <th>Names</th>
                    <th>Bus Number</th>
                    <th>Seat Number</th>
                    <th>Locations</th>
                    <th>Destinations</th>
                    <th>Agents</th>
                    <th>Payment Type</th>
                    <th>Date</th>
                    {{--<th>Status</th>--}}
                    <th width="150px">Action</th>
                </tr>
                </thead>
                <tbody>
                {{--*/ $i = 0/*--}}
                @foreach($bookings as $booking)
                    {{--*/ $i ++/*--}}
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $booking->firstname }} {{ $booking->lastname }}</td>
                        <td><a href="#">{{ $booking->buses->bus_number }}</a></td>
                        <td><a href="#"> {{ $booking->seat_number }}</a> </td>
                        <td>{{ $booking->init->name }}</td>
                        <td>{{ $booking->ends->name }}</td>
                        <td><a href="#">
                                {{ $booking->user->name }}
                            </a> </td>
                        <td>
                            {{ $booking->payment->name }}
                        </td>
                        <td>{{ strftime('%d -%b- %Y',strtotime($booking->dateoftravel))  }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> edit</a>
                                <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.modal -->
    <!-- Lare Modal -->
    <div class="modal fade" id="myLargeModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">New Booking</h4>
                </div>
                {!! Form::open(array('class'=>'form-horizontal', 'files'=>true ,'autocomplete' => 'off')) !!}
                <div class="modal-body" id="">
                    <input type="hidden" value="" id="data1">
                    <input type="hidden" value="" id="data2">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">First Name</label>
                            <div class="col-lg-9 col-md-8">
                                <input type="text" class="form-control" name="first_name"  value="" placeholder="First Name">
                            </div>
                        </div>
                        {{--</div>--}}

                        <!-- End .form-group  -->
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">Last Name</label>
                            <div class="col-lg-9 col-md-8">
                                <input type="text" class="form-control" name="last_name" value="" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">Phone Number</label>
                            <div class="col-lg-9 col-md-8">
                                <input type="text" class="form-control" name="phone_number" value="" placeholder="Phone Number">
                            </div>
                        </div>
                        <!-- End .form-group  -->
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">Route</label>
                            <div class="col-lg-9 col-md-8">
                              <select class="form-control"  required="required" name="routes" id="routes" onchange="RouteCheck()">
                                  <option>--Select Route--</option>
                                  @foreach($routes as $route)
                                      <option value="{{ $route->id }}">{{ $route->initial }} - {{ $route->destination }}</option>
                                  @endforeach
                              </select>
                            </div>
                        </div>
                        <input type="hidden" value="" id="data">
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">Location</label>
                            <div class="col-lg-9 col-md-8">
                            <select class="form-control initial_destination" id="location" name="location" required="required" onchange="SelectLocation()">
                                <option>--Select Location--</option>
                            </select>
                        </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">Destination</label>
                            <div class="col-lg-9 col-md-8">
                            <select class="form-control initial_destination"  required="required" id="destination" name="destination">
                                <option>--Select Destination--</option>
                            </select>
                        </div>
                        </div>
                        <!-- End .form-group  -->
                    </div>
                    <div class="col-md-6">
                        <!-- End .form-group  -->
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">Date Of Travel</label>
                            <div class="col-lg-9 col-md-8">
                                <input type="text" class="form-control date" value="" id="travelday" required="required" readonly name="travelday" placeholder="Date Of Travel">
                            </div>
                        </div>
                        <div class="form-group">
                         <label class="col-lg-3 col-md-4 control-label" for="">Bus Number</label>
                             <div class="col-lg-9 col-md-8">
                                 {!! Form::select('buses',
                                     (['' => 'Select Number'] + $buses),
                                         null,
                                         ['class' => 'form-control','required','id'=>'busesid','onchange'=>'BusesCheck()']) !!}
                          </div>
                        </div>
                        <!-- End .form-group  -->
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">Seat No</label>
                            <div class="col-lg-9 col-md-8">
                                <input type="text" class="form-control" data-toggle="modal" data-target="#Modal" readonly value="" id="seatno" required name="seatno" placeholder="Seat Number" onclick="SeatingPlan()">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">Payment Type</label>
                            <div class="col-lg-9 col-md-8">
                                {!! Form::select('payments',
                                    (['' => 'Select Payment'] + $pays),
                                        null,
                                        ['class' => 'form-control','required','id'=>'pays']) !!}

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">Payment Amount</label>
                            <div class="col-lg-9 col-md-8">
                                <input type="text" class="form-control cost" value="" required="required" name="amount" placeholder="Payment Amount">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-default">Save</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- /.modal -->
    <div class="modal fade" id="Modal" data-backdrop="static"  tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Seating Plan</h4>
                </div>
                <div class="modal-body" id="template">
                </div>
                {{--<div class="modal-footer">--}}
                {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>
@endsection