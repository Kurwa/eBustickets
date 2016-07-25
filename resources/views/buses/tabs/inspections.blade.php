@extends('buses.bus-profile')
@section('profile')
    <div id="" class="tab-content">
        <div class="panel-body p0">
            <button data-toggle="modal" data-target="#myLargeModal" class="btn btn-info btn-sm pull-right mr5 mb10" style="margin-right: 10px;margin-top: 10px;"><i class="fa fa-plus"></i> add</button>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="per5">S/N</th>
                        <th class="per35">Inspectors</th>
                        <th class="per35">Inspected Date</th>
                        <th class="per15">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Jacob Olsen</td>
                        <td>12- Jan -2012</td>
                        <td>
                            <div>
                                <a href="#"><i class="fa fa-eye"></i> details</a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
            {{--</div>--}}
        {{--</div>--}}
    </div>
@endsection