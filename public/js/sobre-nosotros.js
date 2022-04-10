/* Fondo imagen para los distintos tipos de tour */
window.addEventListener('load', function () {

    let declaration = document.styleSheets[0].cssRules[6].style;
    let valor = document.querySelector("#valor-img-fondo").value;
    if (valor == "freetour") {
        declaration.setProperty("background-image", "url('../Img/img Freetours/imagen caballos encabezado.jpg')");
    } else if (valor == "gastrotour") {
        declaration.setProperty("background-image", "url('../Img/Img gastronomia/pp-Vaso vino.jpg')");
    } else if (valor == "cultutour") {
        declaration.setProperty("background-image", "url('../Img/Img Cultural/palacio2.jpg')");
    } else if (valor == "deportour") {
        declaration.setProperty("background-image", "url('../Img/img Deportivo/imagen fondo deportiva.jpg')");
    } else if (valor == "guias") {
        declaration.setProperty("background-image", "url('../Img/Guias.jpg')");
        let subGuia = document.querySelector("#subrallado-guia");
        let subTour = document.querySelector("#subrallado-tour");
        subGuia.classList.toggle('subrallado');
        subGuia.classList.toggle('subrallado-actual');
        subTour.classList.toggle('subrallado-actual');
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


        /*  console.log(e.value + id); */


    }

