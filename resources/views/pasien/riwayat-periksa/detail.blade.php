<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Detail Janji Periksa</h2>
    </x-slot>

    <div class="p-6 max-w-3xl mx-auto bg-white rounded shadow">
        <ul class="list-group space-y-2">
            <li><strong>Poliklinik:</strong> {{ $janjiPeriksa->jadwalPeriksa->dokter->poli }}</li>
            <li><strong>Nama Dokter:</strong> {{ $janjiPeriksa->jadwalPeriksa->dokter->nama }}</li>
            <li><strong>Hari:</strong> {{ $janjiPeriksa->jadwalPeriksa->hari }}</li>
            <li><strong>Jam Mulai:</strong> {{ \Carbon\Carbon::parse($janjiPeriksa->jadwalPeriksa->jam_mulai)->format('H:i') }}</li>
            <li><strong>Jam Selesai:</strong> {{ \Carbon\Carbon::parse($janjiPeriksa->jadwalPeriksa->jam_selesai)->format('H:i') }}</li>
            <li><strong>Keluhan:</strong> {{ $janjiPeriksa->keluhan }}</li>
            <li><strong>No Antrian:</strong> {{ $janjiPeriksa->no_antrian }}</li>
        </ul>
    </div>
</x-app-layout>
