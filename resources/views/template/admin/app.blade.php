<!Doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">

    
    <script src="/manage/js/jquery-3.2.1.min.js"></script>
    <script src="/manage/js/core.js"></script>
    <script src="/manage/js/bootstrap.bundle.min.js"></script>
       <script src="/manage/js/jquery.tablesorter.combined.js"></script>
    <link rel="stylesheet" href="/manage/css/theme.bootstrap_4.css">
    <script>
      requirejs.config({
          baseUrl: '.'
      });
    </script>

    <script id="js">$(function() {

  var $table = $('table').tablesorter({

    headers: { 0: { filter: false} },
    
    theme: 'blue',
    widgets: ["zebra", "filter"],
    widgetOptions : {
      // filter_anyMatch replaced! Instead use the filter_external option
      // Set to use a jQuery selector (or jQuery object) pointing to the
      // external filter (column specific or any match)
      filter_external : '.search',
      // add a default type search to the first name column
      
      // include column filters
     
    
     
    }
  });

  // make demo search buttons work
  $('button[data-column]').on('click', function() {
    var $this = $(this),
      totalColumns = $table[0].config.columns,
      col = $this.data('column'), // zero-based index or "all"
      filter = [];

    // text to add to filter
    filter[ col === 'all' ? totalColumns : col ] = $this.text();
    $table.trigger('search', [ filter ]);
    return false;
  });

});</script>

    <link href="/manage/css/dashboard.css" rel="stylesheet" />

    <style>
  .tablesorter .tablesorter-filter-row .disabled {
    display: none;

}
</style>
    
  </head>
  <body>
@if(Auth::user()->jabatan == 'admin')
    <div class="page">
      <div class="page-main">
        <div class="header py-4">
          <div class="container">
            <div class="d-flex">
              <a class="header-brand" href="/">Tick
                <img src="/user/logo.png" class="header-brand-img" alt="tabler logo">
              </a>
              <div class="d-flex order-lg-2 ml-auto">

                <div class="dropdown">
                  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                    <span class="avatar" style="background-image: url(./demo/faces/female/25.jpg)"></span>
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default">{{Auth::user()->name}}</span>
                      <small class="text-muted d-block mt-1">{{Auth::user()->jabatan}}</small>
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <i class="dropdown-icon fe fe-log-out"></i> Sign out
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                    </form>
                  </div>
                </div>
              </div>
              <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
              </a>
            </div>
          </div>
        </div>
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                  <li class="nav-item">
                    <a href="/admin" class="nav-link"><i class="fe fe-home"></i> Dashboard</a>
                  </li>

                  <li class="nav-item">
                    <a href="/admin/costumer" class="nav-link"><i class="fe fe-users"></i> Daftar Costumer</a>
                  </li>

                  <li class="nav-item">
                    <a href="/admin/reservation" class="nav-link"><i class="fe fe-list"></i> Daftar Reservation</a>
                  </li>

                  <li class="nav-item">
                    <a href="/admin/manage-admin" class="nav-link"><i class="fe fe-edit-3"></i> Manage Admin</a>
                  </li>

                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-map"></i> Transport</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="/admin/rute" class="dropdown-item ">Rute</a>
                      <a href="/admin/transportation" class="dropdown-item ">Transportation</a>
                      <a href="/admin/transportation_type" class="dropdown-item ">Type Transportation</a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        

        @yield('content')




      </div>

      <footer class="footer">
        <div class="container">
          <div class="row align-items-center flex-row-reverse">
            <div class="col-auto ml-lg-auto">
              <div class="row align-items-center">
                <div class="col-auto">
                  <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item"><a href="https://github.com/Tukizz">Github</a></li>
                    <li class="list-inline-item"><a href="http://frama.pe.hu/">Fortofolio</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">
              Copyright © 2018 <a href="https://instagram.com/frama21_">Fajar Ramdani A</a>.  All rights reserved.
            </div>
          </div>
        </div>
      </footer>
    </div>
@else
<script type="text/javascript">
    window.location = "/costumer";//here double curly bracket
</script>
@endif
  </body>
</html>