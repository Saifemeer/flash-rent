<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Book Vehicle</h2>
                <p class="text-sm text-gray-500 mt-1">{{ $car->brand }} {{ $car->name }} ({{ $car->model_year }})</p>
            </div>
            <a href="{{ route('dashboard') }}" class="text-sm text-gray-500 hover:text-gray-900 transition flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Fleet
            </a>
        </div>
    </x-slot>

    {{-- Flatpickr CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        /* Custom Flatpickr Theme */
        .flatpickr-calendar {
            border: 1px solid #e5e7eb !important;
            box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05) !important;
            border-radius: 12px !important;
            font-family: 'Figtree', sans-serif !important;
        }
        .flatpickr-months .flatpickr-month {
            background: #111827 !important;
            border-radius: 12px 12px 0 0 !important;
        }
        .flatpickr-months .flatpickr-prev-month,
        .flatpickr-months .flatpickr-next-month {
            color: white !important;
            fill: white !important;
        }
        .flatpickr-months .flatpickr-prev-month:hover,
        .flatpickr-months .flatpickr-next-month:hover {
            color: #d1d5db !important;
        }
        .flatpickr-current-month .flatpickr-monthDropdown-months,
        .flatpickr-current-month input.cur-year {
            color: white !important;
            font-weight: 600 !important;
        }
        .flatpickr-current-month .flatpickr-monthDropdown-months {
            background: #111827 !important;
        }
        span.flatpickr-weekday {
            color: #6b7280 !important;
            font-weight: 600 !important;
            font-size: 12px !important;
        }
        .flatpickr-day {
            border-radius: 8px !important;
            font-weight: 500 !important;
            color: #1f2937 !important;
        }
        .flatpickr-day:hover {
            background: #f3f4f6 !important;
            border-color: #f3f4f6 !important;
        }
        .flatpickr-day.selected,
        .flatpickr-day.startRange,
        .flatpickr-day.endRange {
            background: #111827 !important;
            border-color: #111827 !important;
            color: white !important;
        }
        .flatpickr-day.inRange {
            background: #e5e7eb !important;
            border-color: #e5e7eb !important;
            box-shadow: -5px 0 0 #e5e7eb, 5px 0 0 #e5e7eb !important;
        }
        .flatpickr-day.today {
            border-color: #111827 !important;
        }
        .flatpickr-day.today:hover {
            background: #111827 !important;
            color: white !important;
        }
        /* Disabled / Booked dates */
        .flatpickr-day.flatpickr-disabled,
        .flatpickr-day.flatpickr-disabled:hover {
            background: #fef2f2 !important;
            color: #ef4444 !important;
            text-decoration: line-through !important;
            border-color: #fecaca !important;
            cursor: not-allowed !important;
        }
        .flatpickr-day.prevMonthDay,
        .flatpickr-day.nextMonthDay {
            color: #d1d5db !important;
        }
    </style>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 mt-6" x-data="{ show: true }" x-show="show" x-transition>
            <div class="p-4 bg-red-50 border border-red-200 text-red-800 rounded-xl flex items-start gap-3">
                <svg class="w-5 h-5 mt-0.5 flex-shrink-0 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
                <div>
                    <p class="font-semibold text-sm">Please fix the following errors</p>
                    <ul class="list-disc list-inside text-sm mt-2 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button @click="show = false" class="ml-auto text-red-400 hover:text-red-600 flex-shrink-0">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    @endif

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- ============================================ --}}
                {{-- LEFT: Vehicle Summary Card --}}
                {{-- ============================================ --}}
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm sticky top-24">

                        {{-- Car Image --}}
                        <div class="aspect-video bg-gray-100 overflow-hidden">
                            @if($car->image)
                                <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400">
                                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        {{-- Car Info --}}
                        <div class="p-5">
                            <div class="flex items-center gap-2 mb-3">
                                <span class="text-[11px] font-semibold uppercase tracking-wider text-gray-500 bg-gray-100 px-2.5 py-1 rounded">
                                    {{ $car->category }}
                                </span>
                                @if($car->is_available)
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-[11px] font-semibold bg-emerald-50 text-emerald-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        Available
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-[11px] font-semibold bg-amber-50 text-amber-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                        Limited
                                    </span>
                                @endif
                            </div>

                            <h3 class="text-lg font-bold text-gray-900">{{ $car->brand }} {{ $car->name }}</h3>
                            <p class="text-sm text-gray-500 mt-1">{{ $car->model_year }} Model</p>

                            <div class="mt-4 pt-4 border-t border-gray-100">
                                <p class="text-[11px] text-gray-400 font-medium uppercase tracking-wider">Daily Rate</p>
                                <p class="text-2xl font-extrabold text-gray-900 mt-0.5">Rs. {{ number_format($car->price_per_day) }}</p>
                            </div>
                        </div>

                        {{-- Color Legend --}}
                        <div class="px-5 pb-5">
                            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                                <p class="text-xs font-semibold text-gray-700 mb-3">Calendar Legend</p>
                                <div class="space-y-2.5">
                                    <div class="flex items-center gap-2.5">
                                        <span class="w-4 h-4 rounded bg-gray-900 flex-shrink-0"></span>
                                        <span class="text-xs text-gray-600">Selected Date</span>
                                    </div>
                                    <div class="flex items-center gap-2.5">
                                        <span class="w-4 h-4 rounded bg-red-100 border border-red-300 flex-shrink-0 flex items-center justify-center">
                                            <span class="text-[8px] text-red-500 leading-none">&#x2715;</span>
                                        </span>
                                        <span class="text-xs text-gray-600">Booked (Unavailable)</span>
                                    </div>
                                    <div class="flex items-center gap-2.5">
                                        <span class="w-4 h-4 rounded border-2 border-gray-900 bg-white flex-shrink-0"></span>
                                        <span class="text-xs text-gray-600">Today</span>
                                    </div>
                                    <div class="flex items-center gap-2.5">
                                        <span class="w-4 h-4 rounded bg-gray-200 flex-shrink-0"></span>
                                        <span class="text-xs text-gray-600">In Range</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ============================================ --}}
                {{-- RIGHT: Booking Form --}}
                {{-- ============================================ --}}
                <div class="lg:col-span-2 space-y-6">

                    {{-- Date Selection Card --}}
                    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                        <div class="p-6 border-b border-gray-100">
                            <h3 class="text-lg font-bold text-gray-900">Select Dates</h3>
                            <p class="text-sm text-gray-500 mt-1">Pick your rental period from the calendar. Booked dates are automatically blocked.</p>
                        </div>

                        <div class="p-6">
                            <form action="{{ route('bookings.store', $car->id) }}" method="POST" id="booking-form">
                                @csrf
                                <input type="hidden" name="car_id" value="{{ $car->id }}">

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                    {{-- Pickup Date --}}
                                    <div>
                                        <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1.5">
                                            Pickup Date
                                        </label>
                                        <div class="relative">
                                            <input type="text" 
                                                   name="start_date" 
                                                   id="start_date" 
                                                   required 
                                                   readonly
                                                   placeholder="Select pickup date"
                                                   class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-gray-900 focus:border-gray-900 transition cursor-pointer bg-white">
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                            </div>
                                        </div>
                                        @error('start_date')
                                            <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Return Date --}}
                                    <div>
                                        <label for="end_date" class="block text-sm font-medium text-gray-700 mb-1.5">
                                            Return Date
                                        </label>
                                        <div class="relative">
                                            <input type="text" 
                                                   name="end_date" 
                                                   id="end_date" 
                                                   required 
                                                   readonly
                                                   placeholder="Select return date"
                                                   class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-gray-900 focus:border-gray-900 transition cursor-pointer bg-white">
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                            </div>
                                        </div>
                                        @error('end_date')
                                            <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Price Summary --}}
                                <div id="price-summary" class="hidden mt-6 bg-gray-50 border border-gray-200 rounded-xl overflow-hidden">
                                    <div class="grid grid-cols-3 divide-x divide-gray-200">
                                        <div class="p-4 text-center">
                                            <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-wider">Daily Rate</p>
                                            <p class="text-lg font-bold text-gray-900 mt-1">Rs. {{ number_format($car->price_per_day) }}</p>
                                        </div>
                                        <div class="p-4 text-center">
                                            <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-wider">Total Days</p>
                                            <p class="text-lg font-bold text-gray-900 mt-1" id="summary-days">0</p>
                                        </div>
                                        <div class="p-4 text-center bg-gray-900">
                                            <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-wider">Estimated Total</p>
                                            <p class="text-xl font-extrabold text-white mt-1">Rs. <span id="summary-total">0</span></p>
                                        </div>
                                    </div>
                                </div>

                                {{-- Submit Button --}}
                                <div class="mt-6">
                                    <button type="submit" 
                                            id="submit-btn"
                                            class="w-full py-3.5 px-6 bg-gray-900 text-white font-semibold text-sm rounded-lg hover:bg-gray-800 active:bg-black transition-colors focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2 inline-flex items-center justify-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        Confirm Booking
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- Existing Bookings Info --}}
                    @if($existingBookings->isNotEmpty())
                        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                            <div class="p-6 border-b border-gray-100">
                                <div class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <h3 class="text-sm font-semibold text-gray-900">Existing Reservations</h3>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">These dates are blocked in the calendar above and cannot be selected.</p>
                            </div>
                            <div class="p-6">
                                <div class="space-y-2">
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
                        </div>
                    @endif

                    {{-- Booking Policy --}}
                    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                        <div class="p-6 border-b border-gray-100">
                            <h3 class="text-sm font-semibold text-gray-900">Booking Policy</h3>
                        </div>
                        <div class="p-6">
                            <div class="grid sm:grid-cols-2 gap-4">
                                <div class="flex items-start gap-3">
                                    <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">Instant Confirmation</p>
                                        <p class="text-xs text-gray-500 mt-0.5">Your booking is confirmed immediately</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3">
                                    <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">No Hidden Charges</p>
                                        <p class="text-xs text-gray-500 mt-0.5">Pay only the displayed daily rate</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3">
                                    <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">Fully Insured</p>
                                        <p class="text-xs text-gray-500 mt-0.5">Comprehensive insurance included</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3">
                                    <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">Flexible Cancellation</p>
                                        <p class="text-xs text-gray-500 mt-0.5">Free cancellation up to 24hrs before</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- Flatpickr JS --}}
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const rate = {{ $car->price_per_day }};
            const priceSummary = document.getElementById('price-summary');
            const summaryDays = document.getElementById('summary-days');
            const summaryTotal = document.getElementById('summary-total');

            // Booked date ranges from backend
            const bookedRanges = [
                @foreach($existingBookings as $booking)
                {
                    from: "{{ $booking->start_date }}",
                    to: "{{ $booking->end_date }}"
                },
                @endforeach
            ];

            // Calculate and show price
            function calculatePrice() {
                const startVal = document.getElementById('start_date').value;
                const endVal = document.getElementById('end_date').value;

                if (startVal && endVal) {
                    const start = new Date(startVal);
                    const end = new Date(endVal);
                    const diffTime = end - start;
                    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;

                    if (diffDays > 0) {
                        const total = diffDays * rate;
                        summaryDays.textContent = diffDays;
                        summaryTotal.textContent = total.toLocaleString('en-US');
                        priceSummary.classList.remove('hidden');
                    } else {
                        priceSummary.classList.add('hidden');
                    }
                } else {
                    priceSummary.classList.add('hidden');
                }
            }

            // Check if a date range overlaps with any booked range
            function hasOverlap(startStr, endStr) {
                const start = new Date(startStr);
                const end = new Date(endStr);

                return bookedRanges.some(range => {
                    const bookedStart = new Date(range.from);
                    const bookedEnd = new Date(range.to);
                    return start <= bookedEnd && end >= bookedStart;
                });
            }

            // Initialize Pickup Date Picker
            const startPicker = flatpickr("#start_date", {
                minDate: "today",
                dateFormat: "Y-m-d",
                altInput: true,
                altFormat: "d M, Y",
                disable: bookedRanges,
                disableMobile: true,
                onChange: function(selectedDates, dateStr) {
                    if (dateStr) {
                        // Set end date minimum to start date
                        endPicker.set('minDate', dateStr);

                        // If end date is before start date, clear it
                        const endVal = document.getElementById('end_date').value;
                        if (endVal && endVal < dateStr) {
                            endPicker.clear();
                        }
                    }
                    calculatePrice();
                }
            });

            // Initialize Return Date Picker
            const endPicker = flatpickr("#end_date", {
                minDate: "today",
                dateFormat: "Y-m-d",
                altInput: true,
                altFormat: "d M, Y",
                disable: bookedRanges,
                disableMobile: true,
                onChange: function(selectedDates, dateStr) {
                    const startVal = document.getElementById('start_date').value;

                    // Check if selected range overlaps with any booked range
                    if (startVal && dateStr && hasOverlap(startVal, dateStr)) {
                        alert('Your selected range includes dates that are already booked. Please choose different dates.');
                        endPicker.clear();
                        priceSummary.classList.add('hidden');
                        return;
                    }
                    calculatePrice();
                }
            });

            // Form validation before submit
            document.getElementById('booking-form').addEventListener('submit', function(e) {
                const startVal = document.getElementById('start_date').value;
                const endVal = document.getElementById('end_date').value;

                if (!startVal || !endVal) {
                    e.preventDefault();
                    alert('Please select both pickup and return dates.');
                    return;
                }

                if (startVal > endVal) {
                    e.preventDefault();
                    alert('Return date must be after pickup date.');
                    return;
                }

                if (hasOverlap(startVal, endVal)) {
                    e.preventDefault();
                    alert('Your selected dates overlap with an existing booking. Please choose different dates.');
                    return;
                }
            });
        });
    </script>
</x-app-layout>