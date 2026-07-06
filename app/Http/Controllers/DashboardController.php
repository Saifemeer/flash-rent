<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = Car::query();

        // Category Filter
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Search Filter
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('brand', 'like', '%' . $request->search . '%');
            });
        }

        // Price Filter
        if ($request->filled('price')) {
            if ($request->price == 'low') {
                $query->where('price_per_day', '<', 5000);
            } elseif ($request->price == 'mid') {
                $query->whereBetween('price_per_day', [5000, 15000]);
            } elseif ($request->price == 'high') {
                $query->where('price_per_day', '>', 15000);
            }
        }

        $cars = $query->latest()->get();

        return view('dashboard', compact('cars'));
    }
}