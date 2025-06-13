<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Riwayat Pemeriksaan</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto p-6 space-y-6 bg-white shadow rounded">
        <div>
            <h3 class="font-semibold text-lg mb-2">Informasi Pemeriksaan</h3>
            <p><strong>Tanggal:</strong> {{ $riwayat->tgl_periksa->translatedFormat('d F Y H:i') }}</p>
            <p><strong>Catatan:</strong> {{ $riwayat->catatan ?: '-' }}</p>
        </div>

        <div>
            <h3 class="font-semibold text-lg mb-2">Obat Diresepkan</h3>
            @if ($riwayat->detailPeriksas->count())
                <ul class="list-disc pl-4">
                    @foreach ($riwayat->detailPeriksas as $detail)
                        <li>{{ $detail->obat->nama_obat }} - {{ $detail->obat->kemasan }}</li>
                    @endforeach
                </ul>
            @else
                <p class="text-sm text-gray-600">Tidak ada obat yang diresepkan.</p>
            @endif
        </div>

        <div>
            <h3 class="font-semibold text-lg mb-2">Biaya Pemeriksaan</h3>
            <p class="text-xl font-bold text-primary">Rp {{ number_format($riwayat->biaya_periksa, 0, ',', '.') }}</p>
        </div>
    </div>
</x-app-layout>
