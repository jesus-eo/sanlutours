<x-guest-layout>

    {{-- box --}}
    <div id="fondo-login" class="min-h-screen flex  sm:justify-center items-center pt-6 sm:pt-0 ">

        <div class="cuadrado" style="--i:1"></div>
        <div class="cuadrado" style="--i:2"></div>
        <div class="cuadrado" style="--i:3"></div>
        <div class="cuadrado" style="--i:4"></div>
        <div class="cuadrado" style="--i:0"></div>

        <div id="container-login" class="w-full sm:max-w-md mt-6 px-6 py-4  overflow-hidden sm:rounded-lg">
            <x-jet-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif


            <form class="form-login" method="POST" action="{{ route('login') }} ">
                @csrf
                <h2>Login Form</h2>
                <div>
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="inputlogin block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required autofocus />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" class="inputlogin  block mt-1 w-full" type="password" name="password"
                        required autocomplete="current-password" />
                </div>

                <div class="block mt-4 flex justify-between">
                    <label for="remember_me" class="flex items-center">
                        <x-jet-checkbox id="remember_me" name="remember" class='inputlogin' />
                        <span class=" ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <div class="flex  items-center justify-around mt-4">

                    <button type="submit"
                        class="border-2 border-green-800 sm:px-10 rounded-md font-medium hover:bg-green-900 hover:text-white transition duration-300">{{ __('Log in') }}</button>


                    <a class="border-2 border-green-800 sm:px-10 rounded-md font-medium hover:bg-green-900 hover:text-white transition duration-300"
                        href="/">Volver</a>
                </div>
            </form>
        </div>
    </div>


</x-guest-layout>
