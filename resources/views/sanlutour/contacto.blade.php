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

    <!-- Fonts -->
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

    <title>Contacto</title>
</head>

<body>
    <div id="container-envolvente-sn">
        <div id="bloque1-pag-contacto" role="contentinfo">
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
                                title="Enlace a página de guias">
                                Guias
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
                        <li><a class="subrallado" href="{{ route('sobrenosotros') }}">Sobre Nosotros</a></li>
                        <li><a class="subrallado-actual" href="">Contacto</a></li>
                    </ul>
                </div>
            </header>
            <div id="container-central">
                <div id="container-difuminado">
                    <h1>Contacto</h1>
                    <div id="container-section-form">
                        <div class="p-section-form">
                            <p>Si deseas contactar con nosotros le atenderemos gustosamente. <br>
                                Un saludo!!
                            </p>
                            <button id="modalContacto">Saber más!!</button>
                            <form action="{{ route('bot') }}" method="get">
                                <button id="btnChatCont">Chat con RoboTour</button>
                            </form>

                            <div>
                                @if (session('success'))
                                <div class="py-3 px-5 mb-4 bg-green-400 text-black text-sm rounded-md border border-green-200 flex items-center" role="alert">
                                    <div class="w-4 mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                        </svg>
                                    </div>
                                    <span>{{ session('success') }}</span>
                                </div>
                                @endif
                                @if (session('fault'))
                                <div class="py-3 px-5 mb-4 bg-red-500 text-black text-sm rounded-md border border-red-200 flex items-center" role="alert">
                                    <div class="w-4 mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01" />
                                        </svg>
                                    </div>
                                    <span> {{ session('fault') }}</span>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-contacto">
                            <form class="form" action="{{ route('enviarCorreo') }}" method="post">
                                @csrf
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" aria-label="nombre" class="cajasform"
                                    maxlength="20" required>
                                <label for="apellido">Apellidos</label>
                                <input type="text" name="apellido" id="apellido" title="apellido" class="cajasform"
                                    maxlength="20" required>
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="cajasform"
                                    pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$"
                                    title="Correo electronico incorrecto" required>
                                <label for="textarea">Mensaje</label>
                                <textarea name="textarea" id="textarea" title="textarea" class="cajasform" cols="30" rows="10" disabled required></textarea>
                                <button type="submit" id="btnenviar">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('components.footer')

    </div>
</body>

</html>
