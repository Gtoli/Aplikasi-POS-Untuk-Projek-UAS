<nav x-data="{ open: false }" class="bg-white/80 backdrop-blur-md border-b border-gray-100 sticky top-0 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 group">
                        <div class="p-2 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-xl text-white shadow-md shadow-blue-500/20 group-hover:rotate-6 transition duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        </div>
                        <span class="font-black text-lg tracking-tight text-gray-800 group-hover:text-blue-600 transition">Smart<span class="text-blue-600">POS</span></span>
                    </a>
                </div>

                <div class="hidden space-x-4 sm:-my-px sm:ms-10 sm:flex items-center">
                    <a href="{{ route('dashboard') }}" 
                       class="inline-flex items-center px-3 py-2 text-sm font-bold rounded-xl transition duration-200 {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-600 shadow-inner' : 'text-gray-500 hover:text-gray-700 hover:bg-gray-50' }}">
                        <svg class="w-4 h-4 mr-1.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        {{ __('Dashboard') }}
                    </a>

                    <a href="{{ route('categories.index') }}" 
                       class="inline-flex items-center px-3 py-2 text-sm font-bold rounded-xl transition duration-200 {{ request()->routeIs('categories.*') ? 'bg-emerald-50 text-emerald-600 shadow-inner' : 'text-gray-500 hover:text-gray-700 hover:bg-gray-50' }}">
                        <svg class="w-4 h-4 mr-1.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                        {{ __('Kategori') }}
                    </a>

                    <a href="{{ route('products.index') }}" 
                       class="inline-flex items-center px-3 py-2 text-sm font-bold rounded-xl transition duration-200 {{ request()->routeIs('products.*') ? 'bg-amber-50 text-amber-600 shadow-inner' : 'text-gray-500 hover:text-gray-700 hover:bg-gray-50' }}">
                        <svg class="w-4 h-4 mr-1.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 11m8 4V4"></path></svg>
                        {{ __('Produk & Stok') }}
                    </a>

                    <a href="{{ route('inbound.index') }}" 
                       class="inline-flex items-center px-3 py-2 text-sm font-bold rounded-xl transition duration-200 {{ request()->routeIs('inbound.*') ? 'bg-red-50 text-red-600 shadow-inner' : 'text-gray-500 hover:text-gray-700 hover:bg-gray-50' }}">
                        <svg class="w-4 h-4 mr-1.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 11l3-3m0 0l3 3m-3-3v8m0-13a9 9 0 110 18 9 9 0 010-18z"></path></svg>
                        {{ __('Inbound & Laporan') }}
                    </a>

                    <a href="{{ route('pos.index') }}" 
                       class="inline-flex items-center px-4 py-2 text-sm font-extrabold rounded-xl transition duration-200 {{ request()->routeIs('pos.*') ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-md shadow-blue-500/20' : 'bg-gray-900 text-white hover:bg-gray-800 shadow-md shadow-gray-900/10' }}">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        {{ __('Buka Kasir') }}
                    </a>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-gray-200 text-sm leading-4 font-bold rounded-xl text-gray-700 bg-gray-50 hover:bg-gray-100 hover:text-gray-900 focus:outline-none transition duration-150">
                            <div class="w-2.5 h-2.5 bg-emerald-500 rounded-full mr-2 shadow-sm animate-pulse"></div>
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="font-semibold text-gray-600">
                            {{ __('Profil Saya') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="font-bold text-red-600 hover:bg-red-50">
                                {{ __('Keluar Sistem') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-xl text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none transition duration-150">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-t border-gray-100 bg-white">
        <div class="pt-2 pb-3 space-y-1 px-2">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="rounded-xl font-bold">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.*')" class="rounded-xl font-bold text-emerald-600">
                {{ __('Kategori') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('products.index')" :active="request()->routeIs('products.*')" class="rounded-xl font-bold text-amber-600">
                {{ __('Produk & Stok') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('inbound.index')" :active="request()->routeIs('inbound.*')" class="rounded-xl font-bold text-red-600">
                {{ __('Inbound & Laporan') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('pos.index')" :active="request()->routeIs('pos.*')" class="rounded-xl font-black text-blue-600">
                {{ __('Buka Kasir') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-gray-100 bg-gray-50/50 px-4">
            <div class="font-bold text-sm text-gray-800">{{ Auth::user()->name }}</div>
            <div class="font-medium text-xs text-gray-500">{{ Auth::user()->email }}</div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="rounded-xl font-semibold text-gray-600">
                    {{ __('Profil') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();" class="rounded-xl font-bold text-red-600">
                        {{ __('Keluar Sistem') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>