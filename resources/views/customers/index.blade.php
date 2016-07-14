@extends('layouts.main')
@section('heading')
    Customer Lists
@endsection
@section('title')
    Customer Lists
@stop
@section('second')
    Customers
@stop
@section('last')
    Customer Lists
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
            <h4 class="panel-title"><i class="fa fa-search"></i>  View Customers List</h4>
            <div class="panel-controls panel-controls-right">
                <button class="btn btn-info mr5 mb10 btn-sm" style="margin-top: 10px" data-toggle="modal" data-target="#myLargeModal" onclick="Moneyformat()"><i class="fa fa-plus"></i> Add</button>

            </div>
        </div>
        <div class="panel-body">
            <table class="table table-responsive table-strip table-bordered" width="100%" style="overflow: visible">
                <thead>
                <tr>
                    <th>S/N</th>
                    <th>Company Name</th>
                    <th>Address</th>
                    <th>Telephone</th>
                    <th>Email</th>
                    <th>No of Buses</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
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
                    <h4 class="modal-title" id="myModalLabel">Customers</h4>
                </div>
                {!! Form::open(array('class'=>'form-horizontal')) !!}
                <div class="modal-body" id="">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">Company Name</label>
                            <div class="col-lg-9 col-md-8">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    {{--</div>--}}
                    <!-- End .form-group  -->
                    <div class="form-group">
                        <label class="col-lg-3 col-md-4 control-label" for="">Address</label>
                        <div class="col-lg-9 col-md-8">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <!-- End .form-group  -->
                    <div class="form-group">
                        <label class="col-lg-3 col-md-4 control-label" for="">Telephone</label>
                        <div class="col-lg-9 col-md-8">
                            <input type="text" class="form-control" value="" name="stock_number" required>
                        </div>
                    </div>
                    <!-- End .form-group  -->
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-lg-3 col-md-4 control-label" for="">Email</label>
                        <div class="col-lg-9 col-md-8">
                        <input type="text" class="form-control">
                        </div>
                    </div>
                    <!-- End .form-group  -->
                    <div class="form-group">
                        <label class="col-lg-3 col-md-4 control-label" for="">Owner's Name</label>
                        <div class="col-lg-9 col-md-8">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <!-- End .form-group  -->
                    <div class="form-group">
                        <label class="col-lg-3 col-md-4 control-label" for="">Owner's Phone</label>
                        <div class="col-lg-9 col-md-8">
                            <input type="text" class="form-control" value="" name="stock_number">
                        </div>
                    </div>
                    <!-- End .form-group  -->
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
@endsection