<nav class="navbar navbar-expand-md fixed-top navbar-transparent bg-info" color-on-scroll="500">
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
                    
                    @guest
                    <li class="nav-item">
                            <a href="/register" class="nav-link"><i class="nc-icon nc-badge"></i> Register</a>
                        </li>

                        <li class="nav-item">
                            <a href="/login" class="nav-link"><i class="nc-icon nc-single-02"></i> Login</a>
                        </li>
                    @endguest
                   
                    </ul>
                
            </div>
        </div>
    </nav>