@extends('layouts.main')
@section('heading')
    Bus Seating Plan
@endsection
@section('title')
    Bus Seating Plan
@stop
@section('second')
    Tickets
@stop
@section('last')
    Bus Seating Plan
@stop
@section('contents')
    <script type="application/javascript">
        function CheckSeating(argument){
            alert(argument);
        }
        $(document).ready(function() {
            document.getElementById('buses').value = "{{ \Illuminate\Support\Facades\Input::get('buses') }}";
        });
        $(document).ready(function(){
            $("#buses").change(function(){
                $.ajax({
                    type:"GET",
                    url:"{{ url('tickets/template_view') }}",
                    data:{
                        buses : $('#buses').val(),
                    },
                    success:function(response){
                        if(response){
                            $("#template").html(response);
                        }
                        else{
                            $("#template").html();
                        }
                    }
                });
            });
        })

    </script>
    <div id="dyn_7" class="panel panel-lime plain">
        <div class="panel-body">
        <div class="row">
            <div class="col-sm-12 ">
                {{--<form class="form-holizontal">--}}
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">Bus Number</label>
                            <div class="col-lg-9 col-md-8">
                                {!! Form::select('buses',
                                    (['' => 'Select Number'] + $buses),
                                        null,
                                        ['class' => 'form-control','required','id'=>'buses']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                        <label class="col-lg-3 col-md-4 control-label" for=""></label>
                        <div class="col-lg-9 col-md-8">
                            <button class="btn btn-info"><i class="fa fa-eye"></i> Check</button>
                            <button class="btn btn-info" data-toggle="modal" data-target="#myLargeModal" onclick="Moneyformat()"><i class="fa fa-plus"></i> Add</button>
                        </div>
                     </div>
                </div>
                {{--</form>--}}
            </div>
        </div>
            <hr>
            <br />
        <div class="row" id="template">
        </div>
        </div>
    </div>
@endsection