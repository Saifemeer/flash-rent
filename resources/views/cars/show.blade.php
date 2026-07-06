<x-app-layout>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Back Button --}}
            <div class="mb-6">
                <a href="{{ route('dashboard') }}" class="text-sm text-gray-500 hover:text-gray-900 transition inline-flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back to Fleet
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- ============================================ --}}
                {{-- LEFT: Car Image & Details --}}
                {{-- ============================================ --}}
                <div class="lg:col-span-2 space-y-6">

                    {{-- Image --}}
                    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                        <div class="h-72 sm:h-96 bg-gray-100 overflow-hidden">
                            @if($car->image)
                                <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <svg class="w-20 h-20 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Vehicle Details Card --}}
                    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                        <div class="px-6 py-5 border-b border-gray-100">
                            <h3 class="text-base font-bold text-gray-900">Vehicle Details</h3>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-6">
                                <div>
                                    <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-wider">Brand</p>
                                    <p class="text-sm font-bold text-gray-900 mt-1">{{ $car->brand }}</p>
                                </div>
                                <div>
                                    <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-wider">Model</p>
                                    <p class="text-sm font-bold text-gray-900 mt-1">{{ $car->name }}</p>
                                </div>
                                <div>
                                    <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-wider">Year</p>
                                    <p class="text-sm font-bold text-gray-900 mt-1">{{ $car->model_year }}</p>
                                </div>
                                <div>
                                    <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-wider">Category</p>
                                    <p class="text-sm font-bold text-gray-900 mt-1 capitalize">{{ $car->category }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Rental Policy --}}
                    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                        <div class="px-6 py-5 border-b border-gray-100">
                            <h3 class="text-base font-bold text-gray-900">Rental Policy</h3>
                        </div>
                        <div class="p-6">
                            <div class="grid sm:grid-cols-2 gap-5">
                                <div class="flex items-start gap-3">
                                    <div class="w-9 h-9 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-900">Instant Confirmation</p>
                                        <p class="text-xs text-gray-500 mt-0.5">Your booking is confirmed immediately after approval</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3">
                                    <div class="w-9 h-9 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-900">No Hidden Charges</p>
                                        <p class="text-xs text-gray-500 mt-0.5">Pay only the displayed daily rate</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3">
                                    <div class="w-9 h-9 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-900">Fully Insured</p>
                                        <p class="text-xs text-gray-500 mt-0.5">Comprehensive insurance included</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3">
                                    <div class="w-9 h-9 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-900">Flexible Cancellation</p>
                                        <p class="text-xs text-gray-500 mt-0.5">Free cancellation while booking is pending</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Booked Dates --}}
                    @if($existingBookings->isNotEmpty())
                        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                            <div class="px-6 py-5 border-b border-gray-100">
                                <div class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <h3 class="text-base font-bold text-gray-900">Booked Dates</h3>
                                </div>
                                <p class="text-sm text-gray-500 mt-0.5">These dates are currently unavailable</p>
                            </div>
                            <div class="p-6 space-y-2">
                                @foreach($existingBookings as $index => $res)
                                    <div class="flex items-center gap-3 p-3 bg-red-50 border border-red-100 rounded-lg">
                                        <span class="inline-flex items-center justify-center w-7 h-7 rounded-md bg-red-100 text-red-700 font-bold text-xs flex-shrink-0">
                                            {{ $index + 1 }}
                                        </span>
                                        <div class="flex items-center gap-2 text-sm">
                                            <span class="font-semibold text-red-900">{{ \Carbon\Carbon::parse($res->start_date)->format('d M, Y') }}</span>
                                            <svg class="w-4 h-4 text-red-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                            </svg>
                                            <span class="font-semibold text-red-900">{{ \Carbon\Carbon::parse($res->end_date)->format('d M, Y') }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                {{-- ============================================ --}}
                {{-- RIGHT: Booking Sidebar --}}
                {{-- ============================================ --}}
                <div class="lg:col-span-1 space-y-6">

                    {{-- Price & Book Card --}}
                    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden sticky top-24">
                        <div class="p-6">
                            {{-- Status --}}
                            <div class="flex items-center justify-between mb-4">
                                @if($car->is_available)
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        Available
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-700 border border-amber-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                        Limited Availability
                                    </span>
                                @endif
                                <span class="text-[11px] font-semibold uppercase tracking-wider text-gray-500 bg-gray-100 px-2.5 py-1 rounded capitalize">
                                    {{ $car->category }}
                                </span>
                            </div>

                            {{-- Name --}}
                            <p class="text-[11px] font-semibold uppercase tracking-widest text-gray-400">{{ $car->brand }}</p>
                            <h1 class="text-2xl font-bold text-gray-900 mt-1">{{ $car->name }}</h1>
                            <p class="text-sm text-gray-500 mt-1">{{ $car->model_year }} Model</p>

                            {{-- Price --}}
                            <div class="mt-6 pt-6 border-t border-gray-100">
                                <p class="text-[11px] uppercase tracking-wider text-gray-400 font-medium">Daily Rate</p>
                                <div class="flex items-baseline gap-1 mt-1">
                                    <span class="text-sm text-gray-500">Rs.</span>
                                    <span class="text-3xl font-extrabold text-gray-900">{{ number_format($car->price_per_day) }}</span>
                                    <span class="text-sm text-gray-400">/ day</span>
                                </div>
                            </div>

                            {{-- Book Button --}}
                            <div class="mt-6">
                                <a href="{{ route('bookings.create', $car->id) }}" class="w-full py-3.5 bg-gray-900 text-white font-semibold text-sm rounded-lg hover:bg-gray-800 active:bg-black transition inline-flex items-center justify-center gap-2">
                                    Book This Vehicle
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </a>
                            </div>

                            {{-- Quick Info --}}
                            <div class="mt-6 pt-6 border-t border-gray-100 space-y-3">
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-500">Brand</span>
                                    <span class="font-semibold text-gray-900">{{ $car->brand }}</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-500">Model</span>
                                    <span class="font-semibold text-gray-900">{{ $car->name }}</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-500">Year</span>
                                    <span class="font-semibold text-gray-900">{{ $car->model_year }}</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-500">Category</span>
                                    <span class="font-semibold text-gray-900 capitalize">{{ $car->category }}</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-500">Daily Rate</span>
                                    <span class="font-semibold text-gray-900">Rs. {{ number_format($car->price_per_day) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Contact Support --}}
                    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                        <div class="p-6 text-center">
                            <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center mx-auto mb-3">
                                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                            </div>
                            <h4 class="text-sm font-bold text-gray-900">Need Help?</h4>
                            <p class="text-xs text-gray-500 mt-1">Our team is available 24/7</p>
                            <p class="text-sm font-semibold text-gray-900 mt-3">+92 300 1234567</p>
                            <p class="text-xs text-gray-500 mt-0.5">info@drivefleet.pk</p>
                        </div>
                    </div>
                </div>

            </div>

            {{-- ============================================ --}}
            {{-- SIMILAR CARS --}}
            {{-- ============================================ --}}
            @if($similarCars->isNotEmpty())
                <div class="mt-12">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Similar Vehicles</h2>
                            <p class="text-sm text-gray-500 mt-0.5">More {{ $car->category }} cars you might like</p>
                        </div>
                        <a href="{{ route('dashboard', ['category' => $car->category]) }}" class="text-sm font-medium text-gray-500 hover:text-gray-900 transition inline-flex items-center gap-1">
                            View All
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($similarCars as $similar)
                            <a href="{{ route('cars.show', $similar->id) }}" class="bg-white rounded-xl overflow-hidden border border-gray-200 hover:border-gray-300 hover:shadow-lg transition-all duration-300 flex flex-col group">
                                {{-- Image --}}
                                <div class="relative h-44 bg-gray-100 overflow-hidden">
                                    @if($similar->image)
                                        <img src="{{ asset('storage/' . $similar->image) }}" alt="{{ $similar->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-gray-50">
                                            <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    @endif

                                    {{-- Status --}}
                                    <div class="absolute top-3 right-3">
                                        @if($similar->is_available)
                                            <span class="inline-flex items-center gap-1 px-2 py-0.5 text-[10px] font-bold uppercase tracking-wider bg-white/90 backdrop-blur-sm text-emerald-700 rounded-md border border-emerald-200">
                                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                                Available
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1 px-2 py-0.5 text-[10px] font-bold uppercase tracking-wider bg-white/90 backdrop-blur-sm text-amber-700 rounded-md border border-amber-200">
                                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                                Booked
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{-- Content --}}
                                <div class="p-5 flex-1 flex flex-col">
                                    <span class="text-[11px] font-semibold uppercase tracking-widest text-gray-400">{{ $similar->brand }}</span>
                                    <h3 class="text-base font-bold text-gray-900 mt-1">{{ $similar->name }}</h3>
                                    <p class="text-xs text-gray-400 mt-0.5">{{ $similar->model_year }} Model</p>

                                    <div class="mt-auto pt-4 border-t border-gray-100 mt-4 flex items-end justify-between">
                                        <div>
                                            <p class="text-[10px] uppercase tracking-wider text-gray-400 font-medium">Per Day</p>
                                            <p class="text-lg font-extrabold text-gray-900">Rs. {{ number_format($similar->price_per_day) }}</p>
                                        </div>
                                        <span class="px-4 py-2 text-xs font-semibold text-white bg-gray-900 rounded-lg group-hover:bg-gray-800 transition">
                                            View Details
                                        </span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </div>

</x-app-layout>