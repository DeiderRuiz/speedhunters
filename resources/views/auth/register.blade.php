<x-sub-layout>
    <x-slot name="titulo">
        Registrarse
    </x-slot>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="grid grid-cols-2 gap-2">
                <div>
                    <x-label for="name" value="{{ __('Nombres') }}" />
                    <x-input id="name" class="block w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>
    
                <div>
                    <x-label for="last_name" value="{{ __('Apellidos') }}" />
                    <x-input id="last_name" class="block w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
                </div>
    
                <div class="mt-2">
                    <x-label for="cellphone" value="{{ __('Telefono') }}" />
                    <x-input id="cellphone" class="block w-full" type="text" name="cellphone" :value="old('cellphone')" required autofocus autocomplete="cellphone" />
                </div>
    
                <div class="mt-2">
                    <x-label for="email" value="{{ __('Correo electrónico') }}" />
                    <x-input id="email" class="block w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>
    
                <div class="mt-2">
                    <x-label for="password" value="{{ __('Contraseña') }}" />
                    <x-input id="password" class="block w-full" type="password" name="password" required autocomplete="new-password" />
                </div>
    
                <div class="mt-2">
                    <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                    <x-input id="password_confirmation" class="block w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('Estoy de acuerdo con los :terms_of_service y :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-red-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:text-white dark:hover:text-gray-300">'.__('Terminos De Servicio').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-red-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:text-white dark:hover:text-gray-300">'.__('Politica De Privacidad').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-red-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:text-white dark:hover:text-gray-300" href="{{ route('login') }}">
                    {{ __('¿Ya estás Registrado?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Registrarse') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-sub-layout>