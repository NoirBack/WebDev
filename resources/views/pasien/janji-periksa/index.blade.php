<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Janji Periksa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Form Buat Janji -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Buat Janji Periksa') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Atur jadwal pertemuan dengan dokter untuk mendapatkan layanan konsultasi dan pemeriksaan kesehatan sesuai kebutuhan Anda.') }}
                            </p>
                        </header>

                        <form class="mt-6" action="{{ route('pasien.janji-periksa.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="no_rm">Nomor Rekam Medis</label>
                                <input type="text" id="no_rm" class="form-control rounded w-full" value="{{ $no_rm }}" readonly>
                            </div>

                            <div class="mb-4">
                                <label for="dokterSelect">Dokter</label>
                                <select class="form-control w-full" name="id_dokter" id="dokterSelect" required>
                                    <option value="">Pilih Dokter</option>
                                    @foreach ($dokters as $dokter)
                                        @foreach ($dokter->jadwalPeriksas as $jadwal)
                                            <option value="{{ $dokter->id }}">
                                                {{ $dokter->nama }} - Spesialis {{ $dokter->poli }} | {{ $jadwal->hari }},
                                                {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} -
                                                {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}
                                            </option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="keluhan">Keluhan</label>
                                <textarea class="form-control w-full" name="keluhan" id="keluhan" rows="3" required></textarea>
                            </div>

                            <div class="flex items-center gap-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                @if (session('status') === 'janji-periksa-created')
                                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                       class="text-sm text-gray-600">{{ __('Berhasil Dibuat.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>
                </div>
            </div>

            <!-- Tabel Riwayat Janji -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Riwayat Janji Periksa') }}
                        </h2>
                    </header>

                    <div class="overflow-x-auto mt-6">
                        <table class="table-auto w-full border text-sm">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2">No</th>
                                    <th class="px-4 py-2">Poliklinik</th>
                                    <th class="px-4 py-2">Dokter</th>
                                    <th class="px-4 py-2">Hari</th>
                                    <th class="px-4 py-2">Mulai</th>
                                    <th class="px-4 py-2">Selesai</th>
                                    <th class="px-4 py-2">Antrian</th>
                                    <th class="px-4 py-2">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($janjiPeriksas as $janjiPeriksa)
                                    <tr class="border-t">
                                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-2">{{ $janjiPeriksa->jadwalPeriksa->dokter->poli }}</td>
                                        <td class="px-4 py-2">{{ $janjiPeriksa->jadwalPeriksa->dokter->nama }}</td>
                                        <td class="px-4 py-2">{{ $janjiPeriksa->jadwalPeriksa->hari }}</td>
                                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($janjiPeriksa->jadwalPeriksa->jam_mulai)->format('H:i') }}</td>
                                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($janjiPeriksa->jadwalPeriksa->jam_selesai)->format('H:i') }}</td>
                                        <td class="px-4 py-2">{{ $janjiPeriksa->no_antrian }}</td>
                                        <td class="px-4 py-2">
                                            @if (is_null($janjiPeriksa->periksa))
                                                <span class="text-yellow-600 font-semibold">Belum Diperiksa</span>
                                            @else
                                                <span class="text-green-600 font-semibold">Sudah Diperiksa</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
