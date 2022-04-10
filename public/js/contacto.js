/*Desplegable menu(Tours)*/
let btntours = document.querySelector(".tours");
btntours.addEventListener('click', function () {
    document.querySelector("#menu-desplegable").classList.toggle("desplegable-visible");
    document.querySelector("#menu-desplegable").classList.toggle("desplegable-oculto");
    document.querySelector("#botonLateral").classList.toggle("fa-angle-down");
    document.querySelector("#botonLateral").classList.toggle("fa-angle-right");
});
/*Desplegable menuhamburguesa(Tours)*/
let btnsubmenu = document.querySelector("#submenu");
btnsubmenu.addEventListener('click', function (){
        document.querySelector("#menu-desplegable-burguer").classList.toggle("desplegable-visible-burguer");
        document.querySelector("#menu-desplegable-burguer").classList.toggle("desplegable-oculto-burguer");
        document.querySelector("#boton-lateral").classList.toggle("fa-angle-down");
        document.querySelector("#boton-lateral").classList.toggle("fa-angle-right");

});
/*Header aparece cuando scrolleamos hacia arriba
ubicacionPrincipal vale 0 al inicio*/

let ubicacionPrincipal = window.scrollY;
window.onscroll = function () {
    let desplazamientoActual = window.scrollY;
    if(desplazamientoActual >= 100){
        if (ubicacionPrincipal >= desplazamientoActual) {
            document.querySelector('.encabezado-b1-principal').style.top = '0';
            document.querySelector('.encabezado-b1-principal').style.backgroundColor = '#C7CEC9';
            document.querySelector('.desplegable-oculto').style.backgroundColor = '#C7CEC9';
        } else {
            document.querySelector('.encabezado-b1-principal').style.top = '-100px';
        }
        ubicacionPrincipal = desplazamientoActual;
    }else {
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
btnenviar.addEventListener('click',validar);
nombre.addEventListener('input',validarNombre);
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
    if(!email.checkValidity()){
        console.log("Entra en valida email");
        if(email.validity.patternMismatch){
            email.setCustomValidity("Debes introducir un email valido");
        }
        //Si el campo email es vacio devuelve true
        if(email.validity.valueMissing){
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
    if(!nombre.checkValidity()){
        if(nombre.validity.valueMissing){
            console.log("Entra en valida nombre");
            nombre.setCustomValidity("Debes rellenar el campo nombre");
            nombre.reportValidity();
            return false;
        }
    }
    return true;
}
function validarApellido() {
    limpiarCustomvaliditi();
    if(!apellido.checkValidity()){
        if(apellido.validity.valueMissing){
            console.log("Entra en valida apellido");
            apellido.setCustomValidity("Debes rellenar el campo apellido");
            apellido.reportValidity();
            return false;
        }
    }
    return true;
}

function validar(e) {
    limpiarCustomvaliditi();
    if(validarNombre() &&  validarApellido() && validarEmail()) {
        console.log("Entra en validar todo true");
        document.getElementById('textarea').disabled = false;
    } else {
        console.log("Entra en prevent");
        e.preventDefault();
    }
}

