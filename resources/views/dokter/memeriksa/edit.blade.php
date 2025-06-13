<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800"> {
            { __('Edit Pemeriksaan') }
            }
        </h2>
    </x-slot>
<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Perbarui Pemeriksaan Pasien') }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Ubah informasi hasil pemeriksaan dan daftar obat yang diberikan.') }}
                        </p>
                    </header>

                    <form method="POST" action="{{ route('dokter.memeriksa.update', $janjiPeriksa->periksa->id) }}" class="mt-6">
                        @csrf
                        @method('PATCH')

                        <!-- Nama Pasien -->
                        <div class="mb-3">
                            <label class="block text-sm font-medium text-gray-700">Nama</label>
                            <input type="text" class="form-control rounded bg-gray-100" value="{{ $janjiPeriksa->pasien->nama }}" readonly>
                        </div>

                        <!-- Tanggal Periksa -->
                        <div class="mb-3">
                            <label class="block text-sm font-medium text-gray-700">Tanggal Periksa</label>
                            <input type="datetime-local" name="tgl_periksa"
                                class="form-control rounded"
                                value="{{ \Carbon\Carbon::parse($janjiPeriksa->periksa->tgl_periksa)->format('Y-m-d\TH:i') }}" required>
                        </div>

                        <!-- Catatan -->
                        <div class="mb-3">
                            <label class="block text-sm font-medium text-gray-700">Catatan</label>
                            <textarea name="catatan" class="form-control rounded" rows="3" required>{{ $janjiPeriksa->periksa->catatan }}</textarea>
                        </div>

                        <!-- Obat -->
                        <div class="mb-3">
                            <label class="block text-sm font-medium text-gray-700">Obat</label>
                            <select name="obat[]" class="form-control rounded" multiple required>
                                @foreach ($obats as $obat)
                                    <option value="{{ $obat->id }}"
                                        @if ($janjiPeriksa->periksa->detailPeriksas->pluck('id_obat')->contains($obat->id)) selected @endif>
                                        {{ $obat->nama_obat }} - {{ $obat->kemasan }} (Rp{{ number_format($obat->harga, 0, ',', '.') }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Biaya Pemeriksaan (Tampilan saja) -->
                        <div class="mb-3">
                            <label class="block text-sm font-medium text-gray-700">Biaya Pemeriksaan (Tetap)</label>
                            <input type="text"
                                   class="form-control rounded bg-gray-100 text-gray-700"
                                   value="Rp150.000" readonly>
                            <p class="text-sm text-gray-500 mt-1">Biaya tetap ini akan otomatis ditambahkan ke total biaya di sistem.</p>
                        </div>

                        <!-- Tombol -->
                        <div class="flex gap-3 mt-4">
                            <a href="{{ route('dokter.memeriksa.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
