@extends('Shared.layout',['title' => 'Phone'])
@section('content')
<style>
    .input-group{
        margin-bottom: 0px;
    }
    .btn-move{
        margin-top:5px;
    }
    .selected{
        background-color: orange;
    }
    
</style>
{{-- <link href="{{ asset('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet" /> --}}
{{-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />--}}
<link rel="stylesheet" href="{{ asset('plugins/jquery-ui-1.12.1/jquery-ui.min.css')}}" rel="stylesheet" />

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>
                 Phone
            </h2>
            <ul class="header-dropdown m-r--5">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">more_vert</i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="body">
            <form class="form-horizontal" action="/phone" id="frm_phone" method="POST" enctype="multipart/form-data">
                {!! Form::token(); !!}
                <div class="body">
                    <div id="wizard_vertical">
                        <h2>Information</h2>
                        <section>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Name</label>
                                    <span class="required">*</span>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="text" class="form-control" name="name" value="{{$phone->name}}" required >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Code</label>
                                    <span class="required">*</span>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="text" class="form-control" name="code" value="{{$phone->code}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Brand</label>
                                    <span class="required">*</span>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select  name="brand" class="form-control">
                                                @foreach ($brands as $brand)
                                                <option value="{{$brand->brand_id}}" @if($phone->brand_id == $brand->brand_id) {{'selected'}} @endif >{{$brand->brand_name}}</option>
                                                @endforeach
                                            </select>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Previous Price</label>
                                    <span class="required">*</span>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="input-group">
                                        <div class="form-line">
                                        <input type="number" class="form-control" name="previous_price" value="{{$phone->previous_price}}" placeholder="0.00">
                                        </div>
                                        <span class="input-group-addon">$</span>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Current Price</label>
                                    <span class="required">*</span>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="number" class="form-control" name="current_price" value="{{$phone->current_price}}" placeholder="0.00">
                                        </div>
                                        <span class="input-group-addon">$</span>
                                    </div>
                                </div>
                            </div>
                            
                        </section>
                        
                        <h2>Photo/Video</h2>
                        <section>
                            <div class="row clearfix">
                                <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 form-control-label text-left no-margin-bottom" >
                                    <label>List imports :</label>
                                </div>
                                <div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                    <div class="form-group">
                                        <input type="hidden" name="imports" />
                                        <div class="list-group" id="list-photovideos">
                                            @foreach($phone->photos as $photo)
                                                <a href='javascript:void(0);' data-selected='false' data-type='{{$photo->type}}' data-src='{{$photo->src}}' class='list-group-item text_limit'>{{$photo->import_name}}</a>
                                            @endforeach
                                            {{-- <a href="javascript:void(0);" class="list-group-item">Cras justo odio</a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </section>
                        
                        <h2>Specification</h2>
                        <section>
                            <div class="row clearfix">
                                <div class="spec-header">
                                    <h5>NETWORK</h5>
                                </div>
                                <div class="spec-body">
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>Technology</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                            <input type="text" class="form-control" name="technology" value="{{$phone->spec->technology}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>2G Bands</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="twoG" value="{{$phone->spec->twoG}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>3G Bands</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="threeG" value="{{$phone->spec->threeG}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>4G Bands</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="fourG" value="{{$phone->spec->fourG}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>Speed</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="speed" value="{{$phone->spec->speed}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-3 col-xs-offset-5 col-lg-2 col-md-2 col-sm-2 col-xs-4">
                                        <input type="checkbox" id="md_checkbox_6" class="chk-col-blue" name="GPRS" value="1" @if($phone->spec->GPRS == 1) {{'checked'}} @endif />
                                        <label for="md_checkbox_6">GPRS</label>
                                    </div>
                                    <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-2 col-md-2 col-sm-2 col-xs-4">
                                        <input type="checkbox" id="md_checkbox_7" class="chk-col-blue" name="EDGE" value="1" @if($phone->spec->EDGE == 1) {{'checked'}} @endif  />
                                        <label for="md_checkbox_7">EDGE</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="spec-header">
                                    <h5>LAUNCH</h5>
                                </div>
                                <div class="spec-body">
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>Announced</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <input type="date" id="date" name="announcedDate" value="{{$phone->spec->announcedDate}}" class="form-control floating-label" placeholder="Date">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>Status</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="status" value="{{$phone->spec->status}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>Released Date</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <input type="date" id="date" name="releaseDate" value="{{$phone->spec->releaseDate}}" class="form-control floating-label" placeholder="Date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="spec-header">
                                    <h5>BODY</h5>
                                </div>
                                <div class="spec-body">
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>Dimensions</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="dimensions" value="{{$phone->spec->dimensions}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>Weight</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="weight" value="{{$phone->spec->weight}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>SIM</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="SIM" value="{{$phone->spec->SIM}}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="spec-header">
                                    <h5>DISPLAY</h5>
                                </div>
                                <div class="spec-body">
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>Type</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="type" value="{{$phone->spec->type}}" required>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>Size</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="size" value="{{$phone->spec->size}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>Resolution</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="resolution" value="{{$phone->spec->resolution}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>Multitouch</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="multitouch" value="{{$phone->spec->multitouch}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>Protection</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="protection" value="{{$phone->spec->protection}}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="spec-header">
                                    <h5>PLATFORM</h5>
                                </div>
                                <div class="spec-body">
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>OS</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="OS" value="{{$phone->spec->OS}}" required>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>Chipset</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="chipset" value="{{$phone->spec->chipset}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>CPU</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="CPU" value="{{$phone->spec->CPU}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>GPU</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="GPU" value="{{$phone->spec->GPU}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="spec-header">
                                    <h5>MEMORY</h5>
                                </div>
                                <div class="spec-body">
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>Card Slot</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="cardSlot" value="{{$phone->spec->cardSlot}}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>Internal</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="internal" value="{{$phone->spec->internal}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="spec-header">
                                    <h5>CAMERA</h5>
                                </div>
                                <div class="spec-body">
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>Primary</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text"  name="primary" value="{{$phone->spec->primary}}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>Features</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="features" value="{{$phone->spec->features}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>Video</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="video" value="{{$phone->spec->video}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>Secondary</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="secondary" value="{{$phone->spec->secondary}}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row clearfix">
                                <div class="spec-header">
                                    <h5>SOUND</h5>
                                </div>
                                <div class="spec-body">
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>Alert Types</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text"  name="alertTypes" value="{{$phone->spec->alertTypes}}" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-3 col-xs-offset-5 col-lg-2 col-md-2 col-sm-2 col-xs-4">
                                        <input type="checkbox" id="md_checkbox_8" class="chk-col-blue" name="loudSpeaker" value="1" @if($phone->spec->loudSpeaker == 1) {{'checked'}} @endif />
                                        <label for="md_checkbox_8">Loudspeaker</label>
                                    </div>
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-3 col-xs-offset-5 col-lg-2 col-md-2 col-sm-2 col-xs-4">
                                        <input type="checkbox" id="md_checkbox_9" class="chk-col-blue" name="audioJack" value="1" @if($phone->spec->audioJack == 1) {{'checked'}} @endif />
                                        <label for="md_checkbox_9">3.5mm jack</label>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <div class="row clearfix">
                                <div class="spec-header">
                                    <h5>COMMS</h5>
                                </div>
                                <div class="spec-body">
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>WLAN</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="WLAN" value="{{$phone->spec->WLAN}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>Bluetooth</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="bluetooth" value="{{$phone->spec->bluetooth}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>GPS</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="GPS" value="{{$phone->spec->GPS}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>USB</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="USB" value="{{$phone->spec->USB}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-3 col-xs-offset-5 col-lg-2 col-md-2 col-sm-2 col-xs-4">
                                        <input type="checkbox" id="md_checkbox_10" class="chk-col-blue" name="NFC" value="1" @if($phone->spec->NFC == 1) {{'checked'}} @endif />
                                        <label for="md_checkbox_10">NFC</label>
                                    </div>
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-3 col-xs-offset-5 col-lg-2 col-md-2 col-sm-2 col-xs-4">
                                        <input type="checkbox" id="md_checkbox_11" class="chk-col-blue" name="Radio" value="1" @if($phone->spec->Radio == 1) {{'checked'}} @endif />
                                        <label for="md_checkbox_11">Radio</label>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row clearfix">
                                <div class="spec-header">
                                    <h5>FEATURES</h5>
                                </div>
                                <div class="spec-body">
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>Sensors</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="sensors" value="{{$phone->spec->sensors}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>Messaging</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="messaging" value="{{$phone->spec->messaging}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>Browser</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="browser" value="{{$phone->spec->browser}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>Java</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="java" value="{{$phone->spec->java}}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <div class="row clearfix">
                                <div class="spec-header">
                                    <h5>BATTERY</h5>
                                </div>
                                <div class="spec-body">
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>Battery</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="batteryDetail" value="{{$phone->spec->batteryDetail}}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <div class="row clearfix">
                                <div class="spec-header">
                                    <h5>MISC</h5>
                                </div>
                                <div class="spec-body">
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>Battery</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="colors" value="{{$phone->spec->colors}}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <div class="row clearfix">
                                <div class="spec-header">
                                    <h5>TESTS</h5>
                                </div>
                                <div class="spec-body">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-line">
                                        <textarea rows="4" style="resize: vertical;" class="form-control margin_above" name="testDetail">{{$phone->spec->testDetail}}</textarea>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        
                    </section>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
<script src="{{ asset('plugins/jquery-ui-1.12.1/jquery-ui.min.js')}}"></script> 
<script src="{{ asset('plugins/jquery-validation/jquery.validate.js')}}"></script>
<script src="{{ asset('plugins/jquery-steps/jquery.steps.js')}}"></script>
<script src="{{ asset('plugins/autosize/autosize.js')}}"></script>
<script src="{{ asset('js/pages/ui/modals.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-material-datetimepicker/js/moment-with-locales.min.js')}}"></script>
<script src="{{ asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
<script>
 
    $(document).ready(function(){
        $('#wizard_vertical').steps({
            headerTag: 'h2',
            bodyTag: 'section',
            transitionEffect: 'slideLeft',
            stepsOrientation: 'vertical',
            enableFinishButton: false,
            onInit: function (event, currentIndex) {
                setButtonWavesEffect(event);
            },
        });
        function setButtonWavesEffect(event) {
                $(event.currentTarget).find('[role="menu"] li a').removeClass('waves-effect');
                $(event.currentTarget).find('[role="menu"] li:not(.disabled) a').addClass('waves-effect');
            }
    });
</script>
    
@endsection