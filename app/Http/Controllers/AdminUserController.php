<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::withCount('bookings');

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('role')) {
            if ($request->role === 'admin') {
                $query->where('is_admin', true);
            } elseif ($request->role === 'user') {
                $query->where('is_admin', false);
            }
        }

        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->where('is_blocked', false);
            } elseif ($request->status === 'blocked') {
                $query->where('is_blocked', true);
            }
        }

        $users = $query->latest()->get();

        $totalUsers = User::count();
        $activeUsers = User::where('is_blocked', false)->count();
        $blockedUsers = User::where('is_blocked', true)->count();
        $adminUsers = User::where('is_admin', true)->count();

        return view('admin.users.index', compact(
            'users', 'totalUsers', 'activeUsers', 'blockedUsers', 'adminUsers'
        ));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $bookings = Booking::with('car')
            ->where('user_id', $id)
            ->latest()
            ->get();

        $totalSpent = $bookings->whereIn('status', ['approved', 'completed'])->sum('total_price');
        $totalBookings = $bookings->count();

        return view('admin.users.show', compact('user', 'bookings', 'totalSpent', 'totalBookings'));
    }

    public function toggle($id)
    {
        $user = User::findOrFail($id);

        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot block your own account.');
        }

        if ($user->isAdmin()) {
            return back()->with('error', 'Admin accounts cannot be blocked.');
        }

        $user->is_blocked = !$user->is_blocked;
        $user->save();

        $status = $user->is_blocked ? 'blocked' : 'unblocked';
        return back()->with('success', "User {$user->name} has been {$status} successfully.");
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot delete your own account.');
        }

        if ($user->isAdmin()) {
            return back()->with('error', 'Admin accounts cannot be deleted.');
        }

        Booking::where('user_id', $user->id)->delete();
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', "User {$user->name} has been deleted.");
    }
}