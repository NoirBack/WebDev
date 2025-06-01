<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Jadwal Periksa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <div class="flex justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Daftar Jadwal Periksa</h3>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createJadwalModal">
                        Tambah Jadwal Periksa
                    </button>
                </div>

                @if (session('status') === 'jadwal-periksa-created')
                    <div class="alert alert-success">Jadwal berhasil ditambahkan.</div>
                @elseif (session('status') === 'jadwal-periksa-updated')
                    <div class="alert alert-info">Status jadwal berhasil diperbarui.</div>
                @elseif (session('status') === 'jadwal-periksa-exists')
                    <div class="alert alert-warning">Jadwal sudah ada sebelumnya.</div>
                @endif

                <!-- Tambahkan ID untuk DataTables -->
                <table id="jadwalTable" class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Hari</th>
                            <th>Mulai</th>
                            <th>Selesai</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwalPeriksas as $jadwal)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $jadwal->hari }}</td>
                                <td>{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }}</td>
                                <td>{{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</td>
                                <td>
                                    @if ($jadwal->status)
                                        <span class="badge badge-success">Aktif</span>
                                    @else
                                        <span class="badge badge-danger">Tidak Aktif</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('dokter.jadwal-periksa.update', $jadwal->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        @if (!$jadwal->status)
                                            <button type="submit" class="btn btn-success btn-sm">Aktifkan</button>
                                        @else
                                            <button type="submit" class="btn btn-danger btn-sm">Nonaktifkan</button>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Modal Bootstrap -->
                <div class="modal fade" id="createJadwalModal" tabindex="-1" role="dialog" aria-labelledby="createJadwalModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form method="POST" action="{{ route('dokter.jadwal-periksa.store') }}">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createJadwalModalLabel">Tambah Jadwal Periksa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="hari">Hari</label>
                                        <select name="hari" class="form-control" required>
                                            <option value="">Pilih Hari</option>
                                            <option>Senin</option>
                                            <option>Selasa</option>
                                            <option>Rabu</option>
                                            <option>Kamis</option>
                                            <option>Jumat</option>
                                            <option>Sabtu</option>
                                            <option>Minggu</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="jam_mulai">Jam Mulai</label>
                                        <input type="time" name="jam_mulai" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jam_selesai">Jam Selesai</label>
                                        <input type="time" name="jam_selesai" class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
