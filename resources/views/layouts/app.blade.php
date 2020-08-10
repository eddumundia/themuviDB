<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    
    <link rel="shortcut icon" href="../images/fav_icon.png" type="image/x-icon">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.css'>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

</head>

<body>

    <!-- START NAV -->
    <nav class="navbar">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="{{ url('/') }}">
                    MUVI DB
                </a>
                <span class="navbar-burger burger" data-target="navbarMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </div>
            <div id="navbarMenu" class="navbar-menu">
                <div class="navbar-end">
                    <a href="{{ url('/') }}" class="navbar-item is-active">
                        </span>Home
                    </a>
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a href="{{ url('/movie/index/1') }}" class="navbar-link">
                            Movies
                        </a>
                        <div class="navbar-dropdown">
                            <a  href="{{ url('/movie/index/1') }}" class="navbar-item">
                                Popular
                            </a>
                            <a  href="{{ url('/movie/toprated/1') }}" class="navbar-item">
                                Top rated
                            </a>
                            <a  href="{{ url('/movie/upcoming/1') }}" class="navbar-item">
                                Upcoming
                            </a>
                            <a  href="{{ url('/movie/nowplaying/1') }}" class="navbar-item">
                                Now playing
                            </a>
                        </div>
                    </div>
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a href="{{ url('/series/index') }}" class="navbar-link">
                            Series
                        </a>
                        <div class="navbar-dropdown">
                            <a href="{{ url('/series/index') }}" class="navbar-item">
                                Popular
                            </a>
                            <a  href="{{ url('/series/toprated/1') }}" class="navbar-item">
                                Top rated
                            </a>
                            <a  href="{{ url('/series/upcoming/1') }}" class="navbar-item">
                                Upcoming
                            </a>
                            <a  href="{{ url('/series/nowplaying/1') }}" class="navbar-item">
                                Now playing
                            </a>
                        </div>
                    </div>
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a href="{{ url('/person') }}" class="navbar-link">
                            People
                        </a>
                        <div class="navbar-dropdown">
                            <a href="{{ url('/person') }}" class="navbar-item">
                                Popular
                            </a>
                        </div>
                    </div>
                    <div class="navbar-dropdown">
                        <a href="{{ url('/series/index') }}" class="navbar-item">
                            Popular
                        </a>
                        <a  href="{{ url('/series/toprated') }}" class="navbar-item">
                            Top rated
                        </a>
                        <a  href="{{ url('/series/upcoming') }}" class="navbar-item">
                            Upcoming
                        </a>
                        <a  href="{{ url('/series/nowplaying') }}" class="navbar-item">
                            Now playing
                        </a>
                    </div>
                      <div class="navbar-item has-dropdown is-hoverable">
                          @if (Auth::guest())
                        <a href="{{ url('/login') }}" class="navbar-link">
                           Login
                        </a>
                          <div class="navbar-dropdown">
                              <a href="{{ url('/register') }}" class="navbar-item">
                                  Sign up
                              </a>
                          </div>
                          @else
                          <a href="{{ url('/logout') }}" onclick="event.preventDefault();                                                 document.getElementById('logout-form').submit();"onclick="event.preventDefault();  document.getElementById('logout-form').submit();"class="navbar-link">
                              Logout
                          </a>
                          <div class="navbar-dropdown">
                              <a href="{{ url('/movie/listmovies') }}" class="navbar-item">
                                  My movies
                              </a>
                              <a href="{{ url('/register') }}" class="navbar-item">
                                  My series
                              </a>
                              <a href="{{ url('/register') }}" class="navbar-item">
                                  My orders
                              </a>
                          </div>
                          @endif
                        
                    </div>
                    <div class="navbar-dropdown">
                         <!-- Authentication Links -->
                    @if (Auth::guest())
                        <a href="{{ url('/login') }}"  class="navbar-item"><i class="fa fa-sign-in"></i> Login</a>
                        <a href="{{ url('/register') }}"  class="navbar-item"><i class="fa fa-user-plus"></i> Sign up</a>
                    @else
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <a href="{{ url('/result') }}"  class="navbar-item"><i class="fas fa-award"></i> Performance history</a>
                        <a href="{{ url('/users/profile') }}"  class="navbar-item"><i class="fa fa-user"></i> Profile</a>
                        <a href="{{ url('/logout') }}"  class="navbar-item"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- END NAV -->
    
    <div id="app">
        @include('partials.errors')
        @include('partials.danger')
        @include('partials.success')
        @yield('content')
    </div>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: one;">
    {{ csrf_field() }}
</form>
    <footer class="footer">
            <div class="container">
                <div class="content has-text-centered">
                    <div class="soc">
                        <a href="https://www.youtube.com/user/eddumundia"><i class="fa fa-youtube fa-2x" aria-hidden="true"></i></a>
                        <a href="https://www.facebook.com/eddumundia"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a>
                        <a href="https://twitter.com/eddumundia"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a>
                    </div>
                    <p>
                        <strong>Movies</strong> by <a href="https://twitter.com/eddumundia">Edward Mundia</a>. 
                &copy; The Movies DB <?= date('Y') ?>
                    </p>
                </div>
            </div>
        </footer>

            <script type="text/javascript">
                // The following code is based off a toggle menu by @Bradcomp
// source: https://gist.github.com/Bradcomp/a9ef2ef322a8e8017443b626208999c1
(function() {
    var burger = document.querySelector('.burger');
    var menu = document.querySelector('#'+burger.dataset.target);
    burger.addEventListener('click', function() {
        burger.classList.toggle('is-active');
        menu.classList.toggle('is-active');
    });
})();
            </script>
            
            <style>
                body {
                    background: #041221;
                }


                .footer{
                    margin-top: 20px;
                    background-color: #222831;
                    color: lemonchiffon;
                }
                 .footer2{
                    margin-top: 20px;
                    background-color: #222831;
                    color: lemonchiffon;
                    position:fixed;
                    left:0px;
                    bottom:0px;
                    height:30px;
                    width:100%;
                }
                .footer p, strong
                {color: lemonchiffon}
                .footer a:hover
                {color: crimson;}
                .fa
                {color: lemonchiffon;
                    margin: 10px}
                .search-holder{
                    margin-top: 10px;
                    margin-bottom: 10px;
                }
            </style>
          


</body>

</html>