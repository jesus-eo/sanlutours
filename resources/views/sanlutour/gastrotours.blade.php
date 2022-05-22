<x-clasetour>
    <x-slot name="title">
        Tours Gastronómicos
    </x-slot>
    <x-slot name="main">
        <div class="datos-tour">
        <p class="p1-main-freetour">Es hora de...</p>
        <p class="p2-main-freetour">Comer en Sanlúcar</p>
        </div>
         {{-- imagen de fondo --}}
         <img class="img-fondo" src="{{asset('Img/Img gastronomia/pp-Vaso vino.jpg')}}" alt="Imagen fondo tour free">
    </x-slot>

    <!-- Remove py-8 -->
    <livewire:filtros tipo='gastronómico'>

    </div>

</x-clasetour>
