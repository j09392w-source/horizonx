@foreach ($publicaciones as $publicacion)


<div class="contenedor-publicacion">
    <div class="tajeta-publicacion">
        <div class="tarjeta-publicacion__encabezado">
            <img src="{{ asset('img/logo.svg') }}" alt="perfil" class="tarjeta-publicacion__icono">
            <small class="tarjeta-publicacion__encabezado__nombre">{{ $publicacion->user->name }} <span class="verificado">@if ($publicacion->user->verify)
            <ion-icon name="checkmark-circle-sharp"></ion-icon>
            @endif</span> </small>
            <small class="tarjeta-publicacion__fecha">• {{ $publicacion->created_at->diffForHumans() }}</small>
        </div>
        <div class="tarjeta-publicacion__cuerpo">
            <img src="{{ asset('storage/'. $publicacion->ruta) }}" alt="" class="tarjeta-publicacion__imagen">
        </div>
        <div class="tarjeta-publicacion__pie">
            <small class="tarjeta-publicacion__pie__descripcion"> <span style="font-weight: 600">{{ $publicacion->user->name }}</span> {{ $publicacion->descripcion }}</small>
        </div>
    </div>
</div>

@endforeach