<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Booking;
use App\Models\User;
use App\Mail\BookingReceived;
use App\Mail\BookingApproved;
use App\Mail\BookingRejected;
use App\Mail\BookingCompleted;
use App\Mail\BookingCancelled;
use App\Mail\AdminNewBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class BookingController extends Controller
{
    // ============================================
    // Booking Form Show Karo
    // ============================================
    public function create($id)
    {
        $car = Car::findOrFail($id);

        $existingBookings = Booking::where('car_id', $id)
            ->where('status', 'approved')
            ->where('end_date', '>=', now()->toDateString())
            ->orderBy('start_date', 'asc')
            ->get();

        return view('bookings.create', compact('car', 'existingBookings'));
    }

    // ============================================
    // Booking Store (User)
    // ============================================
    public function store(Request $request)
    {
        $request->validate([
            'car_id'     => 'required|exists:cars,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date'   => 'required|date|after_or_equal:start_date',
        ]);

        $carId     = $request->car_id;
        $startDate = $request->start_date;
        $endDate   = $request->end_date;

        // Date Overlap Check
        $isBooked = Booking::where('car_id', $carId)
            ->where('status', 'approved')
            ->where(function ($query) use ($startDate, $endDate) {
                $query->where('start_date', '<=', $endDate)
                      ->where('end_date', '>=', $startDate);
            })
            ->exists();

        if ($isBooked) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['date_error' => 'This vehicle is already booked for the selected dates. Please choose different dates.']);
        }

        $car       = Car::findOrFail($carId);
        $start     = Carbon::parse($startDate);
        $end       = Carbon::parse($endDate);
        $days      = $start->diffInDays($end) + 1;
        $totalPrice = $days * $car->price_per_day;

        // Save Booking
        $booking = Booking::create([
            'user_id'     => Auth::id(),
            'car_id'      => $carId,
            'start_date'  => $startDate,
            'end_date'    => $endDate,
            'total_price' => $totalPrice,
            'status'      => 'pending',
        ]);

        // Load relationships for emails
        $booking->load(['user', 'car']);

        // Email 1: User ko confirmation
        try {
            Mail::to($booking->user->email)->send(new BookingReceived($booking));
        } catch (\Exception $e) {
            // Email fail hone pe app crash na kare
        }

        // Email 2: Admin ko alert
        try {
            $adminEmail = User::where('role', 'admin')->first()?->email;
            if ($adminEmail) {
                Mail::to($adminEmail)->send(new AdminNewBooking($booking));
            }
        } catch (\Exception $e) {
            // Silent fail
        }

        return redirect()->route('dashboard')
            ->with('success', 'Booking request submitted successfully! A confirmation email has been sent to you.');
    }

    // ============================================
    // My Bookings (User)
    // ============================================
    public function myBookings()
    {
        $bookings = Booking::with('car')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('bookings.my_bookings', compact('bookings'));
    }

   // ============================================
// Admin Dashboard (with Booking Filter)
// ============================================
public function adminIndex(Request $request)
{
    // Booking Query with Status Filter
    $query = Booking::with(['car', 'user']);

    if ($request->filled('status') && $request->status !== 'all') {
        $query->where('status', $request->status);
    }

    $bookings = $query->latest()->get();

    // Filter Counts (for tab badges)
    $allCount = Booking::count();
    $pendingCount = Booking::where('status', 'pending')->count();
    $approvedCount = Booking::where('status', 'approved')->count();
    $completedCount = Booking::where('status', 'completed')->count();
    $cancelledCount = Booking::where('status', 'cancelled')->count();

    // Stats
    $totalCars = Car::count();
    $activeRents = Car::where('is_available', false)->count();
    $pendingBookings = Booking::where('status', 'pending')->count();
    $totalEarnings = Booking::whereIn('status', ['approved', 'completed'])->sum('total_price');
    $cars = Car::all();

    $currentFilter = $request->get('status', 'all');

    return view('admin.index', compact(
        'bookings',
        'totalCars',
        'activeRents',
        'pendingBookings',
        'totalEarnings',
        'cars',
        'allCount',
        'pendingCount',
        'approvedCount',
        'completedCount',
        'cancelledCount',
        'currentFilter'
    ));
}

    // ============================================
    // Admin: Approve / Reject Booking
    // ============================================
    public function updateStatus($id, $status)
    {
        $booking = Booking::with(['user', 'car'])->findOrFail($id);

        $allowedStatuses = ['approved', 'cancelled'];
        if (!in_array($status, $allowedStatuses)) {
            return back()->with('error', 'Invalid status.');
        }

        $booking->update(['status' => $status]);

        // Email to User
        try {
            if ($status === 'approved') {
                Mail::to($booking->user->email)->send(new BookingApproved($booking));
            } elseif ($status === 'cancelled') {
                Mail::to($booking->user->email)->send(new BookingRejected($booking));
            }
        } catch (\Exception $e) {
            // Silent fail
        }

        $message = $status === 'approved' ? 'Booking approved successfully.' : 'Booking rejected successfully.';
        return back()->with('success', $message);
    }

    // ============================================
    // Admin: Mark Booking as Completed
    // ============================================
    public function complete($id)
    {
        $booking = Booking::with(['user', 'car'])->findOrFail($id);

        if ($booking->status !== 'approved') {
            return back()->with('error', 'Only approved bookings can be marked as completed.');
        }

        // Update booking status
        $booking->update(['status' => 'completed']);

        // Make car available again
        $booking->car->update(['is_available' => true]);

        // Email to User
        try {
            Mail::to($booking->user->email)->send(new BookingCompleted($booking));
        } catch (\Exception $e) {
            // Silent fail
        }

        return back()->with('success', 'Booking marked as completed. Vehicle is now available.');
    }

    // ============================================
    // User: Cancel Booking
    // ============================================
    public function cancel($id)
    {
        $booking = Booking::with(['user', 'car'])
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        if ($booking->status !== 'pending') {
            return back()->with('error', 'Only pending bookings can be cancelled.');
        }

        $booking->update(['status' => 'cancelled']);

        // Email 1: User ko cancellation confirmation
        try {
            Mail::to($booking->user->email)->send(new BookingCancelled($booking));
        } catch (\Exception $e) {
            // Silent fail
        }

        // Email 2: Admin ko cancellation alert
        try {
            $adminEmail = User::where('role', 'admin')->first()?->email;
            if ($adminEmail) {
                Mail::to($adminEmail)->send(new BookingCancelled($booking));
            }
        } catch (\Exception $e) {
            // Silent fail
        }

        return back()->with('success', 'Booking cancelled successfully. A confirmation email has been sent.');
    }

    // ============================================
    // Invoice View
    // ============================================
    public function showInvoice($id)
    {
        $booking = Booking::with(['car', 'user'])->findOrFail($id);

        // Authorization check
        if (Auth::user()->role !== 'admin' && Auth::id() !== $booking->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $totalDays = Carbon::parse($booking->start_date)
                        ->diffInDays(Carbon::parse($booking->end_date)) + 1;

        return view('bookings.invoice', compact('booking', 'totalDays'));
    }
}