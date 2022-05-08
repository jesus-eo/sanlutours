<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    {{-- @livewireScripts --}}
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- @livewireStyles --}}

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="flex">
    {{-- <x-jet-banner /> --}}
    <div class="h-full bg-gray-100 w-full flex" id="container-dashboard" x-data="datos()">
        {{-- Menu Hamburguesa --}}
        <div class="-mr-2 flex items-center md:hidden">
            <button @click="icono = ! icono" id="btn-menu-dashboard"
                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{ 'hidden': icono, 'inline-flex': !icono }" class="inline-flex" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{ 'hidden': !icono, 'inline-flex': icono }" class="hidden" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        {{-- Navegacion --}}
        @livewire('navigation-menu')

        <!-- Page Content -->
        <main class=" w-5/6" id="main-dashboard">
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts
    <script>
        function datos() {
            return{
                icono: false,
            }
        };
    </script>
</body>

</html>
