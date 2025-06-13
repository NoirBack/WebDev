<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Memeriksa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Periksa Pasien') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Isi form berikut untuk menyimpan hasil pemeriksaan pasien dan pilih obat.') }}
                            </p>
                        </header>

                        <form method="POST" action="{{ route('dokter.memeriksa.store', $janjiPeriksa->id) }}" class="mt-6">
                            @csrf

                            <div class="mb-3">
                                <label class="block text-sm font-medium text-gray-700">Nama</label>
                                <input type="text" class="form-control rounded" value="{{ $janjiPeriksa->pasien->nama }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="block text-sm font-medium text-gray-700">Tanggal Periksa</label>
                                <input type="datetime-local" name="tgl_periksa" class="form-control rounded" required>
                            </div>

                            <div class="mb-3">
                                <label class="block text-sm font-medium text-gray-700">Catatan</label>
                                <textarea name="catatan" class="form-control rounded" rows="3" placeholder="Catatan pemeriksaan" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="block text-sm font-medium text-gray-700">Obat</label>
                                <select name="obat[]" class="form-control rounded" multiple required>
                                    @foreach ($obats as $obat)
                                        <option value="{{ $obat->id }}">
                                            {{ $obat->nama_obat }} - {{ $obat->kemasan }} (Rp{{ number_format($obat->harga, 0, ',', '.') }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="block text-sm font-medium text-gray-700">Biaya Pemeriksaan</label>
                                <input type="number" name="biaya_periksa" value="150000" class="form-control rounded" readonly>
                            </div>

                            <div class="flex gap-3 mt-4">
                                <a href="{{ route('dokter.memeriksa.index') }}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
