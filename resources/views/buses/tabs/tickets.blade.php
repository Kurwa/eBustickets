@extends('buses.bus-profile')
@section('profile')
    <div id="" class="tab-content">
        <div class="panel-body p0">
            <div class="col-sm-12">
                <br>
                <div id="dyn_6" class="panel panel-pink plain">
                    <div class="panel-body">
                        @for($i = 0; $i <= 30; $i++)
                                <button type="button" class="btn btn-danger  btn-lg  btn-alt btn-round mr5 mb10">A1</button>
                        @endfor
                            <br><hr style="opacity: 0">
                        @for($i = 0; $i <= 30; $i++)
                                <button type="button" class="btn btn-success btn-lg  btn-alt btn-round mr5 mb10">A2</button>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection