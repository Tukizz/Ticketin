@extends('layouts.navbar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reservation</div>

                <div class="panel-body">
                <form class="form-horizontal" action="/reservation/{{$reservation->id}}" method="post">
                    <div class="form-group">
                            <label class="col-md-4 control-label">Reservation Code</label>

                            <div class="col-md-6">
                               <input type="text" name="reservation_code" value="{{$reservation->reservation_code}}" class="form-control">

                                @if ($errors->has('reservation_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('reservation_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Seat Code</label>

                            <div class="col-md-6">
                               <input type="text" name="seat_code" value="{{$reservation->seat_code}}" class="form-control">

                                @if ($errors->has('seat_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('seat_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Reservation At</label>

                            <div class="col-md-6">
                               <input type="text" name="reservation_at" value="{{$reservation->reservation_at}}" class="form-control">

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
                               <input type="date" name="reservation_date" value="{{$reservation->reservation_date}}" class="form-control">

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

                                @php
                                    $type = $reservation->rute_id;
                                @endphp

                                <select name="rute_id" class="form-control">
                                    @foreach($rute as $type2)
                                        <option value="{{$type2->id}}" <?php if($type == $type2->id) {
                                            echo "selected";
                                        } ?>>{{$type2->rute_from}}-{{$type2->rute_to}} BY {{$type2->transportation->description}}</option>
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
                                <input type="hidden" name="costumer_id" value="{{$reservation->costumer_id}}">
                                <input type="hidden" name="users_id" value="{{$reservation->users_id}}">

                                 <input type="hidden" name="_method" value="put">
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
@endsection