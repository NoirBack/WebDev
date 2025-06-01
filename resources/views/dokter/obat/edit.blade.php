<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Edit Obat
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                {{-- Validasi Error --}}
                @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        <strong>Ups!</strong> Ada kesalahan input.<br><br>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Form --}}
                <form action="{{ route('dokter.obat.update', $obat->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="nama_obat" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Nama Obat</label>
                        <input type="text" name="nama_obat" id="nama_obat" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('nama_obat', $obat->nama_obat) }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="kemasan" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Kemasan</label>
                        <input type="text" name="kemasan" id="kemasan" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('kemasan', $obat->kemasan) }}">
                    </div>

                    <div class="mb-4">
                        <label for="harga" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Harga (Rp)</label>
                        <input type="number" name="harga" id="harga" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('harga', $obat->harga) }}" required>
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('dokter.obat.index') }}" class="btn btn-secondary mr-2">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
