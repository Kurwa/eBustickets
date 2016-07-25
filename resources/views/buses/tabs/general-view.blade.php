@extends('buses.bus-profile')
@section('profile')
    <style type="text/css">
        table{
            width:100%;
        }
        .width40{
            width:40%;
            background: #d9d9d9;;
        }
        .width60{
            width: 60%;
        }
    </style>
    <div id="" class="tab-content">
        <div class="panel-body p0">
            <div class="col-sm-12">
                <div class="col-sm-5">
                    <br style="margin-bottom: 0px">
                    <span style="font-family: DejaVu Sans, 'trebuchet ms', verdana, sans-serif;font-weight: bold; margin-left: 10px;">Bus Image</span>
                    <hr>
                    <img src="{{ asset('uploads/' . $bus->bus_image ) }}" class="img-responsive" height="300" width="400">
                </div>
                <div class="col-sm-7">
                    <br style="margin-bottom: 0px">
                    <span style="font-family: DejaVu Sans, 'trebuchet ms', verdana, sans-serif;font-weight: bold; margin-left: 10px;">Bus Details</span>
                    <hr>
                    <table class="table table-responsive">
                        <tbody><tr>
                            <td class="width40" style="text-align:right">Bus Number :</td>
                            <td class="width60">{{ $bus->bus_number }}</td>
                        </tr>
                        <tr>
                            <td class="width40"  style="text-align:right">Model :</td>
                            <td>{{ $bus->model }}</td>
                        </tr>
                        <tr>
                            <td class="width40" style="text-align:right">Type :</td>
                            <td>{{ $bus->type->name }}</td>
                        </tr>
                        <tr>
                            <td class="width40"  style="text-align:right">Manufactured By :</td>
                            <td class="width60">{{ $bus->manufacture }}</td>
                        </tr>
                        <tr>
                            <td class="width40" style="text-align:right">Manufactured year</td>
                            <td class="width60">{{ $bus->yearmanufacture  }}</td>
                        </tr>
                        <tr>
                            <td class="width40"  style="text-align:right">Manufactured Country :</td>
                            <td class="width60">{{ $bus->countrymanufacture }}</td>
                        </tr>
                        <tr>
                            <td class="width40"  style="text-align:right">Bus Route :</td>
                            <td class="width60"></td>
                        </tr>
                        {{--<tr>--}}
                            {{--<td class="width40" style="text-align:right">Run Kilometer :</td>--}}
                            {{--<td class="width60"></td>--}}
                        {{--</tr>--}}

                        </tbody>
                    </table>
                </div>
                </ul>
            </div>
        </div>
    </div>
@endsection