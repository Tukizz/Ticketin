@extends('template.user.profile')

@section('content')
<div class="wrapper">
<br><br><br>
        <div class="section section-light-blue text-center">
            <div class="container">
                <h2 class="title text-white">Pesan Tiket</h2>
                <div class="row">
                    @foreach($rute as $data)
                    <div class="col-md-4">
                        <div class="card card-profile">
                            <div class="card-avatar">
                                @if($data->transportation->transportation_type->description == 'pesawat')
                                    <a href="#avatar"><img src="/user/img/plane.png" alt="..."></a>
                                @elseif($data->transportation->transportation_type->description == 'kereta')
                                     <a href="#avatar"><img src="/user/img/train.png" alt="..."></a>
                                @elseif($data->transportation->transportation_type->description == 'kapal')
                                    <a href="#avatar"><img src="/user/img/ship.png" alt="..."></a>
                                 @elseif($data->transportation->transportation_type->description == 'bis')
                                    <a href="#avatar"><img src="/user/img/bus.png" alt="..."></a>
                                @else
                                @endif
                            </div>
                            <div class="card-body">
                                
                                    <div class="author">
                                        <h4 class="card-title">{{$data->rute_from}}-{{$data->rute_to}}</h4>
                                        <h6 class="card-category">{{$data->depart_at}}</h6>
                                    </div>
                            </div>
                            <div class="card-footer text-center">
                                <form class="" action="/reservation" method="post">
                                    <input type="hidden" name="reservation_at" value="{{$data->rute_from}}">
                                    <input type="hidden" name="reservation_date" value="@php echo date('Y-m-d'); @endphp">
                                    <input type="hidden" name="costumer_id" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="users_id" value="{{Auth::user()->username}}">
                                    <input type="hidden" name="rute_id" value="{{$data->id}}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-info">Pesan</button>
                    
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal{{$data->id}}">detail</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-center" id="exampleModalLabel">About Ticket</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body"> 
                        
                                        <h6>Depart At</h6>
                                        <p>{{$data->depart_at}}</p>
                                        <h6>Price</h6>
                                        <p>{{$data->price}}</p>
                                        <h6>Transportation</h6>
                                        <p>{{$data->transportation->description}}({{$data->transportation->transportation_type->description}})</p>
                                   
                                </div>
                                <div class="modal-footer">
                                    <div class="left-side">
                                        <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">close</button>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="right-side">
                                        <form class="" action="/reservation" method="post">
                                    <input type="hidden" name="reservation_at" value="{{$data->rute_from}}">
                                    <input type="hidden" name="reservation_date" value="@php echo date('Y-m-d'); @endphp">
                                    <input type="hidden" name="costumer_id" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="users_id" value="{{Auth::user()->username}}">
                                    <input type="hidden" name="rute_id" value="{{$data->id}}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-info btn-link">Pesan</button>
                    
                                    
                                </form>


                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
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
                <div class="panel-heading">Reservation</div>

                <div class="panel-body">
				<form class="form-horizontal" action="/reservation" method="post">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Reservation At</label>

                            <div class="col-md-6">
                               <input type="text" class="form-control" name="reservation_at">

                                @if ($errors->has('reservation_at'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('reservation_at') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Reservation Date</label>

                            <div class="col-md-6">
                               <input type="date" class="form-control" name="reservation_date">

                                @if ($errors->has('reservation_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('reservation_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">From</label>

                            <div class="col-md-6">
                               <select name="rute_id" class="form-control">
									@foreach($rute as $data1)
										<option value="{{$data1->id}}"> {{$data1->rute_from}}-{{$data1->rute_to}} BY {{$data1->transportation->description}}
										</option>
									@endforeach
								</select>

                                @if ($errors->has('rute_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rute_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                            	<input type="hidden" name="costumer_id" value="{{Auth::user()->id}}">
								<input type="hidden" name="users_id" value="{{Auth::user()->username}}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
				    			<input class="btn" type="submit">
                            </div>
                        </div>
				</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}