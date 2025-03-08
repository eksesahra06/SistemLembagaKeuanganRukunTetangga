<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Warga') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('keluarga.update', $keluarga->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="no_kk" class="block text-gray-700 text-sm font-bold mb-2">
                                No. Kartu Keluarga
                            </label>
                            <input type="text" name="no_kk" id="no_kk" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $keluarga->no_kk }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="nama_kepala_keluarga" class="block text-gray-700 text-sm font-bold mb-2">
                                Nama Kepala Keluarga
                            </label>
                            <input type="text" name="nama_kepala_keluarga" id="nama_kepala_keluarga" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $keluarga->nama_kepala_keluarga }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="nik" class="block text-gray-700 text-sm font-bold mb-2">
                                NIK
                            </label>
                            <input type="text" name="nik" id="nik" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $keluarga->nik }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="alamat" class="block text-gray-700 text-sm font-bold mb-2">
                                Alamat
                            </label>
                            <textarea name="alamat" id="alamat" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $keluarga->alamat }}</textarea>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>