<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Favicon --}}
    <link rel="icon" type="image/jpg" href="{{ asset('Img/Página principal/favicon.png') }}" />
    {{-- Alpine --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/sobnos-cont.css') }}">
     <!--Iconos -->
     <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
     integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    {{-- JS --}}
    <script src="{{ asset('js/sobre-nosotros.js') }}" defer></script>
    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Fuente -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');

    </style>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Corben&display=swap');

    </style>
    {{-- taildwind --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <title>Sobre Nosotros</title>
</head>

<body>

    <div id="container-envolvente-sn">
        <div id="bloque1-pag-sobnos" role="contentinfo">
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
                                title="Enlace a Guias">Guias</a>
                        </li>
                        <li>
                            <a href="#" class="text-white  block px-3 py-2 rounded-md text-base font-medium"
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
                            <a class="subrallado" href="{{ route('index') }}"
                                title="Enlace a página de inicio">Inicio
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
                        <li><a class="subrallado" href="{{ route('guias') }}">Guias</a></li>
                        <li><a class="subrallado-actual" href="">Sobre Nosotros</a></li>
                        <li><a class="subrallado" href="{{ route('contacto') }}">Contacto</a></li>
                    </ul>
                </div>
            </header>
            <div id="container-central">
                <div id="container-difuminado">
                    <h1>Sobre nosotros</h1>
                    <p>Esta iniciativa nace de la pasión por mi ciudad , de la cual deseo que los visitantes de ella
                        conozcan todos sus explendidos rincones, sus estupendos bares que guardan una gran historia
                        detrás de ellos y gracias a ellos hemos optenido el galardón de capital española de la
                        gastronomía, también invito a conocer los variados paisajes que consta dicha ciudad en los que
                        podremos disfrutar de magnificas puestas de sol donde guardarás un recuerdo inolvidable en
                        definitiva
                        VOLVERAS </p>
                </div>

            </div>
        </div>
        @include('components.footer')

    </div>
</body>

</html>
