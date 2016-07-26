@extends('layouts.main')
@section('heading')
    Route Assigning
@endsection
@section('title')
    Route Assign
@stop
@section('second')
    Routes
@stop
@section('last')
    Route Assign
@stop
@section('contents')
    <div id="dyn_7" class="panel panel-lime plain">
        <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-search"></i>  View Routes Assigning</h4>
            <div class="panel-controls panel-controls-right">
                <button class="btn btn-info mr5 mb10 btn-sm" style="margin-top: 10px" data-toggle="modal" data-target="#myLargeModal" onclick="Moneyformat()"><i class="fa fa-plus"></i> Add</button>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-responsive table-strip table-bordered table-condensed" width="100%" style="overflow: visible">
                <thead>
                <tr>
                    <th>S/N</th>
                    <th>Bus</th>
                    <th>Routes</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                {{--*/ $i = 0/*--}}
                @foreach($routes as $route)
                    {{--*/ $i++/*--}}
                    <tr>
                        <td width="4%">{{ $i }}</td>
                        <td><a href="#">{{ $route->buses->bus_number }}</a></td>
                        <td width=""><a href="#"> {{ $route->routes->initial }} - {{ $route->routes->destination }}</a></td>
                        <td>
                            @if($route->status == 1)
                                <span class="badge badge-default mr10 mb10">Active</span>
                            @else
                                <span class="badge badge-danger mr10 mb10">Not Active</span>
                            @endif
                        </td>
                        <td>{{ $route->created_at }}</td>
                        <td>{{ $route->updated_at }}</td>
                        <td width="200px">
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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Routes Assigning</h4>
                </div>
                {!! Form::open(array('class'=>'form-horizontal')) !!}
                <div class="modal-body" id="">
                    <div class="form-group">
                        <label class="col-lg-3 col-md-4 control-label" for="">Bus Number</label>
                        <div class="col-lg-9 col-md-8">
                            {!! Form::select('buses',
                                (['' => 'Select Bus'] + $bus),
                                   null,
                                   ['class' => 'form-control','required','id'=>'bus']) !!}
                        </div>
                    </div>
                    <!-- End .form-group  -->
                    <div class="form-group">
                        <label class="col-lg-3 col-md-4 control-label" for="">Route </label>
                        <div class="col-lg-9 col-md-8">
                            <select name="routes" required class="form-control">
                                <option value="" selected > -Select Route- </option>
                                @foreach($rout as $route)
                                  <option value="{{ $route->id }}"> {{ $route->initial }} - {{ $route->destination }}</option>
                                @endforeach
                            </select>
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
@endsection