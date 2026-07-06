<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CarController;
use App\Models\Car;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| 🌍 PUBLIC ROUTES (No Login Required)
|--------------------------------------------------------------------------
*/

// 🔥 FIX: Main Dashboard ab public hai, user directly gaariyan dekh sakta hai
Route::get('/', [CarController::class, 'index'])->name('dashboard');

// Car Detail Page (Ab yeh bhi public hai taaki log details dekh sakein)
Route::get('/car/{id}', [CarController::class, 'show'])->name('cars.show');

// General Pages
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
Route::get('/about', function () { return view('bookings.about'); })->name('about');
Route::get('/faq', function () { return view('bookings.faq'); })->name('faq');
Route::get('/terms', function () { return view('bookings.term'); })->name('terms');
Route::get('/privacy', function () { return view('bookings.privacy'); })->name('privacy');


/*
|--------------------------------------------------------------------------
| 🔒 AUTHENTICATED ROUTES (Login Strictly Required)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    
    // 🎫 Booking Actions (Sirf login users hi book kar sakte hain)
    Route::get('/car{id}book', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/car/{id}/book/store', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/my-bookings', [BookingController::class, 'myBookings'])->name('bookings.my_bookings');
    Route::patch('/bookings/{id}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');
    Route::get('/bookings/{id}/invoice', [BookingController::class, 'showInvoice'])->name('bookings.invoice');

    // 👤 Profile Management (Breeze Default)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| 👑 ADMIN ONLY ROUTES (Secure Group)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    
    // 🚗 CARS MANAGEMENT (ADMIN)
    Route::get('/admin/cars', [CarController::class, 'adminIndex'])->name('admin.cars.index');
    Route::get('/admin/cars/create', [CarController::class, 'create'])->name('cars.create');
    Route::post('/admin/cars/store', [CarController::class, 'store'])->name('cars.store');
    Route::get('/admin/cars/{id}/edit', [CarController::class, 'edit'])->name('admin.cars.edit');
    Route::put('/admin/cars/{id}', [CarController::class, 'update'])->name('admin.cars.update');
    Route::delete('/admin/cars/{id}', [CarController::class, 'destroy'])->name('admin.cars.destroy');

    // 📅 BOOKINGS MANAGEMENT (ADMIN)
    Route::get('/admin/bookings', [BookingController::class, 'adminIndex'])->name('admin.bookings.index');
    Route::patch('/admin/bookings/{id}/complete', [BookingController::class, 'complete'])->name('admin.bookings.complete');
    Route::patch('/admin/bookings/{id}/{status}', [BookingController::class, 'updateStatus'])->name('admin.bookings.update');

    // 👥 USER MANAGEMENT
    Route::get('/admin/users', [\App\Http\Controllers\AdminUserController::class, 'index'])->name('admin.users.index');
    Route::patch('/admin/users/{id}/toggle', [\App\Http\Controllers\AdminUserController::class, 'toggle'])->name('admin.users.toggle');
    Route::get('/admin/users/{id}', [\App\Http\Controllers\AdminUserController::class, 'show'])->name('admin.users.show');
    Route::delete('/admin/users/{id}', [\App\Http\Controllers\AdminUserController::class, 'destroy'])->name('admin.users.destroy');
});

require __DIR__.'/auth.php';