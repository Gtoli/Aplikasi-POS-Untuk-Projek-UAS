<x-app-layout>
    <x-slot name="header">Tambah Produk Baru</x-slot>
    <div class="p-6 text-gray-900 max-w-7xl mx-auto">
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Pilih Kategori</label>
                <select name="category_id" class="border p-2 w-full" required>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Nama Produk</label>
                <input type="text" name="name" class="border p-2 w-full" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Harga</label>
                <input type="number" name="price" class="border p-2 w-full" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Stok</label>
                <input type="number" name="stock" class="border p-2 w-full" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Simpan</button>
        </form>
    </div>
</x-app-layout>