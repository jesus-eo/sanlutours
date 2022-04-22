<x-guest-layout>


    <div id="fondo-login" class="min-h-screen flex  sm:justify-center items-center pt-6 sm:pt-0 ">
        <div class="cuadrado" style="--i:1"></div>
        <div class="cuadrado" style="--i:2"></div>
        <div class="cuadrado" style="--i:3"></div>
        <div class="cuadrado" style="--i:4"></div>
        <div class="cuadrado" style="--i:0"></div>

        <div id="container-login" class="w-full sm:max-w-md mt-6 px-6 py-4  overflow-hidden sm:rounded-lg">
        <x-jet-validation-errors class="mb-4" />

        <form class="form-login" method="POST" action="{{ route('register') }}">
            @csrf
            <h2>Register</h2>
            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="inputlogin  block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="inputlogin  block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="inputlogin  block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class=" inputlogin  block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <div class="flex items-center justify-around mt-4">

                <button type="submit"
                        class="border-2 border-green-800 sm:px-10 rounded-md font-medium hover:bg-green-900 hover:text-white transition duration-300">
                        {{ __('Register') }}
                </button>
                <a class="border-2 border-green-800 sm:px-10 rounded-md font-medium hover:bg-green-900 hover:text-white transition duration-300"
                href="/">Volver</a>
            </div>
        </form>
    </div>
   </div>
</x-guest-layout>
