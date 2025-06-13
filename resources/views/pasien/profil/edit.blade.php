<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            {{ __('Edit Profil Pasien') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto">
        @if (session('status'))
            <div class="mb-4 text-green-600 font-medium">
                {{ session('status') }}
            </div>
        @endif

        <div class="bg-white shadow rounded p-6">
            <form method="POST" action="{{ route('pasien.profil.update') }}">
                @csrf
                @method('PATCH')

                <!-- Nama -->
                <div class="mb-4">
                    <x-input-label for="nama" :value="__('Nama Lengkap')" />
                    <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full"
                        value="{{ old('nama', $user->nama) }}" required autofocus />
                    <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                        value="{{ old('email', $user->email) }}" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Alamat -->
                <div class="mb-4">
                    <x-input-label for="alamat" :value="__('Alamat')" />
                    <x-text-input id="alamat" name="alamat" type="text" class="mt-1 block w-full"
                        value="{{ old('alamat', $user->alamat) }}" required />
                    <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                </div>

                <!-- No HP -->
                <div class="mb-4">
                    <x-input-label for="no_hp" :value="__('No. HP')" />
                    <x-text-input id="no_hp" name="no_hp" type="text" class="mt-1 block w-full"
                        value="{{ old('no_hp', $user->no_hp) }}" required />
                    <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
                </div>

                <!-- No KTP -->
                <div class="mb-4">
                    <x-input-label for="no_ktp" :value="__('No. KTP')" />
                    <x-text-input id="no_ktp" name="no_ktp" type="text" class="mt-1 block w-full"
                        value="{{ old('no_ktp', $user->no_ktp) }}" required />
                    <x-input-error :messages="$errors->get('no_ktp')" class="mt-2" />
                </div>

                <!-- Password Baru -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password Baru (opsional)')" />
                    <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Konfirmasi Password -->
                <div class="mb-4">
                    <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
                    <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                        class="mt-1 block w-full" />
                </div>

                <div class="flex justify-end">
                    <x-primary-button>
                        {{ __('Simpan Perubahan') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
