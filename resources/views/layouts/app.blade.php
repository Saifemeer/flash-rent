<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DriveFleet') }} - Premium Car Rental</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html { scroll-behavior: smooth; }
        ::selection { background-color: #111827; color: #fff; }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50">

    {{-- ============================================ --}}
    {{-- NAVBAR --}}
    {{-- ============================================ --}}
    <header class="w-full bg-white border-b border-gray-200 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            {{-- Logo --}}
            <a href="{{ url('/') }}" class="flex items-center gap-2.5 group">
                {{-- Logo Icon --}}
                <div class="w-9 h-9 bg-gray-900 rounded-lg flex items-center justify-center group-hover:bg-gray-800 transition-colors">
                    <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/>
                    </svg>
                </div>
                {{-- Logo Text --}}
                <div class="flex items-baseline">
                    <span class="text-xl font-extrabold text-gray-900 tracking-tight">Drive</span>
                    <span class="text-xl font-extrabold text-gray-400 tracking-tight">Fleet</span>
                </div>
            </a>

            {{-- Desktop Nav Links --}}
            <nav class="hidden md:flex items-center gap-8">
                <a href="{{ route('dashboard') }}" class="text-sm font-medium {{ request()->routeIs('dashboard') ? 'text-gray-900' : 'text-gray-500 hover:text-gray-900' }} transition">
                    Fleet
                </a>
                
                {{-- Only Show My Bookings on Desktop when Logged In --}}
                @auth
                    <a href="{{ route('bookings.my_bookings') }}" class="text-sm font-medium {{ request()->routeIs('bookings.my_bookings') ? 'text-gray-900' : 'text-gray-500 hover:text-gray-900' }} transition">
                        My Bookings
                    </a>
                @endauth

                <a href="{{ route('dashboard') }}#how-it-works" class="text-sm font-medium text-gray-500 hover:text-gray-900 transition">
                    How It Works
                </a>
                
                <a href="{{ route('about') }}" class="text-sm font-medium {{ request()->routeIs('about') ? 'text-gray-900' : 'text-gray-500 hover:text-gray-900' }} transition">
                    About
                </a>

                <a href="{{ route('contact') }}" class="text-sm font-medium {{ request()->routeIs('contact') ? 'text-gray-900' : 'text-gray-500 hover:text-gray-900' }} transition">
                    Contact
                </a>
            </nav>

            {{-- Right Side Controls --}}
            <div class="flex items-center gap-3">
                @auth
                    {{-- User Profile Dropdown Menu --}}
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-gray-100 transition">
                            <div class="w-8 h-8 bg-gray-900 rounded-full flex items-center justify-center text-white text-xs font-bold">
                                {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                            </div>
                            <span class="hidden sm:block text-sm font-medium text-gray-700">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>

                        {{-- Dropdown Body --}}
                        <div x-show="open" @click.away="open = false" x-transition
                             class="absolute right-0 mt-2 w-56 bg-white border border-gray-200 rounded-xl shadow-lg py-2 z-50">
                            
                            <div class="px-4 py-2 border-b border-gray-100">
                                <p class="text-sm font-semibold text-gray-900">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                            </div>

                            <a href="{{ route('dashboard') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition">
                                🚗 Browse Fleet
                            </a>
                            <a href="{{ route('bookings.my_bookings') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition">
                                📅 My Bookings
                            </a>
                            <a href="{{ route('profile.edit') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition">
                                👤 Profile Settings
                            </a>

                            {{-- Admin Access Route --}}
                            @if(Auth::user()->is_admin) 
                                <a href="{{ route('admin.cars.index') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-indigo-600 font-semibold hover:bg-indigo-50 transition border-t border-gray-100">
                                    👑 Admin Panel
                                </a>
                            @endif

                            <div class="border-t border-gray-100 mt-1 pt-1">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="flex items-center gap-2.5 w-full px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition">
                                        <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                        </svg>
                                        Sign Out
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    {{-- Guest Buttons (Desktop/Tablet) --}}
                    <a href="{{ route('login') }}" class="hidden sm:inline-block px-5 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 transition">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-5 py-2 text-sm font-semibold text-white bg-gray-900 rounded-md hover:bg-gray-800 transition">
                            Get Started
                        </a>
                    @endif
                @endauth

                {{-- Mobile Hamburger Trigger --}}
                <button type="button" class="md:hidden p-2 text-gray-500 hover:text-gray-900 rounded-lg hover:bg-gray-100 transition" 
                        onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Mobile Menu Dropdown Panel --}}
        <div id="mobile-menu" class="hidden md:hidden border-t border-gray-100 py-4 space-y-1">
            <a href="{{ route('dashboard') }}" class="block px-3 py-2.5 text-sm font-medium {{ request()->routeIs('dashboard') ? 'text-gray-900 bg-gray-50' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }} rounded-lg">
                Browse Fleet
            </a>
            
            {{-- 🔥 Only Show My Bookings on Mobile when Logged In --}}
            @auth
                <a href="{{ route('bookings.my_bookings') }}" class="block px-3 py-2.5 text-sm font-medium {{ request()->routeIs('bookings.my_bookings') ? 'text-gray-900 bg-gray-50' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }} rounded-lg">
                    My Bookings
                </a>
            @endauth
            
            <a href="{{ route('dashboard') }}#how-it-works" class="block px-3 py-2.5 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg">
                How It Works
            </a>
            <a href="{{ route('about') }}" class="block px-3 py-2.5 text-sm font-medium {{ request()->routeIs('about') ? 'text-gray-900 bg-gray-50' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }} rounded-lg transition">
                About
            </a>
            <a href="{{ route('contact') }}" class="block px-3 py-2.5 text-sm font-medium {{ request()->routeIs('contact') ? 'text-gray-900 bg-gray-50' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }} rounded-lg transition">
                Contact
            </a>

            @auth
                {{-- Authenticated Links for Mobile --}}
                <div class="border-t border-gray-100 pt-3 mt-3">
                    @if(Auth::user()->is_admin)
                        <a href="{{ route('admin.cars.index') }}" class="block px-3 py-2.5 text-sm font-semibold text-indigo-600 hover:bg-indigo-50 rounded-lg mb-1">
                            👑 Admin Panel
                        </a>
                    @endif
                    <a href="{{ route('profile.edit') }}" class="block px-3 py-2.5 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg">
                        Profile Settings
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-3 py-2.5 text-sm font-medium text-red-600 hover:bg-red-50 rounded-lg">
                            Sign Out
                        </button>
                    </form>
                </div>
            @else
                {{-- Guest Session Action Links for Mobile --}}
                <div class="border-t border-gray-100 pt-3 mt-3 space-y-1">
                    <a href="{{ route('login') }}" class="block px-3 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-lg">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="block px-3 py-2.5 text-sm font-semibold text-white bg-gray-900 rounded-lg text-center">
                            Get Started
                        </a>
                    @endif
                </div>
            @endauth
        </div>
    </div>
