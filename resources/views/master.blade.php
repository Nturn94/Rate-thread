<html>  
<head>

    <title> Master Page Layout </title>  
    <link href="{{ asset('resources/css/app.css') }}" rel="stylesheet">
    
</head>  
<body>  
    <div class="container">  
        @yield('content')  
    </div>  
    @yield('footer')  
</body>  
</html>  