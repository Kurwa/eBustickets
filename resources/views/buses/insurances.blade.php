@extends('layouts.main')
@section('heading')
    Insurance Lists
@endsection
@section('title')
    Insurance Lists
@stop
@section('second')
    Insurance
@stop
@section('last')
    Insurance Lists
@stop
@section('contents')
    <div id="dyn_7" class="panel panel-lime plain">
        <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-search"></i>  View Insurance List</h4>
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
                    <th>Particular </th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Remaining</th>
                    <th>Cost</th>
                    <th>Descriptions</th>
                    <th width="200px">Action</th>
                </tr>
                </thead>
                <tbody>
                {{--*/ $i = 0/*--}}
                @foreach($insurances as $insurance)
                    {{--*/ $i++ /*--}}
                    <tr>
                        <td>1</td>
                        <td><a href="#"> {{ $insurance->buses->bus_number }}</a></td>
                        <td><a href="#"> {{ $insurance->insurance->name }}</a></td>
                        <td>{{ strftime("%d -%b- %Y", strtotime($insurance->start_date)) }}</td>
                        <td>{{ strftime("%d -%b- %Y", strtotime($insurance->end_date)) }}</td>
                        <td></td>
                        <td style="text-align: right;">{{ number_format($insurance->cost) }}</td>
                        <td></td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-xs btn-info"><i class="fa fa-pencil"></i> edit</button>
                                <button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> delete</button>
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
                    <h4 class="modal-title" id="myModalLabel">New Insurance</h4>
                </div>
                {!! Form::open(array('class'=>'form-horizontal group-border stripped', 'files'=>true ,'autocomplete' => 'off')) !!}
                <div class="modal-body" id="">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="col-lg-4 col-md-3 control-label" for="">Bus Number</label>
                            <div class="col-lg-8 col-md-9">
                                {!! Form::select('buses',
                                     (['' => 'Select Bus Number'] + $buses),
                                         null,
                                         ['class' => 'form-control','required','id'=>'buses']) !!}
                            </div>
                        </div>
                            <div class="form-group">
                                <label class="col-lg-4 col-md-3 control-label" for="">Permit Type</label>
                                <div class="col-lg-8 col-md-9">
                                    {!! Form::select('particular',
                                         (['' => 'Select Type'] + $particular),
                                             null,
                                             ['class' => 'form-control','required','id'=>'particular']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 col-md-3 control-label" for="">Starting Date</label>
                                <div class="col-lg-8 col-md-9">
                                    <input class="form-control date" required value="" name="start" id="start" placeholder="Starting Date">
                                </div>
                            </div>
                        <div class="form-group">
                            <label class="col-lg-4 col-md-3 control-label" for="">Expiring Date</label>
                            <div class="col-lg-8 col-md-9">
                                <input class="form-control date" required value="" name="expire" id="expire" placeholder="Expiring  Date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 col-md-3 control-label" for="">Insurance Cost</label>
                            <div class="col-lg-8 col-md-9">
                                <input class="form-control cost" required value="" name="cost" placeholder="Insurance Cost">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 col-md-3 control-label" for="">Descriptions</label>
                            <div class="col-lg-8 col-md-9">
                                <textarea class="form-control" cols="1" name="descriptions" placeholder="Descriptions"></textarea>
                            </div>
                        </div>
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
    <script type="application/javascript">
        $('.cost').keyup(function (event) {
            // skip for arrow keys
            if (event.which >= 37 && event.which <= 40) return;
            // format number
            $(this).val(function (index, value) {
                return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            });
        });

        $("#start").datepicker({
            dateFormat: "yy-mm-dd",
            onSelect: function (date) {
                var date2 = $('#start').datepicker('getDate');
                date2.setDate(date2.getDate() + 1);
                $('#expire').datepicker('setDate', date2);
                $('#expire').datepicker('option', 'minDate', date2);
            }
        });
        $('#expire').datepicker({
            dateFormat: "yy-mm-dd",
            onClose: function () {
                var dt1 = $('#start').datepicker('getDate');
                console.log(dt1);
                var dt2 = $('#expire').datepicker('getDate');
                if (dt2 <= dt1) {
                    var minDate = $('#expire').datepicker('option', 'minDate');
                    $('#expire').datepicker('setDate', minDate);
                }
            }
        });
    </script>
@endsection