<x-clasetour>
    <x-slot name="title">
        Free Tours
    </x-slot>
    <x-slot name="main">
        <div class="datos-tour">
            <p class="p1-main-freetour">Acompáñanos a ...</p>
            <p class="p2-main-freetour">Visitar Sanlúcar</p>
        </div>
        {{-- imagen de fondo --}}
        <img class="img-fondo" src="{{ asset('Img/img Freetours/tourind2.jpg') }}" alt="Imagen fondo tour free">
    </x-slot>
    <div class="pagina-container-wraper">
        <h1 class="text-center text-white pt-12 text-4xl">Nuestros free tours</h1>
        <p class="p-definicion-tour">
            ¿Te gustaría conocer los edificios y monumentos más emblemáticos de Sanlúcar en un solo día sin tener que
            preocuparte de cómo moverte de un lado para otro de la ciudad? Tú marcas la ruta. <br>
            . Está lleno de plazas ocultas y callejones pintorescos dignos de mil fotos para el recuerdo. <br>

            Recorrerás de la forma más cómoda y de la mano de un guía local los lugares más intimos de Sanlúcar.
        </p>
    </div>
    @livewire('filtros', ['tipo' => 'free'])
</x-clasetour>
