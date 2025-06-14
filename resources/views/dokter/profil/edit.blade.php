<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Profil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('dokter.profil.update') }}">
                    @csrf
                    @method('PATCH')

                    <!-- Nama -->
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Nama</label>
                        <input type="text" name="nama" value="{{ old('nama', $user->nama) }}"
                            class="form-input rounded-md shadow-sm mt-1 block w-full border-gray-300" required />
                    </div>

                    <!-- Alamat -->
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Alamat</label>
                        <input type="text" name="alamat" value="{{ old('alamat', $user->alamat) }}"
                            class="form-input rounded-md shadow-sm mt-1 block w-full border-gray-300" required />
                    </div>

                    <!-- No HP -->
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">No HP</label>
                        <input type="text" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}"
                            class="form-input rounded-md shadow-sm mt-1 block w-full border-gray-300" required />
                    </div>

                    <!-- Poli -->
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Poli</label>
                        <input type="text" name="poli" value="{{ old('poli', $user->poli) }}"
                            class="form-input rounded-md shadow-sm mt-1 block w-full border-gray-300" required />
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                            class="form-input rounded-md shadow-sm mt-1 block w-full border-gray-300" required />
                    </div>

                    <!-- Password Baru (Opsional) -->
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Password Baru</label>
                        <input type="password" name="password"
                            class="form-input rounded-md shadow-sm mt-1 block w-full border-gray-300" />
                        <small class="text-gray-500">Kosongkan jika tidak ingin mengganti password</small>
                    </div>

                    <div class="mt-6">
                        <button type="submit"
    class="bg-white text-black border border-gray-300 hover:bg-gray-100 font-semibold py-2 px-6 rounded shadow">
    Simpan Perubahan
</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
