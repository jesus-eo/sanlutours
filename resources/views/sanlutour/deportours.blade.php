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
        <img class="img-fondo" src="{{asset('Img/img Deportivo/imagen fondo deportiva.jpg')}}" alt="Imagen fondo tour deportivo">
    </x-slot>

    <!-- Remove py-8 -->
    <livewire:filtros tipo='deportivo'>

    </div>

</x-clasetour>
