@extends('website.main')
@section('main-count')
    <script type="application/javascript">
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
        function SeatingPlan(){
            $.ajax({
                type:"GET",
                url:"{{ url('seating-plan') }}",
                data:{
                    buses : $("#buse_id").val(),
                    date : "{{ \Illuminate\Support\Facades\Input::get('dateoftravel')}}",
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
        function CheckSeating(argument){
            $("#seatno").val(argument);
            $('#Modal').modal('toggle');
        }
        function Seating(argument){
            alert(argument + 'Taken');
        }
    </script>
<div class="main-cont"  style="margin-top: -30px;margin-bottom: 10px;">
    <div class="body-wrapper">
        <div class="wrapper-padding">
            <div class="page-head">
                <div class="page-title">Route :  <span>{{ $route->initial }} to {{ $route->destination }}</span></div>
                <div class="breadcrumbs">
                    Date : {{ strftime("%d -%b- %Y",strtotime($date)) }}
                </div>
                <div class="clear"></div>
                <div class="page-title">Initial Point :  <span>{{ $initial }}</span></div>
                <div class="clear"></div>
                <div class="page-title">Destination Point :  <span style="color: #00005e">{{ $destination }}</span></div>
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
                                            <th class="per15">Fares(Tsh)</th>
                                            <th class="per35">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($buses->count())
                                        @foreach($buses as $bus)
                                            @if($bus->remain > 0)
                                                <tr>
                                                    <td><a href="#">{{ $bus->buses->bus_number }}</a> </td>
                                                    <td><span style="text-align:center">{{ $bus->buses->noofseats }}</span></td>
                                                    <td><span style="text-align:center">{{ $bus->taken }}</span></td>
                                                    <td><span style="text-align:center">{{ $bus->remain }}</span></td>
                                                    <td><span style="text-align:center">{{ number_format($dest_money) }}</span></td>
                                                    <td>
                                                        <div>
                                                            <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#myLargeModal" onclick="Buses({{ $bus->buses->id }})">
                                                                <i class="fa  fa-bus"></i> book</button>
                                                            <a href="{{ url($company->slug.'/'.$bus->buses->id.'/seating-plan?route='.  \Illuminate\Support\Facades\Input::get('routes') .'&dateoftravel='. \Illuminate\Support\Facades\Input::get('dateoftravel')) }}" class="btn btn-info btn-sm">check</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        @else
                                            <tr>
                                                <td colspan="6">
                                                    <span>No Bus Available for the selected Route and Day</span>
                                                </td>
                                            </tr>
                                        @endif
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
<div class="modal fade" id="myLargeModal" data-backdrop="static"  tabindex="-1" role="dialog" aria-hidden="true">
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
                <input type="hidden" name="buses" value="" id="buse_id">
                <input type="hidden" name="travelday" value="{{ $date }}" id="travelday">
                <input type="hidden" name="routes_id" value="{{ $route_id }}" id="routes_id">
                <input type="hidden" name="company" value="{{ $id }}" id="company">

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-lg-3 col-md-4 control-label" for="">First Name</label>
                        <div class="col-lg-9 col-md-8">
                            <input type="text" class="form-control" name="first_name" required value="" placeholder="First Name">
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
                            <input type="text" class="form-control" required name="phone_number" value="" placeholder="Phone Number">
                        </div>
                    </div>
                    <input type="hidden" value="{{ $route_id }}" id="data">
                    <input type="hidden" name="location" value="{{ \Illuminate\Support\Facades\Input::get('location') }}">
                    <input type="hidden" name="destination" value="{{ \Illuminate\Support\Facades\Input::get('destination') }}">
                </div>
                <div class="col-md-6">
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
                            <input type="text" class="form-control cost" value="{{ number_format($dest_money) }}" required="required" name="amount" placeholder="Payment Amount">
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
    <!-- Lare Modal -->
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
    <!-- /.modal -->
@stop