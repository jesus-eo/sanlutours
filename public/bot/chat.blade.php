<?php
include "Bot.php";
$bot = new Bot;
$questions = [



    //name
    "¿como te llamas?" =>"Soy TourBot y estoy para servirte",
    "¿cual es tu nombre?" =>"Soy TourBot y estoy para servirte",
    "¿tienes nombre?" =>"Soy TourBot y estoy para servirte",
    "¿what is your name?" =>" my name is TourBot",
    "¿tu nombre es?" => "Mi nombre es " . $bot->getName(),
    "¿tu eres?" => "Yo soy una " . $bot->getGender(),

    //saludo
    "hola" =>"Hola que tal!",
    "un saludo" =>"como te va",
    "hello" =>"un gusto de verte",

    //despedida
    "adios" =>"cuidate",
    "hasta la proxima" =>"nos vemos pronto",
    "nos vemos" =>"te estare esperando",
    "bye" =>"Good bye ♥",
    "see you" =>"see you lader ♥",
    //
    "¿cuáles son las ventajas de viajar con sanlutours?"=>"Si viajas con nosotros podrá:
    Obtener Tours altamente calificados y entretenidos a precios muy competitivos;",

    "¿cuáles son las ventajas de sus tours?"=>"Vivimos y trabajamos en Sanlúcar. Y lo más importante: nos encanta Sanlúcar. Basados en nuestra experiencia y conocimiento, diseñamos programas que harán su vida más fácil, permitiéndole ahorrar tiempo en investigación, dinero y paciencia.",

    "¿cómo puede sanlutours ofrecer precios tan competitivos?"=>"Nuestra larga experiencia en la organización de viajes a través de Sanlúcar nos ha permitido establecer vínculos sólidos con los mejores y más cualificados socios y proveedores.",

    "¿cómo puedo reservar un tour?" => "Usted puede reservar un Tour fácilmente con nosotros. cada página web del Tour tiene un formulario que puede rellenar y enviar.",

    "¿con cuánta anticipación debo reservar?"=>"Solicitamos un mínimo de 72 horas para garantizar que podamos organizar todo correctamente y también que todos los servicios estén disponibles. También puede reservar tan pronto como desee.",

    "¿cómo puedo pagar?"=>"Puede pagar con tarjeta de crédito o mediante transferencia bancaria a trvés de Paypal.",

    "¿cómo puedo cancelar mi tour?"=>"Si tiene que cancelar su reserva, debe notificarnos inmediatamente. Si nos notifica con más de 30 días antes de la fecha de salida, cancelaremos su reserva sin penalizaciones.",

    "¿cuántas personas pueden participar en un tour?"=>"Los Tours en Grupo tienen un número fijo de participantes.",

    "¿el guía está incluido en el precio?"=>" Elegimos automáticamente un guía oficial para usted. El trabajo de nuestro guía es guiar al grupo en los diferentes lugares para visitar. Los guías son seleccionados por su conocimiento y capacidad para manejar la logística inherente a un grupo grande.",

    "¿dónde sera el punto de partida?"=>"Cada tour tiene relacionado un punro de partida donde te recibira un guìa",
    "¿cómo puedo quejarme?"=>"Debe escribirnos su queja a nuestro departamento de reservas y nuestra administración se ocupará de ello.",




];
/**
 * Se crea un bot al principio del script($bot)
 * Cuando recibe la petición recogo el mensaje
 */
if (isset($_GET['msg'])) {

     /**Recojo el mensaje,
     * compruebo si tiene una respuesta relacionada con el mensaje devolviendola como respuesta, donde la procesamos en la recepción de la petición.
     */
        $msg = strtolower($_GET['msg']);
        global $msg;
        global $questions;
       if ($bot->ask($msg, $questions) == "") {
            $bot->reply("Lo siento, Las preguntas deben estar relacionadas con la empresa Sanlutours.");
        } else {
            $bot->reply($bot->ask($msg,$questions));
        }

}
