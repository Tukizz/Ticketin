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
                            <h3 class="card-title">Edit Transport Type</h3>
                    <div class="card-options">
                      <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                      <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                    </div>
                  </div>
                  <div class="card-body">
              <form action="/admin/transportation_type/{{$transportation_type->id}}" method="post">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12 col-md-12">
                      <div class="form-group">
                        <label class="form-label">Jenis Transport</label>
                        <select name="description" class="form-control">
                          <option value=""></option>
                          <option value="kapal">Kapal</option>
                          <option value="pesawat">Pesawat</option>
                          <option value="kereta">Kereta</option>
                          <option value="bis">Bis</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-right">
                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input class="btn" type="submit">
                    <a href="/admin/transportation_type" class="btn btn-default">cancel</a>
                </div>
              </form>
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
                <div class="panel-heading">Transportation Type</div>

                <div class="panel-body">
				<form class="form-horizontal" action="/admin/transportation_type/{{$transportation_type->id}}" method="post" >
				    <div class="form-group">
                            <label class="col-md-4 control-label">Type</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="description" value="{{$transportation_type->description}}">

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                            	<input type="hidden" name="_method" value="put">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
				    			<input class="btn" type="submit">
				    			<a href="/admin/transportation_type" class="btn btn-default">cancel</a>
                            </div>
                        </div>
				</form>
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