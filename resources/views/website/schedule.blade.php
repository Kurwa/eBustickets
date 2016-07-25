@extends('website.main')
@section('main-count')
    <script type="application/javascript">
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
        $('.cost').keyup(function (event) {
            // skip for arrow keys
            if (event.which >= 37 && event.which <= 40) return;
            // format number
            $(this).val(function (index, value) {
                return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            });
          });
        });
        function Buses(argument){
            $("#buse_id").val(argument);
        }
    </script>
<div class="main-cont">
    <div class="body-wrapper">
        <div class="wrapper-padding">
            <div class="page-head">
                <div class="page-title">Route :  <span>{{ $route->initial }} to {{ $route->destination }}</span></div>
                <div class="breadcrumbs">
                    Date : {{ strftime("%d -%b- %Y",strtotime($date)) }}
                </div>
                <div class="clear"></div>
            </div>
                        <div class="sp-page-lb">
                            <div class="sp-page-p">
                                <div class="booking-left">
                                    {{--<h2>Booking Complete</h2>--}}
                                    <table class="table table-bordered table-condensed">
                                        <thead>
                                        <tr>
                                            <th class="per5">Bus Number</th>
                                            <th class="per35">Total Seats</th>
                                            <th class="per15">Seats Taken</th>
                                            <th class="per15">Seats Available</th>
                                            <th class="per35">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($buses as $bus)
                                        <tr>
                                            <td><a href="#">{{ $bus->bus_number }}</a> </td>
                                            <td><span style="text-align:center">{{ $bus->noofseats }}</span></td>
                                            <td><span style="text-align:center">29</span></td>
                                            <td><span style="text-align:center">31</span></td>
                                            <td>
                                                <div>
                                                    <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#myLargeModal" onclick="Buses({{ $bus->id }})">book</button>
                                                    <button class="btn btn-info btn-sm">check</button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
            <div class="clear"></div>
            {{--<div class="clear"></div>--}}
            {{--</div>--}}

        </div>
    </div>

</div>
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
                <input type="hidden" name="buse" value="" id="buse_id">
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
                    <input type="hidden" value="{{ $route_id }}" id="data">
                    <div class="form-group">
                        <label class="col-lg-3 col-md-4 control-label" for="">Location</label>
                        <div class="col-lg-9 col-md-8">
                            <select class="form-control initial_destination" id="location" name="location" required="required" onchange="SelectLocation()">
                                <option>--Select Location--</option>
                                @foreach($routs as $route)
                                    <option value="{{ $route->id }}">{{ $route->name }}</option>
                                @endforeach
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
                        <label class="col-lg-3 col-md-4 control-label" for="">Seat No</label>
                        <div class="col-lg-9 col-md-8">
                            <input type="text" class="form-control"  required="required" name="seatno" placeholder="Seat Number">
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

@stop