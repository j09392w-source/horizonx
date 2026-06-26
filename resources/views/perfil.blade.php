<div class="contenido-perfil">
    <div class="contenido-perfil__encabezado">
        <img src="{{ asset('storage/perfiles/logo.svg') }}" alt="" width="70">
        <div class="perfil-names">
            <small>{{ Auth::user()->name }}</small>
            <small class="perfil__username">{{ Auth::user()->user_name }} <span class="verificado">
                    @if (Auth::user()->verify)
                        <ion-icon name="checkmark-circle-sharp"></ion-icon>
                    @endif
                </span>
        </div>
    </div>
    <button class="contenido-perfil__editar-perfil">Editar perfil</button>
</div>

<div class="contenido-perfil__publicaciones__cuerpo">
    <p class="contenido-perfil__publicaciones__cuerpo__titulo">Mis publicaciones</p>
    <div class="contenedor-publicaciones">
        @foreach ($publicaciones as $post)
            <div class="tarjeta-publicacion-grid">
                <img src="{{ asset('storage/' . $post->ruta) }}" alt="Recuerdo">
            </div>
        @endforeach
    </div>
</div>
