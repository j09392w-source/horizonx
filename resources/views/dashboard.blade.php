@extends('layouts.app')

@section('titulo')
    Inicio
@endsection

@section('header')
    <div class="cabeza-dashboard">
        <a href="#" onclick="cargarSeccion(event, '/upload')" class="cabeza-dashboard__create"><ion-icon name="duplicate-outline"></ion-icon></a>
        <span class="text-logo__titulo">HORIZON X</span>
        <a href="#"><ion-icon name="heart-outline"></ion-icon></a>
    </div>
@endsection

@include('partials.nav')

@section('content')
    <div class="contenido">

    </div>

@endsection
