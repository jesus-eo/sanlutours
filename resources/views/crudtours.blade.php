<x-app-layout>
   {{--  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tours') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">



                    <div class="p-4 flex">
                        <h1 class="text-3xl">
                            Tours
                        </h1>
                    </div>
                    <div class="px-3 py-4 flex justify-center">
                        <table class="w-full text-md bg-white shadow-md rounded mb-4">
                            <tbody>
                                <tr class="border-b">
                                    <th class="text-left p-3 px-5">Nombre</th>
                                    <th class="text-left p-3 px-5">Descripcion</th>
                                    <th class="text-left p-3 px-5">Planing</th>
                                    <th class="text-left p-3 px-5">Fecha Hora</th>
                                    <th class="text-left p-3 px-5">Plazas</th>
                                    <th class="text-left p-3 px-5">Tipo</th>
                                    <th class="text-left p-3 px-5">Imagen</th>
                                    <th class="text-left p-3 px-5">Duración</th>
                                    <th class="text-left p-3 px-5">Precio</th>
                                    <th class="text-left p-3 px-5">Valoración</th>
                                    <th class="text-left p-3 px-5">Latitud</th>
                                    <th class="text-left p-3 px-5">Longitud</th>
                                    <th class="text-left p-3 px-5">Acción</th>
                                </tr>
                                @foreach ($tours as $tour)


                                <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                    <td class="p-3 px-5">{{$tour->nombre}}</td>
                                    <td class="p-3 px-5">{{$tour->descripcion}}</td>
                                    <td class="p-3 px-5">{{$tour->planing}}</td>
                                    <td class="p-3 px-5">{{$tour->fechahora}}</td>
                                    <td class="p-3 px-5 flex justify-end">
                                        <button type="button"
                                            class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save
                                        </button>
                                        <button
                                            type="button"
                                            class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                <div class="flex items-center mt-3"> {{ $tours->links() }} </div>
                            </tbody>

                        </table>

                    </div>



        </div>
    </div> --}}

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
        <div class="mt-3" x-data="{open: false}">
            {{-- Realiza la función Freetous.php --}}
            <button @click="open=true"  class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 my-3">Nuevo</button>
            {{-- Abre ventana modal añadiendo el componente crear --}}
            <div x-show='open'>@include('components.formcreate')</div>
            {{-- @if ()
            <p>hola</p>
                @include('livewire.crear')
            @endif --}}
            <table class="table-auto w-full">
                <thead>
                <tr>
                    <th class="px-4 py-2">
                        <div class="flex items-center">
                            Nombre
                        </div>
                    </th>

                    <th class="px-4 py-2">
                        <div class="flex items-center">
                            Fecha Hora
                        </div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">
                            Plazas
                        </div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">
                            Tipo
                        </div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">
                            Imagen
                        </div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">
                            Precio
                        </div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">
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
                        <div class="flex items-center">
                            Duración
                        </div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">
                            Descripción
                        </div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">
                            Planing
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <td class="rounded border px-4 py-2">{{$tour->duracion}} </td>
                <td class="rounded border px-4 py-2">{{$tour->descripcion}} </td>
                <td class="rounded border px-4 py-2">{{$tour->planing}} </td>
                <td class="rounded border px-4 py-2 text-center">
                    <button wire:click="editar({{$tour->id}})" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Editar</button>
                    <button wire:click="borrar({{$tour->id}})" {{-- onclick='return confirm("Seguro deseas borrarlo")' --}}  class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4">Borrar</button>
                </td>
            </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{$tours->links()}}
        </div>
    </div>
</x-app-layout>
