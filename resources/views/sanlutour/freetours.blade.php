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
    @livewire('filtros', ['tipo' => 'free'])

</x-clasetour>
