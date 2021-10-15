<!doctype html>
<html>
<head>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('posts.store') }}" method="post" >
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Títol</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror"  name="title" id="title"  >
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="url_clean" class="form-label">Url neta</label>
                <input type="text" class="form-control" name="url_clean" id="url_clean" >
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Contingut</label>
                <textarea class="form-control" name="content"  id="content" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>    
</body>
</html>