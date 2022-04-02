<x-clasetour>

    <input id="valor-img-fondo" type="text" value="deportour" hidden>
    <x-slot name="title">
        Tours Deportivos
    </x-slot>
    <x-slot name="main">
        <p class="p1-main-freetour">Explora los...</p>
        <p class="p2-main-freetour">Rincones Sanluqueños</p>
    </x-slot>

    <!-- Remove py-8 -->
    <div>
        <div class="flex flex-wrap  justify-around">
            <!-- Card 1 -->
            @foreach ($tours as $tour)
            <div class="mx-2 xl:mb-5 mt-8 mb-8 rounded-md cont-card">
                <div class="rounded-md">
                    <img alt="imagen tour"
                        src="{{asset($tour->imagen)}}"
                        class="focus:outline-none w-full h-52 rounded-md" />
                </div>
                <div class="bg-white h-full rounded-md" >
                    <div class="flex items-center justify-center px-4 pt-4">
                        <h1 class="h1-card">{{$tour->nombre}}</h1>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center">
                            <p lass="p-card  mt-2">{{$tour->descripcion}}</p>
                        </div>
                        <div class="flex flex-col colums mt-4">
                            <p class="p-card">Fecha: {{$tour->fechahora}}</p>
                            <p class="p-card">Duración: {{$tour->duracion}}h</p>
                            <p class="p-card">Precio: {{$tour->precio}}€</p>
                        </div>
                        <div class="flex items-center justify-center py-4">
                            <a href=""
                                class="p-card border-2 border-green-800 px-20 rounded-md font-medium hover:bg-green-900 hover:text-white transition duration-300">Ver
                                más</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>

</x-clasetour>
