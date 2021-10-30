<!doctype html>
<html>
<head>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <h1>@yield('title')</h1>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            @section('sidebar')
                
            @show
        </nav>
        @yield('content')        
    </div>    
</body>
</html>
