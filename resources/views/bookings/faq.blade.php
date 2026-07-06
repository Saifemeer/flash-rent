<x-app-layout>

    {{-- Header --}}
    <div class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-14 sm:py-16">
            <div class="max-w-2xl mx-auto text-center">
                <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-[0.2em] mb-4">Support</p>
                <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Frequently Asked Questions</h1>
                <p class="text-gray-400 mt-4 text-base">Everything you need to know about renting with DriveFleet. Can't find what you're looking for? <a href="{{ route('contact') }}" class="text-white underline hover:no-underline">Contact us</a>.</p>
            </div>
        </div>
    </div>

    <div class="py-12 sm:py-16">
        <div class="max-w-3xl mx-auto px-6 lg:px-8">

            {{-- Booking Questions --}}
            <div class="mb-12">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-gray-900 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h2 class="text-lg font-bold text-gray-900">Booking & Reservations</h2>
                </div>

                <div class="space-y-3">
                    {{-- Q1 --}}
                    <div class="border border-gray-200 rounded-xl overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open" class="w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition">
                            <span class="text-sm font-semibold text-gray-900 pr-4">How do I book a car?</span>
                            <svg class="w-5 h-5 text-gray-400 flex-shrink-0 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse>
                            <div class="px-5 pb-5 text-sm text-gray-600 leading-relaxed border-t border-gray-100 pt-4">
                                Booking a car is simple. Browse our fleet, select a vehicle you like, choose your pickup and return dates using our smart calendar, and submit your booking request. You'll receive a confirmation email once your booking is approved by our team.
                            </div>
                        </div>
                    </div>

                    {{-- Q2 --}}
                    <div class="border border-gray-200 rounded-xl overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open" class="w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition">
                            <span class="text-sm font-semibold text-gray-900 pr-4">Can I cancel my booking?</span>
                            <svg class="w-5 h-5 text-gray-400 flex-shrink-0 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse>
                            <div class="px-5 pb-5 text-sm text-gray-600 leading-relaxed border-t border-gray-100 pt-4">
                                Yes, you can cancel any pending booking for free from your "My Bookings" page. Once a booking has been approved, please contact our support team for cancellation assistance.
                            </div>
                        </div>
                    </div>

                    {{-- Q3 --}}
                    <div class="border border-gray-200 rounded-xl overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open" class="w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition">
                            <span class="text-sm font-semibold text-gray-900 pr-4">How far in advance can I book?</span>
                            <svg class="w-5 h-5 text-gray-400 flex-shrink-0 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse>
                            <div class="px-5 pb-5 text-sm text-gray-600 leading-relaxed border-t border-gray-100 pt-4">
                                You can book a vehicle for any future date as long as it's available. Our calendar shows real-time availability, and already booked dates are automatically blocked so you can only select available periods.
                            </div>
                        </div>
                    </div>

                    {{-- Q4 --}}
                    <div class="border border-gray-200 rounded-xl overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open" class="w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition">
                            <span class="text-sm font-semibold text-gray-900 pr-4">How long does booking approval take?</span>
                            <svg class="w-5 h-5 text-gray-400 flex-shrink-0 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse>
                            <div class="px-5 pb-5 text-sm text-gray-600 leading-relaxed border-t border-gray-100 pt-4">
                                Most bookings are approved within 1-2 hours during business hours. You will receive an email notification as soon as your booking is approved or if any action is needed.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Pricing Questions --}}
            <div class="mb-12">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-gray-900 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h2 class="text-lg font-bold text-gray-900">Pricing & Payments</h2>
                </div>

                <div class="space-y-3">
                    {{-- Q5 --}}
                    <div class="border border-gray-200 rounded-xl overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open" class="w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition">
                            <span class="text-sm font-semibold text-gray-900 pr-4">How is the rental price calculated?</span>
                            <svg class="w-5 h-5 text-gray-400 flex-shrink-0 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse>
                            <div class="px-5 pb-5 text-sm text-gray-600 leading-relaxed border-t border-gray-100 pt-4">
                                The rental price is calculated by multiplying the daily rate of the vehicle by the number of rental days. The total is shown automatically when you select your dates on the booking page. No hidden charges are added.
                            </div>
                        </div>
                    </div>

                    {{-- Q6 --}}
                    <div class="border border-gray-200 rounded-xl overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open" class="w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition">
                            <span class="text-sm font-semibold text-gray-900 pr-4">Are there any hidden charges?</span>
                            <svg class="w-5 h-5 text-gray-400 flex-shrink-0 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse>
                            <div class="px-5 pb-5 text-sm text-gray-600 leading-relaxed border-t border-gray-100 pt-4">
                                No. We believe in 100% transparent pricing. The price you see on our website is the price you pay. There are no service fees, booking fees, or any other hidden charges.
                            </div>
                        </div>
                    </div>

                    {{-- Q7 --}}
                    <div class="border border-gray-200 rounded-xl overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open" class="w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition">
                            <span class="text-sm font-semibold text-gray-900 pr-4">Can I get an invoice for my rental?</span>
                            <svg class="w-5 h-5 text-gray-400 flex-shrink-0 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse>
                            <div class="px-5 pb-5 text-sm text-gray-600 leading-relaxed border-t border-gray-100 pt-4">
                                Yes. Once your booking is approved or completed, you can view and download a PDF invoice from your "My Bookings" page. The invoice includes all booking details, vehicle information, and payment breakdown.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Vehicle Questions --}}
            <div class="mb-12">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-gray-900 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/>
                        </svg>
                    </div>
                    <h2 class="text-lg font-bold text-gray-900">Vehicles & Requirements</h2>
                </div>

                <div class="space-y-3">
                    {{-- Q8 --}}
                    <div class="border border-gray-200 rounded-xl overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open" class="w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition">
                            <span class="text-sm font-semibold text-gray-900 pr-4">What documents do I need to rent a car?</span>
                            <svg class="w-5 h-5 text-gray-400 flex-shrink-0 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse>
                            <div class="px-5 pb-5 text-sm text-gray-600 leading-relaxed border-t border-gray-100 pt-4">
                                You need a valid CNIC (National Identity Card) and a valid driving license. These documents will be verified at the time of vehicle pickup. International customers need a valid passport and international driving permit.
                            </div>
                        </div>
                    </div>

                    {{-- Q9 --}}
                    <div class="border border-gray-200 rounded-xl overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open" class="w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition">
                            <span class="text-sm font-semibold text-gray-900 pr-4">Are the vehicles insured?</span>
                            <svg class="w-5 h-5 text-gray-400 flex-shrink-0 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse>
                            <div class="px-5 pb-5 text-sm text-gray-600 leading-relaxed border-t border-gray-100 pt-4">
                                Yes, all vehicles in our fleet come with comprehensive insurance coverage. This includes third-party liability and vehicle damage protection. You can drive with complete peace of mind.
                            </div>
                        </div>
                    </div>

                    {{-- Q10 --}}
                    <div class="border border-gray-200 rounded-xl overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open" class="w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition">
                            <span class="text-sm font-semibold text-gray-900 pr-4">What types of cars are available?</span>
                            <svg class="w-5 h-5 text-gray-400 flex-shrink-0 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse>
                            <div class="px-5 pb-5 text-sm text-gray-600 leading-relaxed border-t border-gray-100 pt-4">
                                We offer a wide range of vehicles across three categories: <strong>Sedans</strong> (Civic, Corolla, City), <strong>SUVs</strong> (Fortuner, Sportage, Tucson), and <strong>Luxury</strong> (Mercedes, BMW, Audi). You can browse our complete fleet on the dashboard.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Account Questions --}}
            <div class="mb-12">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-gray-900 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <h2 class="text-lg font-bold text-gray-900">Account & Support</h2>
                </div>

                <div class="space-y-3">
                    {{-- Q11 --}}
                    <div class="border border-gray-200 rounded-xl overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open" class="w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition">
                            <span class="text-sm font-semibold text-gray-900 pr-4">Do I need an account to book?</span>
                            <svg class="w-5 h-5 text-gray-400 flex-shrink-0 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse>
                            <div class="px-5 pb-5 text-sm text-gray-600 leading-relaxed border-t border-gray-100 pt-4">
                                Yes, you need a free account to make bookings. Registration takes less than a minute and gives you access to our full fleet, booking history, invoices, and email notifications.
                            </div>
                        </div>
                    </div>

                    {{-- Q12 --}}
                    <div class="border border-gray-200 rounded-xl overflow-hidden" x-data="{ open: false }">
                        <button @click="open = !open" class="w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition">
                            <span class="text-sm font-semibold text-gray-900 pr-4">How do I contact support?</span>
                            <svg class="w-5 h-5 text-gray-400 flex-shrink-0 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse>
                            <div class="px-5 pb-5 text-sm text-gray-600 leading-relaxed border-t border-gray-100 pt-4">
                                You can reach us through our <a href="{{ route('contact') }}" class="text-gray-900 font-semibold underline">Contact page</a>, call us at <strong>+92 300 1234567</strong>, or email us at <strong>info@drivefleet.pk</strong>. Our support team is available 24/7.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Still Have Questions --}}
            <div class="bg-gray-50 rounded-2xl border border-gray-200 p-8 sm:p-10 text-center">
                <div class="w-14 h-14 bg-gray-900 rounded-2xl flex items-center justify-center mx-auto mb-5">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900">Still have questions?</h3>
                <p class="text-sm text-gray-500 mt-2 max-w-md mx-auto">Can't find what you're looking for? Our support team is always ready to help.</p>
                <div class="mt-6 flex flex-col sm:flex-row items-center justify-center gap-3">
                    <a href="{{ route('contact') }}" class="w-full sm:w-auto px-8 py-3 bg-gray-900 text-white font-semibold text-sm rounded-lg hover:bg-gray-800 transition inline-flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Contact Us
                    </a>
                    <a href="tel:+923001234567" class="w-full sm:w-auto px-8 py-3 bg-white text-gray-700 font-semibold text-sm rounded-lg border border-gray-300 hover:bg-gray-50 transition inline-flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        Call Us
                    </a>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>