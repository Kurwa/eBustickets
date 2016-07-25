@extends('layouts.main')
@section('heading')
    User Lists
@endsection
@section('title')
    User Lists
@stop
@section('second')
    Users
@stop
@section('last')
    User Lists
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
            <h4 class="panel-title"><i class="fa fa-search"></i>  View Users List</h4>
            <div class="panel-controls panel-controls-right">
                <button class="btn btn-info mr5 mb10 btn-sm" style="margin-top: 10px" data-toggle="modal" data-target="#myLargeModal" onclick="Moneyformat()"><i class="fa fa-plus"></i> Add</button>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-responsive table-strip table-bordered table-condensed" width="100%" style="overflow: visible">
                <thead>
                <tr>
                    <th width="4%">S/N</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>User Name</th>
                    <th>Role</th>
                    <th>Company</th>
                    <th>Last Login</th>
                    <th>Status</th>
                    <th width="200px">Action</th>
                </tr>
                </thead>
                <tbody>
                {{--*/ $i = 0/*--}}
                @foreach($users as $user)
                    {{--*/ $i++ /*--}}
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_login }}</td>
                        <td>{{ $user->status }}</td>
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
                    <h4 class="modal-title" id="myModalLabel">Users</h4>
                </div>
                {!! Form::open(array('class'=>'form-horizontal')) !!}
                <div class="modal-body" id="">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">First Name</label>
                            <div class="col-lg-9 col-md-8">
                                <input type="text" class="form-control" name="firstname" placeholder="First Name">
                            </div>
                        </div>
                        {{--</div>--}}
                        <!-- End .form-group  -->
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">Email</label>
                            <div class="col-lg-9 col-md-8">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>
                        </div>
                        <!-- End .form-group  -->
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">Role</label>
                            <div class="col-lg-9 col-md-8">
                                {!! Form::select('role',
                                     (['' => 'Select Role'] + $roles),
                                         null,
                                         ['class' => 'form-control','required','id'=>'role']) !!}
                            </div>
                        </div>
                        <!-- End .form-group  -->
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">Last Name</label>
                            <div class="col-lg-9 col-md-8">
                                <input type="text" class="form-control" value="" name="lastname" placeholder="Last Name">
                            </div>
                        </div>
                        <!-- End .form-group  -->
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">User Name</label>
                            <div class="col-lg-9 col-md-8">
                                <input type="text" class="form-control" value="" name="username" required placeholder="User Name">
                            </div>
                        </div>
                        <!-- End .form-group  -->
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">Password</label>
                            <div class="col-lg-9 col-md-8">
                                <input type="password" class="form-control" value="" required name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">Company</label>
                            <div class="col-lg-9 col-md-8">
                                {!! Form::select('company',
                                     (['' => 'Select Company'] + $company),
                                         null,
                                         ['class' => 'form-control','required','id'=>'company']) !!}
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