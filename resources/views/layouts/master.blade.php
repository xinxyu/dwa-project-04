<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <base href="/">
        <title>
            @yield('title', 'Retro Board')
        </title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/main.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}"/>
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}"/>

        <!-- Javascript -->
        <script rel="text/javascript" src="{{ asset('js/jquery.min.js')}}"></script>
        <script rel="text/javascript" src="{{ asset('js/angular.min.js')}}"></script>
        <script rel="text/javascript" src="{{ asset('js/bootstrap.min.js')}}"></script>
        <script rel="text/javascript" src="{{ asset('js/nav.js')}}"></script>
        <script rel="text/javascript" src="{{ asset('js/main.js')}}"></script>
        @yield('headContent')
    </head>
    <body data-ng-app="retroBoardApp">
        <header>
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/" target="_self">Retro Board</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        @if (Auth::check())
                        <ul class="nav navbar-nav">
                            <li id="my-boards-nav-item"><a href="/boards" target="_self">My Boards</a></li>
                            <li id="board-nav-item"><a href="/boards/create" target="_self">Create a Board</a></li>
                        </ul>
                        @endif

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                                <li id="login-nav-item"><a href="{{ url('/login') }}" target="_self">Login</a></li>
                                <li id="register-nav-item"><a href="{{ url('/register') }}" target="_self">Register</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ url('/logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </nav>
        </header>
        <section class="container main-content-area" role="main">
            @yield('bodyContent')
        </section>
    </body>

</html>
