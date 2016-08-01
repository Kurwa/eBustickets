@extends('layouts.main')
@section('heading')
    Configuration
@endsection
@section('title')
    Configuration
@stop
@section('second')
    Configuration
@stop
@section('last')
    Configuration Lists
@stop
@section('contents')
    <div id="dyn_7" class="panel panel-lime plain">
        <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-search"></i>  Configuratioin</h4>
            <div class="panel-controls panel-controls-right">
            </div>
        </div>
        <div class="panel-body">
          {!! Form::open(['class'=>'form-horizontal group-border stripped','role'=>'form']) !!}
            <div class="col-lg-6">
                <div class="panel panel-default toggle panelMove panelClose panelRefresh">
                    <div class="panel-heading">
                        <h4 class="panel-title">Website Look</h4>
                    </div>
                    <div class="panel-body pt0 pb0">
                        <div class="form-group">
                            <label class="col-lg-4 col-md-4 control-label">Top & Footer Color</label>
                            <div class="col-lg-8 col-md-8">
                                <input class="jscolor form-control" name="topnav" value="#">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 col-md-4 control-label">Address</label>
                            <div class="col-lg-8 col-md-8">
                                <textarea name="address" cols="" placeholder="Address" rows="1" class="form-control" ></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 col-md-4 control-label">Telephone</label>
                            <div class="col-lg-8 col-md-8">
                                <input class="form-control" name="telephone" placeholder="Telephone" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 col-md-4 control-label">Email</label>
                            <div class="col-lg-8 col-md-8">
                                <input class="form-control" name="email" type="email" placeholder="Email" value="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- col-lg-6 start here -->
                <div class="panel panel-default toggle panelMove panelClose panelRefresh">
                    <!-- Start .panel -->
                    <div class="panel-heading">
                        <h4 class="panel-title">Social Media Accounts</h4>
                    </div>
                    <div class="panel-body pt0 pb0">
                        <div class="form-horizontal group-border stripped">
                            <div class="form-group">
                                <label class="col-lg-4 col-md-4 control-label">Facebook</label>
                                <div class="col-lg-8 col-md-8">
                                    <input class="form-control" name="facebook" placeholder="Facebook Account" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 col-md-4 control-label">Skype</label>
                                <div class="col-lg-8 col-md-8">
                                    <input class="form-control" name="skype" placeholder="Skype Account" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 col-md-4 control-label">Twitter</label>
                                <div class="col-lg-8 col-md-8">
                                    <input class="form-control" name="twitwer" placeholder="Twitter Account" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 col-md-4 control-label">Instagram</label>
                                <div class="col-lg-8 col-md-8">
                                    <input class="form-control" name="instagram" placeholder="Instagram Account" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 col-md-4 control-label"></label>
                                <div class="col-lg-8 col-md-8">
                                    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </form>
        </div>
    </div>
@endsection