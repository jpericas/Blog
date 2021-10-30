@extends('layouts.primer')

@section('title', 'Llistat de posts')

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
    @if (session("status"))
      <x-dynamic-component :component="config('blogConfig.alertes')" alert-type="danger" class="m-4"  >
        <x-slot name="title">
          {{session("status")}}
        </x-slot>  
      </x-dynamic-component>
    @endif

    <div class="row row-cols-1 row-cols-md-3 g-4 ">
    @each('partials.cards-posts', $posts, 'post')    
    </div>  
    {{ $posts->links("pagination::bootstrap-4") }}    
@endsection



