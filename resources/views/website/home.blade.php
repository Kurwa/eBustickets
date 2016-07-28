@extends('website.main')
@section('main-count')
    <script type="application/javascript">
        $(document).ready(function() {
            $('#datetimepicke').datetimepicker({
                format: 'Y-m-d H:i',
                minDate: "+1970/01/01",
                allowTimes: ['8:00']
            });
            $("#routes").change(function(){
                $("#data").val($('#routes').val()); //
                $.ajax({
                    type:"GET",
                    url:"{{ url('routes-taking') }}",
                    data:{
                        routes_id : $('#routes').val(),
                    },
                    success:function(response){
                        $(".initial_destination").html(response);
                    }
                });
            });
        });

        function SelectLocation() {
            $.ajax({
                url:"{{ url('routes-location') }}",
                data: {
                    data : $('#data').val(),
                    location : $('#location').val()
                },
                type: "GET",
                success:function(data){
                    $("#destination").html(data);
                }
            });
        }
       </script>
    <div class="main-cont">
        <div class="">
            <div class="wrapper-a-holder full-width-search">
                <div class="wrapper-a">
                    <!-- // search // -->
                    <div class="page-search full-width-search search-type-b">
                        <div class="search-type-padding">
                            <nav class="page-search-tabs">
                                <div class="search-tab active">Hotels</div>
                                <div class="search-tab">Tours</div>
                                <div class="search-tab nth">Tickets</div>
                            </nav>
                        </div>
                    </div>
                    <!-- \\ search \\ -->

                    <div class="clear"></div>
                </div>
            </div>
            <div class="mp-pop">
                <div class="wrapper-padding-a">
                    <div class="mp-popular popular-destinations">
                        <header class="fly-in" style="margin-top: -40px;">
                            <b>Our Popular Destinations</b>
                            {{--<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p>--}}
                        </header>

                        <div class="fly-in mp-popular-row" style="margin-top: -35px">
                            <!-- // -->
                            <div class="offer-slider-i">
                                <a class="offer-slider-img" href="#">
                                    <img alt="" src="{{ asset('assets/img/bukoba.jpg') }}" height="230"/>
								<span class="offer-slider-overlay">
									<span class="offer-slider-btn">view details</span>
								</span>
                                </a>
                                <div class="offer-slider-txt">
                                    <div class="offer-slider-link"><a href="#">Bukoba, Tanzania</a></div>
                                    <div class="offer-slider-l">
                                        <div class="offer-slider-location">Every Monday</div>
                                    </div>
                                    <div class="offer-slider-r align-right">
                                        {{--<b>450$</b>--}}
                                        {{--<span>price</span>--}}
                                    </div>
                                    {{--<div class="offer-slider-devider"></div>--}}
                                    {{--<div class="clear"></div>--}}
                                </div>
                            </div>
                            <div class="offer-slider-i">
                                <a class="offer-slider-img" href="#">
                                    <img alt="" src="{{ asset('assets/img/dar.jpg') }}" height="230"/>
                                    {{--<span class="offer-slider-overlay">--}}
                                    {{--<span class="offer-slider-btn">view details</span>--}}
                                    {{--</span>--}}
                                </a>
                                <div class="offer-slider-txt">
                                    <div class="offer-slider-link"><a href="#">Dar es Salaam, Tanzania</a></div>
                                    <div class="offer-slider-l">
                                        <div class="offer-slider-location">Every Friday</div>
                                    </div>
                                    <div class="offer-slider-r align-right">
                                        {{--<b>450$</b>--}}
                                        {{--<span>price</span>--}}
                                    </div>
                                    {{--<div class="offer-slider-devider"></div>--}}
                                    {{--<div class="clear"></div>--}}
                                </div>
                            </div>
                            <div class="offer-slider-i">
                                <a class="offer-slider-img" href="#">
                                    <img alt="" src="{{ asset('assets/img/mwanza.jpg') }}" height="230"/>
								<span class="offer-slider-overlay">
									<span class="offer-slider-btn">view details</span>
								</span>
                                </a>
                                <div class="offer-slider-txt">
                                    <div class="offer-slider-link"><a href="#">Mwanza, Tanzania</a></div>
                                    <div class="offer-slider-l">
                                        <div class="offer-slider-location">Every Wednesday</div>
                                    </div>
                                    <div class="offer-slider-r align-right">
                                        {{--<b>450$</b>--}}
                                        {{--<span>price</span>--}}
                                    </div>
                                    {{--<div class="offer-slider-devider"></div>--}}
                                    {{--<div class="clear"></div>--}}
                                </div>
                            </div>
                            <!-- \\ -->
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="testimonials" style="margin-top: -10px">
                <div class="testimonials-lbl fly-in">what our client say</div>
                {{--<div class="testimonials-lbl-a fly-in">--}}
                    {{--Nemo enim ipsam voluptatem quia voluptas sit--}}
                    {{--aspernatur aut odit aut fugit.</div>--}}

                <div class="testimonials-holder fly-in">
                    <div id="testimonials-slider">
                        <div class="testimonials-i">
                            <div class="testimonials-b">"Qerspeciatis unde omnis iste natus doxes sit voluptatem accusantium doloremque laudantium, totam aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto"</div>
                            <div class="testimonials-d">Albert Dowson, Company Director</div>
                        </div>
                        <!-- \\ -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">Search Tickets</h4>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12">
                        {{--<form class="form-horizontal">--}}
                        {!! Form::open(['class'=>'form-vertical','method'=>'GET']) !!}
                        <div id="dyn_3" class="panel">
                            <div class="panel-body">
                                <div class="">
                                        <div class="form-group">
                                            <div class="col-sm-5">
                                                <select class="form-control"  required="required" name="routes" id="routes">
                                                    <option value="" selected>Select Route</option>
                                                    @foreach($routes as $route)
                                                        <option value="{{ $route->id }}">{{ $route->initial }} to {{ $route->destination }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                                <div class="form-group">
                                                    <input class="form-control date-inpt" id="datetimepicker" required name="dateoftravel" placeholder="Travel Date">
                                                </div>
                                        </div>
                                    <input type="hidden" value="" id="data">
                                    <div class="col-sm-5">
                                         <div class="form-group">
                                             <select class="form-control initial_destination" id="location" name="location" required="required" onchange="SelectLocation()">
                                                 <option>--Select Location--</option>
                                             </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-5">
                                            <select class="form-control initial_destination"  required="required" id="destination" name="destination">
                                                <option value="">--Select Destination--</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

<!-- Small Modal -->
