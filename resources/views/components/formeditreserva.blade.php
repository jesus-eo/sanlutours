<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-300">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <form id="formreserva" action="{{Route('reservas.update',[$reserva])}}" method="post">
                @csrf
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4" >
                    <div class="mb-4">
                        <label for="user_id" class="block text-gray-700 text-sm font-bold mb-2">Id Usuario</label>
                        <input type="number" name="user_id" id="user_id" value="{{ old('user_id', $reserva->user_id) }}"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none" placeholder="user_id" required>
                    </div>
                    <div class="mb-4">
                        <label for="tour_id" class="block text-gray-700 text-sm font-bold mb-2">Id Tour</label>
                        <input type="number" name="tour_id" id="tour_id" value="{{ old('tour_id', $reserva->tour_id) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none" min="0"  placeholder="tour_id" required>

                    </div>
                    <div class="mb-4">
                        <label for="numpersonas" class="block text-gray-700 text-sm font-bold mb-2">Número personas</label>
                        <input type="number" name="numpersonas" id="numpersonas" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none" min="0" value="{{ old('numpersonas', $reserva->numpersonas) }}" placeholder="numpersonas" required>
                    </div>
                    <div class="mb-4">
                        <label for="fechahora" class="block text-gray-700 text-sm font-bold mb-2">Fecha-Hora</label>
                        <input type="text" name="fechahora" id="fechahora" value="{{ old('fechahora', $reserva->fechahora) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none" min="0"  placeholder="fechahora" pattern="^[0-9]{4}(-|/)(0[1-9]|1[0-2])(-|/)(0[1-9]|[1-2][0-9]|3[0-1]) (2[0-3]|[01][0-9]):[0-5][0-9]:[0-5][0-9]$" required>
                    </div>

                    <div class="flex items-center justify-evenly w-full">
                        <button id="btnenviareserva" type="button" class="rounded-md  hover:bg-green-700 transition duration-300 bg-green-900  text-white font-bold py-2 px-4 my-3"
                       >Enviar</button>
                       <a  href="{{Route('crudreservas')}}"
                       class="rounded-md  hover:bg-blue-600 transition duration-300 bg-blue-700  text-white font-bold py-2 px-4 my-3">Volver</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- <script>
    let btnenviareserva = document.getElementById("btnenviareserva");
    let formulario1 = document.getElementById('formreserva')
    let fecha1 = document.querySelector('#fechahora');

    btnenviareserva.addEventListener('click',validar);
    fecha1.addEventListener('input',validarfecha);
    /* Hay que vaciar el valor de todos los elementos del formulario1 con setCustomValidity porque se queda guardado la cadena introducida anteriormente */
    function limpiarCustomvaliditi() {
        for (const elemento of formulario1.elements) {
            elemento.setCustomValidity("");
        }
    }

    function validarfecha() {
        limpiarCustomvaliditi();
        //Si no contiene datos validos
        if(!fecha1.checkValidity()){
            if(fecha1.validity.patternMismatch){
                fecha1.setCustomValidity("Debes introducir un formato correcto YYYY/MM/DD HH:MM:SS ");
            }
            //Para mandar el mensaje creado
            fecha1.reportValidity();
            return false;
        }
        return true;
    }

    function validar(e) {
        limpiarCustomvaliditi();
        if(validarfecha()) {
        } else {
            e.preventDefault();
        }
    }
    </script>
 --}}
