<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sanlutours</title>
    {{--  Favicon --}}
     <link rel="icon" type="image/jpg" href="{{asset('Img/Página principal/favicon.png')}}"/>
    <!-- Fonts -->
    {{-- @livewireScripts --}}
    <!-- Styles -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Corben&display=swap');

    </style>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

</head>

<body class="flex min-h-screen" id="body-dashboard">

    {{-- <x-jet-banner /> --}}
    <div class="h-full w-full flex" id="container-dashboard" x-data="datos()">

        {{-- Menu Hamburguesa --}}
        <div class="-mr-2 flex items-center md:hidden">
            <button x-on:click="icono = ! icono" id="btn-menu-dashboard"
                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{ 'hidden': icono, 'inline-flex': !icono }" class="inline-flex"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{ 'hidden': !icono, 'inline-flex': icono }" class="hidden"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="md:hidden" id="mobile-menu-dashboard" x-show="icono" @click.away="icono=false">

            <!-- Navigation Links -->
            @if (Auth::user()->administrador != null)
                <li>
                    <x-nav-link href="{{ route('index') }}" :active="request()->routeIs('index')" title="Dashboard"
                        aria-label="dashboard"
                        class="relative px-4 py-3 flex text-white  items-center space-x-4 rounded-xl hover:bg-gradient-to-r from-green-600 to-green-400  ">
                        <svg class="-ml-1 h-6 w-6" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M6 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V8ZM6 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-1Z"
                                class="fill-current text-grey-500 dark:fill-slate-500"></path>
                            <path d="M13 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2V8Z"
                                class="fill-current text-grey-500 group-hover:text-cyan-300"></path>
                            <path d="M13 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1Z"
                                class="fill-current "></path>
                        </svg>
                        <span class="-mr-1 font-medium"> {{ __('Inicio') }}</span>
                    </x-nav-link>
                </li>

                <li>
                    <x-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')" title="Perfil usuario"
                        aria-label="dashboard"
                        class=" text-white relative px-4 py-3 flex items-center space-x-4 rounded-xl hover:bg-gradient-to-r from-green-600 to-green-400 hover:text-white ">
                        <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                            <path fill-rule="evenodd"
                                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="-mr-1 font-medium"> {{ __('Perfil') }}</span>
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link href="{{ route('crudtours') }}" title="Tours" :active="request()->routeIs('crudtours')"
                        class="text-white px-4 py-3 flex items-center space-x-4 rounded-md hover:bg-gradient-to-r from-green-600 to-green-400 hover:text-white">
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path class="fill-current text-gray-600 " fill-rule="evenodd"
                                d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                                clip-rule="evenodd" />
                            <path class="fill-current text-gray-300 group-hover:text-cyan-300"
                                d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z" />
                        </svg>
                        <span class="-mr-1 font-medium">{{ __('Tours') }}</span>
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link href="{{ route('crudguias') }}" title="Guías" :active="request()->routeIs('crudguias')"
                        class="text-white px-4 py-3 flex items-center space-x-4 rounded-md hover:bg-gradient-to-r from-green-600 to-green-400 hover:text-white ">
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path class="fill-current text-gray-600 " d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
                            <path class="fill-current text-gray-300 group-hover:text-cyan-300"
                                d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
                        </svg>
                        <span class="-mr-1 font-medium">{{ __('Guías') }}</span>
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link href="{{ route('crudreservas') }}" title="Reservas" :active="request()->routeIs('crudreservas')"
                        class="text-white px-4 py-3 flex items-center space-x-4 rounded-md hover:bg-gradient-to-r from-green-600 to-green-400 hover:text-white  group">
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path class="fill-current text-gray-300 group-hover:text-cyan-300" fill-rule="evenodd"
                                d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z"
                                clip-rule="evenodd" />
                            <path class="fill-current text-gray-600 "
                                d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
                        </svg>
                        <span class=" -mr-1 font-medium">{{ __('Reservas') }}</span>
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link href="{{ route('crudusuarios') }}" title="Usuarios" :active="request()->routeIs('crudusuarios')"
                        class="text-white px-4 py-3 flex items-center space-x-4 rounded-md hover:bg-gradient-to-r from-green-600 to-green-400 hover:text-white">
                        <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                clip-rule="evenodd"></path>
                        </svg>

                        <span class="-mr-1 font-medium">{{ __('Usuarios') }}</span>
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link href="{{ route('crudviajes') }}" title="Viajes" :active="request()->routeIs('crudviajes')"
                        class="text-white px-4 py-3 flex items-center space-x-4 rounded-md hover:bg-gradient-to-r from-green-600 to-green-400 hover:text-white">
                        <svg class="w-6 h-6 text-gray-500 flex-shrink-0  transition duration-75" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path class="fill-current text-gray-600 " fill-rule="evenodd"
                                d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                                clip-rule="evenodd" />
                            <path class="fill-current text-gray-300 group-hover:text-cyan-300"
                                d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z" />
                        </svg>
                        <span class="-mr-1 font-medium">{{ __('Viajes') }}</span>
                    </x-nav-link>
                </li>
            @else
                <li>
                    <x-nav-link href="{{ route('index') }}" aria-label="dashboard" :active="request()->routeIs('index')"
                        class="text-white relative px-4 py-3 flex items-center space-x-4 rounded-xl hover:bg-gradient-to-r from-green-600 to-green-400 hover:text-white ">
                        <svg class="-ml-1 h-6 w-6" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M6 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V8ZM6 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-1Z"
                                class="fill-current text-cyan-400 dark:fill-slate-600"></path>
                            <path d="M13 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2V8Z"
                                class="fill-current text-cyan-200 group-hover:text-cyan-300"></path>
                            <path d="M13 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1Z"
                                class="fill-current "></path>
                        </svg>
                        <span class="-mr-1 font-medium"> {{ __('Inicio') }}</span>
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link href="{{ route('profile.show') }}" title="Perfil usuario" aria-label="dashboard"
                        :active="request()->routeIs('profile.show')"
                        class="text-white relative px-4 py-3 flex items-center space-x-4 rounded-xl hover:bg-gradient-to-r from-green-600 to-green-400 hover:text-white ">
                        <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                            <path fill-rule="evenodd"
                                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="-mr-1 font-medium"> {{ __('Perfil') }}</span>
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link href="{{ route('reservasusuario') }}" :active="request()->routeIs('reservasusuario')"
                        class="text-white px-4 py-3 flex items-center space-x-4 rounded-md hover:bg-gradient-to-r from-green-600 to-green-400 hover:text-white  group">
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path class="fill-current text-gray-300 group-hover:text-cyan-300" fill-rule="evenodd"
                                d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z"
                                clip-rule="evenodd" />
                            <path class="fill-current text-gray-600 "
                                d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
                        </svg>
                        <span class=" -mr-1 font-medium">{{ __('Reservas') }}</span>
                    </x-nav-link>
                </li>
            @endif
            <li>
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <x-nav-link class="text-white px-4 py-3 flex items-center space-x-4 rounded-md hover:bg-gradient-to-r from-green-600 to-green-400 hover:text-white  group"
                        href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        <svg class="h-5 w-5">
                            <path fill-rule="evenodd"
                                d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class=" -mr-1 font-medium">{{ __('Log Out') }}</span>

                    </x-nav-link>
                </form>
            </li>
        </div>


        {{-- Navegacion --}}
        @livewire('navigation-menu')

        <!-- Page Content -->
        <main class=" w-5/6 min-h-screen" id="main-dashboard">
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts
    <script>
        function datos() {
            return {
                icono: false,

            }
        };
    </script>
</body>

</html>
