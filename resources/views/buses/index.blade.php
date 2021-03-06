@extends('layouts.main')
@section('heading')
    Bus Lists
@endsection
@section('title')
    Bus Lists
@stop
@section('second')
    Bus
@stop
@section('last')
    Bus Lists
@stop
@section('contents')
    <div id="dyn_7" class="panel panel-lime plain">
        <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-search"></i>  View Bus List</h4>
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
                    <th>Type</th>
                    <th>Model</th>
                    <th>Manufacturer</th>
                    <th>No of Seats</th>
                    <th width="200px">Action</th>
                </tr>
                </thead>
                <tbody>
                {{--*/ $i = 0/*--}}
                @foreach($buses as $bus)
                    {{--*/ $i++ /*--}}
                    <tr>
                        <td>{{ $i }}</td>
                        <td><a href="{{ url('buses/'.$bus->id.'/bus-profile') }}">{{ $bus->bus_number }}</a> </td>
                        <td>{{ $bus->type->name }}</td>
                        <td>{{ $bus->model }}</td>
                        <td>{{ $bus->manufacture }}</td>
                        <td>{{ $bus->noofseats }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ url('buses/'.$bus->id.'/bus-profile') }}"  class="btn btn-default btn-xs"><i class="fa fa-eye"></i> view</a>
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
                    <h4 class="modal-title" id="myModalLabel">New Bus Registration</h4>
                </div>
                {!! Form::open(array('class'=>'form-horizontal', 'files'=>true ,'autocomplete' => 'off')) !!}
                <div class="modal-body" id="">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">Bus Number</label>
                            <div class="col-lg-9 col-md-8">
                                <input type="text" class="form-control" name="bus_number"  value="" required placeholder="Bus Number"  style="text-transform: uppercase"
                                       maxlength="12">
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
                                {!! Form::select('type',
                                    (['' => 'Select Type'] + $types),
                                       null,
                                       ['class' => 'form-control','required','id'=>'type']) !!}

                            </div>
                        </div>
                        <!-- End .form-group  -->
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">No Of Seats</label>
                            <div class="col-lg-9 col-md-8">
                                <input type="text" class="form-control" value="" name="noofseats" placeholder="No Of Seats">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">Year Manufactured</label>
                            <div class="col-lg-9 col-md-8">
                                <input type="number" class="form-control" value="" name="year" placeholder="Year Manufactured" maxlength="4">
                            </div>
                        </div>
                        <!-- End .form-group  -->
                    </div>
                    <hr>
                    <span class="" style="text-align: center;font-weight: bold">Additional Information</span>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                            <label for="" class="col-sm-8 control-label">First Row Letter</label>
                            <div class="col-sm-4">
                                <input class="form-control" name="firstletter" style="text-transform: capitalize" required placeholder="A" type="text" maxlength="1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-8 control-label">Last Row Letter</label>
                            <div class="col-sm-4">
                                <input class="form-control" name="lastletter" style="text-transform: capitalize" required placeholder="Z" type="text"  maxlength="1">
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-4" style="float: left">
                            <div class="form-group">
                            <label for="" class="col-sm-8 control-label">Left Seat Column</label>
                            <div class="col-sm-4">
                                <input class="form-control" name="leftseatrow" required placeholder="2" type="number" maxlength="1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-8 control-label">Right Seat Column</label>
                            <div class="col-sm-4">
                                <input class="form-control" name="rightseatrow" required placeholder="3" type="number" maxlength="1">
                            </div>
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
@endsection