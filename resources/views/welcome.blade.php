@extends('layouts.app')
@section('title', 'Inicio')

<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@section('content')
{{-- ESTILOS --}}

<!-- Hero Section -->
<div class="hero" id="home">
   <div class="hero__container">
      <h1 class="hero__heading">Calendario De <span>Eventos</span></h1>
      <p class="hero__description">Posibilidades ilimitadass</p>
      <button class="main__btn"><a href="{{url('eventos')}}">Explore</a></button>
   </div>
</div>
@endsection
