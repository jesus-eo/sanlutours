<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- css --}}
        <link rel="stylesheet" href="{{asset('css/sobnos-cont.css')}}">
        {{-- JS --}}
        <script src="{{asset('js/contacto.js')}}" defer></script>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Styles -->

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');
        </style>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Corben&display=swap');
        </style>
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
                <header class="encabezado-b1-principal">
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
                                <li class="tours subrallado" title="Tours">Tours
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
                        </div>
                        <div class="form-contacto">
                        <form class="form" action="index.html" method="get">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" aria-label="nombre" class="cajasform"
                                 maxlength="20" required>
                            <label for="apellido">Apellidos</label>
                            <input type="text" name="apellido" id="apellido" title="apellido" class="cajasform"
                                 maxlength="20" required>
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="cajasform"
                                pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" title="Correo electronico incorrecto"
                                required>
                            <label for="textarea">Mensaje</label>
                            <textarea name="textarea" id="textarea" title="textarea" class="cajasform" cols="30"
                                rows="10"  disabled required></textarea>
                            <button type="submit" id="btnenviar">Enviar</button>
                        </form>
                    </div>
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
