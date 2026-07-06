<x-app-layout>

    {{-- Header --}}
    <div class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-14 sm:py-16">
            <div class="max-w-3xl">
                <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-[0.2em] mb-4">Legal</p>
                <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Terms & Conditions</h1>
                <p class="text-gray-400 mt-4 text-base">Last updated: {{ date('F d, Y') }}</p>
            </div>
        </div>
    </div>

    <div class="py-12 sm:py-16">
        <div class="max-w-3xl mx-auto px-6 lg:px-8">

            <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="p-6 sm:p-10 prose prose-gray max-w-none">

                    {{-- 1 --}}
                    <div class="mb-10">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="w-8 h-8 bg-gray-900 rounded-lg flex items-center justify-center text-white text-xs font-bold flex-shrink-0">1</span>
                            <h2 class="text-lg font-bold text-gray-900 m-0">Acceptance of Terms</h2>
                        </div>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            By accessing and using DriveFleet's website and services, you agree to be bound by these Terms and Conditions. If you do not agree with any part of these terms, you may not use our services.
                        </p>
                    </div>

                    {{-- 2 --}}
                    <div class="mb-10">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="w-8 h-8 bg-gray-900 rounded-lg flex items-center justify-center text-white text-xs font-bold flex-shrink-0">2</span>
                            <h2 class="text-lg font-bold text-gray-900 m-0">Eligibility</h2>
                        </div>
                        <p class="text-sm text-gray-600 leading-relaxed mb-3">To rent a vehicle from DriveFleet, you must:</p>
                        <ul class="text-sm text-gray-600 space-y-2 ml-4">
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Be at least 21 years of age
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Hold a valid driving license
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Possess a valid CNIC or passport
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Have a registered account on our platform
                            </li>
                        </ul>
                    </div>

                    {{-- 3 --}}
                    <div class="mb-10">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="w-8 h-8 bg-gray-900 rounded-lg flex items-center justify-center text-white text-xs font-bold flex-shrink-0">3</span>
                            <h2 class="text-lg font-bold text-gray-900 m-0">Booking & Reservations</h2>
                        </div>
                        <div class="text-sm text-gray-600 leading-relaxed space-y-3">
                            <p>All bookings are subject to vehicle availability and admin approval. A booking request does not guarantee a confirmed reservation until you receive an approval notification via email.</p>
                            <p>You may cancel a pending booking at any time without charges. Once a booking is approved, cancellation requests must be made through our support team.</p>
                            <p>DriveFleet reserves the right to cancel or modify any booking due to unforeseen circumstances, vehicle maintenance, or safety concerns.</p>
                        </div>
                    </div>

                    {{-- 4 --}}
                    <div class="mb-10">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="w-8 h-8 bg-gray-900 rounded-lg flex items-center justify-center text-white text-xs font-bold flex-shrink-0">4</span>
                            <h2 class="text-lg font-bold text-gray-900 m-0">Pricing & Payments</h2>
                        </div>
                        <div class="text-sm text-gray-600 leading-relaxed space-y-3">
                            <p>Rental prices are calculated based on the daily rate of the selected vehicle multiplied by the number of rental days. All prices displayed on our website are final and inclusive — no hidden charges apply.</p>
                            <p>Payment is due at the time of vehicle pickup. We accept cash and bank transfers. Additional charges may apply for late returns, fuel deficiency, or vehicle damage beyond normal wear.</p>
                        </div>
                    </div>

                    {{-- 5 --}}
                    <div class="mb-10">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="w-8 h-8 bg-gray-900 rounded-lg flex items-center justify-center text-white text-xs font-bold flex-shrink-0">5</span>
                            <h2 class="text-lg font-bold text-gray-900 m-0">Vehicle Usage</h2>
                        </div>
                        <p class="text-sm text-gray-600 leading-relaxed mb-3">When renting a vehicle from DriveFleet, you agree to:</p>
                        <ul class="text-sm text-gray-600 space-y-2 ml-4">
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Use the vehicle only for lawful purposes
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Not sublease or transfer the vehicle to others
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Return the vehicle in the same condition as received
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Follow all traffic laws and regulations
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Return the vehicle on or before the agreed return date
                            </li>
                        </ul>
                    </div>

                    {{-- 6 --}}
                    <div class="mb-10">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="w-8 h-8 bg-gray-900 rounded-lg flex items-center justify-center text-white text-xs font-bold flex-shrink-0">6</span>
                            <h2 class="text-lg font-bold text-gray-900 m-0">Insurance & Liability</h2>
                        </div>
                        <div class="text-sm text-gray-600 leading-relaxed space-y-3">
                            <p>All vehicles are covered by comprehensive insurance. However, the renter is responsible for any damage caused due to negligence, reckless driving, or violation of traffic laws.</p>
                            <p>DriveFleet is not liable for any personal belongings left in the vehicle, traffic violations committed during the rental period, or any indirect damages arising from the use of our services.</p>
                        </div>
                    </div>

                    {{-- 7 --}}
                    <div class="mb-10">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="w-8 h-8 bg-gray-900 rounded-lg flex items-center justify-center text-white text-xs font-bold flex-shrink-0">7</span>
                            <h2 class="text-lg font-bold text-gray-900 m-0">Account Termination</h2>
                        </div>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            DriveFleet reserves the right to suspend or terminate any user account that violates these terms, engages in fraudulent activity, or misuses our platform in any way. Users may also request account deletion by contacting our support team.
                        </p>
                    </div>

                    {{-- 8 --}}
                    <div>
                        <div class="flex items-center gap-3 mb-4">
                            <span class="w-8 h-8 bg-gray-900 rounded-lg flex items-center justify-center text-white text-xs font-bold flex-shrink-0">8</span>
                            <h2 class="text-lg font-bold text-gray-900 m-0">Changes to Terms</h2>
                        </div>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            DriveFleet may update these Terms and Conditions at any time. Changes will be posted on this page with an updated revision date. Continued use of our services after changes constitutes acceptance of the new terms.
                        </p>
                    </div>

                </div>
            </div>

            {{-- Contact --}}
            <div class="mt-8 text-center">
                <p class="text-sm text-gray-500">
                    Questions about our terms?
                    <a href="{{ route('contact') }}" class="font-semibold text-gray-900 hover:underline">Contact us</a>
                </p>
            </div>

        </div>
    </div>

</x-app-layout>