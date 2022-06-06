<x-clasetour>
    <x-slot name="title">
        Tours Deportivos
    </x-slot>
    <x-slot name="main">
        <div class="datos-tour">
            <p class="p1-main-freetour">Explora los...</p>
            <p class="p2-main-freetour">Rincones Sanluqueños</p>
        </div>
        {{-- imagen de fondo --}}
        <img class="img-fondo" src="{{ asset('Img/img Deportivo/imagen fondo deportiva.jpg') }}"
            alt="Imagen fondo tour deportivo">
    </x-slot>
    <div class="pagina-container-wraper">
        <h1 class="text-center text-white pt-12 text-4xl">Nuestros tours Deportivos</h1>
        <p class="p-definicion-tour">
            Justo en frente de la Ciudad de Sanlúcar de barrameda, al otro lado del río, nos encontramos con el coto de
            Doñana un área de las más interesantes y menos explotadas, un sitio digno de admirar donde podrás visitarlo
            practicando uno de los tantos deportes que te brindamos. <br>
            Te ofrecemos un concepto de viaje cuyo objetivo es el deporte, dirigido a todo tipo de aficionados.

        </p>
    </div>
    @livewire('filtros', ['tipo' => 'deportivo'])

    </div>

</x-clasetour>
