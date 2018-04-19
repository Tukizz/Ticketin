@extends('template.user.profile')
@section('content')  
<br><br><br>  
    <div class="wrapper">
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="search" data-column="all" class="form-control search" placeholder="Search">
                        </div>
                    </div>
                </div>

                <div class="row">
                <table class="table table-responsive">
                  <caption>List of Reservation</caption>
                  <thead>
                    <tr>
                      <th data-filter="false" scope="col">Reservation Code</th>
                      <th data-filter="false" scope="col">Reservation At</th>
                      <th data-filter="false" scope="col">Reservation Date</th>
                      <th data-filter="false" scope="col">Seat Code</th>
                      <th data-filter="false" scope="col">From</th>
                      <th data-filter="false" scope="col">Action</th>
                    </tr>
                  </thead>
                  <tfoot class="hide-on-small-only">
                <tr>
                  <th>Reservation Code</th>
                  <th>Reservation At</th>
                  <th>Reservation Date</th>
                  <th>Seat Code</th>
                  <th>From</th>
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

                 
				    @foreach($reservation as $data)
                    @if($data->users_id == Auth::user()->username)
	                    <tr>
	                      <td>{{$data->reservation_code}}</td>
	                      <td>{{$data->reservation_at}}</td>
	                      <td>{{$data->reservation_date}}</td>
	                      <td>{{$data->seat_code}}</td>
	                      <td>{{$data->rute->rute_from}} - {{$data->rute->rute_to}}</td>
	                      <td>

	                      	<form action="/admin/reservation/{{$data->id}}" method="post">
            								<input type="hidden" name="_method" value="delete">
            								<input type="hidden" name="_token" value="{{ csrf_token() }}">
            								<button type="submit" value="delete" class="btn btn-danger">Batal</button> 
            							</form>
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
@endsection



{{-- @extends('layouts.navbar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">List Type</div>

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
                        @if($data->users_id == Auth::user()->username)
				      <tr>
				        <td>{{$data->reservation_code}}</td>
				        <td>{{$data->reservation_at}}</td>
				        <td>{{$data->reservation_date}}</td>
				        <td>{{$data->costumer->name}}</td>
				        <td>{{$data->seat_code}}</td>
				        <td>{{$data->rute->rute_from}} to : {{$data->rute->rute_to}}</td>
				        <td> 

				        	
				        		<form action="/reservation/{{$data->id}}" method="post">
								    <input type="hidden" name="_method" value="delete">
								    <input type="hidden" name="_token" value="{{ csrf_token() }}">
								    <button type="submit" value="delete" class="btn btn-danger">Batal</button> 
								</form>
							
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
@endsection --}}