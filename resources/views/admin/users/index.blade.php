@extends('layouts.admin')

@section('header')
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 tracking-tight">User Management</h2>
            <p class="text-sm text-gray-500 mt-1">Manage all registered users</p>
        </div>
    </div>
@endsection

@section('content')

    {{-- Alerts --}}
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-800 rounded-r-lg flex items-center justify-between" x-data="{ show: true }" x-show="show">
            <div class="flex items-center gap-3">
                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                <span class="font-medium text-sm">{{ session('success') }}</span>
            </div>
            <button @click="show = false" class="text-green-400 hover:text-green-600"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-800 rounded-r-lg flex items-center justify-between" x-data="{ show: true }" x-show="show">
            <div class="flex items-center gap-3">
                <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                <span class="font-medium text-sm">{{ session('error') }}</span>
            </div>
            <button @click="show = false" class="text-red-400 hover:text-red-600"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
        </div>
    @endif

    {{-- Stats --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <div class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-wider">Total Users</p>
                    <p class="text-2xl font-extrabold text-gray-900 mt-1">{{ $totalUsers }}</p>
                </div>
                <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-wider">Active</p>
                    <p class="text-2xl font-extrabold text-emerald-600 mt-1">{{ $activeUsers }}</p>
                </div>
                <div class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-wider">Blocked</p>
                    <p class="text-2xl font-extrabold text-red-600 mt-1">{{ $blockedUsers }}</p>
                </div>
                <div class="w-12 h-12 bg-red-50 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-wider">Admins</p>
                    <p class="text-2xl font-extrabold text-amber-600 mt-1">{{ $adminUsers }}</p>
                </div>
                <div class="w-12 h-12 bg-amber-50 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
            </div>
        </div>
    </div>

    {{-- Search & Filters --}}
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm mb-6">
        <div class="p-4">
            <form method="GET" action="{{ route('admin.users.index') }}" class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                <div>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name or email..."
                           class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-gray-900 focus:border-gray-900 placeholder:text-gray-400">
                </div>
                <div>
                    <select name="role" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-gray-900 focus:border-gray-900 text-gray-700">
                        <option value="">All Roles</option>
                        <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>
                <div>
                    <select name="status" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-gray-900 focus:border-gray-900 text-gray-700">
                        <option value="">All Status</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="blocked" {{ request('status') == 'blocked' ? 'selected' : '' }}>Blocked</option>
                    </select>
                </div>
                <div class="flex gap-2">
                    <button type="submit" class="flex-1 px-6 py-2.5 bg-gray-900 text-white text-sm font-semibold rounded-lg hover:bg-gray-800 transition">Search</button>
                    @if(request('search') || request('role') || request('status'))
                        <a href="{{ route('admin.users.index') }}" class="px-3 py-2.5 border border-gray-300 text-gray-500 rounded-lg hover:bg-gray-50 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    {{-- Users Table --}}
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">

        {{-- Desktop --}}
        <div class="hidden md:block overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200">
                        <th class="px-6 py-3.5 text-left text-[11px] font-semibold text-gray-500 uppercase tracking-wider">User</th>
                        <th class="px-6 py-3.5 text-left text-[11px] font-semibold text-gray-500 uppercase tracking-wider">Role</th>
                        <th class="px-6 py-3.5 text-left text-[11px] font-semibold text-gray-500 uppercase tracking-wider">Bookings</th>
                        <th class="px-6 py-3.5 text-left text-[11px] font-semibold text-gray-500 uppercase tracking-wider">Joined</th>
                        <th class="px-6 py-3.5 text-left text-[11px] font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3.5 text-right text-[11px] font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($users as $user)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 {{ $user->role === 'admin' ? 'bg-amber-500' : 'bg-gray-900' }} rounded-full flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                                        {{ strtoupper(substr($user->name, 0, 2)) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-900">{{ $user->name }}</p>
                                        <p class="text-xs text-gray-400">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @if($user->role === 'admin')
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-700 border border-amber-200">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                        Admin
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-gray-50 text-gray-700 border border-gray-200">
                                        User
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-sm font-semibold text-gray-900">{{ $user->bookings_count }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-sm text-gray-900">{{ $user->created_at->format('d M, Y') }}</p>
                                <p class="text-xs text-gray-400">{{ $user->created_at->diffForHumans() }}</p>
                            </td>
                            <td class="px-6 py-4">
                                @if($user->is_blocked)
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-red-50 text-red-700 border border-red-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                        Blocked
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        Active
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.users.show', $user->id) }}" class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-semibold text-gray-700 bg-gray-50 border border-gray-200 rounded-md hover:bg-gray-100 transition">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        View
                                    </a>
                                    @if($user->role !== 'admin')
                                        <form action="{{ route('admin.users.toggle', $user->id) }}" method="POST">
                                            @csrf @method('PATCH')
                                            <button type="submit" class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-semibold {{ $user->is_blocked ? 'text-emerald-700 bg-emerald-50 border-emerald-200 hover:bg-emerald-100' : 'text-red-700 bg-red-50 border-red-200 hover:bg-red-100' }} border rounded-md transition">
                                                {{ $user->is_blocked ? 'Unblock' : 'Block' }}
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-16 text-center">
                                <p class="text-sm font-semibold text-gray-900">No users found</p>
                                <p class="text-xs text-gray-500 mt-1">Try adjusting your search filters</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Mobile --}}
        <div class="md:hidden divide-y divide-gray-100">
            @forelse($users as $user)
                <div class="p-4">
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 {{ $user->role === 'admin' ? 'bg-amber-500' : 'bg-gray-900' }} rounded-full flex items-center justify-center text-white text-xs font-bold">
                                {{ strtoupper(substr($user->name, 0, 2)) }}
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-900">{{ $user->name }}</p>
                                <p class="text-xs text-gray-400">{{ $user->email }}</p>
                            </div>
                        </div>
                        @if($user->is_blocked)
                            <span class="text-[10px] font-semibold bg-red-50 text-red-700 border border-red-200 px-2 py-0.5 rounded-full">Blocked</span>
                        @else
                            <span class="text-[10px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200 px-2 py-0.5 rounded-full">Active</span>
                        @endif
                    </div>
                    <div class="grid grid-cols-3 gap-3 text-center bg-gray-50 rounded-lg p-3 mb-3">
                        <div>
                            <p class="text-[10px] text-gray-400 uppercase font-semibold">Role</p>
                            <p class="text-xs font-semibold text-gray-900 mt-0.5 capitalize">{{ $user->role }}</p>
                        </div>
                        <div class="border-x border-gray-200">
                            <p class="text-[10px] text-gray-400 uppercase font-semibold">Bookings</p>
                            <p class="text-xs font-semibold text-gray-900 mt-0.5">{{ $user->bookings_count }}</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 uppercase font-semibold">Joined</p>
                            <p class="text-xs font-semibold text-gray-900 mt-0.5">{{ $user->created_at->format('d M') }}</p>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('admin.users.show', $user->id) }}" class="flex-1 py-2 text-xs font-semibold text-gray-700 bg-gray-50 border border-gray-200 rounded-lg hover:bg-gray-100 transition text-center">View</a>
                        @if($user->role !== 'admin')
                            <form action="{{ route('admin.users.toggle', $user->id) }}" method="POST" class="flex-1">
                                @csrf @method('PATCH')
                                <button type="submit" class="w-full py-2 text-xs font-semibold {{ $user->is_blocked ? 'text-emerald-700 bg-emerald-50 border-emerald-200' : 'text-red-700 bg-red-50 border-red-200' }} border rounded-lg transition">
                                    {{ $user->is_blocked ? 'Unblock' : 'Block' }}
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            @empty
                <div class="p-8 text-center">
                    <p class="text-sm text-gray-500">No users found</p>
                </div>
            @endforelse
        </div>
    </div>

@endsection