<x-clasetour>

    <input id="valor-img-fondo" type="text" value="freetour" hidden>
    <x-slot name="title">
        Free Tours
    </x-slot>
    <x-slot name="main">
        <p class="p1-main-freetour">Acompáñanos a ...</p>
        <p class="p2-main-freetour">Visitar Sanlúcar</p>
    </x-slot>

    <!-- Remove py-8 -->
    <div>
        <div class="flex flex-wrap  justify-around container10">
            <!-- Card 1 -->
            @foreach ($tours as $tour)


            <div class="mx-2 xl:mb-5 mt-8 mb-8 contintaa">
                <div>
                    <img alt="imagen tour"
                        src="{{asset($tour->imagen)}}"
                        class="focus:outline-none w-full h-52" />
                </div>
                <div class="bg-white h-96" >
                    <div class="flex items-center justify-center px-4 pt-4">
                        <h1 class="h1-card">{{$tour->nombre}}</h1>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center">

                            <p tabindex="0" class="p-card  mt-2">{{$tour->descripcion}}</p>
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
            <!-- Card 1 Ends -->
          {{--   <!-- Card 2  -->
            <div tabindex="0" class="focus:outline-none mx-2 w-80 xl:mb-0 mb-8">
                <div>
                    <img alt="person capturing an image"
                        src="https://cdn.tuk.dev/assets/templates/classified/Bitmap (1).png" tabindex="0"
                        class="focus:outline-none w-full h-52" />
                </div>
                <div class="bg-white">
                    <div class="flex items-center justify-center px-4 pt-4">
                        <h1 class="h1-card">Castillo de Santiago</h1>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center">

                            <p tabindex="0" class="p-card focus:outline-none  mt-2">Recorre con nosotros el Barrio Alto
                                de Sanlúcar y conoce los secretos y leyendas que atesora el castillo de esta bella
                                localidad gaditana, el cual aguarda muchos misterios en su interior.
                            </p>
                        </div>
                        <div class="flex flex-col colums mt-4">
                            <p class="p-card">Fecha: 00-00-0000</p>
                            <p class="p-card">Duración: 1h</p>
                            <p class="p-card">Precio: 35€</p>
                        </div>
                        <div class="flex items-center justify-center py-4">
                            <a href=""
                                class="p-card border-2 border-green-800 px-20 rounded-md font-medium hover:bg-green-900 hover:text-white transition duration-300">Ver
                                más</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 2 Ends -->
            <!-- Card 3 -->
            <div tabindex="0" class="focus:outline-none mx-2 w-80 xl:mb-0 mb-8">
                <div>
                    <img alt="person capturing an image"
                        src="https://cdn.tuk.dev/assets/templates/classified/Bitmap (1).png" tabindex="0"
                        class="focus:outline-none w-full h-52" />
                </div>
                <div class="bg-white">
                    <div class="flex items-center justify-center px-4 pt-4">
                        <h1 class="h1-card">Castillo de Santiago</h1>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center">

                            <p tabindex="0" class="p-card focus:outline-none  mt-2">Recorre con nosotros el Barrio Alto
                                de Sanlúcar y conoce los secretos y leyendas que atesora el castillo de esta bella
                                localidad gaditana, el cual aguarda muchos misterios en su interior.
                            </p>
                        </div>
                        <div class="flex flex-col colums mt-4">
                            <p class="p-card">Fecha: 00-00-0000</p>
                            <p class="p-card">Duración: 1h</p>
                            <p class="p-card">Precio: 35€</p>
                        </div>
                        <div class="flex items-center justify-center py-4">
                            <a href=""
                                class="p-card border-2 border-green-800 px-20 rounded-md font-medium hover:bg-green-900 hover:text-white transition duration-300">Ver
                                más</a>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!--  end card 3 -->
        </div>

    </div>

</x-clasetour>
