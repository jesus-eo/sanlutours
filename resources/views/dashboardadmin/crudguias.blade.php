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
            <div>Guías</div>
        </div>
        <div class="mt-3" x-data="{ formcreate: false, formedit: false }">
            <button @click="formcreate=true"
                class="rounded-md  hover:bg-green-700 transition duration-300 bg-green-900  text-white font-bold py-2 px-4 my-3">Crear
                Guia</button>
            {{-- Abre ventana modal añadiendo el componente crear --}}
            <div x-show='formcreate'>@include('components.formcreateguia')</div>

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
                            <td class="rounded border px-4 py-2">{{ $guia->nombre }} </td>
                            <td class="rounded border px-4 py-2">{{ $guia->descripcion }} </td>
                            <td class="rounded border px-4 py-2">{{ $guia->valoracion }} </td>
                            <td class="rounded border px-4 py-2">{{ $guia->imagen }} </td>
                            <td class="rounded border px-4 py-2">{{ $guia->tipo }} </td>
                    @endforeach

                    <div x-show='formedit'>@include('components.formeditguia', [$guia])</div>
                    <td class="rounded border px-4 py-2 text-center">
                        <button @click="formedit=true"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-4 rounded mb-6">Editar</button>
                        <form action="{{ Route('guias.destroy', [$guia]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="px-4 py-1 font-bold hover:bg-red-600 text-white bg-red-400 rounded"
                                onclick='return confirm("Seguro deseas borrarlo")' type="submit">Borrar</button>
                        </form>

                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $guias->links() }}
        </div>
    </div>
</x-app-layout>
