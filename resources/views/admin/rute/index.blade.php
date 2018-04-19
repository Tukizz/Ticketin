@extends('template.admin.app')

@section('content')
<div class="container">
        <div class="row">
          <div class="page-header">
              <h1 class="page-title">
                Transport
              </h1>
            </div> 
        </div>

        <div class="row">

              <div class="col-md-12 col-xl-12">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">Input Rute</h3>
                    <div class="card-options">
                      <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                      <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                    </div>
                  </div>
                  <div class="card-body">
              <form action="/admin/rute" method="post">
                <div class="card-body">
                 
                  <div class="row">
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Depart At</label>
                        <input type="date" class="form-control" name="depart_at">
                      </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Rute From</label>
                        <input type="text" class="form-control" name="rute_from">
                      </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Rute To</label>
                        <input type="text" class="form-control" name="rute_to">
                      </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Type</label>
                        <select name="transportation_id" class="form-control">
                            @foreach($transportation as $type)
                                <option value="{{$type->id}}">{{$type->code}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-12 col-md-12">
                      <div class="form-group">
                        <label class="form-label">Price</label>
                        <input type="text" class="form-control" name="price">
                      </div>
                    </div>

                  </div>
                </div>
                <div class="card-footer text-right">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
              </form>
                  </div>
                </div>
              </div>


          <div class="col col-lg-12">

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
                          <th data-filter="false">Depart At</th>
                          <th data-filter="false">Rute From</th>
                          <th data-filter="false">Rute To</th>
                          <th data-filter="false">Price</th>
                          <th data-filter="false">Code</th>
                          <th data-filter="false">Action</th>
                        </tr>
                      </thead>
                      <tfoot class="hide-on-small-only">
                <tr>
                  <th>Depart At</th>
                  <th>Rute From</th>
                  <th>Rute to</th>
                  <th>Price</th>
                  <th>Code</th>
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
                        @foreach($rute as $data)
                        <tr>
                          <td>
                            <div>{{$data->depart_at}}</div>
                          </td>
                          <td>
                            <div>{{$data->rute_from}}</div>
                            
                          </td>
                          <td>
                            <div>{{$data->rute_to}}</div>
                            
                          </td>
                          <td >
                            <div>{{$data->price}}</div>
                          </td>
                          <td>
                            <div>{{$data->transportation->code}}</div>
                          </td>
                          <td >
                            <div class="item-action dropdown">
     
                            <form action="/admin/rute/{{$data->id}}" method="post">
                                <a href="/admin/rute/{{$data->id}}/edit" class="btn btn-success">Edit</a>
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" value="delete" class="btn btn-danger">delete</button> 
                                </form>
                             
                            </div>
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
@endsection



{{-- @extends('layouts.navbar')

@section('content')
@if(Auth::user()->jabatan == 'admin')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Rute</div>

                <div class="panel-body">
				<form class="form-horizontal" action="/admin/rute" method="post" >
				    <div class="form-group">
                        <label class="col-md-4 control-label">Depart At</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control" name="depart_at">
                            @if ($errors->has('depart_at'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('depart_at') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Rute From</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="rute_from">

                            @if ($errors->has('rute_from'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('rute_from') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Rute To</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="rute_to">

                                @if ($errors->has('rute_to'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rute_to') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Price</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="price">

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Type</label>

                            <div class="col-md-6">
                                <select name="transportation_id" class="form-control">
							    	@foreach($transportation as $type)
								  		<option value="{{$type->id}}">{{$type->code}}</option>
								  	@endforeach
								</select>

                                @if ($errors->has('transportation_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('transportation_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
				    			<input class="btn" type="submit">
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
                <div class="panel-heading">List Type</div>

                <div class="panel-body">
                   
				<table class="table table-striped">
				    <thead>
				      <tr>
				        <th>Depart At</th>
				        <th>Rute From</th>
				        <th>Rute To</th>
				        <th>Price</th>
				        <th>Code</th>
				        <th colspan="2">Action</th>
				      </tr>
				    </thead>
				    <tbody>
				    	@foreach($rute as $data)
				      <tr>
				        <td>{{$data->depart_at}}</td>
				        <td>{{$data->rute_from}}</td>
				        <td>{{$data->rute_to}}</td>
				        <td>{{$data->price}}</td>
				        <td>{{$data->transportation->code}}</td>
				        <td> 
				        	<th>
				        		<a href="/admin/rute/{{$data->id}}/edit" class="btn btn-success">Edit</a>
				        	</th> 
				        	<th>
				        		<form action="/admin/rute/{{$data->id}}" method="post">
								    <input type="hidden" name="_method" value="delete">
								    <input type="hidden" name="_token" value="{{ csrf_token() }}">
								    <button type="submit" value="delete" class="btn btn-danger">delete</button> 
								</form>
							</th>
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
@else
<script type="text/javascript">
    window.location = "/404";//here double curly bracket
</script>
@endif
@endsection --}}