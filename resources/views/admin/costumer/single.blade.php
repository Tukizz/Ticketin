@extends('template.admin.app')
@section('content')
        <div class="container">
          <div class="row">
            <div class="page-header">
                <h1 class="page-title">
                  Profile
                </h1>
              </div>
          </div>

        <div class="row">
          <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">{{$costumer->name}}</h3>
                    &nbsp;&nbsp;
                    <span class="small text-muted">
                            - Registered: {{$costumer->created_at}}
                    </span>
                    <div class="card-options">
                      <a href="/admin/costumer/{{$costumer->id}}/edit" class="btn btn-primary btn">Edit</a>
                    </div>
                  </div>
                  <div class="card-body">

                    <div class="row">
                      <div class="col col-lg-4">
                        <div class="large text-muted">
                          Alamat : 
                        </div>
                        {{$costumer->address}}
                        
                      </div>

                      <div class="col col-lg-4">
                        <div class="large text-muted">
                          Phone : 
                        </div>
                        {{$costumer->phone}}
                      </div>

                      <div class="col col-lg-4">
                        <div class="large text-muted">
                          E-Mail : 
                        </div>
                        {{$costumer->email}}
                      </div>
                    </div>
<br>
                    <div class="row">
                      <div class="col col-lg-4">
                        <div class="large text-muted">
                          ID : 
                        </div>
                        {{$costumer->id}}
                      </div>

                      <div class="col col-lg-4">
                        <div class="large text-muted">
                          Username : 
                        </div>
                        {{$costumer->users_id}}
                      </div>

                      <div class="col col-lg-4">
                        <div class="large text-muted">
                          Jenis Kelamin 
                        </div>
                        {{$costumer->gender}}
                      </div>
                    </div>
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

          <div class="row">
            <div class="col-12">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-hover table-outline table-vcenter text-nowrap card-table">
                      <thead>
                        <tr>
                          <th data-filter="false">Reservation Code</th>
                          <th data-filter="false" class="text-center">Reservation At</th>
                          <th data-filter="false" class="text-center">Reservation Date</th>
                          <th data-filter="false">Seat Code</th>
                          <th data-filter="false">From</th>
                        </tr>
                      </thead>
                      <tfoot class="hide-on-small-only">
                <tr>
                  <th>Reservation Code</th>
                  <th>Reservation At</th>
                  <th>Reservation Date</th>
                  <th>Seat Code</th>
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
                        @foreach($reservation as $data)
                        @if($costumer->id == $data->costumer->id)
                        <tr>
                          <td>
                            <div>{{$data->reservation_code}}</div>
                          </td>
                          <td class="text-center">
                            <div>{{$data->reservation_at}}</div>
                            
                          </td>
                          <td class="text-center">
                            <div>{{$data->reservation_date}}</div>
                          </td>
                          <td>
                            <div>{{$data->seat_code}}</div>
                          </td>
                          <td>{{$data->rute->rute_from}} to : {{$data->rute->rute_to}}</td>
                          <td>
                           
                          </td>
                        </tr>
                         @else
                      
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
                <div class="panel-heading">Data Diri User</div>

                <div class="list-group">
                  <div class="list-group-item">
                    <h4 class="list-group-item-heading"><b>Nama</b></h4>
                    <p class="list-group-item-text">{{$costumer->name}}</p>
                  </div>

                  <div class="list-group-item">
                    <h4 class="list-group-item-heading"><b>Alamat</b></h4>
                    <p class="list-group-item-text">{{$costumer->address}}</p>
                  </div>

                  <div class="list-group-item">
                    <h4 class="list-group-item-heading"><b>info</b></h4>
                    <p class="list-group-item-text"><b>ID</b> : {{$costumer->users_id}}</p>
                    <p class="list-group-item-text"><b>Email</b> : {{$costumer->email}}</p>
                    <p class="list-group-item-text"><b>Phone</b> : {{$costumer->phone}}</p>
                    <p class="list-group-item-text"><b>JK</b>    : {{$costumer->gender}}</p>
                    <p class="list-group-item-text"><b>Join</b> : {{$costumer->created_at}}</p><br>
                     <a href="/admin/costumer/{{$costumer->id}}/edit" class="btn btn-success">Edit</a>
                  </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reservation User</div>

                <div class="panel-body">
                   
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Reservation Code</th>
                        <th>Reservation At</th>
                        <th>Reservation Date</th>
                        <th>Costumer</th>
                        <th>Seat Code</th>
                        <th>From</th>
                        <th colspan="2">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                       @foreach($reservation as $data)
    
                       @if($costumer->id == $data->costumer->id)
                      <tr>
                        
                        <td>{{$data->reservation_code}}</td>
                        <td>{{$data->reservation_at}}</td>
                        <td>{{$data->reservation_date}}</td>
                        <td>{{$data->costumer->name}}</td>
                        <td>{{$data->seat_code}}</td>
                        <td>{{$data->rute->rute_from}} to : {{$data->rute->rute_to}}</td>

                            <th>
                                <a href="/admin/costumer/{{$data->id}}/edit" class="btn btn-success">Edit</a>
                            </th> 
                            <th>
                                <form action="/admin/costumer/{{$data->id}}" method="post">
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" value="delete" class="btn btn-danger">delete</button>
                                </form>
                            </th>
                        
                      </tr>
                      @else
                      
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