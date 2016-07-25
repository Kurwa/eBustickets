@extends('layouts.main')
@section('heading')
    Permission Denied !
@endsection
@section('title')
    Permission
@stop
@section('second')
    Permission
@stop
@section('last')
    Permission denial !!
@stop
@section('contents')
    <div class="row">
        <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">Permission Denied !</h4>
                <div class="panel-controls panel-controls-right"><a href="#" class="panel-refresh"><i class="fa fa-circle-o"></i></a><a href="#" class="toggle panel-minimize"><i class="fa fa-angle-up"></i></a><a href="#" class="panel-close"><i class="fa fa-times"></i></a></div></div>
            <div class="panel-body pb0">
                <div class="bs-callout bs-callout-info mt0" style="text-align:center">
                    <p>You do not have permission to access this page, please refer to your system administrator.</p>
                </div>
            </div>
        </div>
        </div>
    </div>
@stop
