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
        <img class="img-fondo" src="{{ asset('Img/Img Cultural/palacio2.jpg') }}"
            alt="Imagen fondo tour cultural">
    </x-slot>
    <div class="pagina-container-wraper">
        <h1 class="text-center text-white pt-12 text-4xl">Nuestros tours Culturales</h1>
        <p class="p-definicion-tour">¿Viajas a Sanlúcar en familia? ¿Sois un cole que busca una actividad lúdico-cultural
            para vuestro viaje de fin de curso? ¿Te apetece disfrutar de un guía a tu disposición? <br>
            Los tours culturales permiten adaptar el ritmo y el tono del tour a las necesidades de cada grupo
            convirtiendo la experiencia en algo personal. <br>
            Tú eliges el tour, el día y la hora. Consulta nuestra disponibilidad y tendrás un guía en exclusiva que te
            acompañará desde el inicio del recorrido para conocer la historia de Sanlúcar de Barrameda.
        </p>
    </div>

    @livewire('filtros', ['tipo' => 'cultural'])
    </div>

</x-clasetour>
