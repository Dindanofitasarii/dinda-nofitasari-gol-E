<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Console - Twins Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-[#f1f5f9] flex min-h-screen font-sans text-slate-900">

    <aside class="w-64 bg-[#003049] text-white flex flex-col shadow-2xl z-20">
        <div class="p-6">
            <div class="flex items-center gap-3 mb-10 border-b border-white/10 pb-6">
                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center p-1 shadow-lg overflow-hidden border-2 border-orange-400">
                    <img src="{{ asset('images/logo-twins.png') }}" alt="Logo" class="w-full h-full object-contain">
                </div>
                <div>
                    <h1 class="text-base font-bold tracking-tight text-white leading-none">Twins Store</h1>
                    <p class="text-[10px] text-orange-400 font-bold uppercase tracking-widest mt-1">Premium Admin</p>
                </div>
            </div>
            
            <nav class="space-y-2">
                <a href="/users" class="flex items-center gap-3.5 p-3 text-sm rounded-xl transition-all duration-300 {{ Request::is('users*') ? 'bg-gradient-to-r from-orange-400 to-orange-600 text-white shadow-lg translate-x-1' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                    <i class="ph ph-users-three text-xl"></i>
                    <span class="{{ Request::is('users*') ? 'font-bold' : 'font-medium' }}">Manajemen User</span>
                </a>

                <a href="/schedules" class="flex items-center gap-3.5 p-3 text-sm rounded-xl transition-all duration-300 {{ Request::is('schedules*') ? 'bg-gradient-to-r from-orange-400 to-orange-600 text-white shadow-lg translate-x-1' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                    <i class="ph ph-calendar-blank text-xl"></i>
                    <span class="{{ Request::is('schedules*') ? 'font-bold' : 'font-medium' }}">Manajemen Jadwal</span>
                </a>

                <a href="/outlets" class="flex items-center gap-3.5 p-3 text-sm rounded-xl transition-all duration-300 {{ Request::is('outlets*') ? 'bg-gradient-to-r from-orange-400 to-orange-600 text-white shadow-lg translate-x-1' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                    <i class="ph ph-storefront text-xl"></i>
                    <span class="{{ Request::is('outlets*') ? 'font-bold' : 'font-medium' }}">Manajemen Outlet</span>
                </a>
            </nav>
        </div>

        <div class="mt-auto p-6 border-t border-white/10">
            <button class="w-full p-3 bg-white/5 hover:bg-red-500/20 hover:text-red-400 rounded-xl text-sm flex items-center justify-center gap-2.5 transition-all group font-bold">
                <i class="ph ph-sign-out text-xl"></i>
                Logout
            </button>
        </div>
    </aside>

    <main class="flex-1 flex flex-col overflow-hidden">
        <header class="bg-white p-4 flex justify-between items-center px-10 border-b border-slate-200 shadow-sm z-10">
            <div class="font-bold text-[#003049] text-xs tracking-widest uppercase flex items-center gap-2">
                TWINS STORE <span class="text-slate-300">|</span> <span class="text-slate-500 font-medium">Management Tool</span>
            </div>

            <div class="flex items-center gap-6">
                <div class="flex bg-slate-100 p-1 rounded-xl border border-slate-200 shadow-inner">
                    <a href="?mode=eloquent" 
                       class="px-5 py-2 rounded-lg text-[10px] font-black uppercase tracking-wider transition-all {{ ($mode ?? 'eloquent') == 'eloquent' ? 'bg-[#003049] text-white shadow-md scale-105' : 'text-slate-400 hover:text-slate-600' }}">
                        Eloquent
                    </a>
                    <a href="?mode=query_builder" 
                       class="px-5 py-2 rounded-lg text-[10px] font-black uppercase tracking-wider transition-all {{ ($mode ?? '') == 'query_builder' ? 'bg-[#003049] text-white shadow-md scale-105' : 'text-slate-400 hover:text-slate-600' }}">
                        Query Builder
                    </a>
                </div>

                <div class="h-8 w-[1px] bg-slate-200"></div>

                <div class="flex items-center gap-3">
                    <div class="text-right hidden sm:block leading-none">
                        <p class="text-xs font-bold text-slate-700">Super Admin</p>
                        <p class="text-[9px] text-slate-400 mt-1">admin@twins.com</p>
                    </div>
                    <div class="w-10 h-10 bg-gradient-to-tr from-[#003049] to-[#00507a] rounded-full border-2 border-white flex items-center justify-center font-bold text-white text-xs shadow-md">
                        SA
                    </div>
                </div>
            </div>
        </header>
        
        <div class="p-10 bg-[#f1f5f9] overflow-y-auto min-h-[calc(100vh-73px)]">
            @yield('content')
        </div>
    </main>

    @if(session('success'))
    <div x-data="{ show: true }" 
         x-init="setTimeout(() => show = false, 4000)" 
         x-show="show" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform translate-x-8"
         x-transition:enter-end="opacity-100 transform translate-x-0"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 transform translate-x-0"
         x-transition:leave-end="opacity-0 transform translate-x-8"
         x-cloak
         class="fixed top-8 right-8 z-[9999] bg-emerald-500 text-white px-6 py-4 rounded-2xl shadow-2xl flex items-center gap-4 border border-emerald-400">
        <i class="ph ph-check-circle text-3xl"></i>
        <div>
            <p class="font-bold text-sm tracking-wide leading-none">Berhasil!</p>
            <p class="text-[11px] opacity-90 mt-1">{{ session('success') }}</p>
        </div>
        <button @click="show = false" class="ml-4 opacity-50 hover:opacity-100">
            <i class="ph ph-x-circle text-xl"></i>
        </button>
    </div>
    @endif
</body>
</html>