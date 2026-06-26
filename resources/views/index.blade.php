@extends('layouts.app')

@section('titulo')
    Login
@endsection

@section('content')

    <div class="cuerpo-login">
        <img class="header__logo" src="{{ asset('img/logo.svg') }}" alt="">
        <div class="tarjeta-login">

            <div class="tarjeta-login__cabecera">
                <span class="tarjeta-login__titulo">Inicia sesión en <span class="tarjeta-login__titulo__nostagram">Horizon
                        X</span></span>
            </div>

            <form action="/procesarLogin" method="POST" class="tarjeta-login__formulario">
                @csrf
                @method('post')
                <div class="grupo-input">
                    <input type="email" name="email" id="email" class="grupo-input__campo"
                        placeholder="Correo electrónico">
                </div>

                <div class="grupo-input">
                    <input type="password" name="password" id="password" class="grupo-input__campo"
                        placeholder="Contraseña">
                </div>
                @if ($errors->any())
                    <div style="color: red; margin-bottom: 10px;">
                        @foreach ($errors->all() as $error)
                                <small>{{ $error }}</small>
                        @endforeach
                    </div>
                @endif
                <div class="tarjeta-login__formulario__boton">
                    <button type="submit" class="btn-primario">Iniciar sesión</button>
                    <a href="#" class="vinculo-azul">¿Olvidaste tu contraseña?</a>
                </div>
                
            </form>
        </div>
    </div>
@endsection
