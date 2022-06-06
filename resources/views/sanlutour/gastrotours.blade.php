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
        <img class="img-fondo" src="{{ asset('Img/Img gastronomia/pp-Vaso vino.jpg') }}"
            alt="Imagen fondo tour free">
    </x-slot>
    <div class="pagina-container-wraper">
        <h1 class="text-center text-white mb-2  pt-12 text-4xl">Nuestros tours Gastronómicos</h1>
        <p class="p-definicion-tour">
            Callejear por los barrios de Sanlúcar de Barrameda, disfrutando de sus monumentos y atracciones mientras
            descubres sus misterios y secretos mejor guardados puede resultar agotador y vas a necesitar hidratarte y
            comer bien. <br>
            Puedes aprovechar de nuestros tours gastrónomicos ya que este año Sanlúcar a sido nombrada capital de la
            gastronómia.
            Elegir no te va a ser sencillo por lo que nuestra intención en este artículo es ayudaros a encontrar los
            mejores sitios para comer y para beber en sanlúcar, ajustando vuestra elección a vuestros gustos culinarios
            y por supuesto a vuestro presupuesto. <br>
            Por lo que no tendrás excusa para estar comiendo todos los días hamburguesas y pizzas.
        </p>
    </div>
    @livewire('filtros', ['tipo' => 'gastronómico'])

    </div>

</x-clasetour>
