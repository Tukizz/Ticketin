@extends('template.admin.app')
@section('content')
        <div class="container">

        <div class="row">
            <div class="page-header">
                <h1 class="page-title">
                  Edit Profile
                </h1>
              </div>
          </div>

        <div class="row">
      
        <div class="col col-lg-12">
          <form class="card" action="/admin/costumer/{{$costumers->id}}" method="post">
                <div class="card-body">
                  <h3 class="card-title">Edit Profile</h3>
                  <div class="row">
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="name" value="{{$costumers->name}}">
                      </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Telp</label>
                        <input type="telp" class="form-control" name="phone" value="{{$costumers->phone}}">
                      </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="gender" class="form-control">
                            @if($costumers == 'pria')
                                <option value="pria" selected>Pria</option>
                                <option value="wanita" >Wanita</option>
                            @else
                                <option value="pria" >Pria</option>
                                <option value="wanita" selected>Wanita</option>
                            @endif 
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{$costumers->email}}">
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group mb-0">
                        <label class="form-label">Alamat</label>
                        <textarea rows="5" class="form-control" name="address">{{$costumers->address}}</textarea>
                      </div>
                    </div>

                  </div>
                </div>
                <div class="card-footer text-right">
                   <input type="hidden" name="users_id" value="{{$costumers->users_id}}">
                    <input type="hidden" name="_method" value="put">          
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-primary">
                    <a href="/admin/costumer/{{$costumers->id}}" class="btn btn-default">cancel</a>
                </div>
              </form>
        </div>
          

        </div>
      </div>
@endsection


{{-- @extends('layouts.navbar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Profile</div>

                <div class="panel-body">
                    <form class="form-horizontal" action="/admin/costumer/{{$costumers->id}}" method="post" >

                        <div class="form-group">
                            <label class="col-md-4 control-label">Nama</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{$costumers->name}}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Alamat</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address" value="{{$costumers->address}}">

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone" value="{{$costumers->phone}}">

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Jenis Kelamin</label>

                            <div class="col-md-6">

                                <select name="gender" class="form-control">
                                    @if($costumers == 'pria')
                                        <option value="pria" selected>Pria</option>
                                        <option value="wanita" >Wanita</option>
                                    @else
                                        <option value="pria" >Pria</option>
                                        <option value="wanita" selected>Wanita</option>
                                    @endif 
                                </select>

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="email" value="{{$costumers->email}}">

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <input type="hidden" name="users_id" value="{{$costumers->users_id}}">

                                <input type="hidden" name="_method" value="put">          
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn">
                                <a href="/admin/costumer/{{$costumers->id}}" class="btn btn-default">cancel</a>
                            </div>
                        </div>

                        
                    </form>

            
                        </div>
                </div>
                    

                    
                        

                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}