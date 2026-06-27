<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-tr from-slate-950 via-indigo-950 to-blue-900 relative overflow-hidden">
        
        <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-blue-500/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>

        <div class="w-full sm:max-w-md mt-6 px-8 py-10 bg-white/[0.04] backdrop-blur-xl shadow-2xl overflow-hidden sm:rounded-2xl border border-white/10 transform hover:scale-[1.01] transition duration-300 relative z-10">
            
            <div class="text-center mb-8">
                <div class="inline-flex p-3 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl text-white mb-4 shadow-lg shadow-blue-500/20 transform hover:rotate-6 transition duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-black text-white tracking-tight bg-clip-text bg-gradient-to-r from-white via-slate-200 to-slate-400">Smart<span class="text-blue-400">POS</span></h2>
                <p class="text-sm text-slate-400 mt-1.5 font-medium">Masuk untuk mulai mengelola transaksi toko</p>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-5">
                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-2">Email Administrator</label>
                    <div class="relative">
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Masukkan email akun"
                            class="w-full px-4 py-3 pl-11 rounded-xl border border-white/10 bg-white/[0.03] text-white placeholder-slate-500 focus:border-blue-500 focus:ring focus:ring-blue-500/20 focus:bg-slate-900/40 transition duration-200">
                        <div class="absolute left-4 top-3.5 text-slate-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L22 8m-9 11h3a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2h3"></path></svg>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
                </div>

                <div class="mb-5">
                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-2">Kata Sandi</label>
                    <div class="relative">
                        <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="••••••••"
                            class="w-full px-4 py-3 pl-11 rounded-xl border border-white/10 bg-white/[0.03] text-white placeholder-slate-600 focus:border-blue-500 focus:ring focus:ring-blue-500/20 focus:bg-slate-900/40 transition duration-200">
                        <div class="absolute left-4 top-3.5 text-slate-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
                </div>

                <div class="block mb-6">
                    <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                        <input id="remember_me" type="checkbox" class="rounded border-white/10 bg-white/[0.03] text-blue-500 shadow-sm focus:ring-blue-500 focus:ring-offset-slate-950" name="remember">
                        <span class="ms-2 text-sm text-slate-400 group-hover:text-slate-200 transition duration-150">Ingat akun kasir saya</span>
                    </label>
                </div>

                <div>
                    <button type="submit" class="w-full py-3.5 px-4 bg-gradient-to-r from-blue-500 via-blue-600 to-indigo-600 hover:from-blue-600 hover:via-indigo-600 hover:to-purple-600 text-white font-black text-sm rounded-xl shadow-lg shadow-blue-500/20 transform hover:-translate-y-0.5 active:translate-y-0 transition duration-150 text-center uppercase tracking-wider">
                        Masuk Sistem Kasir
                    </button>
                </div>
            </form>
        </div>
        
        <p class="text-xs text-slate-600 mt-8 relative z-10 font-mono">&copy; {{ date('Y') }} SmartPOS System. All rights reserved.</p>
    </div>
</x-guest-layout>