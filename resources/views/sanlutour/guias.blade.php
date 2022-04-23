<x-clasetour>
    <input id="valor-subrallado" type="text" value="guias" hidden>
    <x-slot name="title">
        Guias
    </x-slot>
    <x-slot name="main">
        <div class="datos-tour">
        <p class="p1-main-freetour">Tu brújula sera...</p>
        <p class="p2-main-freetour">Nuestros guías de confianza</p>
        </div>
        {{-- imagen de fondo --}}
        <img class="img-fondo" src="{{asset('Img/Guias.jpg')}}" alt="Imagen fondo tour free">
    </x-slot>


    <div class="fondo-guias  w-full   px-10 pt-10">
        <div class="container mx-auto">
            <div role="list" aria-label="Behind the scenes People "
                class="lg:flex md:flex sm:flex items-center flex-wrap md:justify-around sm:justify-around lg:justify-around">

                @foreach ($guias as $guia )
                <div role="listitem"
                    class="card-guias xl:w-1/3 sm:w-3/4 md:w-2/5 relative mt-16  xl:max-w-sm lg:w-2/5">
                    <div class="rounded overflow-hidden shadow-lg bg-white pb-5  shadow-black">
                        <div class="absolute -mt-20 w-full flex justify-center">
                            <div class="h-32 w-32">

                                <img src="{{asset($guia->imagen)}}"
                                    alt="Display Picture of Andres Berlin" role="img"
                                    class="rounded-full object-cover h-full w-full shadow-md" />
                            </div>
                        </div>
                        <div class="font-guias px-6 mt-16">
                            <h1 class="font-bold text-3xl text-center mb-1">{{$guia->nombre}}</h1>
                            <p class="text-gray-800 text-sm text-center">Guía de tour {{$guia->tipo}}</p>
                            <p class="text-center text-gray-600 text-base pt-3 font-normal">{{$guia->descripcion}}</p>

                                <div class="valoracion">
                                    <p class="val{{$guia->id}}">{{$guia->valoracion}}</p>
                                        <!-- Estrella 1 -->
                                        <button onclick="valoracion(this,{{$guia->id}})" type="submit" value="5">
                                            <i class="fas fa-star"></i>
                                        </button>

                                        <!-- Estrella 2 -->
                                        <button onclick="valoracion(this,{{$guia->id}})" type="submit" value="4">
                                            <i class="fas fa-star"></i>
                                        </button>

                                        <!-- Estrella 3 -->
                                        <button onclick="valoracion(this,{{$guia->id}})" type="submit" value="3">
                                            <i class="fas fa-star"></i>
                                        </button>

                                        <!-- Estrella 4 -->
                                        <button onclick="valoracion(this,{{$guia->id}})" type="submit" value="2">
                                            <i class="fas fa-star"></i>
                                        </button>

                                        <!-- Estrella 5 -->
                                        <button onclick="valoracion(this,{{$guia->id}})" type="submit"  value="1">
                                            <i class="fas fa-star"></i>
                                        </button>

                                </div>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</x-clasetour>

