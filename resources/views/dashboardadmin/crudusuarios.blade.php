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
            <div>Usuarios</div>
        </div>
          {{-- Busqueda --}}
          <form class="pt-2 relative ml-4 mr-4 text-gray-600" action="{{ route('crudusuarios') }}" method="GET">
            <div class="flex mr-8">
                <p class="mr-4">Buscar por nombre:</p>
                <input class="border-2  bg-white h-10 px-5 pr-16 rounded-lg  focus:outline-none"
                    type="search" name="busqueda" placeholder="Search">
                <button class="ml-4 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-6" type="submit">Buscar</button>
            </div>

        </form>

        @php
        if ($busqueda->total() != 0) {
            $usuarios = $busqueda;
        }
    @endphp
        <div class="h-3/4" x-data="{ formedit: false }">
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
                                    Email
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
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td class="rounded border-2 px-4 py-2">{{ $usuario->name }} </td>
                                <td class="rounded border-2 px-4 py-2">{{ $usuario->email }} </td>
                                <td class="rounded border-2 px-4 ">
                                    <button x-on:click="formedit=true"
                                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-4 rounded mb-6">Editar</button>
                                    <form action="{{ Route('usuario.destroy', [$usuario]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="px-4 py-1 font-bold hover:bg-red-600 text-white bg-red-400 rounded"
                                            onclick='return confirm("Seguro deseas borrarlo")'
                                            type="submit">Borrar</button>
                                    </form>
                                </td>
                            </tr>
                            <div x-cloak x-show='formedit'>@include('components.formeditusuario', [$usuario])</div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-6">
            {{ $usuarios->appends(['busqueda' => request()->query('busqueda')]) }}
        </div>
    </div>
</x-app-layout>
