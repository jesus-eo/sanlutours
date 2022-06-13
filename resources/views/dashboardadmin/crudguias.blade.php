<x-app-layout>
    <div class="p-1 h-full md:px-10  border-b border-gray-300">
        <div>
            @if (session('success'))
            <div class="py-3 px-5 mb-4 bg-green-400 text-black text-sm rounded-md border border-green-200 flex items-center" role="alert">
                <div class="w-4 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                    </svg>
                </div>
                <span>{{ session('success') }}</span>
            </div>

            @endif
            @if (session('fault'))
            <div class="py-3 px-5 mb-4 bg-red-500 text-black text-sm rounded-md border border-red-200 flex items-center" role="alert">
                <div class="w-4 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01" />
                    </svg>
                </div>
                <span> {{ session('fault') }}</span>
            </div>
            @endif
        </div>
        <div class="mt-4 text-2xl">
            <div>Guías</div>
        </div>
        <div class="h-3/4" x-data="{ formcreate: false, formedit: false }">
            <div class="flex justify-between">
                <button x-on:click="formcreate=true"
                    class="rounded-md  hover:bg-green-700 transition duration-300 bg-green-900  text-white font-bold py-2 px-4 my-3">Crear
                    Guia</button>
                {{-- Busqueda --}}
                <form class="pt-2 relative ml-4 mr-4 text-gray-600" action="{{ route('crudguias') }}" method="GET">
                    <div class="flex mr-8">
                        <p class="mr-4">Buscar por nombre o tipo:</p>
                        <input class="border-2  bg-white h-10 px-5 pr-16 rounded-lg  focus:outline-none" type="search"
                            name="busqueda" placeholder="Search">
                        <button class="ml-4 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-6"
                            type="submit">Buscar</button>
                    </div>

                </form>
            </div>

            @php
                if ($busqueda->total() != 0) {
                    $guias = $busqueda;
                }
            @endphp
            {{-- Abre ventana modal añadiendo el componente crear --}}
            <div x-cloak x-show='formcreate'>@include('components.formcreateguia')</div>
            <div class="overflow-x-auto h-3/4">
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
                                    Descripción
                                </div>
                            </th>
                            <th class="px-4 py-2">
                                <div class="flex items-center justify-center">
                                    Valoración
                                </div>
                            </th>
                            <th class="px-4 py-2">
                                <div class="flex items-center justify-center">
                                    Imagen
                                </div>
                            </th>
                            <th class="px-4 py-2">
                                <div class="flex items-center justify-center">
                                    Tipo tour
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
                        @foreach ($guias as $guia)
                            <tr>
                                <td class="rounded border-2 px-4 py-2">{{ $guia->nombre }} </td>
                                <td class="rounded border-2 px-4 py-2">{{ $guia->descripcion }} </td>
                                <td class="rounded border-2 px-4 py-2">{{ $guia->valoracion }} </td>
                                <td class="rounded border-2 px-4 py-2">{{ $guia->imagen }} </td>
                                <td class="rounded border-2 px-4 py-2">{{ $guia->tipo }} </td>

                                <td class="rounded border-2 px-4 py-2 text-center">
                                    <button x-on:click="formedit=true"
                                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-4 rounded mb-6">Editar</button>
                                    <form action="{{ Route('guias.destroy', [$guia]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="px-4 py-1 font-bold hover:bg-red-600 text-white bg-red-400 rounded"
                                            onclick='return confirm("Seguro deseas borrarlo")'
                                            type="submit">Borrar</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div x-cloak x-show='formedit'>@include('components.formeditguia', [$guia])</div>
        </div>
        <div class="mt-6">
            {{ $guias->appends(['busqueda' => request()->query('busqueda')]) }}
        </div>
    </div>
</x-app-layout>
