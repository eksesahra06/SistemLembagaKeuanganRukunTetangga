<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Pengeluaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('pengeluaran.update', $pengeluaran->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="tanggal_pengeluaran" class="block text-gray-700 text-sm font-bold mb-2">
                                Tanggal Pengeluaran
                            </label>
                            <input type="date" name="tanggal_pengeluaran" id="tanggal_pengeluaran" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('tanggal_pengeluaran', $pengeluaran->tanggal_pengeluaran) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="nominal" class="block text-gray-700 text-sm font-bold mb-2">
                                Nominal
                            </label>
                            <input type="number" name="nominal" id="nominal" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('nominal', $pengeluaran->nominal) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="tujuan" class="block text-gray-700 text-sm font-bold mb-2">
                                Tujuan
                            </label>
                            <input type="text" name="tujuan" id="tujuan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('tujuan', $pengeluaran->tujuan) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="bukti_pengeluaran" class="block text-gray-700 text-sm font-bold mb-2">
                                Bukti Pengeluaran (Opsional)
                            </label>
                            <input type="file" name="bukti_pengeluaran" id="bukti_pengeluaran" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
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