<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Daftar Obat
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                {{-- Tombol Tambah --}}
                <div class="mb-4">
                    <a href="{{ route('dokter.obat.create') }}" class="btn btn-primary">
                        Tambah Obat
                    </a>
                </div>

                {{-- Flash Message --}}
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Tabel --}}
                <div class="table-responsive">
                    <table id="obatTable" class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Obat</th>
                                <th>Kemasan</th>
                                <th>Harga (Rp)</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($obats as $index => $obat)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $obat->nama_obat }}</td>
                                    <td>{{ $obat->kemasan }}</td>
                                    <td>{{ number_format($obat->harga, 0, ',', '.') }}</td>
                                    <td>
                                        <a href="{{ route('dokter.obat.edit', $obat->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('dokter.obat.destroy', $obat->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus obat ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    {{-- Inisialisasi DataTables --}}
    <script>
        $(document).ready(function () {
            $('#obatTable').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json'
                }
            });
        });
    </script>
</x-app-layout>
