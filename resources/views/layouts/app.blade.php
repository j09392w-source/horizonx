<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Grand+Hotel&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/stye.css') }}">
    <link rel="shortcut icon" href="{{ asset('img/logo.svg') }}" type="image/x-icon">
    <title>Horizon X - @yield('titulo')</title>
    <script type="module" src="https://unpkg.com/ionicons@8.0.13/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@8.0.13/dist/ionicons/ionicons.js"></script>

</head>

<body>
    <header>
        @yield('header')
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        @yield('footer')
    </footer>

    <script>
        
        async function cargarSeccion(event, url) {
            event.preventDefault();
            let content = await fetch(url);
            let response = await content.text();
            document.querySelector('.contenido').innerHTML = response;
            
        }

        function mostrarPreview(event) {
            const archivo = event.target.files[0];
            if (archivo) {
                const url = URL.createObjectURL(archivo);
                document.getElementById('imagen-mostrada').src = url;
                document.getElementById('imagen-mostrada').style.display = 'block';
                document.getElementById('texto-upload').style.display = 'none';
            }
        }
        let ultimaPosicionScroll = window.scrollY;
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            let posicionActual = window.scrollY;
            if(posicionActual > ultimaPosicionScroll) {
                navbar.classList.add('navbar-scroll');
            } else {
                navbar.classList.remove('navbar-scroll');
            }
            ultimaPosicionScroll = posicionActual; 
        });

        
    </script>

</body>

</html>
