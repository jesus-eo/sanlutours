<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-300">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <form id="formcreatetour" action="{{Route('viajes.store')}}" method="post" >
                @csrf
                <div  class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4" >
                    <div class="mb-4">
                        <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre tour</label>
                        <input type="text" name="nombre" id="nombre"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none" placeholder="Nombre" required>
                    </div>

                    <div class="mb-4">
                        <label for="fechahora" class="block text-gray-700 text-sm font-bold mb-2">Fecha hora</label>
                        <input type="text" name="fechahora" id="fechahora" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none" pattern="^[0-9]{4}(-|/)(0[1-9]|1[0-2])(-|/)(0[1-9]|[1-2][0-9]|3[0-1]) (2[0-3]|[01][0-9]):[0-5][0-9]:[0-5][0-9]$" placeholder="YYYY-MM-DD 00:00:00" required>
                    </div>
                    <div class="mb-4">
                        <label for="plazas" class="block text-gray-700 text-sm font-bold mb-2">Plazas</label>
                        <input type="number" name="plazas" id="plazas"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none" min="0" required placeholder="Plazas" >
                    </div>

                    <div class="flex items-center justify-evenly w-full">
                        <button id="btnenviartour" type="submit" class="rounded-md  hover:bg-green-700 transition duration-300 bg-green-900  text-white font-bold py-2 px-4 my-3"
                       >Enviar</button>
                       <a class="rounded-md  hover:bg-blue-600 transition duration-300 bg-blue-700  text-white font-bold py-2 px-4 my-3" href="{{Route('crudviajes')}}">Cancelar</a>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
let btnenviar = document.getElementById("btnenviartour");
let formulario = document.getElementById('formcreatetour')
let fechahora = document.querySelector('#fechahora');


btnenviar.addEventListener('click',validar);
fechahora.addEventListener('input',validarfechahora);

/* Hay que vaciar el valor de todos los elementos del formulario con setCustomValidity porque se queda guardado la cadena introducida anteriormente */
function limpiarCustomvaliditi() {
    for (const elemento of formulario.elements) {
        elemento.setCustomValidity("");
    }
}

function validarfechahora() {
    limpiarCustomvaliditi();
    if(!fechahora.checkValidity()){
        if(fechahora.validity.valueMissing){
            fechahora.setCustomValidity("Debe cumplir el siguiente patrón yyyy-mm-dd hh:mm:ss");
            fechahora.reportValidity();
            return false;
        }
    }
    return true;
}

function validar(e) {
    limpiarCustomvaliditi();
    if(validarfechahora()) {
    } else {
        e.preventDefault();
    }
}
</script>

