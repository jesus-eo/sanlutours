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
    <link rel="stylesheet" href="{{ asset('css/tourIndividual.css') }}">
    {{-- JS --}}
    <script src="{{ asset('js/sobre-nosotros.js') }}" defer></script>
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
    {{-- Geolocalización --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.js"></script>
    <script src="https://www.mapquestapi.com/sdk/leaflet/v2.2/mq-map.js?key=IqUsJatZv20CbBLVd3oKUDAE01g0dslv"></script>
    <script src="https://www.mapquestapi.com/sdk/leaflet/v2.2/mq-routing.js?key=IqUsJatZv20CbBLVd3oKUDAE01g0dslv"></script>
    <style>
        #map {
            height: 60%;
        }

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
                                title="Enlace a Guías">Guías</a>
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
                            <li class="tours subrallado-actual" title="Tours">Tours
                                <i id="botonLateral" class="fa fa-angle-right"></i>
                            </li>
                            <ul id="menu-desplegable" class="desplegable-oculto">
                                <li><a class="subrallado" href="{{ route('freetours') }}"
                                        title="Página freetours">Free Tours</a></li>
                                <li><a class="subrallado" href="{{ route('cultutours') }}"
                                        title="Página tour cultural">Cultural</a></li>
                                <li><a class="subrallado" href="{{ route('gastrotours') }}"
                                        title="Página tour gastronómico">Gastronómico</a></li>
                                <li><a class="subrallado" href="{{ route('deportours') }}"
                                        title="Página tour deportivo">Deportivo</a></li>
                            </ul>
                        </div>
                        <li><a class="subrallado" href="{{ route('guias') }}" title="Página guias">Guías</a></li>
                        <li><a class="subrallado" href="{{ route('sobrenosotros') }}"
                                title="Página sobrenosotros">Sobre Nosotros</a></li>
                        <li><a class="subrallado" href="{{ route('contacto') }}"
                                title="Página contacto">Contacto</a></li>
                    </ul>
                </div>
            </header>


            <div class="titulo-central">
                <h1>{{ $tour->nombre }}</h1>
            </div>
            <div class="datos-tour">
                <div>
                    <h3 class="h3-datos-tour">DURACIÓN</h3>
                    <p>{{ $tour->duracion }} horas</p>
                </div>
                <div>
                    <h3 class="h3-datos-tour">FECHA</h3>
                    <p>{{ (new Datetime($viaje->fechahora))->format('d/m/Y H:i:s') }}</p>
                </div>
                <div>
                    <h3 class="h3-datos-tour">PRECIO</h3>
                    <p>{{ $tour->precio }}€</p>
                </div>
            </div>
            <img class="img-fondo" src="{{ asset($tour->imagen) }}" alt="Imagen fondo tour individual">
        </div>
        @php
            $ultimaVisita = '';
            if ($tour->tipo == 'gastronomico') {
                $ultimaVisita = 'gastrotours';
            } elseif ($tour->tipo == 'cultural') {
                $ultimaVisita = 'cultutours';
            } elseif ($tour->tipo == 'deportivo') {
                $ultimaVisita = 'deportours';
            } else {
                $ultimaVisita = 'freetours';
            }
        @endphp

        <div id="bloque2-pag-individual" x-data="{ activeTab: 1, }">
            <nav class="breadcrumb" aria-label="Breadcrumb">
                <ul>
                    <li><a class="enlace-bread" href="/" title="Página de inicio.">Inicio</a></li>
                    <li><a class="enlace-bread" href="{{ route($ultimaVisita) }}"
                            title="Enlace a ultima visita">Tours {{ $tour->tipo }}</a> </li>
                    <li class="sitio-actual">Tour {{ $tour->nombre }}</li>
                </ul>
            </nav>

            <ul id="nav-tour-ind" class="flex flex-row items-center justify-around h-16">
                <li>
                    <a href="#" class="px-4 text-black border-b-2 border-gray-900 hover:border-teal-500 text-xl"
                        x-on:click.prevent="activeTab = 1" x-cloak
                        :class="activeTab === 1 ? 'border-teal-500' : ''">Descripción</a>
                </li>
                <li>
                    <a href="#" class="px-4 text-black border-b-2 border-gray-900 hover:border-teal-500 text-xl"
                        x-on:click.prevent="activeTab = 2" x-cloak
                        :class="activeTab === 2 ? 'border-teal-500' : ''">Planning de la visita</a>
                </li>
                <li>
                    <a href="#" class="px-4 border-b-2 border-gray-900 text-black hover:border-teal-500 text-xl"
                        x-on:click.prevent="activeTab = 3" x-cloak
                        :class="activeTab === 3 ? 'border-teal-500' : ''">Punto de encuentro</a>
                </li>
                <li>
                    <a href="#" class="px-4 border-b-2 text-black border-gray-900 hover:border-teal-500 text-xl"
                        x-on:click.prevent="activeTab = 4" x-cloak
                        :class="activeTab === 4 ? 'border-teal-500' : ''">Reserva tu plaza</a>
                </li>
                <li>
                    <a href="#" class="px-4 border-b-2 text-black border-gray-900 hover:border-teal-500 text-xl"
                        x-on:click.prevent="activeTab = 5" x-cloak
                        :class="activeTab === 5 ? 'border-teal-500' : ''">Meteorologia</a>
                </li>
            </ul>
            <div x-show="activeTab === 1" class="planing-ind">
                <h1 class="text-white">Descripción</h1>
                <p>{{ $tour->descripcion }}</p>
                {{-- Detalles --}}
                <h1 class=" text-center w-full mt-16  text-white">Detalles</h1>
                <div class="detalles-tour">
                    <div class="detalles-tour-secciones">
                        <p>Medidas Covid-19</p>
                        <p>Antes de viajar, revisa las restricciones locales. Todos nuestros servicios cumplen las
                            recomendaciones para evitar el coronavirus.</p>
                    </div>

                    <div class="detalles-tour-secciones">
                       <p>Duración</p>
                        <p>{{ $tour->duracion }} horas</p>
                    </div>
                    <div class="detalles-tour-secciones">
                        <p>Idioma</p>
                        <p>La actividad se realiza con un guía que habla español.</p>
                    </div>
                    <div class="detalles-tour-secciones">
                        <p>Incluido</p>
                        <p>Guía de habla española.</p>
                    </div>
                    <div class="detalles-tour-secciones">
                        <p>Cuándo reservar</p>
                        <p>Puedes reservar hasta la hora de inicio siempre que haya disponibilidad. Reserva ya y asegura
                            tu plaza.</p>
                    </div>
                    <div class="detalles-tour-secciones">
                        <p>Accesibilidad</p>
                        <p>
                            La mayoría de las zonas son accesibles.
                        </p>
                    </div>
                    <div class="detalles-tour-secciones">
                        <p>Preguntas frecuentes</p>
                        <div>
                            <p class="preg-frec-p">P -¿Cómo hacer la reserva?</p>
                            <p class="preg-frec-p">R -
                                Para reservar el Free tour por Sanlúcar elige la fecha deseada y completa el formulario.
                                La confirmación es inmediata.</p>
                            <br>
                            <p class="preg-frec-p">¿Se necesita un número mínimo de participantes?</p>
                            <p class="preg-frec-p">R -
                                Esta actividad necesita un mínimo de 4 participantes. En caso de no alcanzar ese número,
                                os contactaremos para ofreceros diferentes alternativas.</p>
                        </div>

                    </div>

                </div>
                <h1 class="text-center w-full mt-16 text-white">Cancelación
                    gratuita</h1>
                <p>Si no vas a poder asistir al tour, por favor, cancela la reserva, si no, el guía te estará esperando.
                </p>


            </div>
            <div x-show="activeTab === 2" class="planing-ind">
                <h1 class="text-white">Planning de la Visita</h1>
                <p>{{ $tour->planing }}</p>
            </div>

            {{-- MApa --}}
            <div x-show="activeTab === 3" id="punto-encuentro">
                <div class="b1-punto-encuentro text-white">
                    <h1 class="text-white">Punto de encuentro</h1>
                </div>
                <div id="map">
                </div>
                <div class="flex justify-center items-center">
                    <button id="btnllegar"
                        class="p-card border-2 text-black  px-20 rounded-md font-medium  transition duration-300">Como
                        llegar</button>
                </div>
            </div>

            <div x-show="activeTab === 4" id="form-reserva" role="contentinfo">
                <div id="h1-form-reserva">
                    <h1 class="text-white">Reserva tu plaza</h1>
                </div>
                <div id="container-form-reserva">
                    <div class="form-reserva">
                        <p>Fecha: {{ (new Datetime($viaje->fechahora))->format('d/m/Y H:i:s') }}</p>
                        <p>Duración: {{ $tour->duracion }}horas</p>
                        <p>Precio: {{ $tour->precio }}€</p>

                        <form class="form" action="{{ Route('tramitereserva', [$tour]) }}" method="post">
                            @csrf

                            @php
                                $min = $viaje->plazas == 0 ? 0 : 1;
                            @endphp
                            <div>
                                <p>N.personas:</p>
                                <input type="number" name="numpersonas" min="{{ $min }}"
                                    max="{{ $viaje->plazas }}" required>
                                <input type="hidden" name="viaje" value="{{ $viaje }}">
                            </div>

                            @if (Auth::user() == null || $viaje->plazas == 0)
                                <button id="btnModal" onclick="muestraModal(event);">Reservar</button>
                            @else
                                <button type="submit" id="btnModal">Reservar</button>
                            @endif

                        </form>
                        <div id="myModal" class="modalContainerInvisible">
                            <div class="modal-content">
                                <span onclick="cerrarModal();" class="close">X</span>
                                @if (Auth::user() == null)
                                    <p>Debes <a class="text-blue-600" href="/login" title="Login">loguearte</a> antes
                                        de
                                        reservar.</p>
                                @elseif ($viaje->plazas == 0)
                                    <p>No hay plazas disponibles.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- METEOROLOGIA --}}
            <div class="meteorologia " x-show="activeTab === 5">
                <section class="top-banner">
                    <div class="container-meteo">
                        <h1 class="text-4xl text-white mt-3 mb-4">Meteorología</h1>
                        <h2>Consulta la meteorología actual por ciudad.</h2>
                        <form>
                            <input type="text" placeholder="Buscar por ciudad" autofocus>
                            <button type="submit">Buscar</button>
                            <span class="msg"></span>
                        </form>
                    </div>
                </section>
                <section class="ajax-section">
                    <div class="container-img-meteo">
                        <ul class="cities"></ul>
                    </div>
                </section>
            </div>
        </div>
        @include('components.footer')

    </div>

    <script>
        /* Datos vista inicial mapa */
        let map = L.map('map', {
            layers: MQ.mapLayer(),
            center: [{{ $tour->latitud }}, {{ $tour->longitud }}],
            zoom: 14
        });
        /* Tipo de mapa */
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href=" https://www.openstreetmap.org/copyright">OpenStreetMap </a> contributors'
        }).addTo(map);

        /* Marcador punto de encuentro inicial*/
        let marker = L.marker([{{ $tour->latitud }}, {{ $tour->longitud }}]).addTo(map);
        marker.bindPopup("<b>Este es tu punto de encuentro</b><br>Te esperamos!!").openPopup();

        let btnllegar = document.getElementById("btnllegar");
        btnllegar.addEventListener('click', geolocalizaciónActual);

        /* Función que marca el camino entre dos puntos */
        function geolocalizaciónActual() {
            if ("geolocation" in navigator) {
                navigator.geolocation.getCurrentPosition(function(position) {

                    /* Marcadores (evento) */
                    let CustomRouteLayer = MQ.Routing.RouteLayer.extend({
                        /* Creo marcador inicial */
                        createStartMarker: function(location, stopNumber) {
                            let marker = L.marker([position.coords.latitude, position.coords.longitude])
                                .addTo(map);
                            marker.bindPopup("<b>Localización actual</b>").openPopup()
                            return marker;
                        },
                        /* Creo marcador final */
                        createEndMarker: function(location, stopNumber) {
                            let greenIcon = L.icon({
                                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
                                iconSize: [25, 41],
                                iconAnchor: [12, 41],

                            });
                            let marker = L.marker([{{ $tour->latitud }}, {{ $tour->longitud }}], {
                                icon: greenIcon
                            }).addTo(map);
                            marker.bindPopup("<b>Este es tu punto de encuentro</b><br>Te esperamos!!")
                                .openPopup();
                            return marker;
                        }
                    });

                    /* Ruta de punto a punto */
                    dir = MQ.routing.directions();
                    dir.route({
                        locations: [{
                            latLng: {
                                lat: {{ $tour->latitud }},
                                lng: {{ $tour->longitud }}
                            }
                        }, {
                            latLng: {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude
                            }
                        }]
                    });
                    map.addLayer(new CustomRouteLayer({
                        directions: dir,
                        fitBounds: true,
                    }));

                });
            }
        }
    </script>



</body>

</html>
