@extends('layouts.main')
@section('heading')
    Tickets Lists
@endsection
@section('title')
    Tickets Lists
@stop
@section('second')
    Tickets
@stop
@section('last')
    Tickets Lists
@stop
@section('contents')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                {{ Form::open(['method'=>'GET']) }}
                <div class="col-sm-3">
                    <div class="form-group">
                        {{--<label class="control-label" for="input-price">Price</label>--}}
                        <input name="name" value="" placeholder="Name" id="input-price" class="form-control" type="text">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        {{--<label class="control-label" for="input-price">Price</label>--}}
                        <input name="busnumber" value="" placeholder="Seat or Bus Number" id="date" class="form-control" type="text">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        {{--<label class="control-label" for="input-price">Price</label>--}}
                        <input name="date" value="" placeholder="Date of Travel" id="input-price" class="form-control" type="text">
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
            <h4 class="panel-title"><i class="fa fa-search"></i>  View Tickets List</h4>
            <div class="panel-controls panel-controls-right">
                {{--<button class="btn btn-info mr5 mb10 btn-sm" style="margin-top: 10px"--}}
                        {{--data-toggle="modal" data-target="#myLargeModal" onclick="Moneyformat()">--}}
                    {{--<i class="fa fa-plus"></i> Add</button>--}}
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-responsive table-strip table-bordered table-condensed" width="100%" style="overflow: visible">
                <thead>
                <tr>
                    <th width="4%">S/N</th>
                    <th>Names</th>
                    <th>Tickets No</th>
                    <th>Seat No</th>
                    <th>Bus Number</th>
                    {{--<th>Sex</th>--}}
                    <th>Contacts</th>
                    {{--<th>Email</th>--}}
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                {{--*/ $i = 0 /*--}}
                @foreach($tickets as $ticket)
                    {{--*/ $i ++ /*--}}
                    <tr>
                        <td>{{ $i }}</td>
                        <td><a href="#"> {{ $ticket->firstname }}{{ $ticket->lastname }}</a></td>
                        <td><a href="#">{{ $ticket->ticket }}</a> </td>
                        <td><a href="#">{{ $ticket->seat_number }}</a></td>
                        <td><a href="#"> {{ $ticket->buses->bus_number }}</a> </td>
                        <td>{{ $ticket->phonenumber }}</td>
                        <td>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection