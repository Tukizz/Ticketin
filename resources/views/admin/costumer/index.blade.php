@extends('template.admin.app')       
@section('content')

<div class="container">
  <div class="row">
          <div class="page-header">
              <h1 class="page-title">
                List Costumer
              </h1>
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
        <br><br>

         <div class="row row-cards row-deck">
              <div class="col-12">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-hover table-outline table-vcenter text-nowrap card-table tablesorter">
                      <thead>

                        <tr>
                          <th data-filter="false">Nama</th>
                          <th data-filter="false">Alamat</th>
                          <th data-filter="false">Telp</th>
                          <th data-filter="false">Jenis Kelamin</th>
                          <th data-filter="false">Action</th>
                        </tr>
                      </thead>
                      <tfoot class="hide-on-small-only">
                <tr>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Telp</th>
                  <th>Jenis Kelamin</th>
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
                        @foreach($costumer as $data)
                         @if($data->user->jabatan == 'admin')
                        
                        @else
                        <tr>
                          <td>
                            <div>{{$data->name}}</div>
                          </td>
                          <td>
                            <div>{{$data->address}}</div>
                            
                          </td>
                          <td>
                            <div>{{$data->phone}}</div>
                            
                          </td>
                          <td>
                            <div>{{$data->gender}}</div>
                          </td>
                          <td>
                            <div class="item-action dropdown">
                              <form action="/admin/costumer/{{$data->id}}" method="post">
                                <a href="/admin/costumer/{{$data->id}}/" class="btn btn-success">Detail</a>
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
@if(Auth::user()->jabatan == 'admin')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">List Costumer</div>

                <div class="panel-body">
                   
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Telp</th>
                        <th>JK</th>
                        <th>Email</th>
                        <th colspan="3">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                       @foreach($costumer as $data)
                       
                       <tr></tr>
                       
                      <tr>
                        @if($data->user->jabatan == 'admin')
                        
                        @else
                        <td>{{$data->name}}</td>
                        <td>{{$data->address}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->gender}}</td>
                        <td>{{$data->email}}</td>

                            <th>
                                <a href="/admin/costumer/{{$data->id}}/" class="btn btn-success">Detail</a>
                            </th> 
                            <th>
                                <form action="/admin/costumer/{{$data->id}}" method="post">
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" value="delete" class="btn btn-danger">delete</button> 
                                </form>
                            </th>
                        
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
@else
<script type="text/javascript">
    window.location = "/costumer";//here double curly bracket
</script>
@endif
@endsection

				
{{-- <form class="form-horizontal" action="/costumer" method="post" >
    NAMA : <input type="text" class="form-control" name="name"><br>
    ALAMAT : <input type="text" class="form-control" name="adress"><br>
    PHONE : <input type="text" class="form-control" name="phone"><br>
    GENDER : <input type="text" class="form-control" name="gender"><br>
    USERS_ID : <input type="text" class="form-control" name="users_id"><br>          

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit">
</form>

@foreach($costumer as $data)

	{{$data->id}} <br>   
	{{$data->name}} <br>    
	{{$data->adress}} <br> 
	{{$data->phone}} <br>
	{{$data->gender}} <br>
	{{$data->users_id}} <br>   

	<a href="/costumer/{{$data->id}}/edit" class="btn btn-success">Edit</a>

	<form action="/costumer/{{$data->id}}" method="post">
	    <input type="hidden" name="_method" value="delete">
	    <input type="hidden" name="_token" value="{{ csrf_token() }}">
	    <button type="submit" value="delete" class="btn btn-danger">delete</button> 
	</form>

@endforeach --}}

 --}}