<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ URL::to('/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::to('/css/main.css') }}">
    </head>
    <body>
    @include('includes.header')
    <div class="container">
    	@yield('content')
    </div>
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="{{ URL::to('js/app.js') }}"></script>
    </body>
</html>
