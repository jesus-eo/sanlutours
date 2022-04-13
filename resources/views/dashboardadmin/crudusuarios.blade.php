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
            <div>Usuarios</div>
        </div>
        <div class="mt-3" x-data="{formedit: false}">

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
                        <td class="rounded border px-4 py-2">{{$usuario->name}} </td>
                        <td class="rounded border px-4 py-2">{{$usuario->email}} </td>
                        <td class="rounded border px-4 ">
                        <button @click="formedit=true" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-4 rounded mb-6">Editar</button>
                        <form action="{{Route('usuario.destroy',[$usuario])}}" method="post">
                            @csrf
                            @method('DELETE')
                        <button  class="px-4 py-1 font-bold hover:bg-red-600 text-white bg-red-400 rounded" onclick='return confirm("Seguro deseas borrarlo")' type="submit">Borrar</button>
                        </form>
                    </td>
                    </tr>
                    <div x-show='formedit'>@include('components.formeditusuario', [$usuario])</div>
                @endforeach
            </tbody>
        </div>
    </div>
</x-app-layout>
