@extends('Shared.layout',['title'=> 'List Phone'])

@section('content')
<style>
    .form_btn{
        display: inline-block;
    }
</style>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>
                All Phone
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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="body table-responsive">
                        <table class="table table-bordered" align="left">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Brand</th>
                                    <th>Current Price</th>
                                    <th>Previous Price</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($phones as $phone)
                                <tr>
                                    <td>{{$phone->id}}</td>
                                    <td>{{$phone->name}}</td>
                                    <td>{{$phone->code}}</td>
                                    <td>{{$phone->brand->brand_name}}</td>
                                    <td>{{$phone->current_price}}</td>
                                    <td>{{$phone->previous_price}}</td>
                                    <td>{{$phone->created_at}}</td>
                                    <td>
                                        <form class="form_btn" action="/phone/{{$phone->id}}" method="GET">
                                            <input class="btn btn-info" type="submit" value="Info"/>
                                        </form>
                                        <form class="form_btn" action="/phone/{{$phone->id}}}/edit" method="GET">
                                            <input class="btn btn-success" type="submit" value="Update"/>
                                        </form>
                                        <form class="form_btn" action="/phone/{{$phone->id}}}" method="POST" onsubmit="return confirm('Are you sure you want to Delete {{ $phone->name }} Phone ?');">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="_method" value="DELETE"/>
                                            <input class="btn btn-warning" type="submit" value="Delete"/>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection