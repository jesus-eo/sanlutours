<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- css --}}
    <link rel="stylesheet" href="{{asset('css/tourIndividual.css')}}">
    {{-- JS --}}
    <script src="{{asset('js/sobre-nosotros.js')}}" defer></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');
    </style>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Corben&display=swap');
    </style>
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
                <h1>CASA BALBINO</h1>
            </div>
            <div class="datos-tour">
                <div>
                    <h3 class="h3-datos-tour">DURACIÓN</h3>
                    <p>2:00 horas</p>
                </div>
                <div>
                    <h3 class="h3-datos-tour">FECHA</h3>
                    <p>00-00-0000</p>
                </div>
                <div>
                    <h3 class="h3-datos-tour">PRECIO</h3>
                    <p>30€</p>
                </div>
            </div>
            <img class="img-fondo" src="{{asset('Img/Img Cultural/tour cabildo.jpeg')}}" alt="Imagen fondo tour individual">
        </div>

        <div id="bloque2-pag-individual">
            <nav class="breadcrumb" aria-label="Breadcrumb">
                <ul>
                    <li><a class=" underline enlace-bread" href="">Inicio</a></li>
                    <li class="sitio-actual">Tour Gastronómico</li>
                </ul>
            </nav>
            <div class="descripcion-ind">
                <p>Conocida en medio mundo, las Tortillas de Camarones es un plato muy especial que no todos saben
                    cocinar. Casa Balbino es considerada por muchos "El Templo de las Tortillas de Camarones". Ahora te
                    toca a ti descubrir por qué.</p>
            </div>
            <div class="planing-ind">
                <h1>Planing de la Visita</h1>
                <p>Quedamos en el centro de la ciudad justamente en la plaza del cabildo donde emprenderemos la marcha
                    hacia donde será nuestro destino, una vez allí degustaremos de varias tapas donde probaremos las
                    exquisiteces de este bar acompañado de una charla explicativa de la historia del mismo.</p>
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
                    <p>Fecha: 00-000-0000</p>
                    <p>Duración: 2h</p>
                    <p>Precio: 25€</p>
                    <form class="form" action="index.html" method="get">
                        <div>
                            <p>N.personas:</p>
                            <input type="number" name="npersonas" id="" maxlength="5" minlength="5">
                        </div>
                        <button type="submit" id="btnenviar">Reservar</button>
                    </form>
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
