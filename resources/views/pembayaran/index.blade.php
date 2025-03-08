<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Pembayaran') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- <h1>Data Pembayaran</h1> -->
                    <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Tombol Tambah Warga -->
                    <div class="flex justify-between items-center mb-4">
                        <a href="{{ route('pembayaran.create') }}" class="btn-blue">
                            Tambah Kas
                        </a>
                        <!-- Form Pencarian -->
                        <form action="{{ route('pembayaran.index') }}" method="GET" class="flex items-center">
                            <input type="text" name="search" placeholder="Cari data pembayaran..." class="border p-2 rounded-l mr-2" value="{{ request('search') }}">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-r">
                                Cari
                            </button>
                        </form>
                    </div>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Tanggal Pembayaran</th>
                                <th class="px-4 py-2">Nominal</th>
                                <th class="px-4 py-2">Bulan Pembayaran</th>
                                <th class="px-4 py-2">Bukti Pembayaran</th>
                                <th class="px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pembayaran as $item)
                            <tr>
                                <td class="border px-4 py-2">{{ $item->tanggal_pembayaran }}</td>
                                <td class="border px-4 py-2">{{ $item->nominal }}</td>
                                <td class="border px-4 py-2">{{ $item->bulan }}</td>
                                <td class="border px-4 py-2">
                                    @if ($item->bukti_pembayaran)
                                        <img src="{{ asset('storage/' . $item->bukti_pembayaran) }}" alt="Bukti Pembayaran" class="w-20 h-20 object-cover">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('pembayaran.edit', $item->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">Edit</a>
                                    <form action="{{ route('pembayaran.destroy', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
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
</x-app-layout>