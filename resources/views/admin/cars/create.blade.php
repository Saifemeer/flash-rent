@extends('layouts.admin')

@section('header')
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Add New Vehicle</h2>
            <p class="text-sm text-gray-500 mt-1">Add a new car to your rental fleet</p>
        </div>
        <a href="{{ route('admin.cars.index') }}" class="text-sm text-gray-500 hover:text-gray-900 transition flex items-center gap-1.5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Dashboard
        </a>
    </div>
@endsection

@section('content')

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-800 rounded-xl flex items-start gap-3">
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
        </div>
    @endif

    {{-- Success --}}
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-800 rounded-r-lg flex items-center gap-3">
            <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <span class="font-medium text-sm">{{ session('success') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- ============================================ --}}
        {{-- LEFT: Form --}}
        {{-- ============================================ --}}
        <div class="lg:col-span-2">
            <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data" id="car-form">
                @csrf

                {{-- Basic Info --}}
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden mb-6">
                    <div class="px-6 py-5 border-b border-gray-100">
                        <h3 class="text-base font-bold text-gray-900">Vehicle Information</h3>
                        <p class="text-sm text-gray-500 mt-0.5">Enter the basic details of the vehicle</p>
                    </div>

                    <div class="p-6 space-y-5">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            {{-- Car Name --}}
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">Car Name</label>
                                <input type="text" name="name" id="name" required value="{{ old('name') }}" placeholder="e.g. Civic, Corolla, Fortuner"
                                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-gray-900 focus:border-gray-900 transition placeholder:text-gray-400">
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Brand --}}
                            <div>
                                <label for="brand" class="block text-sm font-medium text-gray-700 mb-1.5">Brand</label>
                                <input type="text" name="brand" id="brand" required value="{{ old('brand') }}" placeholder="e.g. Honda, Toyota, BMW"
                                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-gray-900 focus:border-gray-900 transition placeholder:text-gray-400">
                                @error('brand')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            {{-- Model Year --}}
                            <div>
                                <label for="model_year" class="block text-sm font-medium text-gray-700 mb-1.5">Model Year</label>
                                <input type="number" name="model_year" id="model_year" required value="{{ old('model_year') }}" placeholder="e.g. 2024" min="2000" max="{{ date('Y') + 1 }}"
                                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-gray-900 focus:border-gray-900 transition placeholder:text-gray-400">
                                @error('model_year')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Category --}}
                            <div>
                                <label for="category" class="block text-sm font-medium text-gray-700 mb-1.5">Category</label>
                                <select name="category" id="category" required
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-gray-900 focus:border-gray-900 transition text-gray-700">
                                    <option value="sedan" {{ old('category') == 'sedan' ? 'selected' : '' }}>Sedan</option>
                                    <option value="suv" {{ old('category') == 'suv' ? 'selected' : '' }}>SUV</option>
                                    <option value="luxury" {{ old('category') == 'luxury' ? 'selected' : '' }}>Luxury</option>
                                </select>
                                @error('category')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Pricing --}}
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden mb-6">
                    <div class="px-6 py-5 border-b border-gray-100">
                        <h3 class="text-base font-bold text-gray-900">Pricing</h3>
                        <p class="text-sm text-gray-500 mt-0.5">Set the daily rental rate</p>
                    </div>

                    <div class="p-6">
                        <div>
                            <label for="price_per_day" class="block text-sm font-medium text-gray-700 mb-1.5">Price Per Day (Rs.)</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                    <span class="text-gray-500 text-sm font-medium">Rs.</span>
                                </div>
                                <input type="number" name="price_per_day" id="price_per_day" required value="{{ old('price_per_day') }}" placeholder="5000" min="500"
                                       class="w-full pl-12 pr-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-gray-900 focus:border-gray-900 transition placeholder:text-gray-400">
                            </div>
                            @error('price_per_day')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Image Upload --}}
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden mb-6">
                    <div class="px-6 py-5 border-b border-gray-100">
                        <h3 class="text-base font-bold text-gray-900">Vehicle Image</h3>
                        <p class="text-sm text-gray-500 mt-0.5">Upload a clear photo of the vehicle</p>
                    </div>

                    <div class="p-6">
                        <div id="upload-area" class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center hover:border-gray-400 transition-colors cursor-pointer" onclick="document.getElementById('image-input').click()">
                            <div id="upload-placeholder">
                                <div class="w-14 h-14 bg-gray-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-7 h-7 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <p class="text-sm font-semibold text-gray-700">Click to upload image</p>
                                <p class="text-xs text-gray-400 mt-1">PNG, JPG, WEBP up to 5MB</p>
                            </div>
                            <div id="upload-preview" class="hidden">
                                <img id="preview-img" src="" alt="Preview" class="max-h-48 mx-auto rounded-lg shadow-sm">
                                <p id="preview-name" class="text-sm text-gray-600 mt-3 font-medium"></p>
                                <p class="text-xs text-gray-400 mt-1">Click to change image</p>
                            </div>
                        </div>
                        <input type="file" name="image" id="image-input" required accept="image/*" class="hidden" onchange="previewImage(this)">
                        @error('image')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Submit Button --}}
                <button type="submit" class="w-full py-3.5 bg-gray-900 text-white font-semibold text-sm rounded-xl hover:bg-gray-800 active:bg-black transition-colors focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2 inline-flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Save Vehicle
                </button>
            </form>
        </div>

        {{-- ============================================ --}}
        {{-- RIGHT: Tips & Preview --}}
        {{-- ============================================ --}}
        <div class="lg:col-span-1 space-y-6">

            {{-- Live Preview Card --}}
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden sticky top-24">
                <div class="px-5 py-4 border-b border-gray-100">
                    <h4 class="text-sm font-bold text-gray-900">Live Preview</h4>
                    <p class="text-xs text-gray-500 mt-0.5">See how your car will appear</p>
                </div>

                <div class="p-4">
                    {{-- Preview Card --}}
                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <div class="h-36 bg-gray-100 overflow-hidden flex items-center justify-center" id="card-preview-image">
                            <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div class="p-4">
                            <span class="text-[11px] font-semibold uppercase tracking-widest text-gray-400" id="card-preview-brand">Brand</span>
                            <h3 class="text-base font-bold text-gray-900 mt-0.5" id="card-preview-name">Car Name</h3>
                            <p class="text-xs text-gray-400 mt-0.5"><span id="card-preview-year">Year</span> Model</p>
                            <div class="mt-3 pt-3 border-t border-gray-100 flex items-end justify-between">
                                <div>
                                    <p class="text-[10px] uppercase tracking-wider text-gray-400 font-medium">Per Day</p>
                                    <p class="text-lg font-extrabold text-gray-900">Rs. <span id="card-preview-price">0</span></p>
                                </div>
                                <span class="px-3 py-1.5 text-xs font-semibold text-white bg-gray-900 rounded-md">Book Now</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tips --}}
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="px-5 py-4 border-b border-gray-100">
                    <h4 class="text-sm font-bold text-gray-900">Tips</h4>
                </div>
                <div class="p-5 space-y-4">
                    <div class="flex items-start gap-3">
                        <div class="w-7 h-7 bg-gray-100 rounded-md flex items-center justify-center flex-shrink-0">
                            <svg class="w-3.5 h-3.5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-gray-900">Use clear images</p>
                            <p class="text-xs text-gray-500 mt-0.5">High quality, well-lit photos attract more bookings</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-7 h-7 bg-gray-100 rounded-md flex items-center justify-center flex-shrink-0">
                            <svg class="w-3.5 h-3.5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-gray-900">Set competitive pricing</p>
                            <p class="text-xs text-gray-500 mt-0.5">Research market rates for similar vehicles</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-7 h-7 bg-gray-100 rounded-md flex items-center justify-center flex-shrink-0">
                            <svg class="w-3.5 h-3.5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-gray-900">Choose correct category</p>
                            <p class="text-xs text-gray-500 mt-0.5">Helps customers find the right vehicle quickly</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- JavaScript --}}
    <script>
        // Image Preview
        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Upload area preview
                    document.getElementById('upload-placeholder').classList.add('hidden');
                    document.getElementById('upload-preview').classList.remove('hidden');
                    document.getElementById('preview-img').src = e.target.result;
                    document.getElementById('preview-name').textContent = input.files[0].name;

                    // Card preview
                    document.getElementById('card-preview-image').innerHTML = '<img src="' + e.target.result + '" class="w-full h-full object-cover" alt="Preview">';
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Live Preview Updates
        document.addEventListener('DOMContentLoaded', function() {
            const nameInput = document.getElementById('name');
            const brandInput = document.getElementById('brand');
            const yearInput = document.getElementById('model_year');
            const priceInput = document.getElementById('price_per_day');

            const previewName = document.getElementById('card-preview-name');
            const previewBrand = document.getElementById('card-preview-brand');
            const previewYear = document.getElementById('card-preview-year');
            const previewPrice = document.getElementById('card-preview-price');

            nameInput.addEventListener('input', function() {
                previewName.textContent = this.value || 'Car Name';
            });

            brandInput.addEventListener('input', function() {
                previewBrand.textContent = this.value || 'Brand';
            });

            yearInput.addEventListener('input', function() {
                previewYear.textContent = this.value || 'Year';
            });

            priceInput.addEventListener('input', function() {
                const val = parseInt(this.value) || 0;
                previewPrice.textContent = val.toLocaleString('en-US');
            });
        });
    </script>

@endsection