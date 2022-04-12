<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-300">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <form action="{{Route('reservas.store')}}" method="post">
                @csrf
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4" >
                    <div class="mb-4">
                        <label for="user_id" class="block text-gray-700 text-sm font-bold mb-2">Id Usuario</label>
                        <input type="number" name="user_id" id="user_id"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none" placeholder="user_id">
                    </div>
                    <div class="mb-4">
                        <label for="tour_id" class="block text-gray-700 text-sm font-bold mb-2">Id Tour</label>
                        <input type="number" name="tour_id" id="tour_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none" min="0"  placeholder="tour_id" >

                    </div>
                    <div class="mb-4">
                        <label for="numpersonas" class="block text-gray-700 text-sm font-bold mb-2">Número personas</label>
                        <input type="number" name="numpersonas" id="numpersonas" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none" min="0"  placeholder="numpersonas" >
                    </div>
                    <div class="mb-4">
                        <label for="fechahora" class="block text-gray-700 text-sm font-bold mb-2">Fecha-Hora</label>
                        <input type="text" name="fechahora" id="fechahora" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none" min="0"  placeholder="fechahora" >
                    </div>

                    <div class="flex items-center justify-evenly w-full">
                        <button type="submit" class="rounded-md  hover:bg-green-700 transition duration-300 bg-green-900  text-white font-bold py-2 px-4 my-3"
                       >Enviar</button>
                        <button class="rounded-md  hover:bg-blue-600 transition duration-300 bg-blue-700  text-white font-bold py-2 px-4 my-3"
                        >Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

