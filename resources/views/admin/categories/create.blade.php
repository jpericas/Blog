@extends('layouts.app')

@section('title', 'Llistat de categories')

@section('sidebar')
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="btn btn-primary  btn-sm" href="{{ route('categories.index') }}">Llistat <span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">
          <a class="btn btn-primary  btn-sm" href="{{ route('categories.create') }}">Nou <span class="sr-only"></span></a>
      </li>
    </ul>
  </div>
@endsection

@section('content')
    @include("partials.errors")
    <form action="{{ route('categories.store') }}" method="post" >
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Títol</label>
            <input type="text" class="form-control"  name="title" id="title"  >
        </div>
        <div class="mb-3">
            <label for="url_clean" class="form-label">Url neta</label>
            <input type="text" class="form-control" name="url_clean" id="url_clean" >
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>    
@endsection

