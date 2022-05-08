<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 w-1/6">
    <!-- Primary Navigation Menu -->
    <aside
        class=" z-10 top-0 pb-3  w-full flex flex-col justify-between  border-r bg-white transition duration-300 ">
        {{-- div1 --}}
        <div>
            <!-- Logo -->
            <div class="-mx-6 px-6 py-4">
                <a href="#" title="home">
                    <img class="w-32" alt="tailus logo">
                </a>
            </div>
            {{-- Foto --}}
            <div class="mt-8 text-center">

                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())

                    @if (Auth::user()->profile_photo_path)
                        <img class="w-10 h-10 m-auto rounded-full object-cover lg:w-28 lg:h-28"
                            src="/storage/{{ Auth::user()->profile_photo_path }}"
                            alt="{{ Auth::user()->name }}" />
                    @else
                        <img class="w-10 h-10 m-auto rounded-full object-cover lg:w-28 lg:h-28"
                            src="{{ Auth::user()->profile_photo_url }}"
                            alt="{{ Auth::user()->name }}" />
                    @endif

            @else
                <span class="inline-flex rounded-md">
                    <button type="button"
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                        {{ Auth::user()->name }}

                        <svg class="ml-2 -mr-0.5 h-4 w-4"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </span>
            @endif

                <h5 class="hidden mt-4 text-xl font-semibold text-gray-600 lg:block">{{ Auth::user()->name }}</h5>

            </div>
            <ul class="space-y-2 tracking-wide mt-8">
            <!-- Navigation Links -->
            @if (Auth::user()->administrador != null)

                    <li>
                        <a href="{{ route('index') }}" title="Dashboard" aria-label="dashboard"
                        class="relative px-4 py-3 flex items-center space-x-4 rounded-xl hover:bg-gradient-to-r from-sky-600 to-cyan-400 hover:text-white ">
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
                    </a>
                    </li>

                    <li>
                        <a href="{{ route('profile.show') }}" title="Perfil usuario" aria-label="dashboard"
                        class="relative px-4 py-3 flex items-center space-x-4 rounded-xl hover:bg-gradient-to-r from-sky-600 to-cyan-400 hover:text-white ">
                        <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                         </svg>
                        <span class="-mr-1 font-medium"> {{ __('Perfil') }}</span>
                    </a>
                    </li>
                    <li>
                        <a href="{{ route('crudtours') }}" title="Tours" class="px-4 py-3 flex items-center space-x-4 rounded-md hover:bg-gradient-to-r from-sky-600 to-cyan-400 hover:text-white">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path class="fill-current text-gray-600 " fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd" />
                                <path class="fill-current text-gray-300 group-hover:text-cyan-300" d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z" />
                            </svg>
                            <span class="-mr-1 font-medium">{{ __('Tours') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('crudguias') }}" title="Guías" class="px-4 py-3 flex items-center space-x-4 rounded-md hover:bg-gradient-to-r from-sky-600 to-cyan-400 hover:text-white ">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path class="fill-current text-gray-600 " d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
                                <path class="fill-current text-gray-300 group-hover:text-cyan-300" d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
                            </svg>
                            <span class="-mr-1 font-medium">{{ __('Guías') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('crudreservas') }}" title="Reservas" class="px-4 py-3 flex items-center space-x-4 rounded-md hover:bg-gradient-to-r from-sky-600 to-cyan-400 hover:text-white  group">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path class="fill-current text-gray-300 group-hover:text-cyan-300" fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" />
                                <path class="fill-current text-gray-600 " d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
                            </svg>
                            <span class=" -mr-1 font-medium">{{ __('Reservas') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('crudusuarios') }}" title="Usuarios" class="px-4 py-3 flex items-center space-x-4 rounded-md hover:bg-gradient-to-r from-sky-600 to-cyan-400 hover:text-white">
                            <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                             </svg>

                            <span class="-mr-1 font-medium">{{ __('Usuarios') }}</span>
                        </a>
                    </li>


            @else

                    <li>
                        <a href="{{ route('index') }}" aria-label="dashboard"
                            class="relative px-4 py-3 flex items-center space-x-4 rounded-xl hover:bg-gradient-to-r from-sky-600 to-cyan-400 hover:text-white ">
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
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profile.show') }}" title="Perfil usuario" aria-label="dashboard"
                        class="relative px-4 py-3 flex items-center space-x-4 rounded-xl hover:bg-gradient-to-r from-sky-600 to-cyan-400 hover:text-white ">
                        <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                         </svg>
                        <span class="-mr-1 font-medium"> {{ __('Perfil') }}</span>
                    </a>
                    </li>
                    <li>
                        <a href="{{ route('reservasusuario') }}"
                            class="px-4 py-3 flex items-center space-x-4 rounded-md hover:bg-gradient-to-r from-sky-600 to-cyan-400 hover:text-white  group">
                            <svg class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path class="fill-current text-gray-300 group-hover:text-cyan-300" fill-rule="evenodd"
                                    d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z"
                                    clip-rule="evenodd" />
                                <path class="fill-current text-gray-600 "
                                    d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
                            </svg>
                            <span class=" -mr-1 font-medium">{{ __('Reservas') }}</span>
                        </a>

                    </li>

            @endif
            <li>
                <form method="POST" action="{{ route('logout') }}" x-data >
                    @csrf


                    <a class="px-4 py-3 flex items-center space-x-4 rounded-md hover:bg-gradient-to-r from-sky-600 to-cyan-400 hover:text-white  group" href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        <svg class="h-5 w-5">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path>
                         </svg>
                         <span class=" -mr-1 font-medium">{{ __('Log Out') }}</span>

                    </a>
                </form>
            </li>

        </ul>
        </div>




        <!-- Hamburger -->
        <div class="-mr-2 flex items-center sm:hidden">
            <button @click="open = ! open"
                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

    </aside>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
       {{--  @if (Auth::user()->administrador != null)
            <div class="pt-2 pb-3 space-y-1">

                <x-jet-nav-link href="{{ route('crudtours') }}" :active="request()->routeIs('crudtours')">
                    {{ __('Tours') }}
                </x-jet-nav-link>
                <x-jet-nav-link href="{{ route('crudguias') }}" :active="request()->routeIs('crudguias')">
                    {{ __('Guias') }}
                </x-jet-nav-link>
                <x-jet-nav-link href="{{ route('crudreservas') }}" :active="request()->routeIs('crudreservas')">
                    {{ __('Reservas') }}
                </x-jet-nav-link>
                <x-jet-nav-link href="{{ route('crudusuarios') }}" :active="request()->routeIs('crudusuarios')">
                    {{ __('Usuarios') }}
                </x-jet-nav-link>
                <x-jet-nav-link href="{{ route('index') }}" :active="request()->routeIs('index')">
                    {{ __('Inicio') }}
                </x-jet-nav-link>
            </div>
        @else
            <div class="pt-2 pb-3 space-y-1">

                <x-jet-nav-link href="{{ route('reservasusuario') }}" :active="request()->routeIs('reservasusuario')">
                    {{ __('Reservas') }}
                </x-jet-nav-link>
                <x-jet-nav-link href="{{ route('index') }}" :active="request()->routeIs('index')">
                    {{ __('Inicio') }}
                </x-jet-nav-link>
            </div>
        @endif --}}


        {{-- <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 mr-3">
                        @if (Auth::user()->profile_photo_path)
                            <img class="h-8 w-8 rounded-full object-cover"
                                src="/storage/{{ Auth::user()->profile_photo_path }}"
                                alt="{{ Auth::user()->name }}" />
                        @else
                            <img class="h-8 w-8 rounded-full object-cover"
                                src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        @endif
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                        :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-jet-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-jet-responsive-nav-link>
                    @endcan

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                    @endforeach
                @endif
            </div>
        </div> --}}
    </div>
</nav>
