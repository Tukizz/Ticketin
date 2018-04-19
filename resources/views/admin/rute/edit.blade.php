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
                    <h3 class="card-title">Edit Rute</h3>
                    <div class="card-options">
                      <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                      <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                    </div>
                  </div>
                  <div class="card-body">
              <form action="/admin/rute/{{$rute->id}}" method="post">
                <div class="card-body">
                 
                  <div class="row">
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Depart At</label>
                        <input type="date" class="form-control" name="depart_at" value="{{$rute->depart_at}}">
                      </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Rute From</label>
                        <input type="text" class="form-control" name="rute_from" value="{{$rute->rute_from}}">
                      </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Rute To</label>
                        <input type="text" class="form-control" name="rute_to" value="{{$rute->rute_to}}">
                      </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Type</label>
                        @php
                            $type = $rute->transportation_id;
                        @endphp

                        <select name="transportation_id" class="form-control">
                            @foreach($transportation as $type2)
                                <option value="{{$type2->id}}" <?php if($type == $type2->id) {
                                    echo "selected";
                                } ?>>{{$type2->code}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-12 col-md-12">
                      <div class="form-group">
                        <label class="form-label">Price</label>
                        <input type="text" class="form-control" name="price" value="{{$rute->price}}">
                      </div>
                    </div>

                  </div>
                </div>
                <div class="card-footer text-right">
                     <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input class="btn" type="submit">
                    <a href="/admin/transportation" class="btn btn-default">cancel</a>
                </div>
              </form>
                  </div>
                </div>
              </div>
        </div>
        </div>
@endsection