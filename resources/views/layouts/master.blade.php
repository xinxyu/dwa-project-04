<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
<body ng-app="retroBoardApp">
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
                <a class="navbar-brand" href="/">Retro Board</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li id="text-generator-nav-item"><a href="/login">Login</a></li>
                    <li id="board-nav-item"><a href="/boards/create">Create Board</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
</header>
<section class="container main-content-area" role="main">
    @yield('bodyContent')
</section>
<footer>
</footer>
</body>

</html>
