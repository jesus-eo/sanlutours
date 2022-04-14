<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Alpine --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{-- css --}}
    <link rel="stylesheet" href="{{asset('css/tourIndividual.css')}}">
    {{-- JS --}}
    <script src="{{asset('js/sobre-nosotros.js')}}" defer></script>

    <!--Iconos -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--Fuente-->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');
    </style>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Corben&display=swap');
    </style>
    {{-- taildwind --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <title>Tour individual</title>
</head>

<body>

    <div id="container-envolvente-principal">
        <div id="bloque1-pag-individual" role="contentinfo">
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
                            aria-controls="mobile-menu" aria-expanded="false" @click="open=true">
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
                            <li><a class="subrallado" href="{{ route('freetours') }}"title="Enlace a página de freetours">Free Tours</a></li>
                            <li><a class="subrallado" href="{{ route('cultutours') }}" title="Enlace a página de tours culturales">Cultural</a></li>
                            <li><a class="subrallado" href="{{ route('gastrotours') }}" title="Enlace a página de tours gastronómicos">Gastronómico</a></li>
                            <li><a class="subrallado" href="{{ route('deportours') }}" title="Enlace a página de tours deportivos">Deportivo</a></li>
                        </ul>
                        <li>
                            <a href="{{route('guias')}}" class="text-white  block px-3 py-2 rounded-md text-base font-medium"
                            title="Enlace a Guias">Guias</a>
                        </li>
                        <li>
                            <a href="{{ route('sobrenosotros') }}" class="text-white  block px-3 py-2 rounded-md text-base font-medium" title="Enlace a sección Sobre nosotros">Sobre
                                nosotros</a>
                        </li>
                        <li>
                            <a href="{{route('contacto')}}" class="text-white  block px-3 py-2 rounded-md text-base font-medium" title="Enlace a sección de contacto">Contacto</a>
                        </li>
                    </div>

                <div id="container-logo">
                    <picture id="logo">
                        <img src="{{asset('Img/Página principal/Logo_completo_verde-removebg-preview3.png')}}" alt="Logo Sanlutours">
                    </picture>
                </div>

                <div role="navigation" class="nav-b1-principal">
                    <ul>
                        <li>
                            <a class="subrallado" href="{{route('index')}}" title="Enlace a página de inicio">Inicio
                            </a>
                        </li>
                        <div>
                            <li class="tours subrallado-actual" title="Tours">Tours
                                <i id="botonLateral" class="fa fa-angle-right"></i>
                            </li>
                            <ul id="menu-desplegable" class="desplegable-oculto">
                                <li><a class="subrallado" href="{{route('freetours')}}">Free Tours</a></li>
                                <li><a class="subrallado" href="{{route('cultutours')}}">Cultural</a></li>
                                <li><a class="subrallado" href="{{route('gastrotours')}}">Gastronómico</a></li>
                                <li><a class="subrallado" href="{{route('deportours')}}">Deportivo</a></li>
                            </ul>
                        </div>
                        <li><a class="subrallado" href="{{route('guias')}}">Guias</a></li>
                        <li><a class="subrallado" href="{{route('sobrenosotros')}}">Sobre Nosotros</a></li>
                        <li><a class="subrallado" href="{{route('contacto')}}">Contacto</a></li>
                    </ul>
                </div>
            </header>


            <div class="titulo-central">
                <h1>{{$tour->nombre}}</h1>
            </div>
            <div class="datos-tour">
                <div>
                    <h3 class="h3-datos-tour">DURACIÓN</h3>
                    <p>{{$tour->duracion}} horas</p>
                </div>
                <div>
                    <h3 class="h3-datos-tour">FECHA</h3>
                    <p>{{$tour->fechahora}}</p>
                </div>
                <div>
                    <h3 class="h3-datos-tour">PRECIO</h3>
                    <p>{{$tour->precio}}€</p>
                </div>
            </div>
            <img class="img-fondo" src="{{asset($tour->imagen)}}" alt="Imagen fondo tour individual">
        </div>
        @php
            $ultimaVisita = "";
            if($tour->tipo == 'gastronomico'){
                $ultimaVisita = 'gastrotours';
            }else if($tour->tipo == 'cultural'){
                $ultimaVisita = 'cultutours';
            }else if($tour->tipo == 'deportivo'){
                $ultimaVisita = 'deportours';
            }else{
                $ultimaVisita = 'freetours';
            }
        @endphp
        <div id="bloque2-pag-individual">
            <nav class="breadcrumb" aria-label="Breadcrumb">
                <ul>
                    <li><a class="enlace-bread" href="/">Inicio</a></li>
                    <li><a class="enlace-bread"  href="{{route($ultimaVisita)}}">Tours {{$tour->tipo}}</a> </li>
                    <li class="sitio-actual">Tour {{$tour->nombre}}</li>
                </ul>
            </nav>
            <div class="descripcion-ind">
                <p>{{$tour->descripcion}}</p>
            </div>
            <div class="planing-ind">
                <h1>Planing de la Visita</h1>
                <p>{{$tour->planing}}</p>
            </div>
        </div>

        <div id="punto-encuentro">
            <div class="b1-punto-encuentro">
                <h1>Punto de encuentro</h1>
            </div>
            <div class="container-mapa">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d12783.01187779919!2d-6.352854291715468!3d36.77649322494595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2ses!4v1648157604079!5m2!1ses!2ses" width="80%" height="80%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <div id="form-reserva" role="contentinfo">
            <div id="h1-form-reserva">
                <h1>Reserva tu plaza</h1>
            </div>
            <div id="container-form-reserva">
                <div class="form-reserva">
                    <p>Fecha: {{$tour->fechahora}}</p>
                    <p>Duración: {{$tour->duracion}}h</p>
                    <p>Precio: {{$tour->precio}}€</p>

                    <form class="form" action="{{route('tramitereserva')}}" method="post" >
                        @csrf
                        <div>
                            <p>N.personas:</p>
                            <input type="number" name="npersonas" id="">{{-- Hacer consulta abase de datos para ver las plazas disponible para ese tours --}}
                        </div>
                        @if (Auth::user()== null)
                            <button  id="btnModal" onclick="muestraModal(event);">Reservar</button>
                        @else
                        <button type="submit" id="btnModal">Reservar</button>
                        @endif

                    </form>
                    <div id="myModal" class="modalContainerInvisible">
                        <div class="modal-content">
                        <span onclick="cerrarModal();" class="close">×</span>
                        <h2>Modal</h2>
                        <p>Se ha desplegado el modal y bloqueado el scroll del body!</p> </div>
                    </div>
                </div>
            </div>
        </div>




        <footer id="b6-pagina-principal">
            <div class="b6-container-iconos">
                <div class="b6-iconos">
                    <picture title="Icono Free Tour">
                        <img src="{{ asset('Img/Página principal/icono_free_tours-removebg-preview.png')}}" alt="Icono FreeTour">
                    </picture>
                    <a href="{{route('freetours')}}" title="Enlace a FreeTours">Free Tour</a>
                </div>
                <div class="b6-iconos">
                    <picture title="Icono Gastronomía">
                        <img src="{{ asset('Img/Página principal/icono gastronimia 2.png')}}" alt="Icono Gastronomía">
                    </picture>
                    <a href="{{route('gastrotours')}}" title="Enlace a tours de gastronomía">Gastronomía</a>
                </div>
                <div class="b6-iconos">
                    <picture title="Icono Cultural">
                        <img src="{{ asset('Img/Página principal/icono cultiral.png')}}" alt="Icono Cultural">
                    </picture>
                    <a href="{{route('cultutours')}}" title="Enlace a tours de culturales">Cultural</a>
                </div>
                <div class="b6-iconos">
                    <picture title="Icono tour deportivo">
                        <img src="{{ asset('Img/Página principal/icono_deporte-removebg-preview.png')}}" alt="Icono Tour deportivo">
                    </picture>
                    <a href="{{route('deportours')}}" title="Enlace a tours de deportivos">Deportivo</a>
                </div>
            </div>
            <div class="b6-iconos-redes">
                <div id="iconos-redes">
                    <a href=""><img src="{{ asset('Img/Página principal/icono instagram.png')}}" alt="Icono instagram"></a>
                    <a href=""><img src="{{ asset('Img/Página principal/icono_twitter_cuadrado-removebg-preview.png')}}" alt="Icono Twitter"></a>
                    <a href=""><img src="{{ asset('Img/Página principal/icono facebook.png')}}" alt="Icono facebook"></a>
                </div>
                <div id="b6-p-actualizacion">
                    Última actualización el 00-00-0000
                </div>
            </div>
        </footer>

    </div>
</body>

</html>
