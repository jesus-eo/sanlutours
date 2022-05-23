<x-clasetour>
    <x-slot name="title">
        Tours Culturales
    </x-slot>
    <x-slot name="main">
        <div class="datos-tour">
            <p class="p1-main-freetour">Conoce los...</p>
            <p class="p2-main-freetour">Emblemas de Sanlúcar</p>
        </div>
        {{-- imagen de fondo --}}
        <img class="img-fondo" src="{{ asset('Img/Img Cultural/palacio2.jpg') }}" alt="Imagen fondo tour cultural">
    </x-slot>
    @livewire('filtros', ['tipo' => 'cultural'])
    </div>

</x-clasetour>
