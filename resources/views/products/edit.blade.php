<x-app-layout>
    <x-slot name="header">Edit Produk & Tambah Stok</x-slot>
    <div class="p-6 text-gray-900 max-w-7xl mx-auto">
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Kategori</label>
                <select name="category_id" class="border p-2 w-full" required>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Nama Produk</label>
                <input type="text" name="name" value="{{ $product->name }}" class="border p-2 w-full" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Harga</label>
                <input type="number" name="price" value="{{ (int)$product->price }}" class="border p-2 w-full" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Jumlah Stok Sekarang</label>
                <input type="number" name="stock" value="{{ $product->stock }}" class="border p-2 w-full" required>
                <p class="text-xs text-gray-500 mt-1">*Ubah angka ini langsung untuk menambah atau mengurangi stok gudang.</p>
            </div>

            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Perbarui Data</button>
            <a href="{{ route('products.index') }}" class="ml-2 text-gray-600">Batal</a>
        </form>
    </div>
</x-app-layout>