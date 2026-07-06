<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Not Found - DriveFleet</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Figtree', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 antialiased">

    <div class="min-h-screen flex flex-col">

        {{-- Navbar --}}
        <header class="w-full bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <a href="{{ url('/') }}" class="flex items-center gap-2.5">
                        <div class="w-9 h-9 bg-gray-900 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/>
                            </svg>
                        </div>
                        <div class="flex items-baseline">
                            <span class="text-xl font-extrabold text-gray-900 tracking-tight">Drive</span>
                            <span class="text-xl font-extrabold text-gray-400 tracking-tight">Fleet</span>
                        </div>
                    </a>
                    <a href="{{ url('/') }}" class="text-sm font-medium text-gray-500 hover:text-gray-900 transition">
                        Go Home
                    </a>
                </div>
            </div>
        </header>

        {{-- Content --}}
        <main class="flex-1 flex items-center justify-center px-6 py-16">
            <div class="text-center max-w-lg">

                {{-- 404 Number --}}
                <p class="text-[140px] sm:text-[180px] font-black text-gray-100 leading-none select-none">404</p>

                {{-- Icon --}}
                <div class="w-20 h-20 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto -mt-10 mb-6 relative z-10">
                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>

                {{-- Text --}}
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 tracking-tight">Page not found</h1>
                <p class="text-gray-500 mt-3 text-base leading-relaxed">
                    Sorry, the page you're looking for doesn't exist or has been moved. Let's get you back on track.
                </p>

                {{-- Actions --}}
                <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-3">
                    <a href="{{ url('/') }}" class="w-full sm:w-auto px-8 py-3 bg-gray-900 text-white font-semibold text-sm rounded-lg hover:bg-gray-800 transition inline-flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Go to Homepage
                    </a>
                    <a href="{{ route('dashboard') }}" class="w-full sm:w-auto px-8 py-3 bg-white text-gray-700 font-semibold text-sm rounded-lg border border-gray-300 hover:bg-gray-50 transition inline-flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Browse Cars
                    </a>
                </div>

                {{-- Quick Links --}}
                <div class="mt-12 pt-8 border-t border-gray-200">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Helpful Links</p>
                    <div class="flex flex-wrap items-center justify-center gap-x-6 gap-y-2">
                        <a href="{{ url('/') }}" class="text-sm text-gray-500 hover:text-gray-900 transition">Home</a>
                        <a href="{{ route('dashboard') }}" class="text-sm text-gray-500 hover:text-gray-900 transition">Fleet</a>
                        <a href="{{ route('contact') }}" class="text-sm text-gray-500 hover:text-gray-900 transition">Contact</a>
                        @auth
                            <a href="{{ route('bookings.my_bookings') }}" class="text-sm text-gray-500 hover:text-gray-900 transition">My Bookings</a>
                        @endauth
                    </div>
                </div>
            </div>
        </main>

        {{-- Footer --}}
        <footer class="py-6 text-center">
            <p class="text-xs text-gray-400">
                &copy; {{ date('Y') }} 
                <span class="font-bold text-gray-500">Drive</span><span class="font-bold text-gray-400">Fleet</span>. 
                All rights reserved.
            </p>
        </footer>

    </div>

</body>
</html>