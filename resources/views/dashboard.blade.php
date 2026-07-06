<x-app-layout>

    {{-- ============================================ --}}
    {{-- HERO SECTION --}}
    {{-- ============================================ --}}
    <div class="bg-gray-900 text-white relative overflow-hidden">
        {{-- Background Pattern --}}
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

        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-16 sm:py-24 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-white/10 border border-white/10 rounded-full text-xs font-medium text-gray-300 mb-6">
                        <span class="w-1.5 h-1.5 bg-green-400 rounded-full animate-pulse"></span>
                        {{ $cars->where('is_available', true)->count() }} vehicles available right now
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-[1.1] tracking-tight">
                        Find Your
                        <span class="block text-transparent bg-clip-text bg-gradient-to-r from-white to-gray-400">Perfect Ride.</span>
                    </h1>
                    <p class="text-gray-400 mt-6 text-base sm:text-lg leading-relaxed max-w-lg">
                        Premium sedans, powerful SUVs, and luxury vehicles — all at competitive daily rates with instant booking confirmation.
                    </p>
                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="#fleet" class="px-8 py-3.5 bg-white text-gray-900 font-semibold text-sm rounded-md hover:bg-gray-100 transition inline-flex items-center gap-2">
                            Browse Fleet
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </a>
                        <a href="#how-it-works" class="px-8 py-3.5 border border-gray-600 text-gray-300 font-semibold text-sm rounded-md hover:border-white hover:text-white transition">
                            How It Works
                        </a>
                    </div>

                    {{-- Quick Stats --}}
                    <div class="mt-12 flex flex-wrap gap-10 border-t border-gray-800 pt-8">
                        <div>
                            <p class="text-3xl font-bold">{{ $cars->count() }}<span class="text-gray-600">+</span></p>
                            <p class="text-xs text-gray-500 uppercase tracking-widest mt-1">Vehicles</p>
                        </div>
                        <div>
                            <p class="text-3xl font-bold">{{ $cars->where('is_available', true)->count() }}</p>
                            <p class="text-xs text-gray-500 uppercase tracking-widest mt-1">Available</p>
                        </div>
                        <div>
                            <p class="text-3xl font-bold">24/7</p>
                            <p class="text-xs text-gray-500 uppercase tracking-widest mt-1">Support</p>
                        </div>
                        <div class="hidden sm:block">
                            <p class="text-3xl font-bold">{{ $cars->pluck('brand')->unique()->count() }}</p>
                            <p class="text-xs text-gray-500 uppercase tracking-widest mt-1">Brands</p>
                        </div>
                    </div>
                </div>

                {{-- Hero Visual --}}
                <div class="hidden lg:flex items-center justify-center">
                    <div class="relative w-full max-w-md">
                        {{-- Glow --}}
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 to-purple-500/10 rounded-full blur-3xl"></div>

                        {{-- Featured Car Card --}}
                        @php $featured = $cars->where('is_available', true)->first(); @endphp
                        @if($featured)
                            <div class="relative bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-2xl overflow-hidden">
                                @if($featured->image)
                                    <div class="h-48 overflow-hidden">
                                        <img src="{{ asset('storage/' . $featured->image) }}" alt="{{ $featured->name }}" class="w-full h-full object-cover">
                                    </div>
                                @endif
                                <div class="p-5">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-xs text-gray-400 uppercase tracking-wider">{{ $featured->brand }}</p>
                                            <p class="text-lg font-bold text-white mt-0.5">{{ $featured->name }}</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-xs text-gray-400">Per Day</p>
                                            <p class="text-lg font-bold text-white">Rs. {{ number_format($featured->price_per_day) }}</p>
                                        </div>
                                    </div>
                                    <a href="{{ route('bookings.create', $featured->id) }}" class="mt-4 w-full py-2.5 bg-white text-gray-900 text-sm font-semibold rounded-md hover:bg-gray-100 transition text-center block">
                                        Book This Car
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ============================================ --}}
    {{-- SEARCH BAR (Overlapping) --}}
    {{-- ============================================ --}}
    <div id="fleet" class="max-w-7xl mx-auto sm:px-6 lg:px-8 -mt-8 relative z-20 mb-6">
        <div class="bg-white border border-gray-200 rounded-xl shadow-lg p-5 sm:p-6">
            <form method="GET" action="{{ route('dashboard') }}" class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                <div>
                    <label class="block text-[11px] font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Search</label>
                    <div class="relative">
                        <svg class="w-4 h-4 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Car name or brand..."
                               class="w-full border border-gray-300 rounded-lg pl-10 pr-3 py-2.5 text-sm focus:ring-2 focus:ring-gray-900 focus:border-gray-900 placeholder:text-gray-400">
                    </div>
                </div>
                <div>
                    <label class="block text-[11px] font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Category</label>
                    <select name="category" class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:ring-2 focus:ring-gray-900 focus:border-gray-900 text-gray-700">
                        <option value="">All Categories</option>
                        <option value="sedan" {{ request('category') == 'sedan' ? 'selected' : '' }}>Sedan</option>
                        <option value="suv" {{ request('category') == 'suv' ? 'selected' : '' }}>SUV</option>
                        <option value="luxury" {{ request('category') == 'luxury' ? 'selected' : '' }}>Luxury</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[11px] font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Price Range</label>
                    <select name="price" class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:ring-2 focus:ring-gray-900 focus:border-gray-900 text-gray-700">
                        <option value="">Any Price</option>
                        <option value="low" {{ request('price') == 'low' ? 'selected' : '' }}>Under Rs. 5,000</option>
                        <option value="mid" {{ request('price') == 'mid' ? 'selected' : '' }}>Rs. 5,000 - 15,000</option>
                        <option value="high" {{ request('price') == 'high' ? 'selected' : '' }}>Rs. 15,000+</option>
                    </select>
                </div>
                <div class="flex items-end gap-2">
                    <button type="submit" class="flex-1 px-6 py-2.5 bg-gray-900 text-white text-sm font-semibold rounded-lg hover:bg-gray-800 active:bg-black transition inline-flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Search
                    </button>
                    @if(request('search') || request('category') || request('price'))
                        <a href="{{ route('dashboard') }}" class="px-3 py-2.5 border border-gray-300 text-gray-500 text-sm rounded-lg hover:bg-gray-50 transition" title="Clear filters">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    {{-- ============================================ --}}
    {{-- ALERTS --}}
    {{-- ============================================ --}}
    @if(session('success'))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4" x-data="{ show: true }" x-show="show" x-transition>
            <div class="p-4 bg-green-50 border-l-4 border-green-500 text-green-800 rounded-r-lg flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="font-medium text-sm">{{ session('success') }}</span>
                </div>
                <button @click="show = false" class="text-green-400 hover:text-green-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4" x-data="{ show: true }" x-show="show" x-transition>
            <div class="p-4 bg-red-50 border-l-4 border-red-500 text-red-800 rounded-r-lg flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    <span class="font-medium text-sm">{{ session('error') }}</span>
                </div>
                <button @click="show = false" class="text-red-400 hover:text-red-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>
    @endif

    {{-- ============================================ --}}
    {{-- CARS FLEET SECTION --}}
    {{-- ============================================ --}}
    <div class="py-6 pb-16">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Category Pills + Count --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('dashboard') }}"
                       class="px-5 py-2 rounded-lg text-sm font-medium border transition-all duration-200
                       {{ !request('category') ? 'bg-gray-900 text-white border-gray-900' : 'bg-white text-gray-700 border-gray-300 hover:border-gray-900 hover:text-gray-900' }}">
                        All
                    </a>
                    <a href="{{ route('dashboard', ['category' => 'sedan']) }}"
                       class="px-5 py-2 rounded-lg text-sm font-medium border transition-all duration-200
                       {{ request('category') == 'sedan' ? 'bg-gray-900 text-white border-gray-900' : 'bg-white text-gray-700 border-gray-300 hover:border-gray-900 hover:text-gray-900' }}">
                        Sedan
                    </a>
                    <a href="{{ route('dashboard', ['category' => 'suv']) }}"
                       class="px-5 py-2 rounded-lg text-sm font-medium border transition-all duration-200
                       {{ request('category') == 'suv' ? 'bg-gray-900 text-white border-gray-900' : 'bg-white text-gray-700 border-gray-300 hover:border-gray-900 hover:text-gray-900' }}">
                        SUV
                    </a>
                    <a href="{{ route('dashboard', ['category' => 'luxury']) }}"
                       class="px-5 py-2 rounded-lg text-sm font-medium border transition-all duration-200
                       {{ request('category') == 'luxury' ? 'bg-gray-900 text-white border-gray-900' : 'bg-white text-gray-700 border-gray-300 hover:border-gray-900 hover:text-gray-900' }}">
                        Luxury
                    </a>
                </div>
                <p class="text-sm text-gray-500">
                    Showing <span class="font-semibold text-gray-800">{{ $cars->count() }}</span> {{ Str::plural('vehicle', $cars->count()) }}
                    @if(request('category'))
                        in <span class="font-semibold text-gray-800 capitalize">{{ request('category') }}</span>
                    @endif
                    @if(request('search'))
                        for "<span class="font-semibold text-gray-800">{{ request('search') }}</span>"
                    @endif
                </p>
            </div>

            {{-- Cars Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                @forelse($cars as $car)
                    <div class="bg-white rounded-xl overflow-hidden border border-gray-200 hover:border-gray-300 hover:shadow-lg transition-all duration-300 flex flex-col group">

                        {{-- Image --}}
                        <div class="relative h-52 bg-gray-100 overflow-hidden">
                            @if($car->image)
                                <img src="{{ asset('storage/' . $car->image) }}"
                                     alt="{{ $car->name }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gray-50">
                                    <svg class="w-14 h-14 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            @endif

                            {{-- Status --}}
                            <div class="absolute top-3 right-3">
                                @if($car->is_available)
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider bg-white/90 backdrop-blur-sm text-emerald-700 rounded-md border border-emerald-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        Available
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider bg-white/90 backdrop-blur-sm text-amber-700 rounded-md border border-amber-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                        Booked
                                    </span>
                                @endif
                            </div>

                            {{-- Category --}}
                            <div class="absolute bottom-3 left-3">
                                <span class="px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider bg-black/60 backdrop-blur-sm text-white rounded-md capitalize">
                                    {{ $car->category }}
                                </span>
                            </div>
                        </div>

                        {{-- Content --}}
                        <div class="p-5 flex-1 flex flex-col">

                            {{-- Brand --}}
                            <span class="text-[11px] font-semibold uppercase tracking-widest text-gray-400">
                                {{ $car->brand }}
                            </span>

                            {{-- Name --}}
                            <a href="{{ route('cars.show', $car->id) }}" class="text-lg font-bold text-gray-900 leading-snug mt-1 hover:text-gray-700 transition">
    {{ $car->name }}
</a>

                            {{-- Details Row --}}
                            <div class="flex items-center gap-3 mt-2">
                                <span class="inline-flex items-center gap-1 text-xs text-gray-500">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    {{ $car->model_year }}
                                </span>
                                <span class="inline-flex items-center gap-1 text-xs text-gray-500 capitalize">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                    </svg>
                                    {{ $car->category }}
                                </span>
                            </div>

                            {{-- Price & CTA --}}
                            <div class="mt-auto pt-4 border-t border-gray-100 mt-4 flex items-end justify-between">
                                <div>
                                    <p class="text-[11px] uppercase tracking-wider text-gray-400 font-medium">Per Day</p>
                                    <div class="flex items-baseline gap-1 mt-0.5">
                                        <span class="text-sm text-gray-500">Rs.</span>
                                        <span class="text-xl font-extrabold text-gray-900">{{ number_format($car->price_per_day) }}</span>
                                    </div>
                                </div>

                                <a href="{{ route('bookings.create', $car->id) }}"
                                   class="px-5 py-2.5 text-sm font-semibold text-white bg-gray-900 rounded-lg hover:bg-gray-800 active:bg-black transition-all duration-200 inline-flex items-center gap-1.5 group/btn">
                                    Book Now
                                    <svg class="w-3.5 h-3.5 transition-transform group-hover/btn:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </a>
                            </div>
                        </div>

                    </div>
                @empty
                    {{-- Empty State --}}
                    <div class="col-span-full py-20 text-center">
                        <div class="w-20 h-20 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-5">
                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">No vehicles found</h3>
                        <p class="text-sm text-gray-500 mt-2 max-w-md mx-auto">
                            No vehicles match your current filters. Try adjusting your search criteria or browse all available cars.
                        </p>
                        <a href="{{ route('dashboard') }}"
                           class="inline-flex items-center gap-2 mt-6 px-6 py-2.5 text-sm font-semibold text-white bg-gray-900 rounded-lg hover:bg-gray-800 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Clear Filters
                        </a>
                    </div>
                @endforelse

            </div>
        </div>
    </div>

    {{-- ============================================ --}}
    {{-- HOW IT WORKS SECTION --}}
    {{-- ============================================ --}}
    <div id="how-it-works" class="bg-gray-50 border-t border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-16 sm:py-20">
            <div class="text-center mb-14">
                <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-[0.2em] mb-2">Simple Process</p>
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">How It Works</h2>
                <p class="text-sm text-gray-500 mt-3 max-w-lg mx-auto">Rent a car in three simple steps. No hidden fees, no complicated paperwork.</p>
            </div>

            <div class="grid sm:grid-cols-3 gap-8 sm:gap-12 max-w-4xl mx-auto">
                <div class="text-center group">
                    <div class="w-16 h-16 bg-gray-900 text-white rounded-2xl flex items-center justify-center mx-auto group-hover:rounded-3xl transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <div class="text-xs font-bold text-gray-400 uppercase tracking-widest mt-5">Step 01</div>
                    <h3 class="text-base font-bold text-gray-900 mt-2">Browse & Choose</h3>
                    <p class="text-sm text-gray-500 mt-2 leading-relaxed">Explore our fleet and find the perfect car that fits your budget and needs.</p>
                </div>
                <div class="text-center group">
                    <div class="w-16 h-16 bg-gray-900 text-white rounded-2xl flex items-center justify-center mx-auto group-hover:rounded-3xl transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div class="text-xs font-bold text-gray-400 uppercase tracking-widest mt-5">Step 02</div>
                    <h3 class="text-base font-bold text-gray-900 mt-2">Select Dates</h3>
                    <p class="text-sm text-gray-500 mt-2 leading-relaxed">Pick your rental dates with our smart calendar. Instant price calculation.</p>
                </div>
                <div class="text-center group">
                    <div class="w-16 h-16 bg-gray-900 text-white rounded-2xl flex items-center justify-center mx-auto group-hover:rounded-3xl transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <div class="text-xs font-bold text-gray-400 uppercase tracking-widest mt-5">Step 03</div>
                    <h3 class="text-base font-bold text-gray-900 mt-2">Confirm & Drive</h3>
                    <p class="text-sm text-gray-500 mt-2 leading-relaxed">Get instant confirmation. Pick up your car and enjoy the ride.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ============================================ --}}
    {{-- WHY CHOOSE US --}}
    {{-- ============================================ --}}
    <div class="bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-16 sm:py-20">
            <div class="text-center mb-14">
                <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-[0.2em] mb-2">Our Promise</p>
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">Why Choose Us</h2>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
                <div class="border border-gray-200 rounded-xl p-6 hover:border-gray-400 hover:shadow-sm transition-all duration-200 group">
                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center mb-4 group-hover:bg-gray-900 transition-colors duration-200">
                        <svg class="w-5 h-5 text-gray-700 group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 text-sm">Best Prices</h3>
                    <p class="text-sm text-gray-500 mt-2 leading-relaxed">Competitive rates with no hidden charges. What you see is what you pay.</p>
                </div>

                <div class="border border-gray-200 rounded-xl p-6 hover:border-gray-400 hover:shadow-sm transition-all duration-200 group">
                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center mb-4 group-hover:bg-gray-900 transition-colors duration-200">
                        <svg class="w-5 h-5 text-gray-700 group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 text-sm">Fully Insured</h3>
                    <p class="text-sm text-gray-500 mt-2 leading-relaxed">Comprehensive insurance on all vehicles for your complete peace of mind.</p>
                </div>

                <div class="border border-gray-200 rounded-xl p-6 hover:border-gray-400 hover:shadow-sm transition-all duration-200 group">
                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center mb-4 group-hover:bg-gray-900 transition-colors duration-200">
                        <svg class="w-5 h-5 text-gray-700 group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 text-sm">24/7 Support</h3>
                    <p class="text-sm text-gray-500 mt-2 leading-relaxed">Round the clock customer support. We're always here to help you out.</p>
                </div>

                <div class="border border-gray-200 rounded-xl p-6 hover:border-gray-400 hover:shadow-sm transition-all duration-200 group">
                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center mb-4 group-hover:bg-gray-900 transition-colors duration-200">
                        <svg class="w-5 h-5 text-gray-700 group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 text-sm">Instant Booking</h3>
                    <p class="text-sm text-gray-500 mt-2 leading-relaxed">Book in seconds. No paperwork, no waiting. Instant confirmation guaranteed.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ============================================ --}}
    {{-- CTA BANNER --}}
    {{-- ============================================ --}}
    <div class="bg-gray-900">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-14 sm:py-16">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-6">
                <div>
                    <h2 class="text-xl sm:text-2xl font-bold text-white">Ready to hit the road?</h2>
                    <p class="text-gray-400 text-sm mt-2 max-w-lg">Book your ride today. Transparent pricing, flexible dates, and instant confirmation.</p>
                </div>
                <a href="#fleet" class="px-8 py-3.5 bg-white text-gray-900 font-semibold text-sm rounded-md hover:bg-gray-100 transition flex-shrink-0 inline-flex items-center gap-2">
                    Browse Cars
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

</x-app-layout>