<x-clasetour>

    <input id="valor-img-fondo" type="text" value="gastrotour" hidden>
    <x-slot name="title">
        Tours Gastronómicos
    </x-slot>
    <x-slot name="main">
        <p class="p1-main-freetour">Es hora de...</p>
        <p class="p2-main-freetour">Comer en Sanlúcar</p>
    </x-slot>

    <!-- Remove py-8 -->
    <div>
        <div class="orden-tour flex">
            <p class="text-white">Ordenar por:</p>
            <a class="text-md border-2 rounded-md  text-white hover:bg-green-900 hover:text-white transition duration-300" href="{{Route('gastrotours',['fecha'])}}">Fecha</a>
            <a class="text-md border-2 rounded-md  text-white hover:bg-green-900 hover:text-white transition duration-300" href="{{Route('gastrotours',['precio'])}}">Precio</a>
        </div>
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
                    <div class="valoracion flex items-center justify-center">
                        <p class="val{{$tour->id}}">{{$tour->valoracion}}</p>
                            <!-- Estrella 1 -->
                            <button onclick="valoraciontour(this,{{$tour->id}})" type="submit" value="5">
                                <i class="fas fa-star"></i>
                            </button>

                            <!-- Estrella 2 -->
                            <button onclick="valoraciontour(this,{{$tour->id}})" type="submit" value="4">
                                <i class="fas fa-star"></i>
                            </button>

                            <!-- Estrella 3 -->
                            <button onclick="valoraciontour(this,{{$tour->id}})" type="submit" value="3">
                                <i class="fas fa-star"></i>
                            </button>

                            <!-- Estrella 4 -->
                            <button onclick="valoraciontour(this,{{$tour->id}})" type="submit" value="2">
                                <i class="fas fa-star"></i>
                            </button>

                            <!-- Estrella 5 -->
                            <button onclick="valoraciontour(this,{{$tour->id}})" type="submit"  value="1">
                                <i class="fas fa-star"></i>
                            </button>

                    </div>
                    <div class="p-4">
                        <div class="flex items-center">
                            <p lass="p-card  mt-2">{{$tour->descripcion}}</p>
                        </div>
                        <div class="flex flex-col colums mt-4">
                            <p class="p-card">Fecha: {{(new Datetime($tour->fechahora))->format('d/m/Y H:i:s')}}</p>
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
