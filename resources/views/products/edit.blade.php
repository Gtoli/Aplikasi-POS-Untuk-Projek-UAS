<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">Manajemen Stok & Data Barang</h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl border border-gray-100 sm:rounded-2xl p-8">
                
                <div class="flex items-center space-x-3 mb-8 pb-4 border-b border-gray-100">
                    <div class="p-2.5 bg-amber-50 rounded-xl text-amber-500 shadow-inner">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 00-2 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-black text-gray-800">Edit Data: {{ $product->name }}</h3>
                        <p class="text-xs text-gray-400">Modifikasi harga master atau lakukan penambahan stok masuk secara instan</p>
                    </div>
                </div>

                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="md:col-span-2">
                            <label class="block text-xs font-semibold uppercase tracking-wider text-gray-600 mb-2">Kategori Barang</label>
                            <select name="category_id" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring focus:ring-blue-200 bg-gray-50/50 text-sm transition">
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-xs font-semibold uppercase tracking-wider text-gray-600 mb-2">Nama Produk / Barang</label>
                            <input type="text" name="name" value="{{ $product->name }}" required
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring focus:ring-blue-200 bg-gray-50/50 text-sm font-semibold transition">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-gray-600 mb-2">Harga Jual Baru (Rp)</label>
                            <input type="number" name="price" value="{{ (int)$product->price }}" required min="0"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring focus:ring-blue-200 bg-gray-50/50 text-sm text-blue-600 font-bold tracking-wide transition">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-gray-600 mb-2">Jumlah Stok Sekarang</label>
                            <input type="number" name="stock" value="{{ $product->stock }}" required min="0"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring focus:ring-blue-200 bg-gray-50/50 text-sm font-bold text-emerald-600 transition">
                            <p class="text-[11px] text-gray-400 mt-1.5 font-medium">*Ubah angka ini langsung jika ada stok barang baru masuk gudang.</p>
                        </div>
                    </div>

                    <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-100 mt-8">
                        <a href="{{ route('products.index') }}" class="px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-600 font-semibold text-sm rounded-xl transition">
                            Batal
                        </a>
                        <button type="submit" class="px-5 py-2.5 bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white font-extrabold text-sm rounded-xl shadow-md shadow-amber-500/20 transform hover:-translate-y-0.5 transition duration-150">
                            Perbarui Data & Stok
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>