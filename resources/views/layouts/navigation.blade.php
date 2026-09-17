<aside class="fixed inset-y-0 left-0 z-50 flex w-64 flex-col bg-[#1c2434] text-[#8A99AF] transition-all duration-300">

    <!-- Logo -->
    <div class="flex h-20 items-center justify-center px-6 py-5 lg:py-6.5 border-b border-slate-700/50">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2 text-2xl font-bold text-white">
            <!-- Icon Logo Placeholder (Optional) -->
            <svg class="h-8 w-8 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                <path d="M4 4h4v16H4zM10 8h4v12h-4zM16 12h4v8h-4z"/>
            </svg>
            Sistem Penjualan
        </a>
    </div>

    <!-- Scrollable Menu -->
    <div class="flex-1 overflow-y-auto no-scrollbar px-4 py-4 lg:px-6">
        
        <!-- MENU SECTION -->
        <h3 class="mb-4 ml-4 text-xs font-semibold uppercase tracking-widest text-slate-500">
            Menu
        </h3>

        <nav class="space-y-1.5">

            <!-- Dashboard -->
            <a href="{{ route('dashboard') }}"
               class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-slate-300 duration-300 ease-in-out hover:bg-slate-800 hover:text-white {{ request()->routeIs('dashboard') ? 'bg-slate-800 text-white' : '' }}">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Dashboard
            </a>

            <!-- Transaksi -->
            <div x-data="{ open: {{ request()->routeIs('penjualan.*', 'pembelian.*') ? 'true' : 'false' }} }">
                <button @click="open = !open"
                        class="group relative flex w-full items-center justify-between rounded-sm px-4 py-2 font-medium text-slate-300 duration-300 ease-in-out hover:bg-slate-800 hover:text-white">
                    <div class="flex items-center gap-2.5">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Transaksi
                    </div>
                    <svg class="h-4 w-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" class="mt-2 mb-3 flex flex-col gap-1 pl-11">
                    <a href="{{ route('penjualan.index') }}" class="block text-sm font-medium duration-300 ease-in-out {{ request()->routeIs('penjualan.*') ? 'text-white' : 'text-slate-400 hover:text-white' }}">Penjualan</a>
                    <a href="#" class="block text-sm font-medium text-slate-400 duration-300 ease-in-out hover:text-white">Pembelian</a>
                </div>
            </div>

            <!-- Master Data -->
            <div x-data="{ open: false }">
                <button @click="open = !open"
                        class="group relative flex w-full items-center justify-between rounded-sm px-4 py-2 font-medium text-slate-300 duration-300 ease-in-out hover:bg-slate-800 hover:text-white">
                    <div class="flex items-center gap-2.5">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z" />
                        </svg>
                        Master Data
                    </div>
                    <svg class="h-4 w-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" class="mt-2 mb-3 flex flex-col gap-1.5 pl-11">
                    <a href="#" class="block text-sm font-medium text-slate-400 duration-300 ease-in-out hover:text-white">Barang</a>
                    <a href="#" class="block text-sm font-medium text-slate-400 duration-300 ease-in-out hover:text-white">Kategori</a>
                    <a href="#" class="block text-sm font-medium text-slate-400 duration-300 ease-in-out hover:text-white">Supplier</a>
                    <a href="#" class="block text-sm font-medium text-slate-400 duration-300 ease-in-out hover:text-white">Pelanggan</a>
                </div>
            </div>

            <!-- Persediaan -->
            <div x-data="{ open: false }">
                <button @click="open = !open"
                        class="group relative flex w-full items-center justify-between rounded-sm px-4 py-2 font-medium text-slate-300 duration-300 ease-in-out hover:bg-slate-800 hover:text-white">
                    <div class="flex items-center gap-2.5">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                        Persediaan
                    </div>
                    <svg class="h-4 w-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" class="mt-2 mb-3 flex flex-col gap-1.5 pl-11">
                    <a href="#" class="block text-sm font-medium text-slate-400 duration-300 ease-in-out hover:text-white">Stok</a>
                </div>
            </div>

            <!-- Laporan -->
            <div x-data="{ open: false }">
                <button @click="open = !open"
                        class="group relative flex w-full items-center justify-between rounded-sm px-4 py-2 font-medium text-slate-300 duration-300 ease-in-out hover:bg-slate-800 hover:text-white">
                    <div class="flex items-center gap-2.5">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        Laporan
                    </div>
                    <svg class="h-4 w-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" class="mt-2 mb-3 flex flex-col gap-1.5 pl-11">
                    <a href="#" class="block text-sm font-medium text-slate-400 duration-300 ease-in-out hover:text-white">Penjualan</a>
                    <a href="#" class="block text-sm font-medium text-slate-400 duration-300 ease-in-out hover:text-white">Pembelian</a>
                    <a href="#" class="block text-sm font-medium text-slate-400 duration-300 ease-in-out hover:text-white">Stok</a>
                </div>
            </div>

        </nav>

        <!-- OTHERS SECTION -->
        <h3 class="mb-4 ml-4 mt-8 text-xs font-semibold uppercase tracking-widest text-slate-500">
            Others
        </h3>

        <nav class="space-y-1.5">
            <!-- Authentication -->
            <div x-data="{ open: false }">
                <button @click="open = !open"
                        class="group relative flex w-full items-center justify-between rounded-sm px-4 py-2 font-medium text-slate-300 duration-300 ease-in-out hover:bg-slate-800 hover:text-white">
                    <div class="flex items-center gap-2.5">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        Authentication
                    </div>
                    <svg class="h-4 w-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" class="mt-2 mb-3 flex flex-col gap-1.5 pl-11">
                    <a href="#" class="block text-sm font-medium text-slate-400 duration-300 ease-in-out hover:text-white">Sign In</a>
                    <a href="#" class="block text-sm font-medium text-slate-400 duration-300 ease-in-out hover:text-white">Sign Up</a>
                    <a href="#" class="block text-sm font-medium text-slate-400 duration-300 ease-in-out hover:text-white">Reset Password</a>
                </div>
            </div>
        </nav>

    </div>
</aside>