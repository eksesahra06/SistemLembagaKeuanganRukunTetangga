<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Warga') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Tombol Tambah Warga -->
                    <div class="flex justify-between items-center mb-4">
                    <a href="{{ route('keluarga.create') }}" class="btn-blue">
                        Tambah Data Warga
                    </a>

                        <!-- Form Pencarian -->
                        <form action="{{ route('keluarga.index') }}" method="GET" class="flex items-center">
                            <input type="text" name="search" placeholder="Cari data warga..." class="border p-2 rounded-l mr-2" value="{{ request('search') }}">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-r">
                                Cari
                            </button>
                        </form>
                    </div>

                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">No. Kartu Keluarga</th>
                                <th class="px-4 py-2">Nama Kepala Keluarga</th>
                                <th class="px-4 py-2">NIK</th>
                                <th class="px-4 py-2">Alamat</th>
                                <th class="px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($keluarga->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data warga.</td>
                                </tr>
                            @else
                                @foreach ($keluarga as $item)
                                <tr>
                                    <td class="border px-4 py-2">{{ $item->no_kk }}</td>
                                    <td class="border px-4 py-2">{{ $item->nama_kepala_keluarga }}</td>
                                    <td class="border px-4 py-2">{{ $item->nik }}</td>
                                    <td class="border px-4 py-2 whitespace-normal break-words max-w-xs">{{ $item->alamat }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('keluarga.show', $item->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Detail</a>
                                        <a href="{{ route('keluarga.edit', $item->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded ml-2">Edit</a>
                                        <form action="{{ route('keluarga.destroy', $item->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>