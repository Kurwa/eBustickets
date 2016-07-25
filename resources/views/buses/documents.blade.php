@extends('layouts.main')
@section('heading')
    Documents Lists
@endsection
@section('title')
    Documents Lists
@stop
@section('second')
    Documents
@stop
@section('last')
    Documents Lists
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
            <h4 class="panel-title"><i class="fa fa-search"></i>  View Documents List</h4>
            <div class="panel-controls panel-controls-right">
                <button class="btn btn-info mr5 mb10 btn-sm" style="margin-top: 10px" data-toggle="modal" data-target="#myLargeModal" onclick="Moneyformat()"><i class="fa fa-plus"></i> Add</button>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-responsive table-strip table-bordered table-condensed" width="100%" style="overflow: visible">
                <thead>
                <tr>
                    <th width="4%">S/N</th>
                    <th>Documents Number</th>
                    <th>Type</th>
                    <th>Model</th>
                    <th>Manufacturer</th>
                    <th>No of Seats</th>
                    <th width="200px">Action</th>
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
                    <h4 class="modal-title" id="myModalLabel">Documents</h4>
                </div>
                {!! Form::open(array('class'=>'form-horizontal', 'files'=>true ,'autocomplete' => 'off')) !!}
                <div class="modal-body" id="">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">Documents Number</label>
                            <div class="col-lg-9 col-md-8">
                                <input type="text" class="form-control" name="bus_number"  value="" placeholder="Documents Number">
                            </div>
                        </div>
                        {{--</div>--}}
                        <!-- End .form-group  -->
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">Model</label>
                            <div class="col-lg-9 col-md-8">
                                <input type="text" class="form-control" name="model" value="" placeholder="Model">
                            </div>
                        </div>
                        <!-- End .form-group  -->
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">Manufacturer</label>
                            <div class="col-lg-9 col-md-8">
                                <input type="text" class="form-control" name="manufacture" value="" placeholder="Manufacturer">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">Country Manufactured</label>
                            <div class="col-lg-9 col-md-8">
                                <input type="text" class="form-control" value="" name="country_manufactured" placeholder="Country Manufactured">
                            </div>
                        </div>
                        <!-- End .form-group  -->
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">Image</label>
                            <div class="col-lg-9 col-md-8">
                                <input type="file" class="form-control" name="image" required>
                            </div>
                        </div>
                        <!-- End .form-group  -->
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">Type</label>
                            <div class="col-lg-9 col-md-8">
                                {{--{!! Form::select('type',--}}
                                    {{--(['' => 'Select Type'] + buses),--}}
                                       {{--null,--}}
                                       {{--['class' => 'form-control','required','id'=>'type']) !!}--}}

                            </div>
                        </div>
                        <!-- End .form-group  -->
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">No Of Seats</label>
                            <div class="col-lg-9 col-md-8">
                                <input type="password" class="form-control" value="" name="noofseats" placeholder="No Of Seats">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">Year Manufactured</label>
                            <div class="col-lg-9 col-md-8">
                                <input type="number" class="form-control" value="" name="year" placeholder="Year Manufactured">
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