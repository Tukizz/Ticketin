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
                    <h3 class="card-title">Edit Transportation</h3>
                    <div class="card-options">
                      <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                      <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                    </div>
                  </div>
                  <div class="card-body">
              <form action="/admin/transportation/{{$transportation->id}}" method="post">
                <div class="card-body">
                 
                  <div class="row">
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Code</label>
                        <input id="password" type="text" class="form-control" name="code" value="{{$transportation->code}}" required>
                      </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Description</label>
                        <input id="password" type="text" class="form-control" name="description" value="{{$transportation->description}}" required>
                      </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Seat Qty</label>
                        <input id="password" type="text" class="form-control" name="seat_qty" value="{{$transportation->seat_qty}}" required>
                      </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Jenis</label>
                        @php
                            $type = $transportation->transportation_type_id;
                        @endphp

                        <select name="transportation_type_id" class="form-control">
                            @foreach($transportation_type as $type2)
                                <option value="{{$type2->id}}" <?php if($type == $type2->id) {
                                    echo "selected";
                                    } ?>>{{$type2->description}}</option>
                                @endforeach
                        </select>
                      </div>
                    </div>

                  </div>
                </div>
                <div class="card-footer text-right">
                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-primary">
                    <a href="/admin/transportation" class="btn btn-default">cancel</a>
                </div>
              </form>
                  </div>
                </div>
              </div>

        </div>
        </div>
@endsection