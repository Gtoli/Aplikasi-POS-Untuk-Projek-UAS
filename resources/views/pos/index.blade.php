<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">Mesin Transaksi Kasir (POS)</h2>
    </x-slot>

    <div class="py-8 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-6 grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-black text-gray-800 tracking-tight">Pilih Item Barang</h3>
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">{{ count($products) }} Produk Tersedia</span>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach($products as $product)
                        <div class="border border-gray-100 bg-gray-50/50 p-4 rounded-xl flex flex-col justify-between hover:border-blue-400 hover:bg-white hover:shadow-lg group transition duration-200">
                            <div>
                                <div class="flex justify-between items-start mb-1">
                                    <span class="text-[10px] font-extrabold uppercase tracking-widest text-gray-400 px-2 py-0.5 bg-gray-200/60 rounded-md">{{ $product->category->name }}</span>
                                    <span class="text-xs font-semibold text-gray-400 font-mono">ID: {{ $product->id }}</span>
                                </div>
                                <h4 class="font-bold text-gray-800 text-base group-hover:text-blue-600 transition">{{ $product->name }}</h4>
                                <p class="text-blue-600 font-extrabold text-lg mt-2">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            </div>
                            
                            <div class="mt-4 pt-3 border-t border-gray-100 flex items-center justify-between">
                                <span class="text-xs text-gray-500 font-medium">Stok Gudang: <b class="text-gray-700 font-bold">{{ $product->stock }}</b></span>
                                
                                <form action="{{ route('pos.addToCart', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" {{ $product->stock <= 0 ? 'disabled' : '' }} 
                                        class="px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs rounded-lg shadow-md shadow-blue-500/10 transition disabled:bg-gray-300 disabled:shadow-none">
                                        {{ $product->stock <= 0 ? 'Habis' : '+ Masukkan' }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-xl border border-gray-100 flex flex-col justify-between h-fit sticky top-6">
                <div>
                    <div class="flex items-center justify-between pb-4 border-b border-gray-100 mb-4">
                        <h3 class="text-lg font-black text-gray-800 tracking-tight">Keranjang Belanja</h3>
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    </div>

                    <div class="overflow-y-auto max-h-72 divide-y divide-gray-100 pr-1">
                        @php $total = 0; @endphp
                        @forelse($cart as $id => $item)
                            @php $total += $item['price'] * $item['qty']; @endphp
                            <div class="py-3 flex justify-between items-center text-sm">
                                <div class="max-w-[150px]">
                                    <h5 class="font-bold text-gray-800 truncate">{{ $item['name'] }}</h5>
                                    <p class="text-xs text-gray-400 mt-0.5">{{ $item['qty'] }} x Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                                </div>
                                <span class="font-bold text-gray-800 font-mono">Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}</span>
                            </div>
                        @empty
                            <div class="text-center py-12 text-gray-400 flex flex-col items-center">
                                <svg class="w-12 h-12 text-gray-200 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 11m8 4V4"></path></svg>
                                <p class="text-sm">Keranjang masih kosong belanja</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <div class="mt-6 border-t border-gray-100 pt-4">
                    <div class="flex justify-between font-black text-gray-800 text-lg mb-6">
                        <span>TOTAL BAYAR :</span>
                        <span class="text-blue-600 font-mono text-xl">Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                    
                    @if(count($cart) > 0)
                        <form action="{{ route('pos.checkout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full py-3.5 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white font-extrabold text-center rounded-xl shadow-lg shadow-emerald-500/20 transform hover:-translate-y-0.5 transition duration-150">
                                Bayar Sekarang & Cetak Struk
                            </button>
                        </form>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>