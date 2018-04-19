<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Costumer</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<!-- Bootstrap core CSS     -->
	<link href="/user/css/bootstrap.min.css" rel="stylesheet" />
	<link href="/user/css/paper-kit.css?v=2.1.0" rel="stylesheet"/>

	<!--  CSS for Demo Purpose, don't include it in your project     -->
	<link href="/user/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href="/user/css/nucleo-icons.css" rel="stylesheet">

    <script src="/user/js/jquery-3.2.1.js" type="text/javascript"></script>
    <script src="/user/js/jquery.tablesorter.combined.js"></script>
    <link rel="stylesheet" href="/user/css/theme.bootstrap_4.css">

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
      filter_defaultFilter: { 1 : '~{query}' },
      // include column filters
      filter_columnFilters: true,
      filter_placeholder: { search : 'Search...' },
      filter_saveFilters : true,
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

    <style>
  .tablesorter .tablesorter-filter-row .disabled {
    display: none;
}
</style>
</head>
<body>
    <nav class="navbar navbar-expand-md fixed-top bg-info">
        <div class="container">
            <div class="navbar-translate">
                <button class="navbar-toggler navbar-toggler-right navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar"></span>
                    <span class="navbar-toggler-bar"></span>
                    <span class="navbar-toggler-bar"></span>
                </button>
                 <a class="navbar-brand" href="/">
                    Tick<img src="/user/logo.png" width="40">
                </a>
            </div>


            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav ml-auto">

                    @auth
                    @if(Auth::user()->jabatan == 'admin')

                        <li class="nav-item">
                           <a href="/admin" class="nav-link"><i class="nc-icon nc-book-bookmark"></i> Home Admin</a>
                        </li>

                         <li class="nav-item">
                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link"><i class="nc-icon nc-button-power"></i> Logout</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>

                    @elseif(Auth::user()->jabatan == 'user')
                            <li class="nav-item">
                               <a href="/reservation" class="nav-link"><i class="nc-icon nc-book-bookmark"></i> Pesan Ticket</a>
                            </li>

                            <li class="nav-item">
                                <a href="/costumer/list-reservation" class="nav-link"><i class="nc-icon nc-paper"></i> Ticket Dipesan</a>
                            </li>

                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton" href="#pk" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->username}}</a>
                                <ul class="dropdown-menu dropdown-info" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="/costumer">Profile</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>        
                                </ul>
                            </div>
                        

                    @else
                        <li class="nav-item">
                            <a href="/register" class="nav-link"><i class="nc-icon nc-badge"></i> Register</a>
                        </li>

                        <li class="nav-item">
                            <a href="/login" class="nav-link"><i class="nc-icon nc-single-02"></i> Login</a>
                        </li>
                        @endif
                    @endauth

                    
                </ul>
                
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="footer">
        <div class="container">
            <div class="row">
                <nav class="footer-nav">
                    <ul>
                        <li><a href="https://github.com/Tukizz">Github</a></li>
                        <li><a href="http://frama.pe.hu">Fortofolio</a></li>
                    </ul>
                </nav>
                <div class="credits ml-auto">
                    <span class="copyright">
                        © Copyright 2018 <a href="https://instagram.com/frama21_">Fajar Ramdani A</a>, made with <i class="fa fa-heart heart"></i>
                    </span>
                </div>
            </div>
        </div>
    </footer>
</body>

<!-- Core JS Files -->

<script src="/user/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
<!-- <script src="../assets/js/tether.min.js" type="text/javascript"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="/user/js/bootstrap.min.js" type="text/javascript"></script>


<!--  Paper Kit Initialization snd functons -->
<script src="/user/js/paper-kit.js?v=2.1.0"></script>

</html>
