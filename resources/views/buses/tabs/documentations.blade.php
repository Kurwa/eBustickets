@extends('buses.bus-profile')
@section('profile')
    <div id="" class="tab-content">
        <div class="panel-body p0">
            <button data-toggle="modal" data-target="#myLargeModal" class="btn btn-info btn-sm pull-right mr5 mb10" style="margin-right: 10px;margin-top: 10px;"><i class="fa fa-plus"></i> add</button>
            <div class="col-sm-12">
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <th width="10%">S/N</th>
                        <th> Document Name </th>
                        <th> Actions </th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--*/ $i = 0/*--}}
                        @foreach($documents as $document)
                            {{--*/ $i ++/*--}}
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $document->document->name }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button data-toggle="modal" data-target="#preview" class="btn btn-info btn-sm mr5 mb10" onclick=""><i class="fa fa-eye"></i> view</button>
                                        <button class="btn btn-sm"><i class="fa fa-print"></i> print</button>
                                    </div>
                                </td>
                                <div class="modal fade" id="preview" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">Document</h4>
                                            </div>
                                            <div class="modal-body" id="image_preview">
                                                <img src="{{ asset('uploads/'. $document->images) }}" width="100%">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Print</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
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
                    <h4 class="modal-title" id="myModalLabel">Document Upload</h4>
                </div>
                {!! Form::open(array('class'=>'form-horizontal', 'files'=>true ,'autocomplete' => 'off')) !!}
                <div class="modal-body">
                    <div class="col-sm-5">
                    <div class="form-group">
                        <label class="col-lg-3 col-md-4 control-label" for="">Document </label>
                        <div class="col-lg-9 col-md-8">
                            {!! Form::select('documents_id',
                                (['' => 'Select Type'] + $docs),
                                   null,
                                   ['class' => 'form-control','required','id'=>'docs']) !!}
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-lg-3 col-md-4 control-label" for="">Image </label>
                            <div class="col-lg-9 col-md-8">
                                    <input type="file" class="form-control" name="image" onchange="readURL(this);">
                            </div>
                         </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                    <div class="col-sm-12">
                        <hr>
                        <img id="image_logo"  src="" alt="" class="img-responsive">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
      </div>
    {{--</div>--}}
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    jQuery('#image_logo')
                            .attr('src', e.target.result)
//                            .width(2000)//  ×
//                            .height(1000);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

//        function Preview (argument) {
            {{--$.ajax({--}}
                {{--dataType: 'html',--}}
                {{--url: "{{ url('buses/doc_preview') }}",--}}
                {{--type: 'get',--}}
                {{--data:{--}}
                    {{--document_id : argument,--}}
                {{--},--}}
                {{--success: function(data) {--}}
                    {{--var resp = "<img src=\"../uploads/"+ data+ ">";--}}
{{--//                    alert(resp);--}}
                    {{--$("#image_preview").html(resp);--}}
                {{--},--}}
                {{--error: function(xhr, ajaxOptions, thrownError) {--}}
                    {{--alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);--}}
                {{--}--}}
            {{--});--}}
        {{--}--}}
    </script>
@endsection