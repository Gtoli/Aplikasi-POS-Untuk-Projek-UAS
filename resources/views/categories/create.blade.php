<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">Tambah Kategori Baru</h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl border border-gray-100 sm:rounded-2xl p-8 transform hover:scale-[1.01] transition duration-300">
                
                <div class="flex items-center space-x-3 mb-6">
                    <div class="p-2.5 bg-emerald-50 rounded-xl text-emerald-600 shadow-inner">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-black text-gray-800">Master Data Kategori</h3>
                        <p class="text-xs text-gray-400">Pastikan nama kategori belum pernah terdaftar sebelumnya</p>
                    </div>
                </div>

                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-6">
                        <label class="block text-xs font-semibold uppercase tracking-wider text-gray-600 mb-2">Nama Kategori</label>
                        <input type="text" name="name" placeholder="Contoh: Suku Cadang, Aksesoris, dll." required autofocus
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 bg-gray-50/50 text-sm transition duration-200">
                    </div>

                    <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-100">
                        <a href="{{ route('categories.index') }}" class="px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-600 font-semibold text-sm rounded-xl transition duration-150">
                            Batal
                        </a>
                        <button type="submit" class="px-5 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-extrabold text-sm rounded-xl shadow-md shadow-blue-500/20 transform hover:-translate-y-0.5 transition duration-150">
                            Simpan Kategori
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>