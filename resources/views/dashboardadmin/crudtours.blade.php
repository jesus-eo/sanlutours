<x-app-layout>
    <div class="p-1 h-full md:px-10  border-b border-gray-300">
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
        <div class="h-3/4" x-data="{ formcreate: false, formedit: false }">
            <button x-on:click="formcreate=true"
                class="rounded-md  hover:bg-green-700 transition duration-300 bg-green-900  text-white font-bold py-2 px-4 my-3">Crear
                Tour</button>
            {{-- Abre ventana modal añadiendo el componente crear --}}

            <div x-cloak x-show='formcreate'>@include('components.formcreate')</div>
            <div class="overflow-x-auto">
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
                            <th class="px-4 py-2">
                                <div class="flex items-center justify-center">
                                    Longitud
                                </div>
                            </th>
                            <th class="px-4 py-2">
                                <div class="flex items-center justify-center">
                                    Latitud
                                </div>
                            </th>
                            <th class="px-4 py-2">
                                <div class="flex items-center justify-center">
                                    Duración
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tours as $tour)
                            <tr>
                                <td class="rounded border-2 px-4 py-2">{{ $tour->nombre }} </td>
                                <td class="rounded border-2 px-4 py-2">{{ $tour->tipo }} </td>
                                <td class="rounded border-2 px-4 py-2">{{ $tour->imagen }} </td>
                                <td class="rounded border-2 px-4 py-2">{{ $tour->precio }} </td>
                                <td class="rounded border-2 px-4 py-2">{{ $tour->valoracion }} </td>
                                <td class="rounded border-2 px-4 py-2">{{ $tour->longitud }} </td>
                                <td class="rounded border-2 px-4 py-2">{{ $tour->latitud }} </td>
                                <td class="rounded border-2 px-4 py-2">{{ $tour->duracion }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <thead>
                        <tr>
                            <th class="px-4 py-2" colspan="3">
                                <div class="flex items-center justify-center">
                                    Descripción
                                </div>
                            </th>
                            <th class="px-4 py-2" colspan="4">
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
                        <div x-cloak x-show='formedit'>@include('components.formedit', [$tour])</div>
                        <td class="rounded border-2 px-4 py-2" colspan="3">{{ $tour->descripcion }} </td>
                        <td class="rounded border-2 px-4 py-2" colspan="4">{{ $tour->planing }} </td>
                        <td class="rounded border-2 px-4 py-2 text-center">
                            <button x-on:click="formedit=true"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-4 rounded mb-6">Editar</button>
                            <form action="{{ Route('tours.destroy', [$tour]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="px-4 py-1 font-bold hover:bg-red-600 text-white bg-red-400 rounded"
                                    onclick='return confirm("Seguro deseas borrarlo")' type="submit">Borrar</button>
                            </form>

                        </td>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-6">
            {{ $tours->links() }}
        </div>
    </div>
</x-app-layout>
