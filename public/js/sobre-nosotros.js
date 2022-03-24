/* Fondo imagen para los distintos tipos de tour */
window.addEventListener('load', function() {

    let declaration = document.styleSheets[0].cssRules[6].style;
    let valor = document.querySelector("#valor-img-fondo").value;
    console.log(valor);
    if (valor == "freetour"){
        declaration.setProperty("background-image", "url('../Img/img Freetours/imagen caballos encabezado.jpg')");
        console.log(declaration);
    }else if(valor == "gastrotour"){
        declaration.setProperty("background-image", "url('../Img/Img gastronomia/pp-Vaso vino.jpg')");
    }else if(valor == "cultutour"){
        declaration.setProperty("background-image", "url('../Img/Img Cultural/palacio2.jpg')");
    }else if(valor == "deportour"){
        declaration.setProperty("background-image", "url('../Img/img Deportivo/imagen fondo deportiva.jpg')");
    }
});

/*Desplegable menu(Tours)*/
let btntours = document.querySelector(".tours");
btntours.addEventListener('click', function () {
    document.querySelector("#menu-desplegable").classList.toggle("desplegable-visible");
    document.querySelector("#menu-desplegable").classList.toggle("desplegable-oculto");
    document.querySelector("#botonLateral").classList.toggle("fa-angle-down");
    document.querySelector("#botonLateral").classList.toggle("fa-angle-right");
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





