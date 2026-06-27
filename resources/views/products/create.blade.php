<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">Tambah Produk Baru</h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl border border-gray-100 sm:rounded-2xl p-8">
                
                <div class="flex items-center space-x-3 mb-8 pb-4 border-b border-gray-100">
                    <div class="p-2.5 bg-blue-50 rounded-xl text-blue-600 shadow-inner">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 11m8 4V4"></path></svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-black text-gray-800">Informasi Master Barang</h3>
                        <p class="text-xs text-gray-400">Isi data harga master dan jumlah stok awal gudang</p>
                    </div>
                </div>

                <form action="{{ route('products.store') }}" method="POST">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="md:col-span-2">
                            <label class="block text-xs font-semibold uppercase tracking-wider text-gray-600 mb-2">Pilih Kategori Barang</label>
                            <select name="category_id" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring focus:ring-blue-200 bg-gray-50/50 text-sm transition">
                                <option value="" disabled selected>-- Pilih Kategori Ritel --</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-xs font-semibold uppercase tracking-wider text-gray-600 mb-2">Nama Produk / Barang</label>
                            <input type="text" name="name" placeholder="Masukkan nama item barang" required
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring focus:ring-blue-200 bg-gray-50/50 text-sm transition">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-gray-600 mb-2">Harga Jual (Rp)</label>
                            <input type="number" name="price" placeholder="Contoh: 15000" required min="0"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring focus:ring-blue-200 bg-gray-50/50 text-sm text-blue-600 font-bold tracking-wide transition">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-gray-600 mb-2">Stok Awal Gudang</label>
                            <input type="number" name="stock" placeholder="Contoh: 50" required min="0"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring focus:ring-blue-200 bg-gray-50/50 text-sm font-bold transition">
                        </div>
                    </div>

                    <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-100 mt-8">
                        <a href="{{ route('products.index') }}" class="px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-600 font-semibold text-sm rounded-xl transition">
                            Batal
                        </a>
                        <button type="submit" class="px-5 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-extrabold text-sm rounded-xl shadow-md shadow-blue-500/20 transform hover:-translate-y-0.5 transition duration-150">
                            Simpan Produk
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>