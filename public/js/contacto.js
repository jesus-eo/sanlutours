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


/******************FORMULARIO de la página contacto************************/
let btnenviar = document.getElementById("btnenviar");
let formulario = document.querySelector('.form');
let nombre = document.querySelector('#nombre');
let apellido = document.getElementById("apellido");
let email = document.getElementById("email");
btnenviar.addEventListener('click', validar);
nombre.addEventListener('input', validarNombre);
apellido.addEventListener('change', validarApellido);
email.addEventListener('blur', validar);

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
/*********Modal******* */
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