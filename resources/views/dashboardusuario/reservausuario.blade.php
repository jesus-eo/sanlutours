<x-app-layout>
    <div class="p-2 h-full sm:px-20 bg-white border-b border-gray-200">
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
            <div>Reservas</div>
        </div>
        @if (!$reservas->isEmpty())
            <div class="mt-3" x-data="{ formcomentar: false }">
                {{-- Realiza la función Freetous.php --}}
                <button x-on:click="formcomentar=true"
                    class="rounded-md  hover:bg-green-700 transition duration-300 bg-green-900  text-white font-bold py-2 px-4 my-3">Comentar
                    experiencia</button>
                {{-- Abre ventana modal añadiendo el componente crear --}}
                <div x-show='formcomentar'>@include('components.formcomentario')</div>
            </div>
        @endif
        <div class="mt-3">
            @if ($reservas->isEmpty())
                <h1>No tienes reservas disponibles.</h1>
                <p class="py-1 font-bold">Si deseas realizar una reserva visite nuestros <a class="text-blue-600"
                        href="/freetours">tours</a></p>
            @else
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
                                <td class="rounded border px-4 py-2">{{ $reserva->user->name }} </td>
                                <td class="rounded border px-4 py-2">{{ $reserva->tour->nombre }} </td>
                                <td class="rounded border px-4 py-2">{{ $reserva->tour->tipo }} </td>
                                <td class="rounded border px-4 py-2">{{ $reserva->numpersonas }} </td>
                                <td class="rounded border px-4 py-2">
                                    {{ (new Datetime($reserva->fechahora))->format('d/m/Y H:i:s') }}</td>
                                <td class="rounded border px-4 py-2 text-center">
                                    <form action="{{ Route('reservasusuario.destroy', [$reserva]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="px-4 py-1 font-bold hover:bg-red-600 text-white bg-red-400 rounded"
                                            onclick='return confirm("Seguro que deseas anular su reserva")'
                                            type="submit">Anular</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>

                </table>
                <p class="py-1 font-bold">Si deseas anular una reserva o modificarla pongase en <a
                        class="text-blue-600" href="/contacto" title="Enlace a página contacto">contacto</a> con
                    nosotros para abonarle la reserva, le atenderemos gustosamente, Gracias.</p>
            @endif

        </div>
    </div>
</x-app-layout>
