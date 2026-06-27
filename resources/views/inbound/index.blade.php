<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">Manajemen Inbound & Laporan Keuangan</h2>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center space-x-4">
                    <div class="p-4 bg-red-50 rounded-xl text-red-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total Pengeluaran (Supplier)</span>
                        <h4 class="font-black text-xl text-red-600 font-mono mt-0.5">Rp {{ number_format($totalPengeluaranModal, 0, ',', '.') }}</h4>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center space-x-4">
                    <div class="p-4 bg-emerald-50 rounded-xl text-emerald-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total Pemasukan (Kasir POS)</span>
                        <h4 class="font-black text-xl text-emerald-600 font-mono mt-0.5">Rp {{ number_format($totalPemasukanKasir, 0, ',', '.') }}</h4>
                    </div>
                </div>

                <div class="bg-gradient-to-br {{ $labaKotor >= 0 ? 'from-blue-600 to-indigo-600 text-white' : 'from-red-600 to-rose-600 text-white' }} p-6 rounded-2xl shadow-md flex items-center space-x-4">
                    <div class="p-4 bg-white/20 rounded-xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10a2 2 0 01-2 2h-2a2 2 0 01-2-2zm5-18v3m0 0v3m0-3h3m-3 0H9"></path></svg>
                    </div>
                    <div>
                        <span class="text-xs font-bold text-blue-100 uppercase tracking-wider">Neraca Saldo (Laba Bersih Toko)</span>
                        <h4 class="font-black text-2xl font-mono mt-0.5">Rp {{ number_format($labaKotor, 0, ',', '.') }}</h4>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 h-fit">
                    <h3 class="text-lg font-black text-gray-800 mb-4 tracking-tight">Input Barang Masuk</h3>
                    
                    @if(session('success'))
                        <div class="mb-4 p-3 bg-emerald-50 text-emerald-700 rounded-xl text-xs font-bold border border-emerald-200">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('inbound.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1.5">Pilih Produk</label>
                            <select name="product_id" required class="w-full px-3 py-2.5 rounded-xl border border-gray-200 text-sm bg-gray-50/50">
                                <option value="" disabled selected>-- Pilih Item Barang --</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }} (Stok saat ini: {{ $product->stock }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1.5">Jumlah Masuk (Qty)</label>
                            <input type="number" name="qty" required min="1" placeholder="Contoh: 100" class="w-full px-3 py-2.5 rounded-xl border border-gray-200 text-sm bg-gray-50/50 font-bold">
                        </div>

                        <div class="mb-4">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1.5">Harga Beli dari Supplier (Rp)</label>
                            <input type="number" name="supplier_price" required min="0" placeholder="Harga modal per item" class="w-full px-3 py-2.5 rounded-xl border border-gray-200 text-sm bg-gray-50/50 text-red-600 font-bold">
                        </div>

                        <div class="mb-6">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1.5">Tanggal Masuk</label>
                            <input type="date" name="date" value="{{ date('Y-m-d') }}" required class="w-full px-3 py-2.5 rounded-xl border border-gray-200 text-sm bg-gray-50/50">
                        </div>

                        <button type="submit" class="w-full py-3 bg-gradient-to-r from-gray-900 to-slate-800 hover:from-black hover:to-gray-900 text-white font-extrabold text-sm rounded-xl shadow-md transition transform hover:-translate-y-0.5">
                            + Simpan Pemasukan Barang
                        </button>
                    </form>
                </div>

                <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <h3 class="text-lg font-black text-gray-800 mb-4 tracking-tight">Riwayat Log Inbound (Barang Masuk)</h3>
                    
                    <div class="overflow-hidden border border-gray-100 rounded-xl">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-100 text-[10px] font-bold text-gray-400 uppercase tracking-wider">
                                    <th class="p-3">Tanggal</th>
                                    <th class="p-3">Nama Barang</th>
                                    <th class="p-3 text-center">Qty Masuk</th>
                                    <th class="p-3">Harga Supplier</th>
                                    <th class="p-3">Total Modal</th>
                                    <th class="p-3">Tanggal</th>
<th class="p-3">Nama Barang</th>
<th class="p-3 text-center">Qty Masuk</th>
<th class="p-3">Harga Supplier</th>
<th class="p-3">Total Modal</th>
<th class="p-3 text-center">Aksi</th> ```


@forelse($inbounds as $inbound)
<tr class="hover:bg-gray-50/50 transition">
    <td class="p-3 font-medium text-gray-400">{{ date('d M Y', strtotime($inbound->date)) }}</td>
    <td class="p-3 font-bold text-gray-800">{{ $inbound->product->name }}</td>
    <td class="p-3 text-center font-bold text-blue-600 bg-blue-50/20 font-mono">+{{ $inbound->qty }}</td>
    <td class="p-3 font-medium">Rp {{ number_format($inbound->supplier_price, 0, ',', '.') }}</td>
    <td class="p-3 font-bold text-red-600 font-mono">Rp {{ number_format($inbound->total_cost, 0, ',', '.') }}</td>
    
    <td class="p-3 text-center flex items-center justify-center space-x-2">
        <a href="{{ route('inbound.edit', $inbound->id) }}" class="p-1.5 bg-amber-50 text-amber-600 hover:bg-amber-100 rounded-lg transition" title="Edit Data">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 00-2 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
        </a>

        <form action="{{ route('inbound.destroy', $inbound->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus riwayat inbound ini? Stok gudang akan otomatis dipotong kembali.');">
            @csrf
            @method('DELETE')
            <button type="submit" class="p-1.5 bg-red-50 text-red-600 hover:bg-red-100 rounded-lg transition" title="Hapus Data">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
            </button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="p-8 text-center text-gray-400">Belum ada riwayat barang masuk dari supplier.</td>
</tr>
@endforelse
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 text-xs text-gray-600">
                                @forelse($inbounds as $inbound)
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="p-3 font-medium text-gray-400">{{ date('d M Y', strtotime($inbound->date)) }}</td>
                                    <td class="p-3 font-bold text-gray-800">{{ $inbound->product->name }}</td>
                                    <td class="p-3 text-center font-bold text-blue-600 bg-blue-50/20 font-mono">+{{ $inbound->qty }}</td>
                                    <td class="p-3 font-medium">Rp {{ number_format($inbound->supplier_price, 0, ',', '.') }}</td>
                                    <td class="p-3 font-bold text-red-600 font-mono">Rp {{ number_format($inbound->total_cost, 0, ',', '.') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="p-8 text-center text-gray-400">Belum ada riwayat barang masuk dari supplier.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>