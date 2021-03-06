<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--  Favicon --}}
    <link rel="icon" type="image/jpg" href="{{asset('Img/Página principal/favicon.png')}}"/>
    {{-- Alpine --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{-- JS --}}
    <script src="{{ asset('js/sobre-nosotros.js') }}" defer></script>
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');

    </style>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Corben&display=swap');

    </style>
    {{-- taildwind --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    {{-- AOS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <title>Sanlutours, Conoce Sanlúcar de
        Barrameda profúndamente con nosotros.
    </title>
</head>

<body>
    <div id="container-envolvente-principal">
        <div id="bloque1-pag-principal" role="contentinfo">
            <div id="login">
                @if (Route::has('login'))
                    <div>
                        @auth
                            <a href="{{ url('/dashboard') }}" class="subrallado" title="Dashboard">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="subrallado" title="Login">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="subrallado" title="Registrarse">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
            <header class="encabezado-b1-principal" x-data="{ open: false }">
                <!-- Mobile menu button-->
                <div class="absolute justify-center w-1/5 inset-y-0 left-0 flex items-center sm:hidden">

                    <button type="button"
                        class="inline-flex items-center justify-center p-2 rounded-md text-green-900 hover:text-white hover:bg-green-900 "
                        aria-controls="mobile-menu" aria-expanded="false" x-on:click="open=true">
                        <i :class="open ? 'fas fa-bars giro-burguer text-2xl' : 'fas fa-bars text-2xl'"></i>
                    </button>
                </div>
                <!-- Mobile menu, show/hide based on menu state. -->
                <div class="sm:hidden" id="mobile-menu" x-show="open" @click.away="open=false">
                    <ul>
                    <li>
                        <a href="{{ route('index') }}"
                            class="text-white  block px-3 py-2 rounded-md text-base font-medium"
                            title="Enlace a página de inicio">
                            Inicio
                        </a>
                    </li>
                    <li id="submenu">
                        <a href="#" class="text-white  block px-3 py-2 rounded-md text-base font-medium"
                            aria-current="page">Tours</a>
                        <i id="boton-lateral" class="fa fa-angle-right"></i>
                    </li>
                </ul>
                    <ul id="menu-desplegable-burguer" class="desplegable-oculto-burguer">
                        <li><a class="subrallado" href="{{ route('freetours') }}"
                                title="Enlace a página de freetours">Free Tours</a></li>
                        <li><a class="subrallado" href="{{ route('cultutours') }}"
                                title="Enlace a página de tours culturales">Cultural</a></li>
                        <li><a class="subrallado" href="{{ route('gastrotours') }}"
                                title="Enlace a página de tours gastronómicos">Gastronómico</a></li>
                        <li><a class="subrallado" href="{{ route('deportours') }}"
                                title="Enlace a página de tours deportivos">Deportivo</a></li>
                    </ul>
                    <ul>
                    <li>
                        <a href="{{ route('guias') }}"
                            class="text-white  block px-3 py-2 rounded-md text-base font-medium"
                            title="Enlace a página de guías">
                            Guías
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('sobrenosotros') }}"
                            class="text-white  block px-3 py-2 rounded-md text-base font-medium"
                            title="Enlace a sección Sobre nosotros">Sobre
                            nosotros</a>
                    </li>
                    <li>
                        <a href="{{ route('contacto') }}"
                            class="text-white  block px-3 py-2 rounded-md text-base font-medium"
                            title="Enlace a sección de contacto">Contacto</a>
                    </li>
                </ul>
                </div>
                <div id="container-logo">

                    <picture id="logo">
                        <img src="{{ asset('Img/Página principal/Logo_completo_verde-removebg-preview3.png') }}"
                            alt="Logo Sanlutours">
                    </picture>
                </div>
                <div role="navigation" class="nav-b1-principal">
                    <ul>
                        <li>
                            <a class="subrallado-actual" href="" title="Enlace a página de inicio">Inicio
                            </a>
                        </li>
                        <div id="container-tour-desplegable">
                            <li class="tours subrallado" title="Tours">Tours
                                <i id="botonLateral" class="fa fa-angle-right"></i>
                            </li>
                            <ul id="menu-desplegable" class="desplegable-oculto">
                                <li><a class="subrallado" href="{{ route('freetours') }}">Free Tours</a></li>
                                <li><a class="subrallado" href="{{ route('cultutours') }}">Cultural</a></li>
                                <li><a class="subrallado" href="{{ route('gastrotours') }}">Gastronómico</a></li>
                                <li><a class="subrallado" href="{{ route('deportours') }}">Deportivo</a></li>
                            </ul>
                        </div>
                        <li><a class="subrallado" href="{{ route('guias') }}">Guías</a></li>
                        <li><a class="subrallado" href="{{ route('sobrenosotros') }}">Sobre Nosotros</a></li>
                        <li><a class="subrallado" href="{{ route('contacto') }}">Contacto</a></li>
                    </ul>
                </div>
            </header>
            <main role="main" class="main-b1-principal">
                <p class="p1-main-b1">Sanlúcar de Barrameda desde su interior</p>
                <p class="p2-main-b1">Bienvenidos a SanluTours , conoce los mejores tours por la ciudad de Sanlúcar.
                </p>
                {{-- <img class="img-fondo" src="{{ asset('Img/Página principal/Fondob1.jpg') }}"  alt="Imagen fondo"> --}}
            </main>
        </div>


        <div id="b2-pagina-principal">
            <div class="container-b2" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                <a href="{{ route('freetours') }}" title="Free Tours">
                    <img src="{{ asset('Img/Página principal/PP-plaza cabildo.jpg') }}" alt="Free Tours">
                    <div >
                    <p>Free Tours</p>
                    </div>
                </a>

            </div>
            <div class="container-b2" data-aos="fade-up" data-aos-delay="250" data-aos-duration="1000">
                <a href="{{ route('gastrotours') }}" title="Enlace a Tours gastronómicos">
                    <img src="{{ asset('Img/Página principal/pp-gastronomia.jpg') }}" alt="Imagen gastronimia">
                    <div>
                    <p>Gastronomía</p>
                    </div>
                </a>

            </div>
            <div class="container-b2" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
                <a href="{{ route('cultutours') }}" title="Enlace a tours culturales">
                    <img src="{{ asset('Img/Página principal/PP-palacio.jpg') }}" alt="Foto palacio orleans">
                    <div>
                    <p>Cultural</p>
                    </div>
                </a>

            </div>
            <div class="container-b2" data-aos="fade-up" data-aos-delay="350" data-aos-duration="1000">
                <a href="{{ route('deportours') }}" title="Enlace a tours deportivos">
                    <img src="{{ asset('Img/Página principal/pp-ruta caballo.jpg') }}" alt="Imagen ruta caballo">
                    <div>
                        <p>Deportivo</p>
                    </div>
                </a>

            </div>
        </div>


        <div id="b3-pagina-principal" role="contentinfo">
            <div id="b3-video" data-aos="fade-right" data-aos-offset="300" data-aos-duration="800">
                <video id="video-sanlucar" preload controls muted
                    poster="{{ asset('Img/Página principal/imagen figma video.jpg') }}"
                    title="Video descriptivo sobre sanlúcar de barrameda">
                    <source src="{{ asset('Img/Página principal/video.mp4 ') }}" type="video/mp4">
                    Tu navegador no soporta esta video.
                </video>
            </div>
            <div id="b3-definicion" data-aos="fade-left" data-aos-offset="300" data-aos-duration="800">
                <h1>Sanlúcar de Barrameda</h1>
                <p> Su asentamiento al margen izquierdo de la desembocadura del Guadalquivir, frente al coto de Doñana,
                    lo hacen disfrutar de un enclave privilegiado.
                    Sanlúcar de Barrameda es una ciudad y un municipio español situado en la provincia de Cádiz, en la
                    comunidad autónoma de Andalucía. Asentada en la margen izquierda del estuario del río Guadalquivir,
                    frente al Parque Nacional de Doñana, dista 52 km de la capital de provincia, Cádiz, y 119 km de la
                    capital autonómica, Sevilla. Su población es de 65.805 habitantes (INE 2009).
                </p>
            </div>
        </div>


        <div id="b4-pagina-principal" role="contentinfo">
            <div id="b4-contenido-1"  data-aos="fade-left" data-aos-offset="200" data-aos-duration="600">
                <div class="flechas2"><i id="arrow-left" class="far fa-angle-left"></i></div>
                <div id="b4-definicion">
                    <h1>Tours Destacados</h1>
                    <h2 id="b4-h2">Visita a Doñana</h2>
                    <p id="b4-p"> Con la visita a Doñana desde Sanlúcar de Barrameda descubrirás el Parque Nacional al
                        completo y de la manera más especial. Recorrerás todos los ecosistemas en vehículo todoterreno,
                        desde las dunas hasta la marisma, descubriendo también las impresionantes playas de Doñana.
                        Podrás
                        navegar desde Bajo de Guía hasta Doñana en una barcaza tradicional, y surcar el río Guadalquivir
                        para regresar a Sanlúcar.
                    </p>
                </div>
                <div class="flechas2"><i id="arrow-right" class="far fa-angle-right"></i></div>
            </div>
            <!-- container-slider -->
            <div id="b4-imagen"  data-aos="fade-right" data-aos-offset="200" data-aos-duration="600">
                <picture title="Imagen Tours destacado doñana">
                    <img class="img-slider" src="{{ asset('Img/Página principal/Tour destacado doñana.jpg') }}"
                        alt="Imagen Tours destacado doñana">
                </picture>
            </div>

        </div>

        <div id="b5-pagina-principal">
            <div class="flechas2"><i id="arrow-left-b5" class="far fa-angle-left"></i></div>
            <div id="container-b5" data-aos="flip-down" data-aos-offset="200" data-aos-duration="600">
                <h1 id="h1-b5">QUE DICEN DE NOSOTROS</h1>
                <p id="b5-p">Cómo puedo empezar a describir mi tiempo con SanluTours... ¡Simplemente me cambió la vida!
                    Siempre imaginé que Sanlúcar de Barrameda sería un destino impresionante, pero gracias a SanluTours,
                    pude no solo experimentar la cultura, gastronomía, sino también tener recuerdos únicos en la vida.
                    Obtuve mucho más de lo que esperaba de mis vacaciones.</p>
                <p id="b5-p2">-Manuela Dominguez</p>

            </div>
            <div class="flechas2"><i id="arrow-right-b5" class="far fa-angle-right"></i></div>

        </div>
        @include('components.footer')

    </div>
    <script>
        AOS.init();
    </script>
</body>

</html>
