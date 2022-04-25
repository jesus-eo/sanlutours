/*Desplegable menu(Tours)*/
if (document.querySelector("#container-tour-desplegable")) {
    let menuDesSup = document.querySelector("#container-tour-desplegable");
    menuDesSup.addEventListener('mouseover', desplegable);
    menuDesSup.addEventListener('mouseout', desplegable);
};

function desplegable() {
    document.querySelector("#menu-desplegable").classList.toggle("desplegable-visible");
    document.querySelector("#menu-desplegable").classList.toggle("desplegable-oculto");
    document.querySelector("#botonLateral").classList.toggle("fa-angle-down");
    document.querySelector("#botonLateral").classList.toggle("fa-angle-right");
};

/*Desplegable menuhamburguesa(Tours)*/
let btnsubmenu = document.querySelector("#submenu");
btnsubmenu.addEventListener('click', function() {
    document.querySelector("#menu-desplegable-burguer").classList.toggle("desplegable-visible-burguer");
    document.querySelector("#menu-desplegable-burguer").classList.toggle("desplegable-oculto-burguer");
    document.querySelector("#boton-lateral").classList.toggle("fa-angle-down");
    document.querySelector("#boton-lateral").classList.toggle("fa-angle-right");

});


/*Header aparece cuando scrolleamos hacia arriba
ubicacionPrincipal vale 0 al inicio*/

let ubicacionPrincipal = window.scrollY;
window.onscroll = function() {
        let desplazamientoActual = window.scrollY;
        if (desplazamientoActual >= 100) {
            if (ubicacionPrincipal >= desplazamientoActual) {
                document.querySelector('.encabezado-b1-principal').style.top = '0';
                document.querySelector('.encabezado-b1-principal').style.backgroundColor = '#C7CEC9';
                document.querySelector('.desplegable-oculto').style.backgroundColor = '#C7CEC9';
            } else {
                document.querySelector('.encabezado-b1-principal').style.top = '-100px';
            }
            ubicacionPrincipal = desplazamientoActual;
        } else {
            document.querySelector('.encabezado-b1-principal').style.top = '25px';
            document.querySelector('.encabezado-b1-principal').style.backgroundColor = '';
            document.querySelector('.desplegable-oculto').style.backgroundColor = '';
        }
    }
    /*---------VIDEO---- */
    /* let video = document.getElementById('video-sanlucar');
    video.addEventListener('mouseover',function (){
        video.play();
    })
    video.addEventListener('mouseout',function (){
        video.pause();
    }) */

/* ----SLIDER---- */
let p = [
    "Las Carreras de Caballo de Sanlúcar de Barrameda es una de las competiciones hípicas oficiales más antiguas de España. Tras saber adaptarse a los nuevos tiempos; se han convertido en uno de los espectáculos declarados como una de las fiestas de Interés Turístico Andaluz, Nacional e Internacional, podrás disfrutar también del singular entorno del Parque Nacional de Doñana lo que complementa una oferta muy atractiva para turistas tanto nacionales como internacionales. ",
    "Es uno de los rincones más insólitos que haya conocido jamás. Actualmente lo ocupa el Ayuntamiento pero fue diseñado a finales del siglo XIX para residencia veraniega de los Duques de Montpensier. Se halla en la parte alta de Sanlúcar de Barrameda, en lo más alto de una empinada cuesta que lleva al centro de la ciudad baja, por la parte trasera del edificio hay un gran jardín en ladera, desde el que se contempla la desembocadura del Guadalquivir y el resto de la ciudad.",
    "Con la visita a Doñana desde Sanlúcar de Barrameda descubrirás el Parque Nacional al completo y de la manera más especial. Recorrerás todos los ecosistemas en vehículo todoterreno, desde las dunas hasta la marisma, descubriendo también las impresionantes playas de Doñana. Podrás navegar desde Bajo de Guía hasta Doñana en una barcaza tradicional, y surcar el río Guadalquivir para regresar a Sanlúcar."
]
let h2 = [
    "Carreras de caballos",
    "Visita palacio",
    "Visita a Doñana",
];
let images = [
    "../Img/Página principal/tour destacado carreras.jpg",
    "../Img/Página principal/PP-palacio.jpg",
    "../Img/Página principal/Tour destacado doñana.jpg",
];
let arrowLeft = document.querySelector("#arrow-left");
let arrowRight = document.querySelector("#arrow-right");
let imagenActual = 0;
arrowLeft.addEventListener('click', cambiaImg);
arrowRight.addEventListener('click', cambiaImg);

/* Función que cambia de imagen dependiendo de la flecha que pulses cambiando el src de la imagen por uno del array  */
function cambiaImg(e) {

    if (e.target.id == "arrow-right" && imagenActual < (images.length - 1)) {
        imagenActual += 1;
        document.querySelector(".img-slider").src = images[imagenActual];
        document.querySelector("#b4-h2").innerHTML = h2[imagenActual];
        document.querySelector("#b4-p").innerHTML = p[imagenActual];
    }
    if (e.target.id == "arrow-left" && imagenActual != 0) {

        imagenActual -= 1;
        document.querySelector(".img-slider").src = images[imagenActual];
        document.querySelector("#b4-h2").innerHTML = h2[imagenActual];
        document.querySelector("#b4-p").innerHTML = p[imagenActual];
    }
}

/*----  Que dicen de nosotros------*/

let arrowLeftb5 = document.querySelector("#arrow-left-b5");
let arrowRightb5 = document.querySelector("#arrow-right-b5");
let comentarioActual = 0;
arrowLeftb5.addEventListener('click', peticion);
arrowRightb5.addEventListener('click', peticion);

async function peticion(e) {

    let id = e.target.id;
    try {
        const respuesta = await fetch('http://127.0.0.1:8000/comentarios');

        if (respuesta.ok) {
            console.log('entra');
            let response = await respuesta.json();

            cambiaComentario(id, response);
        } else {
            alert("Error en la respuesta")
        }
    } catch (error) {

    }
};


/* Función que cambia de imagen dependiendo de la flecha que pulses cambiando el src de la imagen por uno del array  */
function cambiaComentario(id, json) {

    if (id == "arrow-right-b5" && comentarioActual < (json.length - 1)) {
        comentarioActual += 1;

        document.querySelector("#b5-p").innerHTML = json[comentarioActual].descripcion;
        document.querySelector("#b5-p2").innerHTML = json[comentarioActual].nombre;
    }
    if (id == "arrow-left-b5" && comentarioActual != 0) {

        comentarioActual -= 1;
        document.querySelector("#b5-p").innerHTML = json[comentarioActual].descripcion;
        document.querySelector("#b5-p2").innerHTML = json[comentarioActual].nombre;
    }
}