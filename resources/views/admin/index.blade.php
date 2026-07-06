@extends('layouts.admin')
    @section('header')
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Admin Dashboard</h2>
                <p class="text-sm text-gray-500 mt-1">Manage bookings, fleet, and monitor business performance</p>
            </div>
            
        </div>
   @endsection

   @section('content')
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

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- ============================================ --}}
            {{-- STATS CARDS --}}
            {{-- ============================================ --}}
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                {{-- Total Fleet --}}
                <div class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-wider">Total Fleet</p>
                            <p class="text-2xl font-extrabold text-gray-900 mt-1">{{ $totalCars }}</p>
                            <p class="text-xs text-gray-500 mt-0.5">Vehicles</p>
                        </div>
                        <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- Active Rentals --}}
                <div class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-wider">Active Rentals</p>
                            <p class="text-2xl font-extrabold text-amber-600 mt-1">{{ $activeRents }}</p>
                            <p class="text-xs text-gray-500 mt-0.5">Currently Rented</p>
                        </div>
                        <div class="w-12 h-12 bg-amber-50 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- Pending Requests --}}
                <div class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm relative overflow-hidden">
                    @if($pendingBookings > 0)
                        <div class="absolute top-3 right-3">
                            <span class="flex h-3 w-3">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                            </span>
                        </div>
                    @endif
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-wider">Pending</p>
                            <p class="text-2xl font-extrabold text-red-600 mt-1">{{ $pendingBookings }}</p>
                            <p class="text-xs text-gray-500 mt-0.5">Awaiting Action</p>
                        </div>
                        <div class="w-12 h-12 bg-red-50 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- Revenue --}}
                <div class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-wider">Revenue</p>
                            <p class="text-2xl font-extrabold text-emerald-600 mt-1">Rs. {{ number_format($totalEarnings) }}</p>
                            <p class="text-xs text-gray-500 mt-0.5">Total Earned</p>
                        </div>
                        <div class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ============================================ --}}
{{-- SECTION 1: BOOKING REQUESTS --}}
{{-- ============================================ --}}
<div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden mb-8">
    <div class="px-6 py-5 border-b border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-bold text-gray-900">Bookings</h3>
                <p class="text-sm text-gray-500 mt-0.5">Review and manage customer bookings</p>
            </div>
            @if($pendingCount > 0)
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-700 border border-amber-200">
                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                    {{ $pendingCount }} Pending
                </span>
            @endif
        </div>
    </div>

    {{-- ============================================ --}}
    {{-- FILTER TABS --}}
    {{-- ============================================ --}}
    <div class="px-6 pt-4 pb-0">
        <div class="flex flex-wrap gap-1 border-b border-gray-200">
            <a href="{{ route('admin.bookings.index') }}" 
               class="px-4 py-2.5 text-sm font-medium border-b-2 transition-colors duration-200
               {{ $currentFilter === 'all' ? 'border-gray-900 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                All
                <span class="ml-1.5 px-1.5 py-0.5 text-[10px] font-bold rounded-full {{ $currentFilter === 'all' ? 'bg-gray-900 text-white' : 'bg-gray-100 text-gray-600' }}">
                    {{ $allCount }}
                </span>
            </a>
            <a href="{{ route('admin.bookings.index', ['status' => 'pending']) }}" 
               class="px-4 py-2.5 text-sm font-medium border-b-2 transition-colors duration-200
               {{ $currentFilter === 'pending' ? 'border-amber-500 text-amber-700' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                Pending
                @if($pendingCount > 0)
                    <span class="ml-1.5 px-1.5 py-0.5 text-[10px] font-bold rounded-full {{ $currentFilter === 'pending' ? 'bg-amber-500 text-white' : 'bg-amber-100 text-amber-700' }}">
                        {{ $pendingCount }}
                    </span>
                @endif
            </a>
            <a href="{{ route('admin.bookings.index', ['status' => 'approved']) }}" 
               class="px-4 py-2.5 text-sm font-medium border-b-2 transition-colors duration-200
               {{ $currentFilter === 'approved' ? 'border-emerald-500 text-emerald-700' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                Approved
                @if($approvedCount > 0)
                    <span class="ml-1.5 px-1.5 py-0.5 text-[10px] font-bold rounded-full {{ $currentFilter === 'approved' ? 'bg-emerald-500 text-white' : 'bg-emerald-100 text-emerald-700' }}">
                        {{ $approvedCount }}
                    </span>
                @endif
            </a>
            <a href="{{ route('admin.bookings.index', ['status' => 'completed']) }}" 
               class="px-4 py-2.5 text-sm font-medium border-b-2 transition-colors duration-200
               {{ $currentFilter === 'completed' ? 'border-blue-500 text-blue-700' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                Completed
                @if($completedCount > 0)
                    <span class="ml-1.5 px-1.5 py-0.5 text-[10px] font-bold rounded-full {{ $currentFilter === 'completed' ? 'bg-blue-500 text-white' : 'bg-blue-100 text-blue-700' }}">
                        {{ $completedCount }}
                    </span>
                @endif
            </a>
            <a href="{{ route('admin.bookings.index', ['status' => 'cancelled']) }}" 
               class="px-4 py-2.5 text-sm font-medium border-b-2 transition-colors duration-200
               {{ $currentFilter === 'cancelled' ? 'border-red-500 text-red-700' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                Cancelled
                @if($cancelledCount > 0)
                    <span class="ml-1.5 px-1.5 py-0.5 text-[10px] font-bold rounded-full {{ $currentFilter === 'cancelled' ? 'bg-red-500 text-white' : 'bg-red-100 text-red-700' }}">
                        {{ $cancelledCount }}
                    </span>
                @endif
            </a>
        </div>
    </div>

    {{-- ============================================ --}}
    {{-- DESKTOP TABLE --}}
    {{-- ============================================ --}}
    <div class="hidden md:block overflow-x-auto">
        <table class="min-w-full">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200">
                    <th class="px-6 py-3.5 text-left text-[11px] font-semibold text-gray-500 uppercase tracking-wider">Customer</th>
                    <th class="px-6 py-3.5 text-left text-[11px] font-semibold text-gray-500 uppercase tracking-wider">Vehicle</th>
                    <th class="px-6 py-3.5 text-left text-[11px] font-semibold text-gray-500 uppercase tracking-wider">Duration</th>
                    <th class="px-6 py-3.5 text-left text-[11px] font-semibold text-gray-500 uppercase tracking-wider">Total</th>
                    <th class="px-6 py-3.5 text-left text-[11px] font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3.5 text-right text-[11px] font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($bookings as $booking)
                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                        {{-- Customer --}}
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 bg-gray-900 rounded-full flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                                    {{ strtoupper(substr($booking->user->name, 0, 2)) }}
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">{{ $booking->user->name }}</p>
                                    <p class="text-xs text-gray-400">{{ $booking->user->email }}</p>
                                </div>
                            </div>
                        </td>

                        {{-- Vehicle --}}
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-9 rounded-md overflow-hidden bg-gray-100 flex-shrink-0">
                                    @if($booking->car->image)
                                        <img src="{{ asset('storage/' . $booking->car->image) }}" alt="" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">{{ $booking->car->brand }} {{ $booking->car->name }}</p>
                                    <p class="text-xs text-gray-400">Rs. {{ number_format($booking->car->price_per_day) }}/day</p>
                                </div>
                            </div>
                        </td>

                        {{-- Duration --}}
                        <td class="px-6 py-4">
                            <p class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($booking->start_date)->format('d M, Y') }}</p>
                            <div class="flex items-center gap-1.5 mt-0.5">
                                <svg class="w-3 h-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
                                <span class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($booking->end_date)->format('d M, Y') }}</span>
                            </div>
                            <p class="text-xs text-gray-400 mt-0.5">{{ \Carbon\Carbon::parse($booking->start_date)->diffInDays(\Carbon\Carbon::parse($booking->end_date)) + 1 }} days</p>
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
                            @endif
                        </td>

                        {{-- Actions --}}
                        <td class="px-6 py-4 text-right">
                            @if($booking->status == 'pending')
                                <div class="flex items-center justify-end gap-2">
                                    <form action="{{ route('admin.bookings.update', [$booking->id, 'approved']) }}" method="POST">
                                        @csrf @method('PATCH')
                                        <button type="submit" class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-semibold text-emerald-700 bg-emerald-50 border border-emerald-200 rounded-md hover:bg-emerald-100 transition">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                            Approve
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.bookings.update', [$booking->id, 'cancelled']) }}" method="POST">
                                        @csrf @method('PATCH')
                                        <button type="submit" class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-semibold text-red-700 bg-red-50 border border-red-200 rounded-md hover:bg-red-100 transition">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                            Reject
                                        </button>
                                    </form>
                                </div>
                            @elseif($booking->status == 'approved')
                                <form action="{{ route('admin.bookings.complete', $booking->id) }}" method="POST" onsubmit="return confirm('Mark as completed?');">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-semibold text-blue-700 bg-blue-50 border border-blue-200 rounded-md hover:bg-blue-100 transition">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        Complete
                                    </button>
                                </form>
                            @else
                                <span class="text-xs text-gray-400">No action</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-16 text-center">
                            <div class="w-14 h-14 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                <svg class="w-7 h-7 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                            </div>
                            <p class="text-sm font-semibold text-gray-900">No bookings found</p>
                            <p class="text-xs text-gray-500 mt-1">No bookings match this filter</p>
                            <a href="{{ route('admin.cars.index') }}" class="inline-flex items-center gap-1.5 mt-4 px-4 py-2 text-xs font-semibold text-gray-700 bg-gray-100 border border-gray-200 rounded-lg hover:bg-gray-200 transition">
                                View All Bookings
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- ============================================ --}}
    {{-- MOBILE CARDS --}}
    {{-- ============================================ --}}
    <div class="md:hidden divide-y divide-gray-100">
        @forelse($bookings as $booking)
            <div class="p-4">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 bg-gray-900 rounded-full flex items-center justify-center text-white text-[10px] font-bold">
                            {{ strtoupper(substr($booking->user->name, 0, 2)) }}
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-900">{{ $booking->user->name }}</p>
                            <p class="text-[11px] text-gray-400">{{ $booking->car->brand }} {{ $booking->car->name }}</p>
                        </div>
                    </div>
                    @if($booking->status == 'pending')
                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-semibold bg-amber-50 text-amber-700 border border-amber-200">
                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                            Pending
                        </span>
                    @elseif($booking->status == 'approved')
                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">Approved</span>
                    @elseif($booking->status == 'completed')
                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-semibold bg-blue-50 text-blue-700 border border-blue-200">Completed</span>
                    @else
                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-semibold bg-red-50 text-red-700 border border-red-200">Cancelled</span>
                    @endif
                </div>

                <div class="grid grid-cols-3 gap-3 text-center bg-gray-50 rounded-lg p-3 mb-3">
                    <div>
                        <p class="text-[10px] text-gray-400 uppercase font-semibold">Pickup</p>
                        <p class="text-xs font-semibold text-gray-900 mt-0.5">{{ \Carbon\Carbon::parse($booking->start_date)->format('d M') }}</p>
                    </div>
                    <div class="border-x border-gray-200">
                        <p class="text-[10px] text-gray-400 uppercase font-semibold">Return</p>
                        <p class="text-xs font-semibold text-gray-900 mt-0.5">{{ \Carbon\Carbon::parse($booking->end_date)->format('d M') }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-400 uppercase font-semibold">Total</p>
                        <p class="text-xs font-bold text-gray-900 mt-0.5">Rs. {{ number_format($booking->total_price) }}</p>
                    </div>
                </div>

                @if($booking->status == 'pending')
                    <div class="flex gap-2">
                        <form action="{{ route('admin.bookings.update', [$booking->id, 'approved']) }}" method="POST" class="flex-1">
                            @csrf @method('PATCH')
                            <button type="submit" class="w-full py-2 text-xs font-semibold text-emerald-700 bg-emerald-50 border border-emerald-200 rounded-lg hover:bg-emerald-100 transition">Approve</button>
                        </form>
                        <form action="{{ route('admin.bookings.update', [$booking->id, 'cancelled']) }}" method="POST" class="flex-1">
                            @csrf @method('PATCH')
                            <button type="submit" class="w-full py-2 text-xs font-semibold text-red-700 bg-red-50 border border-red-200 rounded-lg hover:bg-red-100 transition">Reject</button>
                        </form>
                    </div>
                @elseif($booking->status == 'approved')
                    <form action="{{ route('admin.bookings.complete', $booking->id) }}" method="POST" onsubmit="return confirm('Mark as completed?');">
                        @csrf @method('PATCH')
                        <button type="submit" class="w-full py-2 text-xs font-semibold text-blue-700 bg-blue-50 border border-blue-200 rounded-lg hover:bg-blue-100 transition">Mark Completed</button>
                    </form>
                @endif
            </div>
        @empty
            <div class="p-8 text-center">
                <p class="text-sm text-gray-500">No bookings found for this filter</p>
                <a href="{{ route('admin.cars.index') }}" class="text-sm font-semibold text-gray-900 hover:underline mt-2 inline-block">View All</a>
            </div>
        @endforelse
    </div>
</div>

            {{-- ============================================ --}}
            {{-- SECTION 2: FLEET MANAGEMENT --}}
            {{-- ============================================ --}}
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-100 flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">Fleet Management</h3>
                        <p class="text-sm text-gray-500 mt-0.5">Add, edit, or remove vehicles from your fleet</p>
                    </div>
                    <p class="text-sm text-gray-500">
                        <span class="font-semibold text-gray-900">{{ $totalCars }}</span> vehicles
                    </p>
                </div>

                {{-- Desktop Table --}}
                <div class="hidden md:block overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200">
                                <th class="px-6 py-3.5 text-left text-[11px] font-semibold text-gray-500 uppercase tracking-wider">Vehicle</th>
                                <th class="px-6 py-3.5 text-left text-[11px] font-semibold text-gray-500 uppercase tracking-wider">Category</th>
                                <th class="px-6 py-3.5 text-left text-[11px] font-semibold text-gray-500 uppercase tracking-wider">Daily Rate</th>
                                <th class="px-6 py-3.5 text-left text-[11px] font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3.5 text-right text-[11px] font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($cars as $car)
                                <tr class="hover:bg-gray-50 transition-colors duration-150">
                                    {{-- Vehicle --}}
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-14 h-10 rounded-lg overflow-hidden bg-gray-100 flex-shrink-0 border border-gray-200">
                                                @if($car->image)
                                                    <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}" class="w-full h-full object-cover">
                                                @else
                                                    <div class="w-full h-full flex items-center justify-center">
                                                        <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                        </svg>
                                                    </div>
                                                @endif
                                            </div>
                                            <div>
                                                <p class="text-sm font-bold text-gray-900">{{ $car->name }}</p>
                                                <p class="text-xs text-gray-400">{{ $car->brand }} &middot; {{ $car->model_year }}</p>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- Category --}}
                                    <td class="px-6 py-4">
                                        <span class="inline-flex px-2.5 py-1 text-[11px] font-semibold uppercase tracking-wider rounded-md
                                            {{ $car->category == 'suv' ? 'bg-purple-50 text-purple-700 border border-purple-200' : 
                                               ($car->category == 'luxury' ? 'bg-amber-50 text-amber-700 border border-amber-200' : 
                                               'bg-blue-50 text-blue-700 border border-blue-200') }}">
                                            {{ $car->category ?? 'Sedan' }}
                                        </span>
                                    </td>

                                    {{-- Price --}}
                                    <td class="px-6 py-4">
                                        <p class="text-sm font-bold text-gray-900">Rs. {{ number_format($car->price_per_day) }}</p>
                                    </td>

                                    {{-- Status --}}
                                    <td class="px-6 py-4">
                                        @if($car->is_available)
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                                Available
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-red-50 text-red-700 border border-red-200">
                                                <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                                Booked
                                            </span>
                                        @endif
                                    </td>

                                    {{-- Actions --}}
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            <a href="{{ route('admin.cars.edit', $car->id) }}" class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-semibold text-gray-700 bg-gray-50 border border-gray-200 rounded-md hover:bg-gray-100 transition">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this vehicle?');">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-semibold text-red-700 bg-red-50 border border-red-200 rounded-md hover:bg-red-100 transition">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-16 text-center">
                                        <div class="w-14 h-14 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                            <svg class="w-7 h-7 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                            </svg>
                                        </div>
                                        <p class="text-sm font-semibold text-gray-900">No vehicles in fleet</p>
                                        <p class="text-xs text-gray-500 mt-1">Add your first vehicle to get started</p>
                                        <a href="{{ route('cars.create') }}" class="inline-flex items-center gap-2 mt-4 px-5 py-2 bg-gray-900 text-white text-xs font-semibold rounded-lg hover:bg-gray-800 transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                            </svg>
                                            Add Vehicle
                                        </a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Mobile Cards --}}
                <div class="md:hidden divide-y divide-gray-100">
                    @forelse($cars as $car)
                        <div class="p-4">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-16 h-12 rounded-lg overflow-hidden bg-gray-100 flex-shrink-0 border border-gray-200">
                                    @if($car->image)
                                        <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-bold text-gray-900 truncate">{{ $car->brand }} {{ $car->name }}</p>
                                    <p class="text-xs text-gray-400">{{ $car->model_year }} &middot; {{ ucfirst($car->category) }}</p>
                                </div>
                                @if($car->is_available)
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200 flex-shrink-0">Available</span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-semibold bg-red-50 text-red-700 border border-red-200 flex-shrink-0">Booked</span>
                                @endif
                            </div>

                            <div class="flex items-center justify-between">
                                <p class="text-sm font-bold text-gray-900">Rs. {{ number_format($car->price_per_day) }}<span class="text-xs text-gray-400 font-normal">/day</span></p>
                                <div class="flex gap-2">
                                    <a href="{{ route('admin.cars.edit', $car->id) }}" class="px-3 py-1.5 text-xs font-semibold text-gray-700 bg-gray-50 border border-gray-200 rounded-md hover:bg-gray-100 transition">Edit</a>
                                    <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" onsubmit="return confirm('Delete this vehicle?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="px-3 py-1.5 text-xs font-semibold text-red-700 bg-red-50 border border-red-200 rounded-md hover:bg-red-100 transition">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="p-8 text-center">
                            <p class="text-sm text-gray-500">No vehicles added yet</p>
                            <a href="{{ route('cars.create') }}" class="inline-block mt-3 px-5 py-2 bg-gray-900 text-white text-xs font-semibold rounded-lg">Add Vehicle</a>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
@endsection