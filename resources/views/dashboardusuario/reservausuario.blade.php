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
            <div>Reservas</div>
        </div>
        <div class="mt-3">
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
                                Nombre Tour
                            </div>
                        </th>
                        <th class="px-4 py-2">
                            <div class="flex items-center justify-center">
                                Tipo
                            </div>
                        </th>
                        <th class="px-4 py-2">
                            <div class="flex items-center justify-center">
                                Número de plazas reservadas
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
                            <td class="rounded border px-4 py-2">{{ $reserva->user->name}} </td>
                            <td class="rounded border px-4 py-2">{{ $reserva->tour->nombre}} </td>
                            <td class="rounded border px-4 py-2">{{ $reserva->tour->tipo}} </td>
                            <td class="rounded border px-4 py-2">{{ $reserva->numpersonas }} </td>
                            <td class="rounded border px-4 py-2">{{(new Datetime($reserva->fechahora))->format('d/m/Y H:i:s')}}</td>
                            <td class="rounded border px-4 py-2 text-center">
                                <form action="{{ Route('reservasusuario.destroy', [$reserva]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-4 py-1 font-bold hover:bg-red-600 text-white bg-red-400 rounded"
                                        onclick='return confirm("Seguro que deseas anular su reserva")' type="submit">Anular</button>
                                </form>
                            </td>
                            </tr>
                    @endforeach


                </tbody>

            </table>
            <p class="px-4 py-1 font-bold">Si deseas anular una reserva pongase en <a class="text-blue-600" href="/contacto">contacto</a> con nosotros para abonarle la reserva, Gracias.</p>
        </div>
    </div>
</x-app-layout>
