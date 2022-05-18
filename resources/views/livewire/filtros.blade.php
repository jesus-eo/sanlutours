<div>

    <div>
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <ul>
                <li><a class="enlace-bread rounded-md  hover:bg-green-900 hover:text-white transition duration-300"
                        href="/">Inicio</a></li>
                <li>Tours {{ $tipo }}</li>
            </ul>
        </nav>
        <div class="orden-tour">

            <div class="cont-orden bg-white rounded-md">

                {{-- Ordenar --}}
                <div>
                    <label for="orden" class="mr-4">Ordenar por:</label>
                    <select wire:model="orden" name="orden" id="orden">
                        <option value="precio">Precio</option>
                        <option value="duracion">Duración</option>
                    </select>
                </div>

                <div>
                    <label class="mr-4" for="sentido">Sentido:</label>
                    <select wire:model="sentido" name="sentido" id="sentido">
                        <option value="asc">Ascendente</option>
                        <option value="desc">Descendente</option>

                    </select>
                </div>
            </div>
            {{-- Busqueda --}}
            <div class="pt-2 relative ml-4 mr-4 text-gray-600">
                <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg  focus:outline-none"
                    type="search" name="search" placeholder="Search" wire:model="busqueda">
                <button class="lupa absolute right-0  top-0 mt-5 mr-4">
                    <svg class="text-gray-600 h-4 w-4 fill-current" version="1.1" id="Capa_1" x="0px" y="0px"
                        viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" width="512px"
                        height="512px">
                        <path
                            d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                    </svg>
                </button>
            </div>


        </div>

        <div class="flex flex-wrap  justify-around" >
            <!-- Card 1 -->
            @foreach ($tours as $tour)

                <div class="mx-2 xl:mb-5 mt-8 mb-8 rounded-md cont-card" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                    <div class="rounded-md">
                        <img alt="imagen tour" src="{{ asset($tour->imagen) }}"
                            class="focus:outline-none w-full h-52 rounded-md" />
                    </div>
                    <div class="bg-white h-full rounded-md">
                        <div class="flex items-center justify-center px-4 pt-4">
                            <h1 class="h1-card">{{ $tour->nombre }}</h1>
                        </div>
                        <div class="valoracion flex items-center justify-center">
                            <p class="val{{ $tour->id }}">{{ $tour->valoracion }}</p>
                            <!-- Estrella 1 -->
                            <button onclick="valoraciontour(this,{{ $tour->id }})" type="submit" value="5">
                                <i class="fas fa-star"></i>
                            </button>

                            <!-- Estrella 2 -->
                            <button onclick="valoraciontour(this,{{ $tour->id }})" type="submit" value="4">
                                <i class="fas fa-star"></i>
                            </button>

                            <!-- Estrella 3 -->
                            <button onclick="valoraciontour(this,{{ $tour->id }})" type="submit" value="3">
                                <i class="fas fa-star"></i>
                            </button>

                            <!-- Estrella 4 -->
                            <button onclick="valoraciontour(this,{{ $tour->id }})" type="submit" value="2">
                                <i class="fas fa-star"></i>
                            </button>

                            <!-- Estrella 5 -->
                            <button onclick="valoraciontour(this,{{ $tour->id }})" type="submit" value="1">
                                <i class="fas fa-star"></i>
                            </button>

                        </div>
                        <div class="p-4">
                            <form action="{{ Route('tourindividual', [$tour]) }}" method="post">
                                @csrf

                                <div class="flex items-center">
                                    <p class="p-card  mt-2">{{ $tour->descripcion }}</p>
                                </div>
                                <div class="flex flex-col colums mt-4">
                                    <label for="p-card">Fechas disponibles:</label>

                                    <select name="viajes" id="viajes">
                                        @foreach ($tour->viajes as $viaje)
                                            <option value={{ $viaje->id }}>
                                                {{ (new Datetime($viaje->fechahora))->format('d/m/Y H:i:s') }}
                                            </option>
                                        @endforeach

                                    </select>


                                    <p class="p-card">Duración: {{ $tour->duracion }}h</p>
                                    <p class="p-card">Precio: {{ $tour->precio }}€</p>
                                    @php
                                        $numguias = $tour->guias->count();
                                        $cont = 0;
                                    @endphp
                                    <a class="p-card hover:bg-green-900 hover:text-white"
                                        href="{{ Route('guias') }}">Guia:
                                        @foreach ($tour->guias as $guia)
                                            @php
                                                $cont++;
                                            @endphp
                                            {{ $guia->nombre }}
                                            @if ($cont < $numguias)
                                                ,
                                            @else
                                                .
                                            @endif
                                        @endforeach
                                    </a>

                                </div>
                                <div class="flex items-center justify-center py-4">
                                    <button
                                        class="p-card border-2 border-green-800 px-20 rounded-md font-medium hover:bg-green-900 hover:text-white transition duration-300"
                                        type="submit">Ver
                                        más</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
