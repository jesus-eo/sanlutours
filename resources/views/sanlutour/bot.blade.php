<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Favicon --}}
    <link rel="icon" type="image/jpg" href="{{ asset('Img/Página principal/favicon.png') }}" />
    <title>Sanlutours chat</title>
     {{-- JS --}}
     <script src="{{ asset('js/bot.js') }}" defer></script>
     {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/sobnos-cont.css') }}">

</head>

<body>
    <div class="container-wrapper">
    <div class="container-preg">
        <div class="container-sect-preg">
            <h1>Preguntas frecuentes</h1>
            <ul>
                <li>¿Cuáles son las ventajas de viajar con sanlutours?</li>
                <li>¿Cómo puede sanlutours ofrecer precios tan competitivos?</li>
                <li>¿Cómo puedo reservar un tour?</li>
                <li>¿Con cuánta anticipación debo reservar?</li>
                <li>¿Cómo puedo cancelar mi tour?</li>
                <li>¿Cuántas personas pueden participar en un tour?</li>
                <li>¿Cómo puedo quejarme?</li>
            </ul>
            <a href="{{Route('contacto')}}"><button class="btnVolverChat">Volver</button></a>
        </div>
    </div>
    <div class="container">
        <div class="chatbox">
            <div class="header">
                <h4>TourBot </h4>
            </div>
            <div class="body" id="chatbody">
                <p class="robot">
                    Hola! soy tourBot, de la empresa Sanlutours estoy para responder preguntas relacionadas con nuestros tours. Espero poder ayudarte.
                </p>
                <div class="scroller"></div>
            </div>

            <form class="chat" method="post" autocomplete="off" >

                <div class="chat1">
                    <input type="text" name="chat" id="chat" placeholder="Preguntale algo" >

                </div>
                <div class="chat2">
                    <input type="submit" value="Enviar" id="btnChat">
                </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>
