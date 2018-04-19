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
                    <h3 class="card-title">Input Transportation</h3>
                    <div class="card-options">
                      <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                      <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                    </div>
                  </div>
                  <div class="card-body">
              <form action="/admin/transportation" method="post">
                <div class="card-body">
                 
                  <div class="row">
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Code</label>
                        <input id="password" type="text" class="form-control" name="code" required>
                      </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Description</label>
                        <input id="password" type="text" class="form-control" name="description" required>
                      </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Seat Qty</label>
                        <input id="password" type="text" class="form-control" name="seat_qty" required>
                      </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Jenis</label>
                        <select name="transportation_type_id" class="form-control">
                                    @foreach($transportation_type as $type)
                                        <option value="{{$type->id}}">{{$type->description}}</option>
                                    @endforeach
                                </select>
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
                    <table class="table table-hover table-outline table-vcenter text-nowrap card-table">
                      <thead>
                        <tr>
                          <th data-filter="false">Code</th>
                          <th data-filter="false">Description</th>
                          <th data-filter="false">Seat Qty</th>
                          <th data-filter="false">Jenis</th>
                          <th data-filter="false">Action</th>
                        </tr>
                      </thead>
                      <tfoot class="hide-on-small-only">
                <tr>
                  <th>Code</th>
                  <th>Description</th>
                  <th>Seat Qty</th>
                  <th>Jenis</th>
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
                        @foreach($transportation as $data)
                        <tr>
                          <td>
                            <div>{{$data->code}}</div>
                          </td>
                          <td>
                            <div>{{$data->description}}</div>
                            
                          </td>
                          <td>
                            <div>{{$data->seat_qty}}</div>
                            
                          </td>
                          <td>
                            <div>{{$data->transportation_type->description}}</div>
                          </td>
                          <td>
                            <div class="item-action dropdown">
                              
                              <form action="/admin/transportation/{{$data->id}}" method="post">
                                <a href="/admin/transportation/{{$data->id}}/edit" class="btn btn-success">Edit</a>
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
                <div class="panel-heading">Transportation</div>

                <div class="panel-body">
				<form class="form-horizontal" action="/admin/transportation" method="post" >
				    <div class="form-group">
                            <label class="col-md-4 control-label">Code</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control" name="code" required>

                                @if ($errors->has('code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control" name="description" required>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

				    	<div class="form-group">
                            <label class="col-md-4 control-label">Seat QTY</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control" name="seat_qty" required>

                                @if ($errors->has('seat_qty'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('seat_qty') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Trasnportation Type</label>

                            <div class="col-md-6">
                            	<select name="transportation_type_id" class="form-control">
							    	@foreach($transportation_type as $type)
								  		<option value="{{$type->id}}">{{$type->description}}</option>
								  	@endforeach
								</select>
                                

                                @if ($errors->has('transportation_type_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('transportation_type_id') }}</strong>
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
                <div class="panel-heading">List Transportation</div>

                <div class="panel-body">
                   
				<table class="table table-striped">
				    <thead>
				      <tr>
				        <th>Code</th>
				        <th>Description</th>
				        <th>Seat Qty</th>
				        <th>Type</th>
				        <th colspan="2">Action</th>
				      </tr>
				    </thead>
				    <tbody>
				    	@foreach($transportation as $data)
				      <tr>
				        <td>{{$data->code}}</td>
				        <td>{{$data->description}}</td>
				        <td>{{$data->seat_qty}}</td>
				        <td>{{$data->transportation_type->description}}</td>
				        <td> 
				        	<th>
				        		<a href="/transportation/{{$data->id}}/edit" class="btn btn-success">Edit</a>
				        	</th> 
				        	<th>
				        		<form action="/transportation/{{$data->id}}" method="post">
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