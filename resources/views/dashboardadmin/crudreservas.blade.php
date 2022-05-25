<x-app-layout>
    <div class="p-1 h-full md:px-10  border-b border-gray-200">
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
            <div>Reservas</div>

        </div>
        <p class="py-1 font-bold">Ver <a class="text-blue-600" href="/reservas"
                title="Ver reservas Administrador">reservas</a> administrador</p>
        <div class="mt-3" x-data="{ formcreate: false, formedit: false }">
            <button x-on:click="formcreate=true"
                class="rounded-md  hover:bg-green-700 transition duration-300 bg-green-900  text-white font-bold py-2 px-4 my-3">Crear
                Reserva</button>
            {{-- Abre ventana modal añadiendo el componente crear --}}
            <div class="h-3/4" x-cloak x-show='formcreate'>@include('components.formcreatereserva')</div>
            <div class="overflow-x-auto">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">
                                <div class="flex items-center justify-center">
                                    Nombre usuario
                                </div>
                            </th>

                            <th class="px-4 py-2">
                                <div class="flex items-center justify-center">
                                    Nombre tour
                                </div>
                            </th>
                            <th class="px-4 py-2">
                                <div class="flex items-center justify-center">
                                    Número de personas
                                </div>
                            </th>
                            <th class="px-4 py-2">
                                <div class="flex items-center justify-center">
                                    Fecha hora
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
                        @foreach ($reservas as $reserva)
                            <tr>
                                <td class="rounded border-2 px-4 py-2">{{ $reserva->user->name }} </td>
                                <td class="rounded border-2 px-4 py-2">{{ $reserva->tour->nombre }} </td>
                                <td class="rounded border-2 px-4 py-2">{{ $reserva->numpersonas }} </td>
                                <td class="rounded border-2 px-4 py-2">
                                    {{ (new Datetime($reserva->fechahora))->format('d/m/Y H:i:s') }} </td>


                                <div x-cloak x-show='formedit'>@include('components.formeditreserva', [$reserva])</div>
                                <td class="rounded border-2 px-4 py-2 text-center">
                                    <button x-on:click="formedit=true"
                                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-4 rounded mb-6">Editar</button>
                                    <form action="{{ Route('reservas.destroy', [$reserva]) }}" method="post">
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
        </div>
        <div class="mt-6">
            {{ $reservas->links() }}
        </div>
    </div>
</x-app-layout>
