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
            <div>Guías</div>
        </div>
        <div class="h-3/4" x-data="{ formcreate: false, formedit: false }">
            <button x-on:click="formcreate=true"
                class="rounded-md  hover:bg-green-700 transition duration-300 bg-green-900  text-white font-bold py-2 px-4 my-3">Crear
                Guia</button>
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
                                <button class="px-4 py-1 font-bold hover:bg-red-600 text-white bg-red-400 rounded"
                                    onclick='return confirm("Seguro deseas borrarlo")' type="submit">Borrar</button>
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
            {{ $guias->links() }}
        </div>
    </div>
</x-app-layout>
