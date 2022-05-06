/* Cambiar subrallado guia-tour */
if (document.querySelector("#valor-subrallado")) {
    let valor = document.querySelector("#valor-subrallado").value

    if (valor == "guias") {
        let subGuia = document.querySelector("#subrallado-guia");
        let subTour = document.querySelector("#subrallado-tour");
        subGuia.classList.toggle('subrallado');
        subGuia.classList.toggle('subrallado-actual');
        subTour.classList.toggle('subrallado-actual');
    }
}



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

/********************Estrella guias ***************/
let primeravezguia = true;
async function valoracion(e, id) {

    if (primeravezguia) {
        sessionStorage.setItem('valoraciong', JSON.stringify([]));
        primeravezguia = false;
    }

    /* Si no existe */
    if (JSON.parse(sessionStorage.getItem('valoraciong')).indexOf(id) == -1) {
        let valoraciong = sessionStorage.getItem('valoraciong');
        let valoraciongparse = JSON.parse(valoraciong);
        valoraciongparse.push(id);
        sessionStorage.setItem('valoraciong', JSON.stringify(valoraciongparse));

        try {
            let json = {
                "id": id,
                "valor": e.value
            };
            let response = await fetch('http://127.0.0.1:8000/valguias', {
                    method: 'POST',
                    //Se manda la petición en forma de cadena tenemos que utilizar ese content-type del headers
                    headers: {
                        'Content-type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(json),
                })
                //Utilizamos el siguiente if para comprobar si la respuesta es ok, porque puede que la respuesta este bien pero devuelva un código de fallo
            if (response.ok) {
                let valorActual = await response.json();
                let pValor = document.querySelector('.val' + id);
                pValor.innerHTML = `${valorActual}`;
            } else {
                alert("Error en la respuesta")
            }
        } catch (error) {
            alert(error.message);
        }
    }
}

/********************Estrella tours(free,cultural,deportivo,gastronomico) ***************/
let primeraveztour = true;
async function valoraciontour(e, id) {
    /*  Si no existe lo crea pasandole el id*/
    if (primeraveztour) {
        sessionStorage.setItem('valoracion', JSON.stringify([]));
        primeraveztour = false;
    }

    /* Si no existe */
    if (JSON.parse(sessionStorage.getItem('valoracion')).indexOf(id) == -1) {
        let valoracion = sessionStorage.getItem('valoracion');
        let valoracionparse = JSON.parse(valoracion);
        valoracionparse.push(id);
        sessionStorage.setItem('valoracion', JSON.stringify(valoracionparse));
        try {
            let json = {
                "id": id,
                "valor": e.value,
            };
            let response = await fetch('http://127.0.0.1:8000/valtour', {
                    method: 'POST',
                    //Se manda la petición en forma de cadena tenemos que utilizar ese content-type del headers
                    headers: {
                        'Content-type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')

                    },
                    body: JSON.stringify(json),
                })
                //Utilizamos el siguiente if para comprobar si la respuesta es ok, porque puede que la respuesta este bien pero devuelva un código de fallo
            if (response.ok) {
                let valorActual = await response.json();
                let pValor = document.querySelector('.val' + id);
                /*  console.log(pValor); */
                pValor.innerHTML = `${valorActual}`;
            } else {
                alert("Error en la respuesta")
            }
        } catch (error) {
            alert(error.message);
        }

    }

}

/* Ventana modal tour individual */
function muestraModal(e) {
    let modal = document.getElementById("myModal");
    modal.classList.toggle('modalContainerVisible');
    modal.classList.toggle('modalContainerInvisible');
    e.preventDefault();
}

