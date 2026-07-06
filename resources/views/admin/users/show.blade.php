@extends('layouts.admin')

@section('header')
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 tracking-tight">User Details</h2>
            <p class="text-sm text-gray-500 mt-1">{{ $user->name }} — {{ $user->email }}</p>
        </div>
        <a href="{{ route('admin.users.index') }}" class="text-sm text-gray-500 hover:text-gray-900 transition flex items-center gap-1.5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Back to Users
        </a>
    </div>
@endsection

@section('content')

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-800 rounded-r-lg text-sm font-medium">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-800 rounded-r-lg text-sm font-medium">{{ session('error') }}</div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- User Info --}}
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="p-6 text-center border-b border-gray-100">
                    <div class="w-20 h-20 {{ $user->role === 'admin' ? 'bg-amber-500' : 'bg-gray-900' }} rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto">
                        {{ strtoupper(substr($user->name, 0, 2)) }}
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mt-4">{{ $user->name }}</h3>
                    <p class="text-sm text-gray-500">{{ $user->email }}</p>
                    <div class="flex items-center justify-center gap-2 mt-3">
                        @if($user->role === 'admin')
                            <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-700 border border-amber-200">Admin</span>
                        @else
                            <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-gray-50 text-gray-700 border border-gray-200">User</span>
                        @endif
                        @if($user->is_blocked)
                            <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-red-50 text-red-700 border border-red-200">Blocked</span>
                        @else
                            <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">Active</span>
                        @endif
                    </div>
                </div>
                <div class="p-6 space-y-3">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Joined</span>
                        <span class="font-semibold text-gray-900">{{ $user->created_at->format('d M, Y') }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Total Bookings</span>
                        <span class="font-semibold text-gray-900">{{ $totalBookings }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Total Spent</span>
                        <span class="font-semibold text-gray-900">Rs. {{ number_format($totalSpent) }}</span>
                    </div>
                </div>

                @if($user->role !== 'admin')
                    <div class="p-6 border-t border-gray-100 space-y-2">
                        <form action="{{ route('admin.users.toggle', $user->id) }}" method="POST">
                            @csrf @method('PATCH')
                            <button type="submit" class="w-full py-2.5 text-xs font-semibold {{ $user->is_blocked ? 'text-emerald-700 bg-emerald-50 border-emerald-200 hover:bg-emerald-100' : 'text-red-700 bg-red-50 border-red-200 hover:bg-red-100' }} border rounded-lg transition">
                                {{ $user->is_blocked ? 'Unblock User' : 'Block User' }}
                            </button>
                        </form>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure? This will permanently delete this user and all their bookings.');">
                            @csrf @method('DELETE')
                            <button type="submit" class="w-full py-2.5 text-xs font-semibold text-red-700 bg-white border border-red-200 rounded-lg hover:bg-red-50 transition">
                                Delete User
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>

        {{-- Booking History --}}
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-100">
                    <h3 class="text-base font-bold text-gray-900">Booking History</h3>
                    <p class="text-sm text-gray-500 mt-0.5">{{ $totalBookings }} total bookings</p>
                </div>

                @if($bookings->isEmpty())
                    <div class="p-12 text-center">
                        <p class="text-sm text-gray-500">No bookings found for this user</p>
                    </div>
                @else
                    <div class="divide-y divide-gray-100">
                        @foreach($bookings as $booking)
                            <div class="p-5 hover:bg-gray-50 transition">
                                <div class="flex items-center justify-between mb-2">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-8 rounded-md overflow-hidden bg-gray-100 flex-shrink-0">
                                            @if($booking->car->image)
                                                <img src="{{ asset('storage/' . $booking->car->image) }}" class="w-full h-full object-cover">
                                            @endif
                                        </div>
                                        <div>
                                            <p class="text-sm font-semibold text-gray-900">{{ $booking->car->brand }} {{ $booking->car->name }}</p>
                                            <p class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($booking->start_date)->format('d M') }} — {{ \Carbon\Carbon::parse($booking->end_date)->format('d M, Y') }}</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-sm font-bold text-gray-900">Rs. {{ number_format($booking->total_price) }}</p>
                                        @if($booking->status == 'pending')
                                            <span class="text-[10px] font-semibold text-amber-700">Pending</span>
                                        @elseif($booking->status == 'approved')
                                            <span class="text-[10px] font-semibold text-emerald-700">Approved</span>
                                        @elseif($booking->status == 'completed')
                                            <span class="text-[10px] font-semibold text-blue-700">Completed</span>
                                        @else
                                            <span class="text-[10px] font-semibold text-red-700">{{ ucfirst($booking->status) }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

    </div>

@endsection