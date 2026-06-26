<div class="contenedor-crear">
    <h2 class="titulo-crear">Nuevo Recuerdo</h2>
    
    <form action="/procesoPublicacion" id="form-publicar" method="POST" enctype="multipart/form-data">
        @csrf
        
        <label for="foto-upload" class="zona-preview" id="contenedor-preview">
            <div id="texto-upload" class="texto-upload">
                <ion-icon name="camera-outline" style="font-size: 40px; color: #FFB300;"></ion-icon>
                <p>Toca para elegir una foto</p>
            </div>
            <img id="imagen-mostrada" class="imagen-mostrada" src="" alt="Vista previa" style="display: none;">
        </label>
        
        <input type="file" name="foto" id="foto-upload" accept="image/*" onchange="mostrarPreview(event)" required>

        <textarea name="descripcion" class="input-texto" placeholder="Escribe un mensaje para este recuerdo..." rows="3" required></textarea>

        <button type="submit" class="btn-guardar">Guardar en el álbum</button>
    </form>
</div>