<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}"></script>
    {{-- <link href="https://cdn.tailwindcss.com" rel="stylesheet"> --}}
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/sobnos-cont.css') }}">
    {{-- taildwind --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body class="flex items-center justify-center " style="background: #edf2f7;">
    <div class="py-14 w-9/12 px-4 md:px-6 2xl:px-20 2xl:container 2xl:mx-auto">
        <div>
            @if (session('success'))
                <div class="alert alert-success bg-green-400">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('fault'))
                <div class="alert alert-success bg-red-500">
                    {{ session('fault') }}
                </div>
            @endif
        </div>

        <div class="flex justify-start item-start space-y-2 flex-col">
            @php
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
            <h1 class="text-3xl dark:text-white lg:text-4xl font-semibold leading-7 lg:leading-9 text-gray-800">Order
                #13432</h1>
            <p class="text-base dark:text-gray-300 font-medium leading-6 text-gray-600">21st Mart 2021 at 10:34 PM</p>
            <nav class="breadcrumb w-full" aria-label="Breadcrumb">
                <ul>
                    <li><a class="enlace-bread text-gray-400" href="/">Inicio</a></li>
                    <li><a class="enlace-bread text-gray-400" href="{{ route($ultimaVisita) }}">Tours {{ $tour->tipo }}</a> </li>
                    <li><a class="enlace-bread text-gray-400" href="{{Route('tourindividual',[$tour])}}">{{ $tour->nombre }}</a> </li>
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
                                        </span>{{ (new Datetime($tour->fechahora))->format('d/m/Y H:i:s') }} </p>
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
                                <p class="text-base dark:text-gray-300 leading-4 text-gray-600">{{ $plazasreservadas }}
                                </p>
                            </div>

                        </div>
                        <div class="flex justify-between items-center w-full">
                            <p class="text-base dark:text-white font-semibold leading-4 text-gray-800">Total</p>
                            <p class="text-base dark:text-gray-300 font-semibold leading-4 text-gray-600">
                                {{number_format($tour->precio * $plazasreservadas, 2) }}€
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        {{-- Sección pago --}}
        <div class="min-w-screen w-full min-h-screen  flex items-center justify-center px-5 pb-10 pt-16">

                <div>
                    {{-- Este botón va hacia reservacontroller el cual quita las plazas seleccionadas del tour indicado --}}
                    <form action="{{Route('processTransaction')}}" method="post">
                        @csrf
                        <input type="hidden" name="tour" value="{{$tour}}">
                        <input type="hidden" name="plazasreservadas" value="{{$plazasreservadas}}">
                        <input type="hidden" name="total" value="{{number_format($tour->precio * $plazasreservadas, 2) }}">

                        {{-- <a class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold" href="{{ route('processTransaction') }}">Pagar</a> --}}
                    <button
                        class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold"><i
                            class="mdi mdi-lock-outline mr-1"></i> PAY NOW
                    </button>
                </form>
                </div>

        </div>
    </div>


</body>

</html>