function cerrarModal() {
    let modal = document.getElementById("myModal");
    modal.classList.toggle('modalContainerVisible');
    modal.classList.toggle('modalContainerInvisible');
}
/*-------------------
------Contacto-------
---------------------*/
/*FORMULARIO*/
if (document.getElementById("btnenviar")) {


    let btnenviar = document.getElementById("btnenviar");
    let formulario = document.querySelector('.form');
    let nombre = document.querySelector('#nombre');
    let apellido = document.getElementById("apellido");
    let email = document.getElementById("email");
    btnenviar.addEventListener('click', validar);
    nombre.addEventListener('input', validarNombre);
    apellido.addEventListener('change', validarApellido);
    email.addEventListener('blur', validar);
}
/* Hay que vaciar el valor de todos los elementos del formulario con setCustomValidity porque se queda guardado la cadena introducida anteriormente */
function limpiarCustomvaliditi() {
    for (const elemento of formulario.elements) {
        elemento.setCustomValidity("");
    }
}

function validarEmail() {
    limpiarCustomvaliditi();
    //Si no contiene datos validos
    if (!email.checkValidity()) {
        if (email.validity.patternMismatch) {
            email.setCustomValidity("Debes introducir un email valido");
        }
        //Si el campo email es vacio devuelve true
        if (email.validity.valueMissing) {
            email.setCustomValidity("Debes rellenar el campo email");
        }
        //Para mandar el mensaje creado
        email.reportValidity();
        return false;
    }
    return true;
}

function validarNombre() {
    limpiarCustomvaliditi();
    if (!nombre.checkValidity()) {
        if (nombre.validity.valueMissing) {
            nombre.setCustomValidity("Debes rellenar el campo nombre");
            nombre.reportValidity();
            return false;
        }
    }
    return true;
}

function validarApellido() {
    limpiarCustomvaliditi();
    if (!apellido.checkValidity()) {
        if (apellido.validity.valueMissing) {

            apellido.setCustomValidity("Debes rellenar el campo apellido");
            apellido.reportValidity();
            return false;
        }
    }
    return true;
}

function validar(e) {
    limpiarCustomvaliditi();
    if (validarNombre() && validarApellido() && validarEmail()) {
        document.getElementById('textarea').disabled = false;
    } else {
        e.preventDefault();
    }
}



/*********Modal(Ventana)******* */
if (document.querySelector("#modalContacto")) {
    const btn = document.querySelector("#modalContacto");
    btn.addEventListener('click', crearVentana);
    //Cuando llama a la función crarVentana se ejecuta el windows.open() y se guarda en la variable ventanaNueva que es un objeto para después hacer cambios en ella, ** En el momento que se le cambia el width y el height van *juntosss*abre una ventana nueva no una pestaña***
    function crearVentana() {
        ventanaNueva = window.open("", "_black", "width=300 height=100");
        ventanaNueva.resizeBy(300, 300);
        ventanaNueva.moveBy(400, 200);
        ventanaNueva.document.write('<html><head><title>Datos de interes se sanlutours</title><style>.bodyventana{background-color: #485342;}.bodyventana ul li {color: white;font-size: 20px;}</style></head><body class="bodyventana">');
        ventanaNueva.document.write("<ul><li>Nombre de la empresa: Sanlutours</li><li>Teléfono: 678765458</li><li>Correo Electrónico: sanlutours@gmail.com</li><li>Dirección: C.Mesón del Duque,20</li></ul>");
        ventanaNueva.document.write('</body></html>');

    }

}
/*-------------------------
----- Página principal-----
--------------------------*/
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
if (document.querySelector("#arrow-left")) {
    let arrowLeft = document.querySelector("#arrow-left");
    let arrowRight = document.querySelector("#arrow-right");
    arrowLeft.addEventListener('click', cambiaImg);
    arrowRight.addEventListener('click', cambiaImg);
}
let imagenActual = 0;
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
if (document.querySelector("#arrow-left-b5")) {
    let arrowLeftb5 = document.querySelector("#arrow-left-b5");
    let arrowRightb5 = document.querySelector("#arrow-right-b5");
    arrowLeftb5.addEventListener('click', peticion);
    arrowRightb5.addEventListener('click', peticion);
}
let comentarioActual = 0;
async function peticion(e) {
    let id = e.target.id;
    try {
        const respuesta = await fetch('http://127.0.0.1:8000/comentarios');
        if (respuesta.ok) {
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
