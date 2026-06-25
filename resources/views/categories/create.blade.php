<x-app-layout>
    <x-slot name="header">Tambah Kategori</x-slot>
    <div class="p-6 text-gray-900 max-w-7xl mx-auto">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Nama Kategori</label>
                <input type="text" name="name" class="border p-2 w-full" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Simpan</button>
        </form>
    </div>
</x-app-layout>