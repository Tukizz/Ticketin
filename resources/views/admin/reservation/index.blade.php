@extends('template.admin.app')
@section('content')
        <div class="container">
          <div class="row">
            <div class="page-header">
                <h1 class="page-title">
                  List Reservation
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
        <br>

          <div class="row row-cards row-deck">
              <div class="col-12">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-hover table-outline table-vcenter text-nowrap card-table tablesorter">
                      <thead>
                        <tr>
                          <th data-filter="false">Reservation Code</th>
                          <th data-filter="false">Reservation At</th>
                          <th data-filter="false">Reservation Date</th>
                          <th data-filter="false">Costumer</th>
                          <th data-filter="false">Seat Code</th>
                          <th data-filter="false">From</th>
                          <th data-filter="false">Action</th>
                        </tr>
                      </thead>
                      <tfoot class="hide-on-small-only">
                <tr>
                  <th>Reservation Code</th>
                  <th>Reservation At</th>
                  <th>Reservation Date</th>
                  <th>Costumer</th>
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
                        <tr>
                          <td>
                            <div>{{$data->reservation_code}}</div>
                          </td>
                          <td>
                            <div>{{$data->reservation_at}}</div>
                            
                          </td>
                          <td class="text-center">
                            <div>{{$data->reservation_date}}</div>
                            
                          </td>
                          <td class="text-center">
                            <div><a href="/admin/costumer/{{$data->costumer->id}}">{{$data->costumer->name}}</a></div>
                          </td>
                          <td>
                            <div>{{$data->seat_code}}</div>
                          </td>
                          <td>
                              <div>{{$data->rute->rute_from}} to : {{$data->rute->rute_to}}</div>
                          </td>
                          <td class="text-center">
                            <div class="item-action dropdown">
                              <form action="/admin/reservation/{{$data->id}}" method="post">
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
                <div class="panel-heading">List Reservation</div>

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
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($reservation as $data)
                      <tr>
                        <td>{{$data->reservation_code}}</td>
                        <td>{{$data->reservation_at}}</td>
                        <td>{{$data->reservation_date}}</td>
                        <td><a href="/admin/costumer/{{$data->costumer->id}}">{{$data->costumer->name}}</a></td>
                        <td>{{$data->seat_code}}</td>
                        <td>{{$data->rute->rute_from}} to : {{$data->rute->rute_to}}</td>
                        <td> 
                            
                                <form action="/admin/reservation/{{$data->id}}" method="post">
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" value="delete" class="btn btn-danger">delete</button> 
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
@else
<script type="text/javascript">
    window.location = "/404";//here double curly bracket
</script>
@endif
@endsection --}}