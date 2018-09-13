@extends('Shared.layout',['title' => 'Create Phone'])
@section('content')
<style>
    .input-group{
        margin-bottom: 0px;
    }
    .btn-move{
        margin-top:5px;
    }
</style>
{{-- <link href="{{ asset('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet" /> --}}
{{-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />--}}
<link rel="stylesheet" href="{{ asset('plugins/jquery-ui-1.12.1/jquery-ui.min.css')}}" rel="stylesheet" />

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>
                Create Phone
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
                                            <input type="text" class="form-control" name="name" required>
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
                                            <input type="text" class="form-control" name="code" required>
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
                                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
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
                                            <input type="number" class="form-control" name="previous_price" placeholder="0.00">
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
                                            <input type="number" class="form-control" name="current_price" placeholder="0.00">
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
                                    <div class="icon-button-demo js-modal-buttons button-add">
                                        <button type="button" data-toggle="modal" data-target="#largeModal" class="btn bg-deep-orange btn-circle waves-effect waves-circle waves-float">
                                            <i class="material-icons">add</i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                    <div class="form-group">
                                        <input type="hidden" name="imports" />
                                        <div class="list-group" id="list-photovideos">
                                            {{-- <a href="javascript:void(0);" class="list-group-item">Cras justo odio</a> --}}
                                        </div>
                                        <ul id="sortable">
                                                <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 1</li>
                                                <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 2</li>
                                                <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 3</li>
                                                <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 4</li>
                                                <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 5</li>
                                                <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 6</li>
                                                <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 7</li>
                                              </ul>
                                               
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                    <div class="form-group text-center">
                                        <button type="button" class="btn bg-green waves-effect">
                                                <i class="fa fa-chevron-up fa-xs"></i>
                                        </button>
                                        <button type="button" class="btn bg-orange waves-effect btn-move">
                                                <i class="fa fa-trash fa-xs"></i>
                                        </button>
                                        <button type="button" class="btn bg-green waves-effect btn-move">
                                                <i class="fa fa-chevron-down fa-xs"></i>
                                        </button>
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
                                                <input type="text" class="form-control" name="technology" required>
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
                                                <input type="text" class="form-control" name="twoG" required>
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
                                                <input type="text" class="form-control" name="threeG" required>
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
                                                <input type="text" class="form-control" name="fourG" required>
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
                                                <input type="text" class="form-control" name="speed" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-3 col-xs-offset-5 col-lg-2 col-md-2 col-sm-2 col-xs-4">
                                        <input type="checkbox" id="md_checkbox_6" class="chk-col-blue" name="GPRS"  />
                                        <label for="md_checkbox_6">GPRS</label>
                                    </div>
                                    <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-2 col-md-2 col-sm-2 col-xs-4">
                                        <input type="checkbox" id="md_checkbox_7" class="chk-col-blue" name="EDGE"  />
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
                                            <input type="date" id="date" name="announcedDate" class="form-control floating-label" placeholder="Date">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>Status</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="status" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 form-control-label">
                                        <label>Released Date</label>
                                        <span class="required">*</span>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-7">
                                        <div class="form-group">
                                            <input type="date" id="date" name="releaseDate" class="form-control floating-label" placeholder="Date">
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
                                                <input type="text" class="form-control" name="dimensions" required>
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
                                                <input type="text" class="form-control" name="weight" required>
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
                                                <input type="text" class="form-control" name="SIM" required>
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
                                                <input type="text" class="form-control" name="type" required>
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
                                                <input type="text" class="form-control" name="size" required>
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
                                                <input type="text" class="form-control" name="resolution" required>
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
                                                <input type="text" class="form-control" name="multitouch" required>
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
                                                <input type="text" class="form-control" name="protection" required>
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
                                                <input type="text" class="form-control" name="OS" required>
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
                                                <input type="text" class="form-control" name="chipset" required>
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
                                                <input type="text" class="form-control" name="CPU" required>
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
                                                <input type="text" class="form-control" name="GPU" required>
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
                                                <input type="text" name="cardSlot" class="form-control">
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
                                                <input type="text" class="form-control" name="internal" required>
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
                                                <input type="text"  name="primary" class="form-control">
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
                                                <input type="text" class="form-control" name="features" required>
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
                                                <input type="text" class="form-control" name="video" required>
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
                                                <input type="text" class="form-control" name="secondary" required>
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
                                                <input type="text"  name="alertTypes" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-3 col-xs-offset-5 col-lg-2 col-md-2 col-sm-2 col-xs-4">
                                        <input type="checkbox" id="md_checkbox_8" class="chk-col-blue" name="loudSpeaker"  />
                                        <label for="md_checkbox_8">Loudspeaker</label>
                                    </div>
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-3 col-xs-offset-5 col-lg-2 col-md-2 col-sm-2 col-xs-4">
                                        <input type="checkbox" id="md_checkbox_9" class="chk-col-blue" name="audioJack"  />
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
                                                <input type="text" class="form-control" name="WLAN" required>
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
                                                <input type="text" class="form-control" name="bluetooth" required>
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
                                                <input type="text" class="form-control" name="GPS" required>
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
                                                <input type="text" class="form-control" name="USB" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-3 col-xs-offset-5 col-lg-2 col-md-2 col-sm-2 col-xs-4">
                                        <input type="checkbox" id="md_checkbox_10" class="chk-col-blue" name="NFC"  />
                                        <label for="md_checkbox_10">NFC</label>
                                    </div>
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-3 col-xs-offset-5 col-lg-2 col-md-2 col-sm-2 col-xs-4">
                                        <input type="checkbox" id="md_checkbox_11" class="chk-col-blue" name="Radio"  />
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
                                                <input type="text" class="form-control" name="sensors" required>
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
                                                <input type="text" class="form-control" name="messaging" required>
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
                                                <input type="text" class="form-control" name="browser" required>
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
                                                <input type="text" class="form-control" name="java" required>
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
                                                <input type="text" class="form-control" name="batteryDetail" required>
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
                                                <input type="text" class="form-control" name="colors" required>
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
                                            <textarea rows="4" style="resize: vertical;" class="form-control margin_above" name="testDetail"><b>asdf</b></textarea>
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
{{-- Modal --}}
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row clearfix">
                    <div class="col-xs-1">
                        <h4 class="modal-title" id="largeModalLabel">Import</h4>
                    </div>
                    <div class="col-xs-11">
                        <input type="text" id="input_name_import" class="form-control"  placeholder="Title of this Import">
                    </div>
                </div>
                
                
            </div>
            <div class="modal-body">
                <div class="body">
                    
                    
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs tab-nav-right" role="tablist">
                        <li role="presentation" class="active"><a href="#photo" data-toggle="tab" aria-expanded="true">Photo</a></li>
                        <li role="presentation" class=""><a href="#video" data-toggle="tab" aria-expanded="false">Video</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="photo">
                            <section>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 form-control-label">
                                        <label>Url</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <img id="img_preview_url" alt="Photo" class="file_preview" style="display:none">
                                                <input type="text" id="img_url" class="form-control"  placeholder="Photo Url">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-5 form-control-label">
                                        <label>Upload</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                        <form method="POST" id="form_upload" enctype="multipart/form-data">
                                            {!! Form::token(); !!}
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <img id="img_preview" alt="Photo" class="file_preview" style="display:none" />
                                                    <input type="file" class="form-control" name="upload_photo" id="upload_photo" accept="image/*">
                                                    
                                                </div>
                                                <input type="button" class="btn btn-warning" value="Upload" id="btn_uploadImage">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" id="upload_bar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                                                        0%
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <input type="hidden" id="upload_image_cache" />
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="video">
                            <section>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 form-control-label">
                                        <label>Url</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="input_video_url" class="form-control" placeholder="Youtube URL">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item" frameborder="0" allowfullscreen  id="iframe_video" src="" style="display:none"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" id="btn_OK">OK</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>
{{-- End Modal --}}
<script src="{{ asset('plugins/jquery-ui-1.12.1/jquery-ui.min.js')}}"></script> 
<script src="{{ asset('plugins/jquery-validation/jquery.validate.js')}}"></script>
<script src="{{ asset('plugins/jquery-steps/jquery.steps.js')}}"></script>
<script src="{{ asset('plugins/autosize/autosize.js')}}"></script>
<script src="{{ asset('js/pages/ui/modals.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-material-datetimepicker/js/moment-with-locales.min.js')}}"></script>
<script src="{{ asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
<script>
    //var formData = new FormData();
    function ajax_upload(){
        $("#upload_bar").show();
        var bar = $("#upload_bar");
        bar.html("0 %").attr('aria-valuenow','0').width('0%');
        var image = $('#upload_photo')[0].files[0];
        var form = new FormData();
        form.append('image', image);
        $.ajax({
            url: '/phone/uploadimage',
            data: form,
            dataType: 'json',
            type: 'POST',
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },xhr: function() {
                var xhr = $.ajaxSettings.xhr();
                if(xhr.upload){
                    xhr.upload.addEventListener('progress',progress, false);
                }
                return xhr;
            },success:function(data) {
                $('#upload_image_cache').val(data.path);
                var bar = $("#upload_bar");
                bar.html("100 %").attr('aria-valuenow','100').width('100%');
            },error:function(e){
                $('#upload_image_cache').val("");
                console.log(e.responseText);
            }
        });
    }
    function progress(e) {
        if(e.lengthComputable) {
            var max = e.total;
            var current = e.loaded;
            
            var percentage = (current * 100) / max;
            percentage = percentage > 90 ? 90 : percentage.toFixed(2);
            var bar = $("#upload_bar");
            bar.html(percentage + " %").attr('aria-valuenow',percentage).width( percentage+'%');
        }  
    }
    
    
    $(document).ready(function(){
        $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();


        
        $('#btn_OK').click(function(){
            var url_image = $('#img_url');
            var upload_image = $('#upload_image_cache');
            var url_video = $('#iframe_video');
            var list = $('#list-photovideos');
            var name = $('#input_name_import');
            
            if(name.val() == ""){
                AlertMessage("warning", "Invalid! ", "Title Import is empty.");
                return false;
            }else{
                
                //insert link
                if(url_image.val() != ""){
                    list.append("<a href='javascript:void(0);' data-type='img' data-src='"+url_image.val()+"' class='list-group-item text_limit'>"+name.val()+"</a>");
                }else if(upload_image.val() != ""){
                    list.append("<a href='javascript:void(0);' data-type='img' data-src='"+upload_image.val()+"' class='list-group-item text_limit'>"+name.val()+"</a>");
                }else if(url_video.prop('src') != ""){
                    list.append("<a href='javascript:void(0);' data-type='video' data-src='"+url_video.prop('src')+"' class='list-group-item text_limit'>"+name.val()+"</a>");
                }
                clearPhotoVideoUpload();
                $("#largeModal").modal("hide");
            }
        });
        $("#largeModal").on('hide.bs.modal', function () {
            clearPhotoVideoUpload();
        });
        
        function clearPhotoVideoUpload(){
            $('#img_url').val("");
            $("#img_preview_url").prop('src','').hide();
            $('#upload_image_cache').val("");
            $('#upload_photo').val('');
            $("#img_preview").prop('src','').hide();
            $('#input_video_url').val('');
            $('#iframe_video').prop('src',"").hide();
            $('#input_name_import').val('');
            $("#upload_bar").html("0 %").attr('aria-valuenow',"0").width('0%').hide();
            //tab reset
            $('.nav-tabs li').removeClass('active');
            $('.nav-tabs li:first-child').addClass('active');
            $('.nav-tabs li a').prop('aria-expanded','false');
            $('.nav-tabs li:first-child a').prop('aria-expanded','true');
            $('.tab-content .tab-pane').removeClass('active in');
            $('.tab-content .tab-pane:first-child').addClass('active in');
            ClearAlertMessage('800');
        }
        
        
        $("#btn_uploadImage").click(function(){
            ajax_upload();
        });
        $('#wizard_vertical').steps({
            headerTag: 'h2',
            bodyTag: 'section',
            transitionEffect: 'slideLeft',
            stepsOrientation: 'vertical',
            onInit: function (event, currentIndex) {
                setButtonWavesEffect(event);
            },
            onStepChanging: function (event, currentIndex, priorIndex) {
                setButtonWavesEffect(event);
                return validateSteps(currentIndex);
            },
            onFinished: function () {
                Submit();
            }
            
            
        });
        function Submit(){
            $('#frm_phone').submit();
        }
        $('#frm_phone').submit(function(){
            var list = $('#list-photovideos a');
            var imp = $('[name=imports]');
            var imports = [];
            
            $(list).each(function (index) {
                var obj = {'name':$(this).text(),'type':$(this).data('type'),'src':$(this).data('src')};
                imports.push(obj);
            });
            imp.val(JSON.stringify(imports));
        });
        function validateSteps(index){
            var result = true;
            if(index == 0){
                // if($('[name=name]').val()== "" || $('[name=code]').val() == "" || $('[name=previous_price]').val() == "" || $('[name=current_price]').val() == ""){
                    //     AlertMessage("danger", "Invalid","Please input all required fields.");
                    //     result =false;
                    // }
                }
                return result;
            }
            function setButtonWavesEffect(event) {
                $(event.currentTarget).find('[role="menu"] li a').removeClass('waves-effect');
                $(event.currentTarget).find('[role="menu"] li:not(.disabled) a').addClass('waves-effect');
            }
            
            $(document).on("change", "#upload_photo", function () {
                if($(this).val() != ""){
                    $("#img_preview").show();
                    PreviewImage(this, $("#img_preview"));
                }else{
                    $("#img_preview").hide();
                }  
            });
            $(document).on("change", "#img_url", function () {
                if($(this).val() != ""){
                    $("#img_preview_url").show().prop('src',$(this).val());
                }else{
                    $("#img_preview_url").hide();
                }  
            });
            $('#input_video_url').change(function(){
                if($(this).val() != ""){
                    $('#iframe_video').prop('src',getYoutubeEmbed($(this).val())).show();
                }else{
                    $('#iframe_video').hide();
                }
            });
        });
        
        
        
        
    </script>
    
    @endsection