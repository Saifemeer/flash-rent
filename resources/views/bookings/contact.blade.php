<x-app-layout>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Header --}}
            <div class="text-center max-w-2xl mx-auto mb-12">
                <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-[0.2em] mb-3">Get In Touch</p>
                <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 tracking-tight">Contact Us</h1>
                <p class="text-gray-500 mt-4 text-base">Have questions about our fleet or booking process? We're here to help.</p>
            </div>

            {{-- Success Message --}}
            @if(session('success'))
                <div class="max-w-2xl mx-auto mb-8" x-data="{ show: true }" x-show="show" x-transition>
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

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 max-w-5xl mx-auto">

                {{-- ============================================ --}}
                {{-- LEFT: Contact Info --}}
                {{-- ============================================ --}}
                <div class="lg:col-span-1 space-y-6">

                    {{-- Office Info --}}
                    <div class="bg-gray-900 rounded-xl p-6 text-white">
                        <h3 class="text-base font-bold mb-5">Contact Information</h3>

                        <div class="space-y-5">
                            <div class="flex items-start gap-3">
                                <div class="w-9 h-9 bg-gray-800 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold">Office Address</p>
                                    <p class="text-xs text-gray-400 mt-0.5 leading-relaxed">Main Boulevard, Gulberg III,<br>Lahore, Punjab, Pakistan</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="w-9 h-9 bg-gray-800 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold">Phone</p>
                                    <p class="text-xs text-gray-400 mt-0.5">+92 300 1234567</p>
                                    <p class="text-xs text-gray-400">+92 321 9876543</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="w-9 h-9 bg-gray-800 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold">Email</p>
                                    <p class="text-xs text-gray-400 mt-0.5">info@drivefleet.pk</p>
                                    <p class="text-xs text-gray-400">support@drivefleet.pk</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="w-9 h-9 bg-gray-800 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold">Working Hours</p>
                                    <p class="text-xs text-gray-400 mt-0.5">Mon - Sat: 9:00 AM - 9:00 PM</p>
                                    <p class="text-xs text-gray-400">Sunday: 10:00 AM - 6:00 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Quick Help --}}
                    <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
                        <h4 class="text-sm font-bold text-gray-900 mb-4">Quick Help</h4>
                        <div class="space-y-3">
                            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition group">
                                <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center group-hover:bg-gray-900 transition">
                                    <svg class="w-4 h-4 text-gray-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Browse Fleet</p>
                                    <p class="text-xs text-gray-500">Find your perfect ride</p>
                                </div>
                            </a>
                            <a href="{{ route('dashboard') }}#how-it-works" class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition group">
                                <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center group-hover:bg-gray-900 transition">
                                    <svg class="w-4 h-4 text-gray-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">How It Works</p>
                                    <p class="text-xs text-gray-500">Learn the booking process</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- ============================================ --}}
                {{-- RIGHT: Contact Form --}}
                {{-- ============================================ --}}
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                        <div class="px-6 py-5 border-b border-gray-100">
                            <h3 class="text-base font-bold text-gray-900">Send us a message</h3>
                            <p class="text-sm text-gray-500 mt-0.5">Fill out the form below and we'll get back to you within 24 hours</p>
                        </div>

                        <div class="p-6">
                            <form action="{{ route('contact.send') }}" method="POST" class="space-y-5">
                                @csrf

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                    {{-- Name --}}
                                    <div>
                                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">Full Name</label>
                                        <input type="text" name="name" id="name" required value="{{ old('name', auth()->user()->name ?? '') }}" placeholder="John Doe"
                                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-gray-900 focus:border-gray-900 transition placeholder:text-gray-400 bg-gray-50 focus:bg-white">
                                        @error('name')
                                            <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Email --}}
                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                                        <input type="email" name="email" id="email" required value="{{ old('email', auth()->user()->email ?? '') }}" placeholder="you@example.com"
                                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-gray-900 focus:border-gray-900 transition placeholder:text-gray-400 bg-gray-50 focus:bg-white">
                                        @error('email')
                                            <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                    {{-- Phone --}}
                                    <div>
                                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1.5">Phone <span class="text-gray-400">(Optional)</span></label>
                                        <input type="text" name="phone" id="phone" value="{{ old('phone') }}" placeholder="+92 300 1234567"
                                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-gray-900 focus:border-gray-900 transition placeholder:text-gray-400 bg-gray-50 focus:bg-white">
                                        @error('phone')
                                            <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Subject --}}
                                    <div>
                                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-1.5">Subject</label>
                                        <select name="subject" id="subject" required
                                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-gray-900 focus:border-gray-900 transition text-gray-700 bg-gray-50 focus:bg-white">
                                            <option value="" disabled selected>Select a topic</option>
                                            <option value="General Inquiry" {{ old('subject') == 'General Inquiry' ? 'selected' : '' }}>General Inquiry</option>
                                            <option value="Booking Issue" {{ old('subject') == 'Booking Issue' ? 'selected' : '' }}>Booking Issue</option>
                                            <option value="Vehicle Information" {{ old('subject') == 'Vehicle Information' ? 'selected' : '' }}>Vehicle Information</option>
                                            <option value="Payment Query" {{ old('subject') == 'Payment Query' ? 'selected' : '' }}>Payment Query</option>
                                            <option value="Complaint" {{ old('subject') == 'Complaint' ? 'selected' : '' }}>Complaint</option>
                                            <option value="Partnership" {{ old('subject') == 'Partnership' ? 'selected' : '' }}>Partnership</option>
                                            <option value="Other" {{ old('subject') == 'Other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                        @error('subject')
                                            <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Message --}}
                                <div>
                                    <label for="message" class="block text-sm font-medium text-gray-700 mb-1.5">Message</label>
                                    <textarea name="message" id="message" rows="5" required placeholder="Tell us how we can help you..."
                                              class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-gray-900 focus:border-gray-900 transition placeholder:text-gray-400 bg-gray-50 focus:bg-white resize-none">{{ old('message') }}</textarea>
                                    @error('message')
                                        <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Submit --}}
                                <button type="submit" class="w-full sm:w-auto px-8 py-3 bg-gray-900 text-white font-semibold text-sm rounded-lg hover:bg-gray-800 active:bg-black transition focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2 inline-flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    Send Message
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>