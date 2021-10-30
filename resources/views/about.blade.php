@extends('layouts.primer')

@section('title', 'Titol de la pàgina')

@section('sidebar')
 @parent <!-- Inclou el sidebar del pare -->

 <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>This is my body content.</p>
@endsection
