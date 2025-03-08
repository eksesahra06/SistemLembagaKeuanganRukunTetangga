<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Pembayaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('pembayaran.update', $pembayaran->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="keluarga_id" class="block text-gray-700 text-sm font-bold mb-2">
                                Kepala Keluarga
                            </label>
                            <select name="keluarga_id" id="keluarga_id" class="block w-full bg-gray-100 text-gray-700 border border-gray-300 rounded-lg py-3 px-4 mb-3 focus:outline-none focus:bg-white focus:border-gray-500" required>
                                <option value="">Pilih Kepala Keluarga</option>
                                @foreach ($keluarga as $item)
                                <option value="{{ $item->id }}" {{ old('keluarga_id', $pembayaran->keluarga_id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_kepala_keluarga }} ({{ $item->no_kk }})
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="tanggal_pembayaran" class="block text-gray-700 text-sm font-bold mb-2">
                                Tanggal Pembayaran
                            </label>
                            <input type="date" name="tanggal_pembayaran" id="tanggal_pembayaran" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('tanggal_pembayaran', $pembayaran->tanggal_pembayaran) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="nominal" class="block text-gray-700 text-sm font-bold mb-2">
                                Nominal
                            </label>
                            <input type="number" name="nominal" id="nominal" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('nominal', $pembayaran->nominal) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="bulan" class="block text-gray-700 text-sm font-bold mb-2">
                                Bulan
                            </label>
                            <input type="text" name="bulan" id="bulan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('bulan', $pembayaran->bulan) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="bukti_pembayaran" class="block text-gray-700 text-sm font-bold mb-2">
                                Bukti Pembayaran (Opsional)
                            </label>
                            <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
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