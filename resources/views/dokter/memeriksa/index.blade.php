<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Memeriksa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <section>
                    <header class="flex items-center justify-between">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Daftar Periksa Pasien') }}
                        </h2>
                    </header>

                    <table class="table mt-6 overflow-hidden rounded table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>No Urut</th>
                                <th>Nama Pasien</th>
                                <th>Keluhan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($janjiPeriksas as $janji)
                                <tr>
                                    <td>{{ $janji->no_antrian }}</td>
                                    <td>{{ $janji->pasien->nama }}</td>
                                    <td>{{ $janji->keluhan }}</td>
                                    <td>
                                        @if (is_null($janji->periksa))
                                            <a href="{{ route('dokter.memeriksa.periksa', $janji->id) }}"
                                               class="btn btn-primary btn-sm">Periksa</a>
                                        @else
                                            <a href="{{ route('dokter.memeriksa.edit', $janji->id) }}"
                                               class="btn btn-secondary btn-sm">Edit</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
