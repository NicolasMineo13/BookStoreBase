<x-guest-layout>
    <style>
        .input_white {
            background-color: #fff;
            color: black !important;
        }
    </style>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label style="color: black" for="name" :value="__('Nom')" />
            <x-text-input id="name" class="block mt-1 w-full input_white" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label style="color: black" for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full input_white" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label style="color: black" for="password" :value="__('Mot de passe')" />

            <x-text-input id="password" class="block mt-1 w-full input_white" type="password" name="password" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label style="color: black" for="password_confirmation" :value="__('Confirmer le mot de passe')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full input_white" type="password" name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Déjà inscrit?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('S\'inscrire') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>