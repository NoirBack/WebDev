<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Riwayat Periksa') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            <div class="p-6 bg-white shadow sm:rounded-lg">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Daftar Janji Periksa</h3>

                <table class="table table-bordered table-striped w-full text-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Poliklinik</th>
                            <th>Dokter</th>
                            <th>Hari</th>
                            <th>Mulai</th>
                            <th>Selesai</th>
                            <th>Antrian</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($janjiPeriksas as $janjiPeriksa)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $janjiPeriksa->jadwalPeriksa->dokter->poli }}</td>
                                <td>{{ $janjiPeriksa->jadwalPeriksa->dokter->nama }}</td>
                                <td>{{ $janjiPeriksa->jadwalPeriksa->hari }}</td>
                                <td>{{ \Carbon\Carbon::parse($janjiPeriksa->jadwalPeriksa->jam_mulai)->format('H:i') }}</td>
                                <td>{{ \Carbon\Carbon::parse($janjiPeriksa->jadwalPeriksa->jam_selesai)->format('H:i') }}</td>
                                <td>{{ $janjiPeriksa->no_antrian }}</td>
                                <td>
                                    @if (is_null($janjiPeriksa->periksa))
                                        <span class="badge badge-warning">Belum</span>
                                    @else
                                        <span class="badge badge-success">Sudah</span>
                                    @endif
                                </td>
                                <td>
                                    @if (is_null($janjiPeriksa->periksa))
                                        <a href="{{ route('pasien.riwayat-periksa.detail', $janjiPeriksa->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    @else
                                        <a href="{{ route('pasien.riwayat-periksa.riwayat', $janjiPeriksa->id) }}" class="btn btn-secondary btn-sm">Riwayat</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
