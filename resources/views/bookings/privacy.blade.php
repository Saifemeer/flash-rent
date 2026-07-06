<x-app-layout>

    {{-- Header --}}
    <div class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-14 sm:py-16">
            <div class="max-w-3xl">
                <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-[0.2em] mb-4">Legal</p>
                <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Privacy Policy</h1>
                <p class="text-gray-400 mt-4 text-base">Last updated: {{ date('F d, Y') }}</p>
            </div>
        </div>
    </div>

    <div class="py-12 sm:py-16">
        <div class="max-w-3xl mx-auto px-6 lg:px-8">

            <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="p-6 sm:p-10">

                    {{-- Intro --}}
                    <div class="bg-gray-50 rounded-xl border border-gray-200 p-5 mb-10">
                        <p class="text-sm text-gray-600 leading-relaxed">
                            At DriveFleet, we take your privacy seriously. This Privacy Policy explains how we collect, use, and protect your personal information when you use our car rental platform.
                        </p>
                    </div>

                    {{-- 1 --}}
                    <div class="mb-10">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="w-8 h-8 bg-gray-900 rounded-lg flex items-center justify-center text-white text-xs font-bold flex-shrink-0">1</span>
                            <h2 class="text-lg font-bold text-gray-900">Information We Collect</h2>
                        </div>
                        <p class="text-sm text-gray-600 leading-relaxed mb-3">We collect the following types of information:</p>
                        <div class="space-y-3 ml-4">
                            <div class="flex items-start gap-3">
                                <div class="w-6 h-6 bg-gray-100 rounded flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="w-3.5 h-3.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">Personal Information</p>
                                    <p class="text-xs text-gray-500 mt-0.5">Name, email address, phone number provided during registration</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="w-6 h-6 bg-gray-100 rounded flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="w-3.5 h-3.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">Booking Information</p>
                                    <p class="text-xs text-gray-500 mt-0.5">Rental dates, vehicle preferences, booking history</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="w-6 h-6 bg-gray-100 rounded flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="w-3.5 h-3.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">Technical Data</p>
                                    <p class="text-xs text-gray-500 mt-0.5">Browser type, IP address, device information for security</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- 2 --}}
                    <div class="mb-10">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="w-8 h-8 bg-gray-900 rounded-lg flex items-center justify-center text-white text-xs font-bold flex-shrink-0">2</span>
                            <h2 class="text-lg font-bold text-gray-900">How We Use Your Information</h2>
                        </div>
                        <ul class="text-sm text-gray-600 space-y-2 ml-4">
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Process and manage your bookings
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Send booking confirmations and status updates via email
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Generate invoices and receipts
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Improve our services and user experience
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Respond to your inquiries and support requests
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Ensure platform security and prevent fraud
                            </li>
                        </ul>
                    </div>

                    {{-- 3 --}}
                    <div class="mb-10">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="w-8 h-8 bg-gray-900 rounded-lg flex items-center justify-center text-white text-xs font-bold flex-shrink-0">3</span>
                            <h2 class="text-lg font-bold text-gray-900">Data Protection</h2>
                        </div>
                        <div class="text-sm text-gray-600 leading-relaxed space-y-3">
                            <p>We implement industry-standard security measures to protect your personal data, including:</p>
                            <div class="grid sm:grid-cols-2 gap-3 mt-3">
                                <div class="bg-gray-50 rounded-lg border border-gray-200 p-4 flex items-start gap-3">
                                    <svg class="w-5 h-5 text-emerald-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                    <div>
                                        <p class="text-xs font-semibold text-gray-900">Encrypted Storage</p>
                                        <p class="text-xs text-gray-500 mt-0.5">All data stored securely</p>
                                    </div>
                                </div>
                                <div class="bg-gray-50 rounded-lg border border-gray-200 p-4 flex items-start gap-3">
                                    <svg class="w-5 h-5 text-emerald-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                    <div>
                                        <p class="text-xs font-semibold text-gray-900">Password Hashing</p>
                                        <p class="text-xs text-gray-500 mt-0.5">Passwords never stored in plain text</p>
                                    </div>
                                </div>
                                <div class="bg-gray-50 rounded-lg border border-gray-200 p-4 flex items-start gap-3">
                                    <svg class="w-5 h-5 text-emerald-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"/></svg>
                                    <div>
                                        <p class="text-xs font-semibold text-gray-900">CSRF Protection</p>
                                        <p class="text-xs text-gray-500 mt-0.5">All forms protected against attacks</p>
                                    </div>
                                </div>
                                <div class="bg-gray-50 rounded-lg border border-gray-200 p-4 flex items-start gap-3">
                                    <svg class="w-5 h-5 text-emerald-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    <div>
                                        <p class="text-xs font-semibold text-gray-900">Access Control</p>
                                        <p class="text-xs text-gray-500 mt-0.5">Role-based access management</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- 4 --}}
                    <div class="mb-10">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="w-8 h-8 bg-gray-900 rounded-lg flex items-center justify-center text-white text-xs font-bold flex-shrink-0">4</span>
                            <h2 class="text-lg font-bold text-gray-900">Data Sharing</h2>
                        </div>
                        <div class="text-sm text-gray-600 leading-relaxed space-y-3">
                            <p>We do <strong>not</strong> sell, trade, or rent your personal information to third parties. Your data may only be shared in the following circumstances:</p>
                            <ul class="space-y-2 ml-4">
                                <li class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    When required by law or legal process
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    To protect DriveFleet's rights and safety
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    With your explicit consent
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- 5 --}}
                    <div class="mb-10">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="w-8 h-8 bg-gray-900 rounded-lg flex items-center justify-center text-white text-xs font-bold flex-shrink-0">5</span>
                            <h2 class="text-lg font-bold text-gray-900">Email Communications</h2>
                        </div>
                        <div class="text-sm text-gray-600 leading-relaxed space-y-3">
                            <p>By creating an account, you consent to receive the following email communications:</p>
                            <ul class="space-y-2 ml-4">
                                <li class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Booking confirmations and status updates
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Invoice and receipt notifications
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Account security alerts
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- 6 --}}
                    <div class="mb-10">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="w-8 h-8 bg-gray-900 rounded-lg flex items-center justify-center text-white text-xs font-bold flex-shrink-0">6</span>
                            <h2 class="text-lg font-bold text-gray-900">Your Rights</h2>
                        </div>
                        <p class="text-sm text-gray-600 leading-relaxed mb-3">You have the right to:</p>
                        <ul class="text-sm text-gray-600 space-y-2 ml-4">
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Access your personal data through your profile
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Update or correct your information
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Request deletion of your account and data
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Contact us regarding any privacy concerns
                            </li>
                        </ul>
                    </div>

                    {{-- 7 --}}
                    <div>
                        <div class="flex items-center gap-3 mb-4">
                            <span class="w-8 h-8 bg-gray-900 rounded-lg flex items-center justify-center text-white text-xs font-bold flex-shrink-0">7</span>
                            <h2 class="text-lg font-bold text-gray-900">Policy Updates</h2>
                        </div>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            We may update this Privacy Policy from time to time. Any changes will be posted on this page with a revised date. We encourage you to review this policy periodically to stay informed about how we protect your information.
                        </p>
                    </div>

                </div>
            </div>

            {{-- Contact --}}
            <div class="mt-8 text-center">
                <p class="text-sm text-gray-500">
                    Have privacy concerns?
                    <a href="{{ route('contact') }}" class="font-semibold text-gray-900 hover:underline">Contact our team</a>
                </p>
            </div>

        </div>
    </div>

</x-app-layout>