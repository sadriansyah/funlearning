<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="nim_nip" value="{{ __('Nim/NIP') }}" />
                <x-jet-input id="nim_nip" class="block mt-1 w-full" type="text" name="nim_nip" :value="old('nim_nip')" required autofocus autocomplete="name" />
            </div>
            <div>
                <x-jet-label for="nama_user" value="{{ __('Nama') }}" />
                <x-jet-input id="nama_user" class="block mt-1 w-full" type="text" name="nama_user" :value="old('nama_user')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="hak_akses" value="{{ __('Hak Akses') }}" />
                <x-jet-input id="hakakses" class="block mt-1 w-full" type="text" name="hak_akses" :value="old('hak_akses')" required />
            </div>
            <div class="mt-4">
                <x-jet-label for="jumlah_poin" value="{{ __('Jumlah Poin') }}" />
                <x-jet-input id="jumlah_poin" class="block mt-1 w-full" type="text" name="jumlah_poin" :value="old('jumlah_poin')" required />
            </div>
            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
