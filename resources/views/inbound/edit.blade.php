<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">Koreksi Data Inbound</h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl border border-gray-100 sm:rounded-2xl p-8">
                
                <div class="flex items-center space-x-3 mb-6">
                    <div class="p-2.5 bg-amber-50 rounded-xl text-amber-500 shadow-inner">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-black text-gray-800">Edit Log Barang Masuk</h3>
                        <p class="text-xs text-gray-400">Mengubah data ini akan otomatis mengoreksi jumlah stok barang di gudang asal.</p>
                    </div>
                </div>

                <form action="{{ route('inbound.update', $inbound->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1.5">Nama Produk</label>
                        <select name="product_id" required class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm bg-gray-50/50">
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ $inbound->product_id == $product->id ? 'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1.5">Jumlah Masuk (Qty)</label>
                        <input type="number" name="qty" value="{{ $inbound->qty }}" required min="1" class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm bg-gray-50/50 font-bold">
                    </div>

                    <div class="mb-4">
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1.5">Harga dari Supplier (Rp)</label>
                        <input type="number" name="supplier_price" value="{{ (int)$inbound->supplier_price }}" required min="0" class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm bg-gray-50/50 text-red-600 font-bold">
                    </div>

                    <div class="mb-6">
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1.5">Tanggal Masuk</label>
                        <input type="date" name="date" value="{{ $inbound->date }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm bg-gray-50/50">
                    </div>

                    <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-100">
                        <a href="{{ route('inbound.index') }}" class="px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-600 font-semibold text-sm rounded-xl transition">
                            Batal
                        </a>
                        <button type="submit" class="px-5 py-2.5 bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white font-extrabold text-sm rounded-xl shadow-md shadow-amber-500/20 transform hover:-translate-y-0.5 transition">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>