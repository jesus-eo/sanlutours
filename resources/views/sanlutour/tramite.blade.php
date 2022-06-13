<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}"></script>
    {{-- Favicon --}}
    <link rel="icon" type="image/jpg" href="{{ asset('Img/Página principal/favicon.png') }}" />
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/sobnos-cont.css') }}">
    {{-- taildwind --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body class="flex items-center justify-center " style="background: #edf2f7;">
    <div class="py-14 w-9/12 px-4 md:px-6 2xl:px-20 2xl:container 2xl:mx-auto">
        <div>
            @if (session('success'))
            <div class="py-3 px-5 mb-4 bg-green-400 text-black text-sm rounded-md border border-green-200 flex items-center" role="alert">
                <div class="w-4 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                    </svg>
                </div>
                <span>{{ session('success') }}</span>
            </div>
            @endif
            @if (session('fault'))
            <div class="py-3 px-5 mb-4 bg-red-500 text-black text-sm rounded-md border border-red-200 flex items-center" role="alert">
                <div class="w-4 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01" />
                    </svg>
                </div>
                <span> {{ session('fault') }}</span>
            </div>
            @endif
        </div>

        <div class="flex justify-start item-start space-y-2 flex-col">
            @php
                date_default_timezone_set('Europe/Madrid');
                $fecha = new DateTime();
                $ultimaVisita = '';
                if ($tour->tipo == 'gastronomico') {
                    $ultimaVisita = 'gastrotours';
                } elseif ($tour->tipo == 'cultural') {
                    $ultimaVisita = 'cultutours';
                } elseif ($tour->tipo == 'deportivo') {
                    $ultimaVisita = 'deportours';
                } else {
                    $ultimaVisita = 'freetours';
                }
            @endphp
            <h1 class="text-3xl dark:text-white lg:text-4xl font-semibold leading-7 lg:leading-9 text-gray-800">
                Sanlutours</h1>
            <p class="text-base dark:text-gray-300 font-medium leading-6 text-gray-600">
                {{ $fecha->format('d-m-Y h:i:s a') }}</p>
            <nav class="breadcrumb w-full" aria-label="Breadcrumb">
                <ul>
                    <li><a class="enlace-bread text-gray-400" href="/">Inicio</a></li>
                    <li><a class="enlace-bread text-gray-400" href="{{ route($ultimaVisita) }}">Tours
                            {{ $tour->tipo }}</a> </li>
                    <li><a class="enlace-bread text-gray-400"
                            href="{{ Route('tourindividual', [$tour]) }}">{{ $tour->nombre }}</a> </li>
                    <li class="reserva-actual">Tramitar reservas</li>
                </ul>
            </nav>
        </div>
        <div
            class="mt-10 flex flex-col xl:flex-row jusitfy-center items-stretch w-full xl:space-x-8 space-y-4 md:space-y-6 xl:space-y-0">
            <div class="flex flex-col justify-start items-start w-full space-y-4 md:space-y-6 xl:space-y-8">
                <div
                    class="flex flex-col justify-start items-start dark:bg-gray-800 bg-gray-50 px-4 py-4 md:py-6 md:p-6 xl:p-8 w-full">
                    <p class="text-lg md:text-xl dark:text-white font-semibold leading-6 xl:leading-5 text-gray-800">
                        Tour seleccionado</p>
                    <div
                        class="mt-4 md:mt-6 flex flex-col md:flex-row justify-start items-start md:items-center md:space-x-6 xl:space-x-8 w-full">
                        <div class="pb-4 md:pb-8 w-full md:w-40">

                            <img class="w-full " src="{{ asset($tour->imagen) }}" alt="Imagen tour" />
                        </div>
                        <div
                            class="border-b border-gray-200 md:flex-row flex-col flex justify-between items-start w-full pb-8 space-y-4 md:space-y-0">
                            <div class="w-full flex flex-col justify-start items-start space-y-8">
                                <h3 class="text-xl dark:text-white xl:text-2xl font-semibold leading-6 text-gray-800">
                                    {{ $tour->nombre }}</h3>
                                <div class="flex justify-start items-start flex-col space-y-2">
                                    <p class="text-sm dark:text-white leading-none text-gray-800"><span
                                            class="text-gray-800">Fecha:
                                        </span>{{ (new Datetime($viaje->fechahora))->format('d/m/Y H:i:s') }} </p>
                                    <p class="text-sm dark:text-white leading-none text-gray-800"><span
                                            class="text-gray-800">Duración:
                                        </span>{{ $tour->duracion }}horas</p>

                                    <p class="text-sm dark:text-white leading-none text-gray-800"><span
                                            class="text-gray-800">Plazas reservadas:
                                        </span>{{ $plazasreservadas }}plazas </p>

                                    <p class="text-sm dark:text-white leading-none text-gray-800"><span
                                            class="text-gray-800">Precio por plaza:
                                        </span>{{ $tour->precio }}€ </p>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div
                    class="flex justify-center flex-col md:flex-row flex-col items-stretch w-full space-y-4 md:space-y-0 md:space-x-6 xl:space-x-8">
                    <div class="flex flex-col px-4 py-6 md:p-6 xl:p-8 w-full bg-gray-50 dark:bg-gray-800 space-y-6">
                        <h3 class="text-xl dark:text-white font-semibold leading-5 text-gray-800">Summary</h3>
                        <div
                            class="flex justify-center items-center w-full space-y-4 flex-col border-gray-200 border-b pb-4">
                            <div class="flex justify-between w-full">
                                <p class="text-base dark:text-white leading-4 text-gray-800">Precio por plaza:</p>
                                <p class="text-base dark:text-gray-300 leading-4 text-gray-600">{{ $tour->precio }}€
                                </p>
                            </div>
                            <div class="flex justify-between w-full">
                                <p class="text-base dark:text-white leading-4 text-gray-800">Número de plazas
                                    reservadas:
                                </p>
                                <p class="text-base dark:text-gray-300 leading-4 text-gray-600">
                                    {{ $plazasreservadas }}
                                </p>
                            </div>

                        </div>
                        <div class="flex justify-between items-center w-full">
                            <p class="text-base dark:text-white font-semibold leading-4 text-gray-800">Total</p>
                            <p class="text-base dark:text-gray-300 font-semibold leading-4 text-gray-600">
                                {{ number_format($tour->precio * $plazasreservadas, 2) }}€
                            </p>
                        </div>
                        {{-- Sección pago --}}


                        <div>

                            <form action="{{ Route('processTransaction') }}" method="post">
                                @csrf
                                <input type="hidden" name="tour" value="{{ $tour }}">
                                <input type="hidden" name="plazasreservadas" value="{{ $plazasreservadas }}">
                                <input type="hidden" name="total"
                                    value="{{ number_format($tour->precio * $plazasreservadas, 2) }}">

                                <input type="hidden" name="viaje" value="{{ json_encode($viaje) }}">

                                <button
                                    class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold"><i
                                        class="mdi mdi-lock-outline mr-1"></i> PAGAR
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
