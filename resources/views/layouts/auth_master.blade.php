<html>
<head>
    <title>App Name - @yield('title')</title>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>

<div>
    <div class="col s12">
        @include('partials.nav')
    </div>
</div>

<div class="container">
        <div class="row">

            <div class="col s2"></div>
            
            <div class="col s8">
                @yield('content')
            </div>
                
              <div class="col s2"></div>
        <div class="col s12">
            @include('partials.footer')
        </div>
    </div>


    <script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
   
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
    <script> $(".button-collapse").sideNav();</script>
</body>
</html>

