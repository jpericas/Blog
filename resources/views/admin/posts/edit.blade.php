@extends('layouts.app')

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
            <label for="categories_id" class="form-label">Categories</label>
            <select name="categories_id" class="form-control" >
                @foreach ($cats as $title => $id)
                    <option {{$post->categories_id == $id ? 'selected="selected"' : ''}} value="{{$id}}">{{$title}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="posted" class="form-label">Categories</label>
            <select name="posted" class="form-control" >
                @include('partials.options-yes-not', ['val' => $post->posted]);
            </select>
        </div>  
        <div class="mb-3">
            <label for="content" class="form-label">Contingut</label>
            <textarea class="form-control" name="content"  id="editor" rows="3">{{$post->content}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
    <br>
    @if (!$post->image)
        <form action="{{ route("post.image",$post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col">
                  <input type="file" name="image" class="form-control">
                </div>
                <div class="col">
                    <input type="submit" class="btn btn-primary" value="Subir">
                </div>
            </div>
        </form>
    @else
        <img src="/images/{{$post->image->image}}" alt="">
    @endif

@endsection
