<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-300">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <form id="formcreatetour" action="{{Route('tours.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div  class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4" >
                    <div class="mb-4">
                        <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                        <input type="text" name="nombre" id="nombre"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none" placeholder="Nombre" required>
                    </div>
                    <div class="mb-4">
                        <label for="descripcion" class="block text-gray-700 text-sm font-bold mb-2">Descripción</label>
                        <textarea name="descripcion" id="descripcion"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none" placeholder="Descripcion" cols="30" rows="10" required></textarea>

                    </div>
                    <div class="mb-4">
                        <label for="planing" class="block text-gray-700 text-sm font-bold mb-2">Planing</label>
                        <textarea name="planing" id="planing" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none" placeholder="planing" cols="30" rows="10" required></textarea>

                    </div>
                    <div class="mb-4">
                        <label for="fechahora" class="block text-gray-700 text-sm font-bold mb-2">Fecha hora</label>
                        <input type="text" name="fechahora" id="fechahora" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none" pattern="^[0-9]{4}(-|/)(0[1-9]|1[0-2])(-|/)(0[1-9]|[1-2][0-9]|3[0-1]) (2[0-3]|[01][0-9]):[0-5][0-9]:[0-5][0-9]$" placeholder="YYYY-MM-DD 00:00:00" required>
                    </div>
                    <div class="mb-4">
                        <label for="plazas" class="block text-gray-700 text-sm font-bold mb-2">Plazas</label>
                        <input type="number" name="plazas" id="plazas"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none" min="0" required placeholder="Plazas" >
                    </div>
                    <div class="mb-4">
                        <label for="tipo" class="block text-gray-700 text-sm font-bold mb-2">Tipo</label>
                        <select name="tipo">
                            <option value="free">free</option>
                            <option value="gastronomico">gastronomico</option>
                            <option value="deportivo">deportivo</option>
                            <option value="cultural">cultural</option>
                          </select>
                    </div>
                    <div class="mb-4">
                        <label for="imagen" class="block text-gray-700 text-sm font-bold mb-2">Imagen</label>
                        <input type="file" name="imagen" id="imagen"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none @error('imagen') border-red-500 @enderror" required>
                        {{-- <input type="text" name="imagen" id="imagen"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none" placeholder="imagen" required> --}}
                    </div>
                    <div class="mb-4">
                        <label for="precio" class="block text-gray-700 text-sm font-bold mb-2">Precio</label>
                        <input type="text" name="precio" id="precio"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none" min="0" placeholder="precio" required >
                    </div>
                    <div class="mb-4">
                        <label for="duracion" class="block text-gray-700 text-sm font-bold mb-2">Duración</label>
                        <input type="number" name="duracion" id="duracion" min="0" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none" placeholder="duracion" required>
                    </div>
                    <div class="mb-4">
                        <label for="valoracion" class="block text-gray-700 text-sm font-bold mb-2">Valoración</label>
                        <input type="number" name="valoracion" id="valoracion" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none" min="0"  placeholder="valoracion" required>
                    </div>
                    <div class="mb-4">
                        <label for="latitud" class="block text-gray-700 text-sm font-bold mb-2">Latitud</label>
                        <input type="text" name="latitud" id="latitud" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none" pattern="^-?([0-8]?[0-9]|90)(\.[0-9]{1,10})?$" placeholder="latitud" required>
                    </div>
                    <div class="mb-4">
                        <label for="longitud" class="block text-gray-700 text-sm font-bold mb-2">Longitud</label>
                        <input type="text" name="longitud" id="longitud"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none" pattern="^-?([0-9]{1,2}|1[0-7][0-9]|180)(\.[0-9]{1,10})$" placeholder="longitud" required>
                    </div>
                    <div class="flex items-center justify-evenly w-full">
                        <button id="btnenviartour" type="submit" class="rounded-md  hover:bg-green-700 transition duration-300 bg-green-900  text-white font-bold py-2 px-4 my-3"
                       >Enviar</button>
                        <button class="rounded-md  hover:bg-blue-600 transition duration-300 bg-blue-700  text-white font-bold py-2 px-4 my-3"
                        >Cancelar</button>
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
let longitud = document.getElementById("longitud");
let latitud = document.getElementById("latitud");

btnenviar.addEventListener('click',validar);
fechahora.addEventListener('input',validarfechahora);
longitud.addEventListener('input', validarlongitud);
latitud.addEventListener('input', validarlongitud);

/* Hay que vaciar el valor de todos los elementos del formulario con setCustomValidity porque se queda guardado la cadena introducida anteriormente */
function limpiarCustomvaliditi() {
    for (const elemento of formulario.elements) {
        elemento.setCustomValidity("");
    }
}

function validarlongitud() {
    limpiarCustomvaliditi();
    //Si no contiene datos validos
    if(!longitud.checkValidity()){
        if(longitud.validity.patternMismatch){
            longitud.setCustomValidity("Debes introducir un formato correcto ej:36.776524 ");
        }
        //Para mandar el mensaje creado
        longitud.reportValidity();
        return false;
    }
    return true;
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
    if(validarfechahora() && validarlongitud()) {
    } else {
        e.preventDefault();
    }
}
</script>

