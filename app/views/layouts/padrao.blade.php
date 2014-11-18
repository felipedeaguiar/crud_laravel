<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD Laravel</title>
    
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
</head>
    <body>
        <div class="container"> 
            @yield('content')
        </div>
        <script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.mask.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>
    </body>
</html>