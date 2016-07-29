<div class="col-sm-10 col-sm-offset-2">
    <div class="col-sm-4">
        <div class="col-sm-12">
            <div id="driver">
            </div>
        </div>
        @foreach($right as $i => $item)
            <div class="col-sm-12">
                @if($seat->leftseatrow == 2)
                    <div class="col-sm-6">
                        <div class="seating"  onclick="CheckSeating('{{ $item }}1')" >
                            <strong>{{ $item }}1</strong>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="seating"  onclick="CheckSeating('{{ $item }}2')">
                            <strong>{{ $item }}2</strong>
                        </div>
                    </div>
                    <div class="col-sm-2"><div class=""></div></div>
                @else
                    <div class="col-sm-6">
                        <div class="seating"  onclick="CheckSeating('{{ $item }}1')" >
                            <strong>{{ $item }}1</strong>
                        </div>
                    </div>
                    <div class="col-sm-2"><div class=""></div></div>
                @endif
            </div>
        @endforeach
    </div>
    <div class="col-sm-6">
        <br/><br/>
        @foreach($right as $i => $item)
            {{--*/ $i = 3 /*--}}
            <div class="col-sm-12">
                @if($seat->rightseatrow == 3)
                    <div class="col-sm-4">
                        <div class="seating"  onclick="CheckSeating('{{ $item }}3')">
                            <strong>{{ $item }}3</strong>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="seating"  onclick="CheckSeating('{{ $item }}4')">
                            <strong>{{ $item }}4</strong>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="seating"  onclick="CheckSeating('{{ $item }}5')">
                            <strong>{{ $item }}5</strong>
                        </div>
                    </div>
                @else
                    <div class="col-sm-4">
                        <div class="seating"  onclick="CheckSeating('{{ $item }}3')">
                            <strong>{{ $item }}3</strong>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="seating"  onclick="CheckSeating('{{ $item }}4')">
                            <strong>{{ $item }}4</strong>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>