<x-guest-layout>
    <style>
        .input_white {
            background-color: #fff;
            color: black !important;
        }

        .button_login {
            background-color: lightgray;
            color: black;
            padding: 14px 20px;
            border: none;
            cursor: pointer;
        }

        .button_login:hover {
            background-color: lightgray;
            opacity: 0.8;
        }

        .a_hover:hover {
            color: black;
        }

        .checkbox_white {
            background-color: #fff;
            color: black !important;
        }
    </style>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label style="color: black" for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full input_white" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label style="color: black" for="password" :value="__('Mot de passe')" />

            <x-text-input id="password" class="block mt-1 w-full input_white" type="password" name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="checkbox_white rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Se souvenir de moi') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a style="margin-right: 10px;" class="a_hover underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('register') }}">
                {{ __('S\'inscrire?') }}
            </a>
            @if (Route::has('password.request'))
            <a class="a_hover underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                {{ __('Mot de passe oublié?') }}
            </a>
            @endif

            <x-primary-button class="ms-3 button_login">
                {{ __('Se connecter') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>