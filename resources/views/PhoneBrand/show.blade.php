@extends('Shared.layout')

@section('content')
<style>
    .file_preview{
        min-width: 100px;
        max-width: 500px;
        border: 1px solid black;
    }
</style>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>
                @if($brand) 
                {{$brand->brand_name}} Brand Information
                @else
                Brand Information
                @endif
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
            <div class="row clearfix">
                @if($brand)
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                    <label>Brand Name</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="brand_name" value="{{ $brand->brand_name }}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                    <label>Brand URL</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="url" value="{{ $brand->url }}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                    <label>Created Date</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control"  value="{{ $brand->created_at }}">
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                    <label>Image</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            <img src="/storage/BrandImages/{{$brand->image}}" alt="Brand Image" class="file_preview">
                        </div>
                    </div>
                </div>
            </div>
            @else
            <h1>Not Found Brand</h1>
            @endif
            <div class="row clearfix">
                <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                    <a href="/brand"> <button type="button" class="btn btn-primary m-t-15 waves-effect">Back</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection