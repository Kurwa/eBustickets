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
                {{--*/ $i = 0/*--}}
                @foreach($companies as $company)
                    {{--*/ $i++/*--}}
                    <tr>
                        <td>{{ $i }}</td>
                        <td><a href="#">{{ $company->name }}</a> </td>
                        <td>{{ $company->address }}</td>
                        <td>{{ $company->telephone }}</td>
                        <td>{{ $company->email }}</td>
                        <td></td>
                        <td></td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-default btn-xs"><i class="fa fa-eye"></i> view</button>
                                <button class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit</button>
                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Edit</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
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
                {!! Form::open(array('class'=>'form-horizontal','autocomplete'=>'OFF')) !!}
                <div class="modal-body" id="">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">Company Name</label>
                            <div class="col-lg-9 col-md-8">
                                <input type="text" class="form-control" name="name" placeholder="Company Name">
                            </div>
                        </div>
                    {{--</div>--}}
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">Slug</label>
                            <div class="col-lg-9 col-md-8">
                                <input type="text" class="form-control" placeholder="Slug" name="slug">
                            </div>
                        </div>
                    <!-- End .form-group  -->
                    <div class="form-group">
                        <label class="col-lg-3 col-md-4 control-label" for="">Address</label>
                        <div class="col-lg-9 col-md-8">
                            <input type="text" class="form-control" placeholder="Address" name="address">
                        </div>
                    </div>
                    <!-- End .form-group  -->
                    <div class="form-group">
                        <label class="col-lg-3 col-md-4 control-label" for="">Telephone</label>
                        <div class="col-lg-9 col-md-8">
                            <input type="text" class="form-control" value="" name="telephone"  required placeholder="Telephone">
                        </div>
                    </div>
                    <!-- End .form-group  -->
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-lg-3 col-md-4 control-label" for="">Email</label>
                        <div class="col-lg-9 col-md-8">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                    </div>
                    <!-- End .form-group  -->
                    <div class="form-group">
                        <label class="col-lg-3 col-md-4 control-label" for="">Owner's Name</label>
                        <div class="col-lg-9 col-md-8">
                            <input type="text" class="form-control" placeholder="Owner's Name" name="ownername">
                        </div>
                    </div>
                    <!-- End .form-group  -->
                    <div class="form-group">
                        <label class="col-lg-3 col-md-4 control-label" for="">Owner's Phone</label>
                        <div class="col-lg-9 col-md-8">
                            <input type="text" class="form-control" value="" name="ownerphone" placeholder="Owner's Phone">
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