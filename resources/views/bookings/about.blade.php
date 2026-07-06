<x-app-layout>

    {{-- Hero --}}
    <div class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-16 sm:py-20">
            <div class="max-w-3xl">
                <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-[0.2em] mb-4">About Us</p>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold leading-tight tracking-tight">
                    Driving Excellence
                    <span class="block text-transparent bg-clip-text bg-gradient-to-r from-white to-gray-400">Since Day One.</span>
                </h1>
                <p class="text-gray-400 mt-6 text-base sm:text-lg leading-relaxed max-w-2xl">
                    DriveFleet is a premium car rental service committed to providing the best vehicles, transparent pricing, and exceptional customer experience across Pakistan.
                </p>
            </div>
        </div>
    </div>

    {{-- Mission & Vision --}}
    <div class="bg-white py-16 sm:py-20">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid sm:grid-cols-2 gap-8">
                <div class="bg-gray-50 rounded-xl border border-gray-200 p-8">
                    <div class="w-12 h-12 bg-gray-900 rounded-xl flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-gray-900">Our Mission</h2>
                    <p class="text-sm text-gray-500 mt-3 leading-relaxed">
                        To make premium car rental accessible, affordable, and hassle-free for everyone. We believe that renting a car should be as simple as booking a ride — no hidden fees, no complicated paperwork, just pure convenience.
                    </p>
                </div>
                <div class="bg-gray-50 rounded-xl border border-gray-200 p-8">
                    <div class="w-12 h-12 bg-gray-900 rounded-xl flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-gray-900">Our Vision</h2>
                    <p class="text-sm text-gray-500 mt-3 leading-relaxed">
                        To become Pakistan's most trusted and customer-centric car rental platform. We envision a future where mobility is seamless, and every journey begins with confidence and comfort.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Stats --}}
    <div class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-14">
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-8 text-center">
                <div>
                    <p class="text-3xl sm:text-4xl font-extrabold">500+</p>
                    <p class="text-xs text-gray-400 uppercase tracking-widest mt-2">Vehicles</p>
                </div>
                <div>
                    <p class="text-3xl sm:text-4xl font-extrabold">2,000+</p>
                    <p class="text-xs text-gray-400 uppercase tracking-widest mt-2">Happy Customers</p>
                </div>
                <div>
                    <p class="text-3xl sm:text-4xl font-extrabold">15+</p>
                    <p class="text-xs text-gray-400 uppercase tracking-widest mt-2">Cities</p>
                </div>
                <div>
                    <p class="text-3xl sm:text-4xl font-extrabold">99%</p>
                    <p class="text-xs text-gray-400 uppercase tracking-widest mt-2">Satisfaction</p>
                </div>
            </div>
        </div>
    </div>

    {{-- What Sets Us Apart --}}
    <div class="bg-white py-16 sm:py-20">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-[0.2em] mb-3">Our Strengths</p>
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 tracking-tight">What Sets Us Apart</h2>
                <p class="text-gray-500 mt-4 text-base">We're not just another car rental. Here's why thousands choose DriveFleet.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="border border-gray-200 rounded-xl p-7 hover:border-gray-400 hover:shadow-sm transition-all duration-200 group">
                    <div class="w-11 h-11 bg-gray-100 rounded-lg flex items-center justify-center mb-5 group-hover:bg-gray-900 transition-colors duration-200">
                        <svg class="w-5 h-5 text-gray-700 group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900">Verified Fleet</h3>
                    <p class="text-sm text-gray-500 mt-2 leading-relaxed">Every vehicle in our fleet is regularly inspected, serviced, and maintained to the highest standards of safety and performance.</p>
                </div>

                <div class="border border-gray-200 rounded-xl p-7 hover:border-gray-400 hover:shadow-sm transition-all duration-200 group">
                    <div class="w-11 h-11 bg-gray-100 rounded-lg flex items-center justify-center mb-5 group-hover:bg-gray-900 transition-colors duration-200">
                        <svg class="w-5 h-5 text-gray-700 group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900">Honest Pricing</h3>
                    <p class="text-sm text-gray-500 mt-2 leading-relaxed">What you see is what you pay. No hidden charges, no surprise fees. Our pricing is 100% transparent and competitive.</p>
                </div>

                <div class="border border-gray-200 rounded-xl p-7 hover:border-gray-400 hover:shadow-sm transition-all duration-200 group">
                    <div class="w-11 h-11 bg-gray-100 rounded-lg flex items-center justify-center mb-5 group-hover:bg-gray-900 transition-colors duration-200">
                        <svg class="w-5 h-5 text-gray-700 group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900">Instant Booking</h3>
                    <p class="text-sm text-gray-500 mt-2 leading-relaxed">Book your ride in seconds with our smart calendar system. Instant confirmation, real-time availability, and email notifications.</p>
                </div>

                <div class="border border-gray-200 rounded-xl p-7 hover:border-gray-400 hover:shadow-sm transition-all duration-200 group">
                    <div class="w-11 h-11 bg-gray-100 rounded-lg flex items-center justify-center mb-5 group-hover:bg-gray-900 transition-colors duration-200">
                        <svg class="w-5 h-5 text-gray-700 group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900">24/7 Support</h3>
                    <p class="text-sm text-gray-500 mt-2 leading-relaxed">Our dedicated support team is available around the clock. Whether it's a booking query or roadside assistance, we're always here.</p>
                </div>

                <div class="border border-gray-200 rounded-xl p-7 hover:border-gray-400 hover:shadow-sm transition-all duration-200 group">
                    <div class="w-11 h-11 bg-gray-100 rounded-lg flex items-center justify-center mb-5 group-hover:bg-gray-900 transition-colors duration-200">
                        <svg class="w-5 h-5 text-gray-700 group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900">Flexible Dates</h3>
                    <p class="text-sm text-gray-500 mt-2 leading-relaxed">Plans changed? No worries. Free cancellation on pending bookings. We understand life doesn't always go as planned.</p>
                </div>

                <div class="border border-gray-200 rounded-xl p-7 hover:border-gray-400 hover:shadow-sm transition-all duration-200 group">
                    <div class="w-11 h-11 bg-gray-100 rounded-lg flex items-center justify-center mb-5 group-hover:bg-gray-900 transition-colors duration-200">
                        <svg class="w-5 h-5 text-gray-700 group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900">Multiple Locations</h3>
                    <p class="text-sm text-gray-500 mt-2 leading-relaxed">Available across 15+ cities in Pakistan. Pick up from one location, drop off at another. Ultimate convenience for travelers.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Our Story --}}
    <div class="bg-gray-50 border-t border-b border-gray-200 py-16 sm:py-20">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="max-w-3xl mx-auto text-center">
                <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-[0.2em] mb-3">Our Story</p>
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 tracking-tight">How DriveFleet Started</h2>
                <div class="mt-8 space-y-4 text-base text-gray-600 leading-relaxed text-left">
                    <p>
                        DriveFleet was born from a simple frustration — renting a car in Pakistan was unnecessarily complicated. Hidden charges, unreliable vehicles, and poor customer service were the norm. We knew there had to be a better way.
                    </p>
                    <p>
                        Starting with just a handful of vehicles and a vision for transparency, we set out to build a car rental service that puts the customer first. Every decision we make — from our pricing model to our vehicle selection — is guided by one question: "Is this the best experience for our customers?"
                    </p>
                    <p>
                        Today, DriveFleet serves thousands of happy customers across Pakistan with a fleet of 500+ vehicles ranging from budget-friendly sedans to premium luxury cars. But our mission remains the same — making mobility simple, safe, and affordable for everyone.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Team Values --}}
    <div class="bg-white py-16 sm:py-20">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-[0.2em] mb-3">Our Values</p>
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 tracking-tight">What We Stand For</h2>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="text-center">
                    <div class="w-14 h-14 bg-gray-900 text-white rounded-2xl flex items-center justify-center mx-auto">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-sm font-bold text-gray-900 mt-4">Customer First</h3>
                    <p class="text-xs text-gray-500 mt-2 leading-relaxed">Every decision starts with what's best for our customers</p>
                </div>

                <div class="text-center">
                    <div class="w-14 h-14 bg-gray-900 text-white rounded-2xl flex items-center justify-center mx-auto">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-sm font-bold text-gray-900 mt-4">Trust & Safety</h3>
                    <p class="text-xs text-gray-500 mt-2 leading-relaxed">Verified vehicles, insured rides, and secure transactions</p>
                </div>

                <div class="text-center">
                    <div class="w-14 h-14 bg-gray-900 text-white rounded-2xl flex items-center justify-center mx-auto">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-sm font-bold text-gray-900 mt-4">Innovation</h3>
                    <p class="text-xs text-gray-500 mt-2 leading-relaxed">Constantly improving our platform and service quality</p>
                </div>

                <div class="text-center">
                    <div class="w-14 h-14 bg-gray-900 text-white rounded-2xl flex items-center justify-center mx-auto">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-sm font-bold text-gray-900 mt-4">Community</h3>
                    <p class="text-xs text-gray-500 mt-2 leading-relaxed">Building meaningful relationships with our customers</p>
                </div>
            </div>
        </div>
    </div>

    {{-- CTA --}}
    <div class="bg-gray-900">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-14 sm:py-16">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-6">
                <div>
                    <h2 class="text-xl sm:text-2xl font-bold text-white">Ready to experience DriveFleet?</h2>
                    <p class="text-gray-400 text-sm mt-2 max-w-lg">Join thousands of happy customers and book your next ride today.</p>
                </div>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('dashboard') }}" class="px-8 py-3.5 bg-white text-gray-900 font-semibold text-sm rounded-md hover:bg-gray-100 transition inline-flex items-center gap-2">
                        Browse Fleet
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <a href="{{ route('contact') }}" class="px-8 py-3.5 border border-gray-600 text-gray-300 font-semibold text-sm rounded-md hover:border-white hover:text-white transition">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>