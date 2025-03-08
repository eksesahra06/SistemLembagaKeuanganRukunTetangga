<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Data Warga') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <strong>No. Kartu Keluarga:</strong> {{ $keluarga->no_kk }}
                    </div>
                    <div class="mb-4">
                        <strong>Nama Kepala Keluarga:</strong> {{ $keluarga->nama_kepala_keluarga }}
                    </div>
                    <div class="mb-4">
                        <strong>NIK:</strong> {{ $keluarga->nik }}
                    </div>
                    <div class="mb-4">
                        <strong>Alamat:</strong> {{ $keluarga->alamat }}
                    </div>

                    <a href="{{ route('keluarga.edit', $keluarga->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Edit
                    </a>
                    <a href="{{ route('keluarga.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-2">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>