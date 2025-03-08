<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Beranda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg">
                <div class="p-6 border-b border-gray-200">
                    <!-- Tombol Aksi -->
                    <div class="flex justify-between mb-4">
                        <a href="{{ route('keluarga.create') }}" 
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg"
                        >
                            Tambah Warga
                        </a>
                        <a href="{{ route('pembayaran.create') }}" 
                           class="bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg"
                        >
                            Tambah Kas
                        </a>
                        <a href="{{ route('pengeluaran.create') }}" 
                           class="bg-blue-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg"
                        >
                            Pakai Kas
                        </a>
                    </div>

                    <!-- Saldo Kas -->
                    <div class="flex justify-between items-center mb-4">
                        <h1 class="text-2xl font-bold text-gray-700">
                            Saldo Kas
                        </h1>
                        <h1 class="text-2xl font-bold text-gray-900">
                            {{ intval($totalKas) }}
                        </h1>
                    </div>

                    <!-- Total Pengeluaran -->
                    <div class="flex justify-between items-center mb-4">
                        <h1 class="text-2xl font-bold text-gray-700">
                            Total Pengeluaran
                        </h1>
                        <h1 class="text-2xl font-bold text-gray-900">
                            {{ $totalPengeluaran }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>