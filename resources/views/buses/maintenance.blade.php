@extends('layouts.main')
@section('heading')
    Maintenance Lists
@endsection
@section('title')
    Maintenance Lists
@stop
@section('second')
    Maintenance
@stop
@section('last')
    Maintenance Lists
@stop
@section('contents')
    <style type="text/css">
        .panel{
            /*min-height: 400px !important;*/
            overflow: visible !important;
        }
    </style>
    <div id="dyn_7" class="panel panel-lime plain">
        <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-search"></i>  View Maintenance List</h4>
            <div class="panel-controls panel-controls-right">
                <button class="btn btn-info mr5 mb10 btn-sm" style="margin-top: 10px" data-toggle="modal" data-target="#myLargeModal" onclick="Moneyformat()"><i class="fa fa-plus"></i> Add</button>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-responsive table-strip table-bordered table-condensed" width="100%" style="overflow: visible">
                <thead>
                <tr>
                    <th width="4%">S/N</th>
                    <th>Bus Number</th>
                    <th>Inspection Date</th>
                    <th>Maintenance Date</th>
                    <th>Inspector</th>
                    <th>Status</th>
                    <th width="200px">Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection