@extends('layouts.main')
@section('heading')
    Route Lists
@endsection
@section('title')
    Route Lists
@stop
@section('second')
    Routes
@stop
@section('last')
    Route Lists
@stop
@section('contents')
    <div id="dyn_7" class="panel panel-lime plain">
        <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-search"></i>  View Routes List</h4>
            <div class="panel-controls panel-controls-right">
                <button class="btn btn-info mr5 mb10 btn-sm" style="margin-top: 10px" data-toggle="modal" data-target="#myLargeModal" onclick="Moneyformat()"><i class="fa fa-plus"></i> Add</button>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-responsive table-strip table-bordered" width="100%" style="overflow: visible">
                <thead>
                <tr>
                    <th>S/N</th>
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
                        <td><a href="#">{{ $route->initial }} - {{ $route->destination }}</a> </td>
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
    <div class="modal fade" id="myLargeModal" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Routes</h4>
                </div>
                {!! Form::open(array('class'=>'form-horizontal')) !!}
                <div class="modal-body" id="">
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">Route From</label>
                            <div class="col-lg-9 col-md-8">
                                <input type="text" class="form-control" placeholder="Route Start" name="initial" required>
                            </div>
                        </div>
                        <div id="admit_docs_tbl"></div>
                        <!-- End .form-group  -->
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">Route Destination</label>
                            <div class="col-sm-6 col-md-6">
                                <input type="text" class="form-control" style="font-family: 'DejaVu Sans Mono'" placeholder="Route Destination" name="destination" required>
                            </div>
                            <div class="col-sm-3 col-md-3">
                                <input type="text" class="form-control cost" style="font-family: 'DejaVu Sans Mono'" placeholder="Fares" name="destination_fare" required >
                            </div>
                        </div>
                        <!-- End .form-group  -->
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">Status</label>
                            <div class="col-lg-2 col-md-2">
                                <input type="checkbox" class="form-control" value="1" name="status">
                            </div>
                            <a id="recopy-add" class="add glyphicon glyphicon-plus-sign text-success" href="#" rel=".test" style="font-size:24px;text-decoration: none"></a>
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
    <div style="display: none" >
        <div id="amended">
            <div class="form-group">
                <label class="col-lg-3 col-md-4 control-label" for="">Route Points</label>
                <div class="col-sm-5 col-md-5">
                    <input type="text" class="form-control" style="font-family: 'DejaVu Sans Mono'" placeholder="Route Points" name="points[]" required>
                </div>
                <div class="col-sm-3 col-md-3">
                    <input type="text" class="form-control cost" style="font-family: 'DejaVu Sans Mono'" placeholder="Fares" name="fares[]" required >
                </div>
                <div class="col-sm-1">
                    <a class="fa fa-minus-circle fa-2x" href="#" style="text-decoration: none" onclick="$(this).parent().parent().remove(); return false;"></a>
                </div>
            </div>
       </div>
    </div>
    <!-- /.modal -->
    <script type="application/javascript">
        function message(){
            $(document).ready(function(){
                $('.cost').keyup(function (event) {
                    // skip for arrow keys
                    if (event.which >= 37 && event.which <= 40) return;
                    // format number
                    $(this).val(function (index, value) {
                        return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    });
                });
            });
        }
        $("#recopy-add").on('click',function(){
            var response = $('#amended').html();
            $('#admit_docs_tbl').append(response).slideDown('slow');
            message();
        });
    </script>
@endsection