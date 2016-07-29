<style type="text/css">
    .seating{
        background: url("{{ asset('assets/img/seatplan.png')  }}" ) -97px 0px no-repeat;
        width: 50px;
        height: 43px;
        background-color: #cbd0ce;
    }
    .selectedSeat{
        background-color: green;
    }
</style>
<div class="col-sm-10 col-xs-10 col-sm-offset-2">
    <div class="col-sm-4 col-xs-4">
        <div class="col-sm-12 col-xs-12">
            <div id="driver">
            </div>
        </div>
        @foreach($right as $i => $item)
            <div class="col-sm-12 col-xs-12">
                @if($seat->leftseatrow == 2)
                    <div class="col-sm-6 col-xs-6">
                        <?php
                        $check2 = in_array( $item . 1 , $seating) ? 'selectedSeat' : '';
                        $actions = ($check2 != 'selectedSeat') ? 'onclick=CheckSeating(\''.$item . 1 .'\')': 'onclick=Seating(\''.$item . 1 .'\')';
                        ?>
                        <div class="seating {{ $check2 }}" {{ $actions }}>
                            <strong>{{ $item }}1</strong>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <?php $check2 = in_array( $item . 2 , $seating) ? 'selectedSeat' : '';
                        $actions = ($check2 != 'selectedSeat') ? 'onclick=CheckSeating(\''.$item . 2 .'\')': 'onclick=Seating(\''.$item . 2 .'\')';
                        ?>
                        <div class="seating {{ $check2 }}"  {{ $actions }}>
                            <strong>{{ $item }}2</strong>
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-2"><div class=""></div></div>
                @else
                    <div class="col-sm-6 col-xs-6">
                        <?php $check2 = in_array( $item . 1 , $seating) ? 'selectedSeat' : '';
                        $actions = ($check2 != 'selectedSeat') ? 'onclick=CheckSeating(\''.$item . 1 .'\')': 'onclick=Seating(\''.$item . 1 .'\')';
                        ?>
                        <div class="seating {{ $check2 }}" {{ $actions }}>
                            <strong>{{ $item }}1</strong>
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-2"><div class=""></div></div>
                @endif
            </div>
        @endforeach
    </div>
    <div class="col-sm-6 col-xs-6">
        {{--<br/><br/>--}}
        @foreach($right as $i => $item)
            {{--*/ $i = 3 /*--}}
            <div class="col-sm-12 col-xs-12">
                @if($seat->rightseatrow == 3)
                    <div class="col-sm-4">
                        <?php $check2 = in_array( $item . 3 , $seating) ? 'selectedSeat' : '';
                        $actions = ($check2 != 'selectedSeat') ? 'onclick=CheckSeating(\''.$item . 3 .'\')': 'onclick=Seating(\''.$item . 3 .'\')';
                        ?>
                        <div class="seating {{ $check2 }}"  {{$actions }}>
                            <strong>{{ $item }}3</strong>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <?php
                        $check2 = in_array( $item . 4 , $seating) ? 'selectedSeat' : '';
                        $actions = ($check2 != 'selectedSeat') ? 'onclick=CheckSeating(\''.$item . 4 .'\')': 'onclick=Seating(\''.$item . 4 .'\')';
                        ?>

                        <div class="seating {{ $check2 }}" {{ $actions }}>
                            <strong>{{ $item }}4</strong>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <?php $check2 = in_array( $item . 5 , $seating) ? 'selectedSeat' : '';
                        $actions = ($check2 != 'selectedSeat') ? 'onclick=CheckSeating(\''.$item . 5 .'\')': 'onclick=Seating(\''.$item . 5 .'\')';
                        ?>
                        <div class="seating {{ $check2 }}"  {{ $actions }}>
                            <strong>{{ $item }}5</strong>
                        </div>
                    </div>
                @else
                    <div class="col-sm-4">
                        <?php $check2 = in_array( $item . 3 , $seating) ? 'selectedSeat' : '';
                        $actions = ($check2 != 'selectedSeat') ? 'onclick=CheckSeating(\''.$item . 3 .'\')': 'onclick=Seating(\''.$item . 3 .'\')';
                        ?>
                        <div class="seating {{ $check2 }}"  {{ $actions }}>
                            <strong>{{ $item }}3</strong>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <?php $check2 = in_array( $item . 4 , $seating) ? 'selectedSeat' : '';
                        $actions = ($check2 != 'selectedSeat') ? 'onclick=CheckSeating(\''.$item . 4 .'\')': 'onclick=Seating(\''.$item . 4 .'\')';
                        ?>
                        <div class="seating {{ $check2 }}"  {{ $actions }}>
                            <strong>{{ $item }}4</strong>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>