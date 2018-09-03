@extends('Shared.layout',['title' => 'Create Phone'])
@section('content')
<style>
    .input-group{
        margin-bottom: 0px;
    }
</style>
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
            <form class="form-horizontal" action="/brand" method="POST" enctype="multipart/form-data">
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
                                    <label>Phone / Video :</label>
                                    <div class="icon-button-demo js-modal-buttons button-add">
                                        <button type="button" data-toggle="modal" data-target="#largeModal" class="btn bg-deep-orange btn-circle waves-effect waves-circle waves-float">
                                            <i class="material-icons">add</i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="list-group" id="list-photovideos">
                                            <a href="javascript:void(0);" class="list-group-item">Cras justo odio</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </section>
                        
                        <h2>Third Step</h2>
                        <section>
                            <p>
                                Morbi ornare tellus at elit ultrices id dignissim lorem elementum. Sed eget nisl at justo
                                condimentum dapibus. Fusce eros justo, pellentesque non euismod ac, rutrum sed quam.
                                Ut non mi tortor. Vestibulum eleifend varius ullamcorper. Aliquam erat volutpat.
                                Donec diam massa, porta vel dictum sit amet, iaculis ac massa. Sed elementum dui
                                commodo lectus sollicitudin in auctor mauris venenatis.
                            </p>
                        </section>
                        
                        <h2>Forth Step</h2>
                        <section>
                            <p>
                                Quisque at sem turpis, id sagittis diam. Suspendisse malesuada eros posuere mauris vehicula
                                vulputate. Aliquam sed sem tortor. Quisque sed felis ut mauris feugiat iaculis nec
                                ac lectus. Sed consequat vestibulum purus, imperdiet varius est pellentesque vitae.
                                Suspendisse consequat cursus eros, vitae tempus enim euismod non. Nullam ut commodo
                                tortor.
                            </p>
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
                <h4 class="modal-title" id="largeModalLabel">Import</h4>
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
                                                <input type="text" class="form-control" placeholder="Photo Url">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-5 form-control-label">
                                        <label>Upload</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                        <form method="POST" id="form_upload">
                                            {!! Form::token(); !!}
                                            <input type="text" class="form-control" name="testing" >
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <img id="img_preview" alt="Photo" class="file_preview">
                                                    <input type="file" class="form-control" name="upload_photo" id="upload_photo" accept="image/*">
                                                    
                                                </div>
                                                <input type="button" class="btn btn-warning" value="Upload" id="btn_uploadImage">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" id="upload_bar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;">
                                                        75%
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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
                                                
                                                <input type="text" class="form-control" placeholder="Video Url">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item" src="//www.youtube.com/embed/ePbKGoIGAXY"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect">SAVE</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>
{{-- End Modal --}}
<script src="{{ asset('plugins/jquery-validation/jquery.validate.js')}}"></script>
<script src="{{ asset('plugins/jquery-steps/jquery.steps.js')}}"></script>
<script src="{{ asset('js/pages/ui/modals.js') }}"></script>
{{-- <script src="{{ asset('js/pages/forms/form-wizard.js')}}"></script> --}}
<script>
    //var formData = new FormData();
    function ajax_upload(){
        var id= "111";
        //var image = $('#upload_photo')[0].files[0];
        var form = new FormData();
        form.append('id', id);
        //form.append('image', image);
        $.ajax({
            url: 'uploadimage',
            data: {"id": 14},
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data) {
                console.log(data);
            }
            // ,
            // error:function(e){ 
            //     console.log(e.responseText);
            // }
        });
            }
            $(document).ready(function(){
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
                    }
                    
                })
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
                    $("#img_preview").hide();
                    
                    $(document).on("change", "#upload_photo", function () {
                        if($(this).val() != ""){
                            $("#img_preview").show();
                            PreviewImage(this, $("#img_preview"));
                        }else{
                            $("#img_preview").hide();
                        }
                        
                    });
                });
                
                
            </script>
            
            @endsection