<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Penjualan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <!-- Toolbar: Tombol Tambah (Kiri) & Pencarian/Filter (Kanan) -->
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                        
                        <!-- Kiri: Tombol Tambah -->
                        <div>
                            <a href="{{ route('penjualan.create') }}" 
                               class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg flex items-center gap-2 transition duration-150 shadow-sm">
                                <span>➕</span> Tambah Faktur
                            </a>
                        </div>

                        <!-- Kanan: Filter & Pencarian -->
                        <form action="{{ route('penjualan.index') }}" method="GET" class="flex flex-col sm:flex-row gap-2 w-full md:w-auto">

                            <!-- Filter Tanggal -->
                            <div class="relative">
                                <div class="relative">
                                    <!-- Icon Kalender -->
                                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-500 pointer-events-none"
                                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M8 7V3m8 4V3m-9 4h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>

                                    <select name="tanggal" id="tanggalFilter"
                                        class="pl-9 pr-8 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm text-sm">
                                        <option value="">Tanggal Faktur</option>
                                        <option value="semua">Semua Tanggal</option>
                                        <option value="tertentu">Pilih Tanggal</option>
                                    </select>
                                </div>

                                <!-- Popup Range Tanggal -->
                                <div id="rangeTanggal"
                                    class="hidden absolute z-50 top-full left-0 mt-2 w-72 p-4 bg-white dark:bg-gray-800 rounded-xl shadow-xl border border-gray-200 dark:border-gray-700">

                                    <div class="mb-3">
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                            Dari Tanggal
                                        </label>

                                        <input type="date" name="tanggal_dari"
                                            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-lg shadow-sm text-sm">
                                    </div>

                                    <div class="mb-4">
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                            Sampai Tanggal
                                        </label>

                                        <input type="date" name="tanggal_sampai"
                                            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-lg shadow-sm text-sm">
                                    </div>

                                    <button type="button" id="tutupTanggal"
                                        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg text-sm font-semibold transition">
                                        Terapkan
                                    </button>
                                </div>
                            </div>

                            <!-- Filter Status Pembayaran -->
                            <div class="relative">
                                <!-- Icon Pembayaran -->
                                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-500 pointer-events-none"
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M17 9V7a5 5 0 00-10 0v2m-2 0h14l-1 10H6L5 9z"/>
                                </svg>

                                <select name="status"
                                    class="pl-9 pr-8 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm text-sm">
                                    <option value="">Status Pembayaran</option>
                                    <option value="belum_bayar">Belum Bayar</option>
                                    <option value="lunas">Lunas</option>
                                </select>
                            </div>

                            <!-- Input Pencarian -->
                            <div class="relative w-full sm:w-64">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <span class="text-gray-500">🔍</span>
                                </div>
                                <input type="text" name="search" placeholder="Ketik pencarian..." 
                                       class="pl-9 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm text-sm">
                            </div>

                            <!-- Tombol Cari -->
                            <button type="submit" class="bg-gray-800 dark:bg-gray-200 text-white dark:text-gray-800 font-semibold py-2 px-4 rounded-lg hover:bg-gray-700 dark:hover:bg-white transition text-sm shadow-sm">
                                Cari
                            </button>
                        </form>

                    </div>

                    <!-- Tabel Data -->
                    <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-300">
                                <tr>
                                    <th scope="col" class="px-6 py-3">No Faktur</th>
                                    <th scope="col" class="px-6 py-3">Tanggal Faktur</th>
                                    <th scope="col" class="px-6 py-3">Pelanggan</th>
                                    <th scope="col" class="px-6 py-3">Keterangan</th>
                                    <th scope="col" class="px-6 py-3 text-center">Status</th>
                                    <th scope="col" class="px-6 py-3 text-center">Umur Nota</th>
                                    <th scope="col" class="px-6 py-3 text-right">Total Faktur</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Nanti datanya di-looping di sini --}}
                                
                                {{-- Contoh Baris 1: Belum Bayar --}}
                                <tr onclick="window.location='{{ route('penjualan.edit', 1) }}'" 
                                    class="cursor-pointer bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-blue-50 dark:hover:bg-gray-600 transition duration-150 group">
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white group-hover:text-blue-600">INV-2609-001</td>
                                    <td class="px-6 py-4">10 Sept 2026</td>
                                    <td class="px-6 py-4 font-medium">CV. Pande Sejahtera</td>
                                    <td class="px-6 py-4 text-gray-500 truncate max-w-xs">Pengiriman batch pertama proyek konstruksi</td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="px-3 py-1 bg-red-100 text-red-700 dark:bg-red-900/50 dark:text-red-400 rounded-full text-xs font-bold tracking-wide">
                                            Belum Bayar
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center text-red-600 font-semibold">7 Hari</td>
                                    <td class="px-6 py-4 text-right font-bold text-gray-900 dark:text-white">Rp 5.500.000</td>
                                </tr>

                                {{-- Contoh Baris 2: Sudah Bayar --}}
                                <tr onclick="window.location='{{ route('penjualan.edit', 2) }}'" 
                                    class="cursor-pointer bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-blue-50 dark:hover:bg-gray-600 transition duration-150 group">
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white group-hover:text-blue-600">INV-2609-002</td>
                                    <td class="px-6 py-4">15 Sept 2026</td>
                                    <td class="px-6 py-4 font-medium">Toko Bangunan Makmur</td>
                                    <td class="px-6 py-4 text-gray-500 truncate max-w-xs">Pembelian sekop rutin</td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="px-3 py-1 bg-green-100 text-green-700 dark:bg-green-900/50 dark:text-green-400 rounded-full text-xs font-bold tracking-wide">
                                            Sudah Bayar
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center text-gray-500">-</td>
                                    <td class="px-6 py-4 text-right font-bold text-gray-900 dark:text-white">Rp 1.250.000</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination Info (Opsional) -->
                    <div class="mt-4 text-sm text-gray-500 dark:text-gray-400">
                        Menampilkan 2 dari 2 faktur
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        const tanggalFilter = document.getElementById('tanggalFilter');
        const rangeTanggal = document.getElementById('rangeTanggal');
        const tutupTanggal = document.getElementById('tutupTanggal');

        tanggalFilter.addEventListener('change', function () {
            if (this.value === 'tertentu') {
                rangeTanggal.classList.remove('hidden');
            } else {
                rangeTanggal.classList.add('hidden');
            }
        });

        tutupTanggal.addEventListener('click', function () {
            rangeTanggal.classList.add('hidden');
        });
    </script>

</x-app-layout>