@extends('template.admin.app')
@section('content')
    <div class="container">
        <div class="row">
        <div class="col col-lg-12">
          <form class="card" class="form-horizontal" method="POST" action="/admin/manage-admin">
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <div class="card-body">
                  <h3 class="card-title">Input Admin</h3>
                  <div class="row">
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Name</label>
                        <input id="name" type="text" class="form-control" name="name" autofocus>
                      </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Username</label>
                        <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" autofocus>
                    </div>
                </div>

                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Password</label>
                        <input id="password" type="password" class="form-control" name="password" >
                      </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Re-type Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                      </div>
                    </div>

                  </div>
                </div>
                <div class="card-footer text-right">
                    <input type="hidden" name="address">
                    <input type="hidden" name="phone">
                    <input type="hidden" name="gender">
                    <input type="hidden" name="email" value="">
                    <input type="hidden" name="jabatan" value="admin">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-primary">
                        Register
                    </button>
                </div>
              </form>
        </div>
          

        </div>

                <div class="row">
          <div class="col-md-12 col-xl-12">
                 <form class="input-icon my-3 my-lg-0">
                  <input type="search" data-column="all" class="form-control header-search search" placeholder="Search&hellip;" tabindex="1">
                  <div class="input-icon-addon">
                    <i class="fe fe-search"></i>
                  </div>
                </form>
              </div>
        </div>
        <br>

                  <div class="row row-cards row-deck">
              <div class="col-12">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-hover table-outline table-vcenter text-nowrap card-table tablesorter">
                      <thead>
                        <tr>
                          <th data-filter="false">Name</th>
                          <th data-filter="false">Username</th>
                          <th data-filter="false">Created At</th>
                          <th data-filter="false">Action</th>
                        </tr>
                      </thead>
                      <tfoot class="hide-on-small-only">
                <tr>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Created At</th>
                  <th>Action</th>
                </tr>
                <!-- include "tablesorter-ignoreRow" class for pager rows in thead -->
                <tr class="tablesorter-ignoreRow">
                  <th colspan="7" class="ts-pager form-horizontal">
                    <button type="button" class="btn first"><i class="fa fa-angle-double-left"></i></button>
                    <button type="button" class="btn prev"><i class="fa fa-chevron-left"></i></button>
                    <span class="pagedisplay"></span>
                    <!-- this can be any element, including an input -->
                    <button type="button" class="btn next"><i class="fa fa-chevron-right"></i></button>
                    <button type="button" class="btn last"><i class="fa fa-angle-double-right"></i></button>
                    <select class="pagesize browser-default" title="Select page size">
                      <option selected="selected" value="5">5</option>
                      <option value="10">10</option>
                      <option value="20">20</option>
                      <option value="30">30</option>
                      <option value="40">40</option>
                    </select>
                    <select class="pagenum browser-default" title="Select page number"></select>
                  </th>
                </tr>
              </tfoot>
                      <tbody>
                        @foreach($user as $data)
                        @if($data->jabatan == 'user')
                        @else
                        <tr>
                          <td>
                            <div>{{$data->username}}</div>
                          </td>
                          <td>
                            <div>{{$data->name}}</div>
                            
                          </td>
                          <td>
                            <div>{{$data->created_at}}</div>
                            
                          </td>
                          <td>
                            <div class="item-action dropdown">
                             <form action="/admin/manage-admin/{{$data->id}}" method="post">
                                <input type="hidden" name="_method" value="delete">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" value="delete" class="btn btn-danger">delete</button> 
                            </form>
                            </div>
                          </td>
                        </tr>
                         @endif
                      @endforeach                        
                      </tbody>
                    </table>
                  </div>
                </div>
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
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" >

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input type="hidden" name="address">
                                <input type="hidden" name="phone">
                                <input type="hidden" name="gender">
                                <input type="hidden" name="email">
                                <input type="hidden" name="jabatan" value="admin">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">List Admin</div>

                <div class="panel-body">
                   
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Akses</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $data)
                        @if($data->jabatan == 'user')
                        @else
                      <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->username}}</td>
                        <td>{{$data->username}}</td>
                        <td>{{$data->jabatan}}</td>
                        <td> 
                            <form action="/transportation_type/{{$data->id}}" method="post">
                                <input type="hidden" name="_method" value="delete">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" value="delete" class="btn btn-danger">delete</button> 
                            </form>
                        </td>
                      </tr>
                      @endif
                      @endforeach
                    </tbody>

                </table>   
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
 --}}