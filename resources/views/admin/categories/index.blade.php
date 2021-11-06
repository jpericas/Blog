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
    @if (session("status"))
      <x-dynamic-component :component="config('blogConfig.alertes')" alert-type="danger" class="m-4" >
        <x-slot name="title">
          {{session("status")}}
        </x-slot>        
      </x-dynamic-component>
    @endif

    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Títol</th>
          <th>url_clean</th>
          <th>Creat</th>
          <th>Modificat</th>
          <th>Accions</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->title }}</td>
            <td>{{ $category->url_clean }}</td>
            <td>{{ $category->created_at }}</td>
            <td>{{ $category->updated_at }}</td>
            <td>
                <a href="{{ route('categories.show' , $category->id )}}" class="btn btn-primary  btn-sm">Veure</a>
                <a href="{{ route('categories.edit' , $category->id )}}" class="btn btn-primary btn-sm">Editar</a>
                <form action="{{route('categories.destroy' , $category->id)}}" method="POST" >
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm" >Delete</button>
                </form>
            </td>
        </tr>
        @empty
            <tr><td colspan="7" >  No hi ha cap post </td> </tr>
        @endforelse
      </tbody>
    </table>
@endsection


