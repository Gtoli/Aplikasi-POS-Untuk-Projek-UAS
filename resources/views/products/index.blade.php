<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-xl text-gray-800 leading-tight">Stok Produk Barang</h2>
            <a href="{{ route('products.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm rounded-xl shadow-md shadow-blue-500/10 transition duration-200">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Produk
            </a>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm border border-gray-100 sm:rounded-2xl">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            <th class="p-4 w-20 text-center">ID</th>
                            <th class="p-4">Kategori</th>
                            <th class="p-4">Nama Produk</th>
                            <th class="p-4">Harga Master</th>
                            <th class="p-4 w-32 text-center">Stok Gudang</th>
                            <th class="p-4 w-40 text-center">Aksi Manajemen</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                        @foreach($products as $prod)
                        <tr class="hover:bg-gray-50/70 transition">
                            <td class="p-4 font-mono font-bold text-center text-gray-400 bg-gray-50/30">{{ $prod->id }}</td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 bg-gray-100 text-gray-600 rounded-lg text-xs font-bold uppercase tracking-wider border border-gray-200">{{ $prod->category->name }}</span>
                            </td>
                            <td class="p-4 font-semibold text-gray-800">{{ $prod->name }}</td>
                            <td class="p-4 font-medium text-gray-600">Rp {{ number_format($prod->price, 0, ',', '.') }}</td>
                            <td class="p-4 text-center">
                                @if($prod->stock <= 5)
                                    <span class="px-2 py-1 bg-red-50 text-red-600 font-bold rounded-lg text-xs">Sisa {{ $prod->stock }}</span>
                                @else
                                    <span class="px-2 py-1 bg-blue-50 text-blue-600 font-bold rounded-lg text-xs">{{ $prod->stock }} Item</span>
                                @endif
                            </td>
                            <td class="p-4 text-center">
                                <a href="{{ route('products.edit', $prod->id) }}" class="inline-flex items-center px-3 py-1.5 bg-amber-500 hover:bg-amber-600 text-white font-bold text-xs rounded-lg transition duration-150 shadow-sm">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 00-2 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    Edit Stok
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>