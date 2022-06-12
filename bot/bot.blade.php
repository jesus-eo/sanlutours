<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sanlutours chat</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div class="chatbox">
            <div class="header">
                <h4> <img src='img/perfil.jpg' class='imgRedonda' /> CoronaBot </h4>

            </div>

            <div class="body" id="chatbody">
                <p class="robot">
                    Hola! soy tourBot, de la empresa Sanlutours estoy para responder preguntas relacionadas con nuestros tours. Espero poder ayudarte.
                </p>
                <div class="scroller"></div>
            </div>

            <form class="chat" method="post" autocomplete="off">

                <div>
                    <input type="text" name="chat" id="chat" placeholder="Preguntale algo" style=" font-family: cursive; font-size: 20px;">
                </div>
                <div>
                    <input type="submit" value="Enviar" id="btnChat">
                </div>
            </form>
        </div>
    </div>
    <script src="app.js"></script>
</body>

</html>