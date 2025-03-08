<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Kas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="keluarga_id" class="block text-gray-700 text-sm font-bold mb-2">
                                Kepala Keluarga
                            </label>
                            <select name="keluarga_id" id="keluarga_id" class="block w-full bg-gray-100 text-gray-700 border border-gray-300 rounded-lg py-3 px-4 mb-3 focus:outline-none focus:bg-white focus:border-gray-500" required>
                                <option value="">Pilih Kepala Keluarga</option>
                                @foreach ($keluarga as $item)
                                    <option value="{{ $item->id }}" {{ old('keluarga_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama_kepala_keluarga }} ({{ $item->no_kk }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="tanggal_pembayaran" class="block text-gray-700 text-sm font-bold mb-2">
                                Tanggal Pembayaran
                            </label>
                            <input type="date" name="tanggal_pembayaran" id="tanggal_pembayaran" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('tanggal_pembayaran') }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="nominal" class="block text-gray-700 text-sm font-bold mb-2">
                                Nominal
                            </label>
                            <input type="number" name="nominal" id="nominal" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('nominal') }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="bulan" class="block text-gray-700 text-sm font-bold mb-2">
                                Bulan Pembayaran
                            </label>
                            <select name="bulan[]" id="bulan" class="block w-full bg-gray-100 text-gray-700 border border-gray-300 rounded-lg py-3 px-4 mb-3 focus:outline-none focus:bg-white focus:border-gray-500" multiple required style="min-height: 150px;">
                                <option value="Januari">Januari</option>
                                <option value="Februari">Februari</option>
                                <option value="Maret">Maret</option>
                                <option value="April">April</option>
                                <option value="Mei">Mei</option>
                                <option value="Juni">Juni</option>
                                <option value="Juli">Juli</option>
                                <option value="Agustus">Agustus</option>
                                <option value="September">September</option>
                                <option value="Oktober">Oktober</option>
                                <option value="November">November</option>
                                <option value="Desember">Desember</option>
                            </select>
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

    <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
        const bulanSelect = document.getElementById('bulan');
        
        bulanSelect.addEventListener('change', function() {
            const selectedOptions = Array.from(bulanSelect.selectedOptions);
            const uniqueValues = new Set(selectedOptions.map(option => option.value));
            
            if (uniqueValues.size < selectedOptions.length) {
                alert('Anda tidak dapat memilih bulan yang sama lebih dari sekali.');
                // Reset pilihan yang tidak valid
                for (let option of bulanSelect.options) {
                    option.selected = false; // Deselect all options
                }
                // Pilih kembali bulan yang valid
                selectedOptions.forEach(option => {
                    if (uniqueValues.has(option.value)) {
                        option.selected = true;
                    }
                });
            }
        });
    });
    </script> -->
</x-app-layout>