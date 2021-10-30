@extends('layouts.primer')

@section('title', 'Posts ')

@section('sidebar')
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      <a class="btn btn-primary  btn-sm" href="{{ route('posts.index') }}">Llistat <span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">
          <a class="btn btn-primary  btn-sm" href="{{ route('posts.create') }}">Nou <span class="sr-only"></span></a>
      </li>
  </ul>
  </div>
@endsection

@section('content')
    <div class="mb-3">
        <label for="title" class="form-label">Títol</label>
        <input readonly type="text" class="form-control" value="{{ $post->title }}"  name="title" id="title"  >                
    </div>
    <div class="mb-3">
        <label for="url_clean" class="form-label">Url neta</label>
        <input readonly type="text" class="form-control" value="{{ $post->url_clean }}" name="url_clean" id="url_clean" >
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Contingut</label>
        <textarea readonly class="form-control" name="content"  id="content" rows="3">{{ $post->content }}</textarea>
    </div>    
@endsection


