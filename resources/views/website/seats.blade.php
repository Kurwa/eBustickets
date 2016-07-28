@extends('website.main')
@section('main-count')
    <style type="text/css">
        .SeatCell{
            background: url("{{ asset('assets/img/seatplan.png')  }}" ) -97px 0px no-repeat;
            width: 50px;
            height: 43px;
            background-color: #cc006a;
        }
    </style>
    <div class="main-cont">
        <div class="body-wrapper">
            <div class="wrapper-padding">
                <div class="sp-page">
                    <div class="sp-page-a">
                        <div class="sp-page-l">
                            <div class="sp-page-lb">
                                <div class="sp-page-p">
                                    <div class="booking-left">
                                        {{--<h2></h2>--}}
                                        <div class="h-liked-lbl">Seating Plan</div>
                                        <table class="SeatPlanTable table" cellpadding="0" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <td class="SeatRowNumber SeatPlanWidthMarker"></td>
                                                @foreach($right as $i => $item)
                                                    @if($seat->leftseatrow == 2)
                                                        <td width="50" height="43">
                                                            <span class="noback ">{{ $item }}</span>
                                                        </td>
                                                    @else
                                                        <td width="50" height="43">
                                                            <span class="noback ">{{ $item }}</span>
                                                        </td>
                                                    @endif
                                                @endforeach
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="headRow">
                                                <td class="SeatRowNumber SeatPlanWidthMarker"></td>
                                                <td class="SeatCell"><span class="noback ">A</span></td>
                                                <td class="SeatCell"><span class="noback ">B</span></td>
                                                <td class="SeatCell"><span class="noback ">C</span></td>
                                                <td class=""><span class="noback "></span></td>
                                                <td class="SeatCell"><span class="noback ">D</span></td>
                                                <td class="SeatCell"><span class="noback ">E</span></td>
                                                <td class="SeatCell"><span class="noback ">F</span></td>
                                                <td class=" SeatPlanWidthMarkerRight"></td>
                                            </tr>
                                            <tr class="headRow">
                                                <td class="SeatRowNumber SeatPlanWidthMarker"></td>
                                                <td class="SeatCell"><span class="selectedSeat vars_active ">3A</span></td>
                                                <td class="SeatCell"><span class="Seat freeSeat ">3B</span></td>
                                                <td class="SeatCell"><span class="Seat freeSeat ">3C</span></td>
                                                <td class="SeatCell"><span class="Seat freeSeat ">3D</span></td>
                                                <td class="SeatCell"><span class="Seat freeSeat ">3E</span></td>
                                                <td class="SeatCell"><span class="Seat freeSeat ">3F</span></td>
                                                <td class="SeatCell"><span class="Seat freeSeat ">3G</span></td>
                                                <td class=" SeatPlanWidthMarkerRight"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sp-page-r">
                        <div class="h-reasons">
                            <div class="h-liked-lbl">fhalflahfla</div>
                            <div class="h-reasons-row">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td class="Seat selectedSeat vars_active"></td>
                                        <td class="NoSeat">Taken Seat</td>
                                    </tr>
                                    <tr>
                                        <td class="Seat freeSeat"></td>
                                        <td class="NoSeat">Siti za Bure</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
@stop