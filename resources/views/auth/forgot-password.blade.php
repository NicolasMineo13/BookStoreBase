<x-guest-layout>
    <style>
        .input_white {
            background-color: #fff;
            color: black !important;
        }
    </style>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Vous avez oublié votre mot de passe? Pas de problèmes. Entrez votre email et nous vous enverrons un lien pour que vous puissiez changer votre mot de passe') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full input_white" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Envoyer le mail') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>