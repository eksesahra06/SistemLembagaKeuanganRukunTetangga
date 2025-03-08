<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Pengeluaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-4">
                        <a href="{{ route('pengeluaran.create') }}" class="btn-blue">
                            Tambah Pengeluaran
                        </a>
                        <!-- Form Pencarian -->
                        <form action="{{ route('pengeluaran.index') }}" method="GET" class="flex items-center">
                            <input type="text" name="search" placeholder="Cari data pengeluaran..." class="border p-2 rounded-l mr-2" value="{{ request('search') }}">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-r">
                                Cari
                            </button>
                        </form>
                    </div>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Tanggal Pengeluaran</th>
                                <th class="px-4 py-2">Nominal</th>
                                <th class="px-4 py-2">Tujuan</th>
                                <th class="px-4 py-2">Bukti Pengeluaran</th>
                                <th class="px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($pengeluaran->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data pengeluaran.</td>
                                </tr>
                            @else
                                @foreach ($pengeluaran as $item)
                                <tr>
                                    <td class="border px-4 py-2">{{ $item->tanggal_pengeluaran }}</td>
                                    <td class="border px-4 py-2">{{ $item->nominal }}</td>
                                    <td class="border px-4 py-2">{{ $item->tujuan }}</td>
                                    <td class="border px-4 py-2">
                                        @if ($item->bukti_pengeluaran)
                                            <img src="{{ asset('storage/' . $item->bukti_pengeluaran) }}" alt="Bukti Pengeluaran" class="w-20 h-20 object-cover">
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('pengeluaran.edit', $item->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">Edit</a>
                                        <form action="{{ route('pengeluaran.destroy', $item->id) }}" method="POST" style="display:inline;">
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