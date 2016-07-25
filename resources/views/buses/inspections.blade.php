@extends('layouts.main')
@section('heading')
    Inspection Lists
@endsection
@section('title')
    Inspection Lists
@stop
@section('second')
    Inspection
@stop
@section('last')
    Inspection Lists
@stop
@section('contents')
    <script type="application/javascript">
        $(document).ready(function () {
            $('#processorders').click(function() {
                var checked = $('input[name="checkbox[]"]:checked').length > 0;
                if(!checked) {
                    alert("You must check at least one checkbox.");
                    return false;
                }
            });
//        });
//        $(document).ready(function(){
            $(".date").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "yy-mm-dd",
            });
        });

    </script>
    <div id="dyn_7" class="panel panel-lime plain">
        <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-search"></i>  View Inspection List</h4>
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
                    <th>Inspections Part</th>
                    <th>Inspections Date</th>
                    <th width="200px">Action</th>
                </tr>
                </thead>
                <tbody>
                {{--*/ $i = 0/*--}}
                @foreach($inspections as $inspection)
                    {{--*/ $i++/*--}}
                    <tr>
                        <td>{{ $i }}</td>
                        <td><a href="#">{{ $inspection->buses->bus_number }}</a></td>
                        <td><a href="#">{{ $inspection->inspection[0]->parts->name }}</a></td>
                        <td>{{ strftime("%d -%b- %Y", strtotime($inspection->inspectionsdate)) }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="#" class="btn btn-info btn-xs"><i class="fa fa-print"></i> Job card </a>
                                <a href="#" class="btn btn-default btn-xs"><i class="fa fa-print"></i> View </a>
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
                    <h4 class="modal-title" id="myModalLabel">New Inspection</h4>
                </div>
                {!! Form::open(array('class'=>'form-horizontal group-border stripped', 'files'=>true ,'autocomplete' => 'off')) !!}
                <div class="modal-body" id="">
                    <div class="col-lg-12">
                        <div class="form-group">
                        <div class="col-sm-4">
                                <label class="col-lg-2 col-md-3 control-label" for="">Bus Number</label>
                                <div class="col-lg-10 col-md-9">
                                    {!! Form::select('buses',
                                         (['' => 'Select Number'] + $buses),
                                             null,
                                             ['class' => 'form-control','required','id'=>'type']) !!}
                                </div>
                            </div>
                            <div class="col-sm-2"></div>
                            <div class="col-sm-6">
                                <label class="col-lg-4 col-md-3 control-label" for="">Inspection Date</label>
                                <div class="col-lg-8 col-md-9">
                                    <input class="form-control date" value="" name="date" placeholder="Inspection Date">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12 col-md-9">
                                <div class="row">
                                    <div class="col-sm-1" style="font-weight: bold"></div>
                                    <div class="col-sm-3" style="font-weight: bold">Bus Part</div>
                                    <div class="col-sm-4" style="font-weight: bold">Inspector</div>
                                    <div class="col-sm-4" style="font-weight: bold">Remarks</div>
                                </div>
                                <!-- End .row -->
                            </div>
                        </div>
                        @foreach($parts as $part)
                        <div class="form-group">
                            <div class="col-lg-12 col-md-9">
                                <div class="row">
                                    <div class="col-sm-1">
                                        <input type="checkbox" class="form-control" value="{{ $part->id }}" name="checkbox[]">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" value="{{ $part->name }}" readonly placeholder="Inspector">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="" placeholder="Inspector" name="inspector[]">
                                    </div>
                                    <div class="col-sm-4">
                                        <textarea rows="1" class="form-control" placeholder="Remarks" name="remarks[]"></textarea>
                                    </div>
                                </div>
                                <!-- End .row -->
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="processorders" class="btn btn-default" >Save</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- /.modal -->

@endsection