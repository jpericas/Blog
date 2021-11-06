<!doctype html>
<html>
<head>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
 <a class="navbar-brand" href="{{ url('/') }}">Blog</a>
 <button class="navbar-toggler" type="button" data-toggle="collapse"
  data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
  aria-expanded="false" >
 <span class="navbar-toggler-icon"></span>
 </button>
 <div class="collapse navbar-collapse" id="navbarSupportedContent">
 <ul class="navbar-nav mr-auto">
 <li class="nav-item dropdown">
 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 CRUD
 </a>
 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
 <a class="dropdown-item" href="{{ url('/posts') }}">Posts</a>
 <a class="dropdown-item" href="{{ url('/categories') }}">Categories</a>
 </div>
 </li>
 </ul>
 </div>
 </div>
</nav>
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
