<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'RentWheels') }} - Premium Car Rental</title>
    <meta name="description" content="Rent premium cars at affordable rates. Sedans, SUVs, and Luxury vehicles available.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800,900" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        body { font-family: 'Inter', sans-serif; -webkit-font-smoothing: antialiased; }
        html { scroll-behavior: smooth; }
        ::selection { background-color: #1f2937; color: #fff; }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #c1c1c1; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #a1a1a1; }
    </style>
</head>
<body class="bg-white text-gray-900">

    {{-- ============================================ --}}
    {{-- NAVBAR --}}
    {{-- ============================================ --}}
    <header class="w-full bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">

                {{-- Logo --}}
                <a href="/" class="flex items-center gap-2.5">
                    <div class="w-8 h-8 bg-gray-900 rounded-md flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <span class="text-lg font-bold text-gray-900 tracking-tight">{{ config('app.name', 'RentWheels') }}</span>
                </a>

                {{-- Nav Links --}}
                <nav class="hidden md:flex items-center gap-8">
                    <a href="#features" class="text-sm font-medium text-gray-500 hover:text-gray-900 transition">Features</a>
                    <a href="#how-it-works" class="text-sm font-medium text-gray-500 hover:text-gray-900 transition">How It Works</a>
                    <a href="#fleet" class="text-sm font-medium text-gray-500 hover:text-gray-900 transition">Fleet</a>
                    <a href="#testimonials" class="text-sm font-medium text-gray-500 hover:text-gray-900 transition">Reviews</a>
                </nav>

                {{-- Auth --}}
                <div class="flex items-center gap-3">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-5 py-2 text-sm font-semibold text-white bg-gray-900 rounded-md hover:bg-gray-800 transition">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="hidden sm:inline-block px-5 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 transition">
                                Log in
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-5 py-2 text-sm font-semibold text-white bg-gray-900 rounded-md hover:bg-gray-800 transition">
                                    Get Started
                                </a>
                            @endif
                        @endauth
                    @endif

                    {{-- Mobile Menu --}}
                    <button type="button" class="md:hidden p-2 text-gray-500 hover:text-gray-900" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Mobile Menu --}}
            <div id="mobile-menu" class="hidden md:hidden border-t border-gray-100 py-4 space-y-1">
                <a href="#features" class="block px-3 py-2.5 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-md">Features</a>
                <a href="#how-it-works" class="block px-3 py-2.5 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-md">How It Works</a>
                <a href="#fleet" class="block px-3 py-2.5 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-md">Fleet</a>
                <a href="#testimonials" class="block px-3 py-2.5 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-md">Reviews</a>
                @guest
                    <div class="border-t border-gray-100 pt-3 mt-3 space-y-1">
                        <a href="{{ route('login') }}" class="block px-3 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-md">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="block px-3 py-2.5 text-sm font-semibold text-white bg-gray-900 rounded-md text-center">Get Started</a>
                        @endif
                    </div>
                @endguest
            </div>
        </div>
    </header>

    {{-- ============================================ --}}
    {{-- HERO SECTION --}}
    {{-- ============================================ --}}
    <section class="bg-gray-900 text-white relative overflow-hidden">
        {{-- Grid Pattern --}}
        <div class="absolute inset-0 opacity-[0.03]">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                        <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="0.5"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)"/>
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-20 sm:py-28 lg:py-36 relative z-10">
            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-white/10 border border-white/10 rounded-full text-xs font-medium text-gray-300 mb-6">
                    <span class="w-1.5 h-1.5 bg-green-400 rounded-full animate-pulse"></span>
                    Trusted by 2,000+ customers across Pakistan
                </div>

                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-[1.1] tracking-tight">
                    Premium Cars,
                    <span class="block text-transparent bg-clip-text bg-gradient-to-r from-gray-200 to-gray-500">Affordable Rates.</span>
                </h1>

                <p class="text-gray-400 mt-6 text-lg leading-relaxed max-w-xl">
                    From daily commutes to weekend getaways — rent sedans, SUVs, and luxury vehicles with instant booking, transparent pricing, and 24/7 support.
                </p>

                <div class="mt-8 flex flex-wrap gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-8 py-3.5 bg-white text-gray-900 font-semibold text-sm rounded-md hover:bg-gray-100 transition inline-flex items-center gap-2">
                            Go to Dashboard
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="px-8 py-3.5 bg-white text-gray-900 font-semibold text-sm rounded-md hover:bg-gray-100 transition inline-flex items-center gap-2">
                            Start Booking
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                        <a href="#how-it-works" class="px-8 py-3.5 border border-gray-600 text-gray-300 font-semibold text-sm rounded-md hover:border-white hover:text-white transition">
                            Learn More
                        </a>
                    @endauth
                </div>

                {{-- Stats --}}
                <div class="mt-14 flex flex-wrap gap-10 border-t border-gray-800 pt-8">
                    <div>
                        <p class="text-3xl font-bold">500<span class="text-gray-600">+</span></p>
                        <p class="text-xs text-gray-500 uppercase tracking-widest mt-1">Vehicles</p>
                    </div>
                    <div>
                        <p class="text-3xl font-bold">2K<span class="text-gray-600">+</span></p>
                        <p class="text-xs text-gray-500 uppercase tracking-widest mt-1">Happy Clients</p>
                    </div>
                    <div>
                        <p class="text-3xl font-bold">15<span class="text-gray-600">+</span></p>
                        <p class="text-xs text-gray-500 uppercase tracking-widest mt-1">Cities</p>
                    </div>
                    <div>
                        <p class="text-3xl font-bold">24/7</p>
                        <p class="text-xs text-gray-500 uppercase tracking-widest mt-1">Support</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- BRAND LOGOS --}}
    {{-- ============================================ --}}
    <section class="bg-gray-50 border-b border-gray-200 py-8">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <p class="text-center text-[11px] font-semibold text-gray-400 uppercase tracking-[0.2em] mb-6">Brands in our fleet</p>
            <div class="flex flex-wrap items-center justify-center gap-x-12 gap-y-4">
                <span class="text-xl font-bold text-gray-300 tracking-tight">Toyota</span>
                <span class="text-xl font-bold text-gray-300 tracking-tight">Honda</span>
                <span class="text-xl font-bold text-gray-300 tracking-tight">Suzuki</span>
                <span class="text-xl font-bold text-gray-300 tracking-tight">Hyundai</span>
                <span class="text-xl font-bold text-gray-300 tracking-tight">KIA</span>
                <span class="text-xl font-bold text-gray-300 tracking-tight">BMW</span>
                <span class="text-xl font-bold text-gray-300 tracking-tight">Mercedes</span>
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- FEATURES --}}
    {{-- ============================================ --}}
    <section id="features" class="bg-white py-20 sm:py-24">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-[0.2em] mb-3">Why Choose Us</p>
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 tracking-tight">Everything you need for a perfect ride</h2>
                <p class="text-gray-500 mt-4 text-base">We make car rental simple, safe, and affordable. Here's what sets us apart.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                {{-- Feature 1 --}}
                <div class="border border-gray-200 rounded-lg p-7 hover:border-gray-400 transition-colors duration-200 group">
                    <div class="w-11 h-11 bg-gray-100 rounded-lg flex items-center justify-center mb-5 group-hover:bg-gray-900 transition-colors duration-200">
                        <svg class="w-5 h-5 text-gray-700 group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Transparent Pricing</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">No hidden charges, no surprises. The price you see is the price you pay. Simple and honest.</p>
                </div>

                {{-- Feature 2 --}}
                <div class="border border-gray-200 rounded-lg p-7 hover:border-gray-400 transition-colors duration-200 group">
                    <div class="w-11 h-11 bg-gray-100 rounded-lg flex items-center justify-center mb-5 group-hover:bg-gray-900 transition-colors duration-200">
                        <svg class="w-5 h-5 text-gray-700 group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Instant Booking</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Book your car in seconds. No paperwork, no waiting. Get instant confirmation on every booking.</p>
                </div>

                {{-- Feature 3 --}}
                <div class="border border-gray-200 rounded-lg p-7 hover:border-gray-400 transition-colors duration-200 group">
                    <div class="w-11 h-11 bg-gray-100 rounded-lg flex items-center justify-center mb-5 group-hover:bg-gray-900 transition-colors duration-200">
                        <svg class="w-5 h-5 text-gray-700 group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Fully Insured</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">All our vehicles come with comprehensive insurance coverage. Drive with complete peace of mind.</p>
                </div>

                {{-- Feature 4 --}}
                <div class="border border-gray-200 rounded-lg p-7 hover:border-gray-400 transition-colors duration-200 group">
                    <div class="w-11 h-11 bg-gray-100 rounded-lg flex items-center justify-center mb-5 group-hover:bg-gray-900 transition-colors duration-200">
                        <svg class="w-5 h-5 text-gray-700 group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">24/7 Support</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Our support team is available around the clock. Call, chat, or email — we're always here for you.</p>
                </div>

                {{-- Feature 5 --}}
                <div class="border border-gray-200 rounded-lg p-7 hover:border-gray-400 transition-colors duration-200 group">
                    <div class="w-11 h-11 bg-gray-100 rounded-lg flex items-center justify-center mb-5 group-hover:bg-gray-900 transition-colors duration-200">
                        <svg class="w-5 h-5 text-gray-700 group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Flexible Dates</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Need to change your plans? No problem. Flexible cancellation and date modification available.</p>
                </div>

                {{-- Feature 6 --}}
                <div class="border border-gray-200 rounded-lg p-7 hover:border-gray-400 transition-colors duration-200 group">
                    <div class="w-11 h-11 bg-gray-100 rounded-lg flex items-center justify-center mb-5 group-hover:bg-gray-900 transition-colors duration-200">
                        <svg class="w-5 h-5 text-gray-700 group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Multiple Locations</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Pick up and drop off at multiple locations across major cities. Convenience at its best.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- HOW IT WORKS --}}
    {{-- ============================================ --}}
    <section id="how-it-works" class="bg-gray-50 border-t border-b border-gray-200 py-20 sm:py-24">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-[0.2em] mb-3">Simple Process</p>
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 tracking-tight">How It Works</h2>
                <p class="text-gray-500 mt-4 text-base">Three simple steps to get on the road. No complicated process.</p>
            </div>

            <div class="grid sm:grid-cols-3 gap-8 sm:gap-12 max-w-4xl mx-auto">
                {{-- Step 1 --}}
                <div class="text-center group">
                    <div class="w-16 h-16 bg-gray-900 text-white rounded-2xl flex items-center justify-center mx-auto group-hover:rounded-3xl transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <div class="text-xs font-bold text-gray-400 uppercase tracking-widest mt-6">Step 01</div>
                    <h3 class="text-base font-bold text-gray-900 mt-2">Browse & Choose</h3>
                    <p class="text-sm text-gray-500 mt-2 leading-relaxed">Explore our fleet, filter by category, and pick the perfect car for your trip.</p>
                </div>

                {{-- Step 2 --}}
                <div class="text-center group">
                    <div class="w-16 h-16 bg-gray-900 text-white rounded-2xl flex items-center justify-center mx-auto group-hover:rounded-3xl transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div class="text-xs font-bold text-gray-400 uppercase tracking-widest mt-6">Step 02</div>
                    <h3 class="text-base font-bold text-gray-900 mt-2">Book Your Dates</h3>
                    <p class="text-sm text-gray-500 mt-2 leading-relaxed">Select your pickup and return dates. Get instant confirmation on your booking.</p>
                </div>

                {{-- Step 3 --}}
                <div class="text-center group">
                    <div class="w-16 h-16 bg-gray-900 text-white rounded-2xl flex items-center justify-center mx-auto group-hover:rounded-3xl transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <div class="text-xs font-bold text-gray-400 uppercase tracking-widest mt-6">Step 03</div>
                    <h3 class="text-base font-bold text-gray-900 mt-2">Drive & Enjoy</h3>
                    <p class="text-sm text-gray-500 mt-2 leading-relaxed">Pick up your car and hit the road. Return it when you're done. That's it.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- FLEET CATEGORIES --}}
    {{-- ============================================ --}}
    <section id="fleet" class="bg-white py-20 sm:py-24">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-[0.2em] mb-3">Our Fleet</p>
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 tracking-tight">Choose Your Category</h2>
                <p class="text-gray-500 mt-4 text-base">From budget-friendly sedans to premium luxury cars — we have it all.</p>
            </div>

            <div class="grid sm:grid-cols-3 gap-6">
                {{-- Sedan --}}
                <div class="group relative bg-gray-100 rounded-lg overflow-hidden h-72 flex items-end cursor-pointer hover:shadow-lg transition-all duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent z-10"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <svg class="w-24 h-24 text-gray-300 group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>
                        </svg>
                    </div>
                    <div class="relative z-20 p-6 w-full">
                        <h3 class="text-xl font-bold text-white">Sedan</h3>
                        <p class="text-sm text-gray-300 mt-1">Comfortable and fuel-efficient</p>
                        <p class="text-sm font-semibold text-white mt-3">Starting from Rs. 3,000/day</p>
                    </div>
                </div>

                {{-- SUV --}}
                <div class="group relative bg-gray-100 rounded-lg overflow-hidden h-72 flex items-end cursor-pointer hover:shadow-lg transition-all duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent z-10"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <svg class="w-24 h-24 text-gray-300 group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div class="relative z-20 p-6 w-full">
                        <h3 class="text-xl font-bold text-white">SUV</h3>
                        <p class="text-sm text-gray-300 mt-1">Spacious and powerful</p>
                        <p class="text-sm font-semibold text-white mt-3">Starting from Rs. 7,000/day</p>
                    </div>
                </div>

                {{-- Luxury --}}
                <div class="group relative bg-gray-100 rounded-lg overflow-hidden h-72 flex items-end cursor-pointer hover:shadow-lg transition-all duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent z-10"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <svg class="w-24 h-24 text-gray-300 group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                        </svg>
                    </div>
                    <div class="relative z-20 p-6 w-full">
                        <h3 class="text-xl font-bold text-white">Luxury</h3>
                        <p class="text-sm text-gray-300 mt-1">Premium and elegant</p>
                        <p class="text-sm font-semibold text-white mt-3">Starting from Rs. 15,000/day</p>
                    </div>
                </div>
            </div>

            <div class="text-center mt-10">
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-8 py-3 bg-gray-900 text-white font-semibold text-sm rounded-md hover:bg-gray-800 transition inline-flex items-center gap-2">
                        View All Cars
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                @else
                    <a href="{{ route('register') }}" class="px-8 py-3 bg-gray-900 text-white font-semibold text-sm rounded-md hover:bg-gray-800 transition inline-flex items-center gap-2">
                        Sign Up to Browse
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                @endauth
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- TESTIMONIALS --}}
    {{-- ============================================ --}}
    <section id="testimonials" class="bg-gray-50 border-t border-gray-200 py-20 sm:py-24">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-[0.2em] mb-3">Testimonials</p>
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 tracking-tight">What Our Customers Say</h2>
            </div>

            <div class="grid sm:grid-cols-3 gap-6">
                {{-- Review 1 --}}
                <div class="bg-white border border-gray-200 rounded-lg p-6">
                    <div class="flex items-center gap-1 mb-4">
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                    <p class="text-sm text-gray-600 leading-relaxed">"Best car rental experience in Pakistan. Clean cars, transparent pricing, and the booking process was so smooth. Highly recommended!"</p>
                    <div class="mt-5 flex items-center gap-3">
                        <div class="w-9 h-9 bg-gray-900 rounded-full flex items-center justify-center text-white text-xs font-bold">AH</div>
                        <div>
                            <p class="text-sm font-semibold text-gray-900">Ahmed Hassan</p>
                            <p class="text-xs text-gray-400">Lahore</p>
                        </div>
                    </div>
                </div>

                {{-- Review 2 --}}
                <div class="bg-white border border-gray-200 rounded-lg p-6">
                    <div class="flex items-center gap-1 mb-4">
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                    <p class="text-sm text-gray-600 leading-relaxed">"Rented a Civic for a week trip to Islamabad. Car was in perfect condition. Will definitely use this service again for future trips."</p>
                    <div class="mt-5 flex items-center gap-3">
                        <div class="w-9 h-9 bg-gray-900 rounded-full flex items-center justify-center text-white text-xs font-bold">SK</div>
                        <div>
                            <p class="text-sm font-semibold text-gray-900">Sara Khan</p>
                            <p class="text-xs text-gray-400">Karachi</p>
                        </div>
                    </div>
                </div>

                {{-- Review 3 --}}
                <div class="bg-white border border-gray-200 rounded-lg p-6">
                    <div class="flex items-center gap-1 mb-4">
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 text-gray-200" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                    <p class="text-sm text-gray-600 leading-relaxed">"Great variety of SUVs available. The Fortuner I rented was spotless. Customer support was very helpful when I needed to extend."</p>
                    <div class="mt-5 flex items-center gap-3">
                        <div class="w-9 h-9 bg-gray-900 rounded-full flex items-center justify-center text-white text-xs font-bold">UA</div>
                        <div>
                            <p class="text-sm font-semibold text-gray-900">Usman Ali</p>
                            <p class="text-xs text-gray-400">Islamabad</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- CTA BANNER --}}
    {{-- ============================================ --}}
    <section class="bg-gray-900">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-16 sm:py-20">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-8">
                <div>
                    <h2 class="text-2xl sm:text-3xl font-bold text-white tracking-tight">Ready to get on the road?</h2>
                    <p class="text-gray-400 mt-3 text-base max-w-lg">Join thousands of happy customers. Sign up today and get your first booking with zero service charges.</p>
                </div>
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-8 py-3.5 bg-white text-gray-900 font-semibold text-sm rounded-md hover:bg-gray-100 transition flex-shrink-0 inline-flex items-center gap-2">
                        Browse Cars
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                @else
                    <a href="{{ route('register') }}" class="px-8 py-3.5 bg-white text-gray-900 font-semibold text-sm rounded-md hover:bg-gray-100 transition flex-shrink-0 inline-flex items-center gap-2">
                        Create Free Account
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                @endauth
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- FOOTER --}}
    {{-- ============================================ --}}
    <footer class="bg-gray-950 text-gray-400">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-12">
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
                {{-- Brand --}}
                <div>
                    <a href="/" class="flex items-center gap-2.5 mb-4">
                        <div class="w-7 h-7 bg-white rounded-md flex items-center justify-center">
                            <svg class="w-3.5 h-3.5 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <span class="text-base font-bold text-white">{{ config('app.name', 'RentWheels') }}</span>
                    </a>
                    <p class="text-sm leading-relaxed">Premium car rental service with the best rates and widest selection of vehicles in Pakistan.</p>
                </div>

                {{-- Quick Links --}}
                <div>
                    <h4 class="text-sm font-semibold text-white mb-4">Quick Links</h4>
                    <ul class="space-y-2.5">
                        <li><a href="#fleet" class="text-sm hover:text-white transition">Our Fleet</a></li>
                        <li><a href="#how-it-works" class="text-sm hover:text-white transition">How It Works</a></li>
                        <li><a href="#features" class="text-sm hover:text-white transition">Features</a></li>
                        <li><a href="#testimonials" class="text-sm hover:text-white transition">Reviews</a></li>
                    </ul>
                </div>

                {{-- Categories --}}
                <div>
                    <h4 class="text-sm font-semibold text-white mb-4">Categories</h4>
                    <ul class="space-y-2.5">
                        <li><a href="#" class="text-sm hover:text-white transition">Sedan Cars</a></li>
                        <li><a href="#" class="text-sm hover:text-white transition">SUV Cars</a></li>
                        <li><a href="#" class="text-sm hover:text-white transition">Luxury Cars</a></li>
                        <li><a href="#" class="text-sm hover:text-white transition">Economy Cars</a></li>
                    </ul>
                </div>

                {{-- Contact --}}
                <div>
                    <h4 class="text-sm font-semibold text-white mb-4">Contact</h4>
                    <ul class="space-y-2.5">
                        <li class="flex items-center gap-2 text-sm">
                            <svg class="w-4 h-4 text-gray-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            info@rentwheels.pk
                        </li>
                        <li class="flex items-center gap-2 text-sm">
                            <svg class="w-4 h-4 text-gray-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            +92 300 1234567
                        </li>
                        <li class="flex items-start gap-2 text-sm">
                            <svg class="w-4 h-4 text-gray-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            Lahore, Punjab, Pakistan
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Bottom Bar --}}
            <div class="border-t border-gray-800 mt-10 pt-6 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-xs text-gray-500">&copy; {{ date('Y') }} {{ config('app.name', 'RentWheels') }}. All rights reserved.</p>
                <div class="flex items-center gap-6">
                    <a href="#" class="text-xs text-gray-500 hover:text-white transition">Privacy Policy</a>
                    <a href="#" class="text-xs text-gray-500 hover:text-white transition">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>