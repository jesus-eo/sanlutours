<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-300">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <form id="formedittour" action="{{Route('tours.update',[$tour])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4" >
                    <div class="mb-4">
                        <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $tour->nombre) }}"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none" placeholder="Nombre" required>
                    </div>
                    <div class="mb-4">
                        <label for="descripcion" class="block text-gray-700 text-sm font-bold mb-2">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none" placeholder="descripcion" cols="30" required rows="10">{{ old('descripcion', $tour->descripcion) }}</textarea>

                    </div>
                    <div class="mb-4">
                        <label for="planing" class="block text-gray-700 text-sm font-bold mb-2">Planing</label>
                        <textarea name="planing" id="planing"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none" placeholder="planing" required cols="30" rows="10">{{ old('planing', $tour->planing) }}</textarea>

                    </div>

                    <div class="mb-4">
                        <label for="tipo" class="block text-gray-700 text-sm font-bold mb-2">Tipo</label>
                        <select name="tipo">
                            <option value="free">free</option>
                            <option value="gastronómico">gastronomico</option>
                            <option value="deportivo">deportivo</option>
                            <option value="cultural">cultural</option>
                          </select>
                    </div>
                    <div class="mb-4">
                        <label for="imagen" class="block text-gray-700 text-sm font-bold mb-2">Imagen</label>
                        <input type="file" name="imagen" id="imagen"

                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none @error('imagen') border-red-500 @enderror"
                        placeholder="imagen">

                    </div>
                    <div class="mb-4">
                        <label for="precio" class="block text-gray-700 text-sm font-bold mb-2">Precio</label>
                        <input title="Inserta un número máximo dos decimales(00.00)" type="text" name="precio" id="precio" pattern="^\d{1,2}(\.\d{1,2})?$" value="{{ old('precio', $tour->precio) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none" min="0"  placeholder="precio" required>
                    </div>
                    <div class="mb-4">
                        <label for="duracion" class="block text-gray-700 text-sm font-bold mb-2">Duración</label>
                        <input type="number" name="duracion" id="duracion" value="{{ old('duracion', $tour->duracion) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none" placeholder="duracion" min="0" required >
                    </div>
                    <div class="mb-4">
                        <label for="valoracion" class="block text-gray-700 text-sm font-bold mb-2">Valoración</label>
                        <input type="number" name="valoracion" id="valoracion" value="{{ old('valoracion', $tour->valoracion) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none" min="0"  placeholder="valoracion"  required>
                    </div>
                    <div class="mb-4">
                        <label for="latitud"  class="block text-gray-700 text-sm font-bold mb-2">Latitud</label>
                        <input type="text" name="latitud" id="latitud" value="{{ old('latitud', $tour->latitud) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none" title="Debes insertar un valor de longitud valido (-6.354207404186242)" pattern="([-+]?(([1-8]?\d(\.\d+))+|90))" placeholder="latitud" required>
                    </div>
                    <div class="mb-4">
                        <label for="longitud" class="block text-gray-700 text-sm font-bold mb-2">Longitud</label>
                        <input type="text" title="Debes insertar un valor de longitud valido (-6.354207404186242)" name="longitud" id="longitud" value="{{ old('longitud', $tour->longitud) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none" placeholder="longitud" pattern="[-+]?(180(\.0+)?|((1[0-7]\d)|([1-9]?\d))(\.\d+)?)" required>
                    </div>
                    <div class="flex items-center justify-evenly w-full">
                        <button type="submit" id="btneditartour" class="rounded-md  hover:bg-green-700 transition duration-300 bg-green-900  text-white font-bold py-2 px-4 my-3"
                       >Actualizar</button>
                       <a href="/tours"
                       class="rounded-md  hover:bg-blue-600 transition duration-300 bg-blue-700  text-white font-bold py-2 px-4 my-3">Volver</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

