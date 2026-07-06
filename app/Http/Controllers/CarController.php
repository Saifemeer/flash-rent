<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // 🌍 PUBLIC METHOD: Guest aur Logged-in users dono ke liye cars display karega
    public function index(Request $request)
    {
        // 1. Pehle Car ka basic query object banao
        $query = Car::query();

        // 2. Agar frontend se koi 'category' pass ki gayi hai (URL me), toh filter lagao
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // 3. Agar search field me kuch likha hai toh name ya brand se search karo
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('brand', 'like', '%' . $request->search . '%');
            });
        }

        // 4. Price range filter
        if ($request->filled('price')) {
            if ($request->price == 'low') {
                $query->where('price_per_day', '<', 5000);
            } elseif ($request->price == 'mid') {
                $query->whereBetween('price_per_day', [5000, 15000]);
            } elseif ($request->price == 'high') {
                $query->where('price_per_day', '>', 15000);
            }
        }

        // 5. Final data database se uthao (latest pehle aaye)
        $cars = $query->latest()->get();

        // Dashboard view ko data bhej do
        return view('dashboard', compact('cars'));
    }

    // 👑 ADMIN METHOD: Gaari add karne ka form dikhane ke liye
    public function create()
    {
        return view('admin.cars.create');
    }

    // 👑 ADMIN METHOD: New car store karna
    public function store(Request $request)
    {
        // Validation se pehle category ke letters ko auto-lowercase kar do
        if ($request->has('category')) {
            $request->merge([
                'category' => strtolower($request->category)
            ]);
        }

        // Form data ko validate karna
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model_year' => 'required|integer',
            'price_per_day' => 'required|integer',
            'category' => 'required|string|in:sedan,suv,luxury',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('cars', 'public');
        }

        // Database me save karna
        Car::create([
            'name' => $request->name,
            'brand' => $request->brand,
            'model_year' => $request->model_year,
            'price_per_day' => $request->price_per_day,
            'category' => $request->category, 
            'image' => $imagePath,
            'is_available' => true,
        ]);

        // 🔥 Admin ko admin dashboard par bhejein taaki experience smoothly chalta rahe
        return redirect()->route('admin.cars.index')->with('success', 'Gaari kamyabi se add ho gayi hai!');
    }

    // 👑 ADMIN METHOD: Gaari edit karne ka form dikhane ke liye
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('admin.cars.edit', compact('car'));
    }

    // 👑 ADMIN METHOD: Form ka badla hua data database me update karne ke liye
    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model_year' => 'required|integer|min:1990|max:2030',
            'price_per_day' => 'required|numeric|min:1',
            'category' => 'required|string', 
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_available' => 'required|boolean',
        ]);

        $data = $request->only(['name', 'brand', 'model_year', 'price_per_day', 'category', 'is_available']);

        if ($request->hasFile('image')) {
            if ($car->image && \Storage::disk('public')->exists($car->image)) {
                \Storage::disk('public')->delete($car->image);
            }
            
            $data['image'] = $request->file('image')->store('cars', 'public');
        }

        $car->update($data);

        return redirect()->route('admin.cars.index')->with('success', 'Gaari ki details kamyabi se update ho gayi hain! 🎉');
    }

    // 👑 ADMIN METHOD: Gaari ko delete karne ke liye
    public function destroy($id)
    {
        $car = Car::findOrFail($id);

        if ($car->image && \Storage::disk('public')->exists($car->image)) {
            \Storage::disk('public')->delete($car->image);
        }

        $car->delete();

        return redirect()->back()->with('success', 'Gaari kamyabi se delete ho gayi!');
    }

    // 🌍 PUBLIC METHOD: Car Detail Page bina login ke bhi open hoga
    public function show($id)
    {
        $car = Car::findOrFail($id);
        
        // Similar cars (same category, exclude current)
        $similarCars = Car::where('category', $car->category)
            ->where('id', '!=', $car->id)
            ->take(3)
            ->get();

        // Existing bookings for this car
        $existingBookings = \App\Models\Booking::where('car_id', $car->id)
            ->where('status', 'approved')
            ->where('end_date', '>=', now()->toDateString())
            ->orderBy('start_date', 'asc')
            ->get();

        return view('cars.show', compact('car', 'similarCars', 'existingBookings'));
    }
}