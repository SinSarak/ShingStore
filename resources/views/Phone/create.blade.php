@extends('Shared.layout',['title' => 'Create Phone'])
@section('content')
<style>
    .input-group{
        margin-bottom: 0px;
    }
</style>
{{-- <link href="{{ asset('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet" /> --}}
{{-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script> --}}

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
                                            {{-- <a href="javascript:void(0);" class="list-group-item">Cras justo odio</a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </section>
                        
                        <h2>Third Step</h2>
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
                                        <input type="checkbox" id="md_checkbox_6" class="chk-col-blue" name="GPRS" checked />
                                        <label for="md_checkbox_6">GPRS</label>
                                    </div>
                                    <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-2 col-md-2 col-sm-2 col-xs-4">
                                        <input type="checkbox" id="md_checkbox_7" class="chk-col-blue" name="EDGE" checked />
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
                                            
                                            <input type="text" id="date" class="form-control floating-label" placeholder="Date">
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
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
        
        $('#date').bootstrapMaterialDatePicker
			({
				time: false,
				clearButton: true
			});
        
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