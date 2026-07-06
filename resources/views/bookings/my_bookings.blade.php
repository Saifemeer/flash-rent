<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 tracking-tight">My Bookings</h2>
                <p class="text-sm text-gray-500 mt-1">Track and manage all your rental reservations</p>
            </div>
            <a href="{{ route('dashboard') }}" class="px-5 py-2 text-sm font-semibold text-white bg-gray-900 rounded-md hover:bg-gray-800 transition inline-flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                New Booking
            </a>
        </div>
    </x-slot>

    {{-- Alerts --}}
    @if(session('success'))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6" x-data="{ show: true }" x-show="show" x-transition>
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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6" x-data="{ show: true }" x-show="show" x-transition>
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

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Stats Overview --}}
            @if(!$bookings->isEmpty())
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-8">
                    <div class="bg-white rounded-xl border border-gray-200 p-4 shadow-sm">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 font-medium">Total</p>
                                <p class="text-lg font-bold text-gray-900">{{ $bookings->count() }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl border border-gray-200 p-4 shadow-sm">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-amber-50 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 font-medium">Pending</p>
                                <p class="text-lg font-bold text-amber-600">{{ $bookings->where('status', 'pending')->count() }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl border border-gray-200 p-4 shadow-sm">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-emerald-50 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 font-medium">Approved</p>
                                <p class="text-lg font-bold text-emerald-600">{{ $bookings->where('status', 'approved')->count() }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl border border-gray-200 p-4 shadow-sm">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 font-medium">Total Spent</p>
                                <p class="text-lg font-bold text-gray-900">Rs. {{ number_format($bookings->whereIn('status', ['approved', 'completed'])->sum('total_price')) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Empty State --}}
            @if($bookings->isEmpty())
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-12 text-center">
                    <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-5">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900">No bookings yet</h3>
                    <p class="text-sm text-gray-500 mt-2 max-w-sm mx-auto">You haven't made any rental reservations yet. Browse our fleet and book your first ride.</p>
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 mt-6 px-6 py-2.5 bg-gray-900 text-white rounded-md text-sm font-semibold hover:bg-gray-800 transition">
                        Browse Cars
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            @else

                {{-- ============================================ --}}
                {{-- DESKTOP TABLE VIEW --}}
                {{-- ============================================ --}}
                <div class="hidden md:block bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead>
                                <tr class="border-b border-gray-200 bg-gray-50">
                                    <th class="px-6 py-3.5 text-left text-[11px] font-semibold text-gray-500 uppercase tracking-wider">Vehicle</th>
                                    <th class="px-6 py-3.5 text-left text-[11px] font-semibold text-gray-500 uppercase tracking-wider">Duration</th>
                                    <th class="px-6 py-3.5 text-left text-[11px] font-semibold text-gray-500 uppercase tracking-wider">Total</th>
                                    <th class="px-6 py-3.5 text-left text-[11px] font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3.5 text-right text-[11px] font-semibold text-gray-500 uppercase tracking-wider">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($bookings as $booking)
                                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                                        {{-- Vehicle --}}
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <div class="w-12 h-12 rounded-lg overflow-hidden bg-gray-100 flex-shrink-0">
                                                    @if($booking->car->image)
                                                        <img src="{{ asset('storage/' . $booking->car->image) }}" alt="{{ $booking->car->name }}" class="w-full h-full object-cover">
                                                    @else
                                                        <div class="w-full h-full flex items-center justify-center">
                                                            <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                            </svg>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div>
                                                    <p class="text-sm font-bold text-gray-900">{{ $booking->car->brand }} {{ $booking->car->name }}</p>
                                                    <p class="text-xs text-gray-400 mt-0.5">Rs. {{ number_format($booking->car->price_per_day) }}/day</p>
                                                </div>
                                            </div>
                                        </td>

                                        {{-- Duration --}}
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{ \Carbon\Carbon::parse($booking->start_date)->format('d M, Y') }}
                                            </div>
                                            <div class="flex items-center gap-1.5 mt-1">
                                                <svg class="w-3 h-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                                                </svg>
                                                <span class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($booking->end_date)->format('d M, Y') }}</span>
                                            </div>
                                            <p class="text-xs text-gray-400 mt-1">
                                                {{ \Carbon\Carbon::parse($booking->start_date)->diffInDays(\Carbon\Carbon::parse($booking->end_date)) + 1 }} days
                                            </p>
                                        </td>

                                        {{-- Total --}}
                                        <td class="px-6 py-4">
                                            <p class="text-sm font-bold text-gray-900">Rs. {{ number_format($booking->total_price) }}</p>
                                        </td>

                                        {{-- Status --}}
                                        <td class="px-6 py-4">
                                            @if($booking->status == 'pending')
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-700 border border-amber-200">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                                    Pending
                                                </span>
                                            @elseif($booking->status == 'approved')
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                                    Approved
                                                </span>
                                            @elseif($booking->status == 'completed')
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-200">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                                                    Completed
                                                </span>
                                            @elseif($booking->status == 'cancelled')
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-red-50 text-red-700 border border-red-200">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                                    Cancelled
                                                </span>
                                            @else
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-gray-50 text-gray-700 border border-gray-200">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-gray-500"></span>
                                                    {{ ucfirst($booking->status) }}
                                                </span>
                                            @endif
                                        </td>

                                        {{-- Action --}}
                                        <td class="px-6 py-4 text-right">
                                            @if($booking->status == 'pending')
                                                <form action="{{ route('bookings.cancel', $booking->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this booking?');">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold text-red-700 bg-red-50 border border-red-200 rounded-md hover:bg-red-100 transition">
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                        </svg>
                                                        Cancel
                                                    </button>
                                                </form>
                                            @elseif($booking->status == 'approved' || $booking->status == 'completed')
                                                <a href="{{ route('bookings.invoice', $booking->id) }}" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold text-gray-700 bg-gray-50 border border-gray-200 rounded-md hover:bg-gray-100 transition">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                    </svg>
                                                    Invoice
                                                </a>
                                            @else
                                                <span class="text-xs text-gray-400">No action</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- ============================================ --}}
                {{-- MOBILE CARD VIEW --}}
                {{-- ============================================ --}}
                <div class="md:hidden space-y-4">
                    @foreach($bookings as $booking)
                        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                            {{-- Card Header --}}
                            <div class="p-4 flex items-center gap-3 border-b border-gray-100">
                                <div class="w-14 h-14 rounded-lg overflow-hidden bg-gray-100 flex-shrink-0">
                                    @if($booking->car->image)
                                        <img src="{{ asset('storage/' . $booking->car->image) }}" alt="{{ $booking->car->name }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <svg class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-bold text-gray-900 truncate">{{ $booking->car->brand }} {{ $booking->car->name }}</p>
                                    <p class="text-xs text-gray-400">Rs. {{ number_format($booking->car->price_per_day) }}/day</p>
                                </div>
                                {{-- Status Badge --}}
                                @if($booking->status == 'pending')
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-semibold bg-amber-50 text-amber-700 border border-amber-200 flex-shrink-0">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                        Pending
                                    </span>
                                @elseif($booking->status == 'approved')
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200 flex-shrink-0">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        Approved
                                    </span>
                                @elseif($booking->status == 'completed')
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-semibold bg-blue-50 text-blue-700 border border-blue-200 flex-shrink-0">
                                        <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                                        Completed
                                    </span>
                                @elseif($booking->status == 'cancelled')
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-semibold bg-red-50 text-red-700 border border-red-200 flex-shrink-0">
                                        <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                        Cancelled
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-semibold bg-gray-50 text-gray-700 border border-gray-200 flex-shrink-0">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                @endif
                            </div>

                            {{-- Card Body --}}
                            <div class="p-4 grid grid-cols-3 gap-4 text-center">
                                <div>
                                    <p class="text-[11px] text-gray-400 font-medium uppercase tracking-wider">Pickup</p>
                                    <p class="text-sm font-semibold text-gray-900 mt-1">{{ \Carbon\Carbon::parse($booking->start_date)->format('d M') }}</p>
                                    <p class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($booking->start_date)->format('Y') }}</p>
                                </div>
                                <div class="border-x border-gray-100">
                                    <p class="text-[11px] text-gray-400 font-medium uppercase tracking-wider">Return</p>
                                    <p class="text-sm font-semibold text-gray-900 mt-1">{{ \Carbon\Carbon::parse($booking->end_date)->format('d M') }}</p>
                                    <p class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($booking->end_date)->format('Y') }}</p>
                                </div>
                                <div>
                                    <p class="text-[11px] text-gray-400 font-medium uppercase tracking-wider">Total</p>
                                    <p class="text-sm font-bold text-gray-900 mt-1">Rs. {{ number_format($booking->total_price) }}</p>
                                    <p class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($booking->start_date)->diffInDays(\Carbon\Carbon::parse($booking->end_date)) + 1 }} days</p>
                                </div>
                            </div>

                            {{-- Card Footer --}}
                            <div class="px-4 pb-4">
                                @if($booking->status == 'pending')
                                    <form action="{{ route('bookings.cancel', $booking->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this booking?');">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="w-full py-2.5 text-xs font-semibold text-red-700 bg-red-50 border border-red-200 rounded-lg hover:bg-red-100 transition inline-flex items-center justify-center gap-1.5">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                            Cancel Booking
                                        </button>
                                    </form>
                                @elseif($booking->status == 'approved' || $booking->status == 'completed')
                                    <a href="{{ route('bookings.invoice', $booking->id) }}" target="_blank" class="w-full py-2.5 text-xs font-semibold text-gray-700 bg-gray-50 border border-gray-200 rounded-lg hover:bg-gray-100 transition inline-flex items-center justify-center gap-1.5">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                        View Invoice
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

            @endif

        </div>
    </div>
</x-app-layout>