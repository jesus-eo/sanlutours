<x-app-layout>
    <div class="p-2 sm:px-20 bg-white border-b border-gray-200">
        <div>
            @if (session('success'))
               <div class="alert alert-success bg-green-400">
                 {{ session('success') }}
               </div>
                   @endif
               @if (session('fault'))
               <div class="alert alert-success bg-red-500">
                 {{ session('fault') }}
               </div>
               @endif
           </div>
        <div class="mt-4 text-2xl">
            <div>Tours</div>
        </div>
        <div class="mt-3" x-data="{formcreate: false, formedit: false}">
            {{-- Realiza la función Freetous.php --}}
            <button @click="formcreate=true"  class= "rounded-md  hover:bg-green-700 transition duration-300 bg-green-900  text-white font-bold py-2 px-4 my-3">Crear Tour</button>
            {{-- Abre ventana modal añadiendo el componente crear --}}
            <div x-show='formcreate'>@include('components.formcreate')</div>

            <table class="table-auto w-full">
                <thead>
                <tr>
                    <th class="px-4 py-2">
                        <div class="flex items-center justify-center">
                            Nombre
                        </div>
                    </th>

                    <th class="px-4 py-2">
                        <div class="flex items-center justify-center">
                            Fecha Hora
                        </div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center justify-center">
                            Plazas
                        </div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center justify-center">
                            Tipo
                        </div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center justify-center">
                            Imagen
                        </div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center justify-center">
                            Precio
                        </div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center justify-center">
                            Valoración
                        </div>
                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($tours as $tour)
                    <tr>
                        <td class="rounded border px-4 py-2">{{$tour->nombre}} </td>
                        <td class="rounded border px-4 py-2">{{$tour->fechahora}} </td>
                        <td class="rounded border px-4 py-2">{{$tour->plazas}} </td>
                        <td class="rounded border px-4 py-2">{{$tour->tipo}} </td>
                        <td class="rounded border px-4 py-2">{{$tour->imagen}} </td>
                        <td class="rounded border px-4 py-2">{{$tour->precio}} </td>
                        <td class="rounded border px-4 py-2">{{$tour->valoracion}} </td>
                    </tr>
                @endforeach
            </tbody>
            <thead>
                <tr>
                    <th class="px-4 py-2">
                        <div class="flex items-center justify-center">
                            Duración
                        </div>
                    </th>
                    <th class="px-4 py-2" colspan="2">
                        <div class="flex items-center justify-center">
                            Descripción
                        </div>
                    </th>
                    <th class="px-4 py-2" colspan="2">
                        <div class="flex items-center justify-center">
                            Planing
                        </div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center justify-center">
                            Acción
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <div x-show='formedit'>@include('components.formedit',[$tour])</div>
                <td class="rounded border px-4 py-2">{{$tour->duracion}} </td>
                <td class="rounded border px-4 py-2" colspan="2">{{$tour->descripcion}} </td>
                <td class="rounded border px-4 py-2" colspan="2">{{$tour->planing}} </td>

                <td class="rounded border px-4 py-2 text-center">

                   {{--  <a href="{{Route('tours.edit',[$tour])}}"
                    class="px-4 py-1 text-sm text-white bg-blue-400 hover:bg-blue-600  rounded font-bold">Editar</a> --}}

                    <button @click="formedit=true" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-4 rounded mb-6">Editar</button>
                    <form action="{{Route('tours.destroy',[$tour])}}" method="post">
                        @csrf
                        @method('DELETE')
                    <button  class="px-4 py-1 font-bold hover:bg-red-600 text-white bg-red-400 rounded" onclick='return confirm("Seguro deseas borrarlo")' type="submit">Borrar</button>
                    </form>

                </td>
            </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{$tours->links()}}
        </div>
    </div>
</x-app-layout>
