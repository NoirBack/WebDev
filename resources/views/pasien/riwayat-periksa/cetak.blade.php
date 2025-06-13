<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-black dark:text-white">
            Cetak Bukti Pemeriksaan
        </h2>
    </x-slot>

    <div class="p-6 pt-12 bg-white text-black max-w-5xl mx-auto relative z-10">
        {{-- Tombol Cetak --}}
        <div class="flex justify-end mb-4 no-print z-20">
            <button onclick="window.print()"
                class="p-2 rounded-full bg-blue-600 hover:bg-blue-700 text-white shadow"
                title="Cetak">
                {{-- Ikon printer --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M6 9V2h12v7M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2m-4 0h-4v4h4v-4z" />
                </svg>
            </button>
        </div>

        {{-- Data Pemeriksaan --}}
        @foreach ($riwayats as $riwayat)
            <div class="mb-8 border-b pb-4">
                <h3 class="text-lg font-bold mb-2">Pemeriksaan #{{ $loop->iteration }}</h3>
                <ul class="text-sm space-y-1">
                    <li><strong>Dokter:</strong> {{ $riwayat->jadwalPeriksa->dokter->nama }}</li>
                    <li><strong>Poliklinik:</strong> {{ $riwayat->jadwalPeriksa->dokter->poli }}</li>
                    <li><strong>Tanggal Periksa:</strong> {{ $riwayat->periksa->tgl_periksa->translatedFormat('d F Y H:i') }}</li>
                    <li><strong>Keluhan:</strong> {{ $riwayat->keluhan }}</li>
                    <li><strong>Catatan Dokter:</strong> {{ $riwayat->periksa->catatan ?? '-' }}</li>
                    <li><strong>Biaya:</strong> Rp {{ number_format($riwayat->periksa->biaya_periksa, 0, ',', '.') }}</li>
                    <li><strong>Obat Diresepkan:</strong>
                        @if ($riwayat->periksa->detailPeriksas->count())
                            <ul class="list-disc list-inside mt-1">
                                @foreach ($riwayat->periksa->detailPeriksas as $detail)
                                    <li>{{ $detail->obat->nama_obat }} - {{ $detail->obat->kemasan }}</li>
                                @endforeach
                            </ul>
                        @else
                            <span class="text-gray-500">Tidak ada</span>
                        @endif
                    </li>
                </ul>
            </div>
        @endforeach

        @if ($riwayats->isEmpty())
            <p class="text-center text-gray-500">Belum ada riwayat pemeriksaan yang bisa dicetak.</p>
        @endif
    </div>
</x-app-layout>
