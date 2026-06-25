<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Ringkasan') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 overflow-hidden shadow-xl sm:rounded-2xl p-8 mb-8 text-white relative">
                <div class="relative z-10">
                    <h3 class="text-2xl font-black">Selamat Datang Kembali, {{ auth()->user()->name }}! ⚡</h3>
                    <p class="text-blue-100 mt-2 max-w-xl">Aplikasi Point of Sales Anda siap digunakan. Pantau stok barang, lakukan transaksi kasir cepat, dan cetak struk thermal secara real-time.</p>
                </div>
                <div class="absolute right-0 bottom-0 top-0 opacity-10 w-1/3 flex items-center justify-center">
                    <svg class="w-40 h-40" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1h8V6a4 4 0 00-4-4zm3 5V6a3 3 0 10-6 0v1H3a1 1 0 00-1 1v9a2 2 0 002 2h12a2 2 0 002-2V8a1 1 0 00-1-1h-3zM5 9a1 1 0 100 2 1 1 0 000-2zm10 1a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd"></path></svg>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <a href="{{ route('categories.index') }}" class="group bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300 flex items-center space-x-4">
                    <div class="p-4 bg-emerald-50 rounded-xl text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 text-lg group-hover:text-blue-600 transition">Kelola Kategori</h4>
                        <p class="text-sm text-gray-500 mt-0.5">Atur pengelompokan barang master.</p>
                    </div>
                </a>

                <a href="{{ route('products.index') }}" class="group bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300 flex items-center space-x-4">
                    <div class="p-4 bg-blue-50 rounded-xl text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 11m8 4V4"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 text-lg group-hover:text-blue-600 transition">Stok Barang</h4>
                        <p class="text-sm text-gray-500 mt-0.5">Tambah produk dan modifikasi stok.</p>
                    </div>
                </a>

                <a href="{{ route('pos.index') }}" class="group bg-gradient-to-br from-indigo-500 to-purple-600 p-6 rounded-2xl shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300 flex items-center space-x-4 text-white">
                    <div class="p-4 bg-white/20 rounded-xl text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-lg">Buka Mesin Kasir</h4>
                        <p class="text-sm text-indigo-100 mt-0.5">Mulai transaksi penjualan baru.</p>
                    </div>
                </a>

            </div>

        </div>
    </div>
</x-app-layout>