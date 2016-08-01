@extends('layouts.main')
@section('heading')
    Passengers Lists
@endsection
@section('title')
    Passengers Lists
@stop
@section('second')
    Passengers
@stop
@section('last')
    Passengers Lists
@stop
@section('contents')
    <script type="application/javascript">
        $(document).ready(function(){
            $(".traveldate").datetimepicker({
                format : "Y-m-d"
            });
            document.getElementById('input-name').value = "{{ \Illuminate\Support\Facades\Input::get('ticket') }}";
            document.getElementById('traveldate').value = "{{ \Illuminate\Support\Facades\Input::get('date') }}";
            document.getElementById('buses').value = "{{ \Illuminate\Support\Facades\Input::get('buses') }}";
        });
    </script>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                {{ Form::open(['method'=>'GET']) }}
                <div class="col-sm-2">
                    <div class="form-group">
                        {{--<label class="control-label" for="input-price">Price</label>--}}
                        <input name="ticket" value="" placeholder="Ticket Number" id="input-name" class="form-control" type="text">
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
                        <input name="date" value="" placeholder="Date of Travel" id="traveldate" class="traveldate form-control" type="text">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {{--<label class="control-label" for="input-price">Price</label>--}}
                        <input name="agent" value="" placeholder="Agent" id="input-price" class="form-control" type="text">
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
            <h4 class="panel-title"><i class="fa fa-search"></i>  View Passengers List</h4>
            <div class="panel-controls panel-controls-right">
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-responsive table-strip table-bordered table-condensed" width="100%" style="overflow: visible">
                <thead>
                <tr>
                    <th width="4%">S/N</th>
                    <th>Names</th>
                    <th>Tickets No</th>
                    <th width="6%">Seat No</th>
                    <th>Bus Number</th>
                    {{--<th>Sex</th>--}}
                    <th>Contacts</th>
                    <th>Paid Amount</th>
                    <th>Travel Date</th>
                </tr>
                </thead>
                <tbody>
                {{--*/ $i = 0 /*--}}
                @foreach($passengers as $passenger)
                    {{--*/ $i ++ /*--}}
                    <tr>
                        <td>{{ $i }}</td>
                        <td><a href="#"> {{ $passenger->booking->firstname }} {{ $passenger->booking->lastname }}</a></td>
                        <td><a href="#">{{ $passenger->tickets_number }}</a> </td>
                        <td><a href="#">{{ $passenger->booking->seat_number }}</a></td>
                        <td><a href="#"> {{ $passenger->booking->buses->bus_number }}</a> </td>
                        <td>{{ $passenger->booking->phonenumber }}</td>
                        <td style="text-align: right;">{{ number_format($passenger->booking->amount) }}</td>
                        <td>{{ strftime('%d -%b- %Y',strtotime($passenger->booking->dateoftravel)) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection