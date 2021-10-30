@extends('layouts.primer')

@section('title')
    Post {{$post->title}}
@endsection

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
    <x-dynamic-component :component="config('blogConfig.alertes')" alert-type="danger" class="m-4" :post="$post" >
        <x-slot name="title">
        Titol
        </x-slot>  
    </x-dynamic-component>
  
    @include("partials.errors")
    <form action="{{ route('posts.update', $post->id) }}" method="post" >
        @method("PUT")
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Títol</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{$post->title}}"  name="title" id="title"  >
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="url_clean" class="form-label">Url neta</label>
            <input type="text" class="form-control" name="url_clean" value="{{$post->url_clean}}" id="url_clean" >
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Contingut</label>
            <textarea class="form-control" name="content"  id="content" rows="3">{{$post->content}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
@endsection