</header>

    {{-- ============================================ --}}
    {{-- PAGE HEADER (Optional) --}}
    {{-- ============================================ --}}
    @isset($header)
        <div class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto py-5 px-6 lg:px-8">
                {{ $header }}
            </div>
        </div>
    @endisset

    {{-- ============================================ --}}
    {{-- MAIN CONTENT --}}
    {{-- ============================================ --}}
    <main>
        {{ $slot }}
    </main>

    {{-- ============================================ --}}
    {{-- FOOTER --}}
    {{-- ============================================ --}}
    <footer class="bg-gray-950">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

                {{-- Brand --}}
                <div>
                    <a href="{{ url('/') }}" class="flex items-center gap-2.5 mb-4">
                        <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-gray-900" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/>
                            </svg>
                        </div>
                        <div class="flex items-baseline">
                            <span class="text-base font-extrabold text-white tracking-tight">Drive</span>
                            <span class="text-base font-extrabold text-gray-500 tracking-tight">Fleet</span>
                        </div>
                    </a>
                    <p class="text-sm text-gray-400 leading-relaxed">
                        Premium car rental service with the best rates and widest selection of vehicles.
                    </p>
                </div>

                {{-- Quick Links --}}
                <div>
                    <h4 class="text-sm font-semibold text-white mb-4">Quick Links</h4>
                    <ul class="space-y-2.5">
                        <li><a href="{{ route('dashboard') }}" class="text-sm text-gray-400 hover:text-white transition">Browse Fleet</a></li>
                        <li><a href="{{ route('bookings.my_bookings') }}" class="text-sm text-gray-400 hover:text-white transition">My Bookings</a></li>
                        <li><a href="{{ route('dashboard') }}#how-it-works" class="text-sm text-gray-400 hover:text-white transition">How It Works</a></li>
                        <li><a href="{{ route('profile.edit') }}" class="text-sm text-gray-400 hover:text-white transition">My Profile</a></li>
                        <li><a href="{{ route('about') }}" class="text-sm text-gray-400 hover:text-white transition">About Us</a></li>
                        <li><a href="{{ route('contact') }}" class="text-sm text-gray-400 hover:text-white transition">Contact Us</a></li>
                        <li><a href="{{ route('faq') }}" class="text-sm text-gray-400 hover:text-white transition">FAQ</a></li>
                       
                    </ul>
                </div>

                {{-- Categories --}}
                <div>
                    <h4 class="text-sm font-semibold text-white mb-4">Categories</h4>
                    <ul class="space-y-2.5">
                        <li><a href="{{ route('dashboard', ['category' => 'sedan']) }}" class="text-sm text-gray-400 hover:text-white transition">Sedan</a></li>
                        <li><a href="{{ route('dashboard', ['category' => 'suv']) }}" class="text-sm text-gray-400 hover:text-white transition">SUV</a></li>
                        <li><a href="{{ route('dashboard', ['category' => 'luxury']) }}" class="text-sm text-gray-400 hover:text-white transition">Luxury</a></li>
                    </ul>
                </div>

                {{-- Contact --}}
                <div>
                    <h4 class="text-sm font-semibold text-white mb-4">Contact</h4>
                    <ul class="space-y-2.5">
                        <li class="flex items-center gap-2.5 text-sm text-gray-400">
                            <svg class="w-4 h-4 text-gray-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            info@drivefleet.pk
                        </li>
                        <li class="flex items-center gap-2.5 text-sm text-gray-400">
                            <svg class="w-4 h-4 text-gray-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            +92 300 1234567
                        </li>
                        <li class="flex items-start gap-2.5 text-sm text-gray-400">
                            <svg class="w-4 h-4 text-gray-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            Lahore, Punjab, Pakistan
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Bottom --}}
            <div class="border-t border-gray-800 mt-10 pt-6 flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="flex items-baseline gap-1">
                    <p class="text-xs text-gray-500">&copy; {{ date('Y') }}</p>
                    <span class="text-xs font-bold text-gray-400">Drive</span>
                    <span class="text-xs font-bold text-gray-600">Fleet</span>
                    <p class="text-xs text-gray-500">. All rights reserved.</p>
                </div>
                <div class="flex items-center gap-6">
    <a href="{{ route('terms') }}" class="text-xs text-gray-500 hover:text-white transition">Terms & Conditions</a>
    <a href="{{ route('privacy') }}" class="text-xs text-gray-500 hover:text-white transition">Privacy Policy</a>
</div>
            </div>
        </div>
    </footer>

</body>
</html>