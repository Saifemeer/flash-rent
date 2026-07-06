<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DriveFleet Admin</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html { scroll-behavior: smooth; }
        ::selection { background-color: #111827; color: #fff; }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100">

    <div class="min-h-screen flex">

        {{-- ============================================ --}}
        {{-- SIDEBAR (Desktop) --}}
        {{-- ============================================ --}}
        <aside class="hidden lg:flex lg:flex-col w-64 bg-gray-950 text-white fixed inset-y-0 left-0 z-40">

            {{-- Logo --}}
            <div class="h-16 flex items-center gap-2.5 px-6 border-b border-gray-800">
                <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-gray-900" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/>
                    </svg>
                </div>
                <div class="flex items-baseline">
                    <span class="text-base font-extrabold text-white tracking-tight">Drive</span>
                    <span class="text-base font-extrabold text-gray-500 tracking-tight">Fleet</span>
                </div>
                <span class="ml-auto text-[10px] font-bold uppercase tracking-wider bg-amber-500 text-black px-2 py-0.5 rounded">Admin</span>
            </div>

            {{-- Nav Links --}}
            <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">
                <p class="px-3 text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Main</p>

                <a href="{{ route('admin.bookings.index') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition
                   {{ request()->routeIs('admin.bookings.*') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800/50' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                    </svg>
                    Dashboard
                </a>

                <p class="px-3 text-[10px] font-bold text-gray-500 uppercase tracking-widest mt-6 mb-2">Management</p>

                <a href="{{ route('admin.bookings.index') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition
                   {{ request()->routeIs('admin.bookings') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800/50' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    Bookings
                </a>

                <a href="{{ route('admin.cars.index') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition
                   {{ request()->routeIs('admin.cars.*') && !request()->routeIs('admin.cars.index') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800/50' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                    Fleet
                </a>

                <a href="{{ route('cars.create') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition
                   {{ request()->routeIs('cars.create') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800/50' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4"/>
                    </svg>
                    Add Vehicle
                </a>

                <p class="px-3 text-[10px] font-bold text-gray-500 uppercase tracking-widest mt-6 mb-2">Quick Access</p>

                <a href="{{ route('dashboard') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-gray-400 hover:text-white hover:bg-gray-800/50 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    View Site
                </a>
                <a href="{{ route('admin.users.index') }}" 
   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition
   {{ request()->routeIs('admin.users.*') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800/50' }}">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
    </svg>
    Users
</a>
            </nav>

            {{-- User --}}
            <div class="border-t border-gray-800 p-4">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-9 h-9 bg-amber-500 rounded-full flex items-center justify-center text-black text-xs font-bold">
                        {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-white truncate">{{ Auth::user()->name }}</p>
                        <p class="text-[11px] text-gray-500 truncate">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 px-3 py-2 text-xs font-semibold text-gray-400 bg-gray-800/50 rounded-lg hover:bg-gray-800 hover:text-white transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        Sign Out
                    </button>
                </form>
            </div>
        </aside>

        {{-- ============================================ --}}
        {{-- MAIN CONTENT --}}
        {{-- ============================================ --}}
        <div class="flex-1 lg:ml-64">

            {{-- Top Bar --}}
            <header class="h-16 bg-white border-b border-gray-200 sticky top-0 z-30 flex items-center justify-between px-6">
                <button type="button" class="lg:hidden p-2 text-gray-500 hover:text-gray-900 rounded-lg hover:bg-gray-100" onclick="document.getElementById('mobile-sidebar').classList.toggle('hidden')">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <div class="hidden lg:block">
                    @yield('header')
                </div>

                <div class="flex items-center gap-4">
                    <a href="{{ route('dashboard') }}" class="hidden sm:inline-flex items-center gap-1.5 text-sm text-gray-500 hover:text-gray-900 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        View Site
                    </a>
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-gray-900 rounded-full flex items-center justify-center text-white text-xs font-bold">
                            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                        </div>
                        <span class="hidden sm:block text-sm font-medium text-gray-700">{{ Auth::user()->name }}</span>
                    </div>
                </div>
            </header>

            {{-- Mobile Sidebar --}}
            <div id="mobile-sidebar" class="hidden lg:hidden fixed inset-0 z-50">
                <div class="absolute inset-0 bg-black/50" onclick="document.getElementById('mobile-sidebar').classList.add('hidden')"></div>
                <aside class="absolute left-0 top-0 bottom-0 w-72 bg-gray-950 text-white overflow-y-auto">
                    <div class="h-16 flex items-center justify-between px-6 border-b border-gray-800">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-gray-900" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/>
                                </svg>
                            </div>
                            <div class="flex items-baseline">
                                <span class="text-base font-extrabold text-white">Drive</span>
                                <span class="text-base font-extrabold text-gray-500">Fleet</span>
                            </div>
                        </div>
                        <button onclick="document.getElementById('mobile-sidebar').classList.add('hidden')" class="p-1 text-gray-500 hover:text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>

                    <nav class="px-3 py-4 space-y-1">
                        <a href="{{ route('admin.cars.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium {{ request()->routeIs('admin.cars.index') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800/50' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                            Dashboard
                        </a>
                        <a href="{{ route('admin.bookings.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium {{ request()->routeIs('admin.bookings.*') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800/50' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                            Bookings
                        </a>
                        <a href="{{ route('cars.create') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium {{ request()->routeIs('cars.create') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800/50' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4"/></svg>
                            Add Vehicle
                        </a>
                        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-gray-400 hover:text-white hover:bg-gray-800/50">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            View Site
                        </a>
                        <a href="{{ route('admin.users.index') }}" 
   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition
   {{ request()->routeIs('admin.users.*') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800/50' }}">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
    </svg>
    Users
</a>
                    </nav>

                    <div class="border-t border-gray-800 p-4 mt-auto">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center justify-center gap-2 px-3 py-2 text-xs font-semibold text-gray-400 bg-gray-800/50 rounded-lg hover:bg-gray-800 hover:text-white transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                Sign Out
                            </button>
                        </form>
                    </div>
                </aside>
            </div>

            {{-- Page Content --}}
            <main class="p-6">
                <div class="lg:hidden mb-6">
                    @yield('header')
                </div>
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>