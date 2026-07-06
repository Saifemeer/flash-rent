@extends('layouts.admin')

@section('header')
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Edit Vehicle</h2>
            <p class="text-sm text-gray-500 mt-1">{{ $car->brand }} {{ $car->name }} ({{ $car->model_year }})</p>
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

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- ============================================ --}}
        {{-- LEFT: Edit Form --}}
        {{-- ============================================ --}}
        <div class="lg:col-span-2">
            <form action="{{ route('admin.cars.update', $car->id) }}" method="POST" enctype="multipart/form-data" id="edit-form">
                @csrf
                @method('PUT')

                {{-- Vehicle Information --}}
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden mb-6">
                    <div class="px-6 py-5 border-b border-gray-100">
                        <h3 class="text-base font-bold text-gray-900">Vehicle Information</h3>
                        <p class="text-sm text-gray-500 mt-0.5">Update the basic details of this vehicle</p>
                    </div>

                    <div class="p-6 space-y-5">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            {{-- Car Name --}}
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">Car Name</label>
                                <input type="text" name="name" id="name" required value="{{ old('name', $car->name) }}" placeholder="e.g. Civic, Corolla"
                                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-gray-900 focus:border-gray-900 transition placeholder:text-gray-400">
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Brand --}}
                            <div>
                                <label for="brand" class="block text-sm font-medium text-gray-700 mb-1.5">Brand</label>
                                <input type="text" name="brand" id="brand" required value="{{ old('brand', $car->brand) }}" placeholder="e.g. Honda, Toyota"
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
                                <input type="number" name="model_year" id="model_year" required value="{{ old('model_year', $car->model_year) }}" placeholder="e.g. 2024" min="2000" max="{{ date('Y') + 1 }}"
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
                                    <option value="sedan" {{ strtolower(old('category', $car->category)) == 'sedan' ? 'selected' : '' }}>Sedan</option>
                                    <option value="suv" {{ strtolower(old('category', $car->category)) == 'suv' ? 'selected' : '' }}>SUV</option>
                                    <option value="luxury" {{ strtolower(old('category', $car->category)) == 'luxury' ? 'selected' : '' }}>Luxury</option>
                                    <option value="hatchback" {{ strtolower(old('category', $car->category)) == 'hatchback' ? 'selected' : '' }}>Hatchback</option>
                                </select>
                                @error('category')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Pricing & Availability --}}
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden mb-6">
                    <div class="px-6 py-5 border-b border-gray-100">
                        <h3 class="text-base font-bold text-gray-900">Pricing & Availability</h3>
                        <p class="text-sm text-gray-500 mt-0.5">Update rental rate and availability status</p>
                    </div>

                    <div class="p-6 space-y-5">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            {{-- Price --}}
                            <div>
                                <label for="price_per_day" class="block text-sm font-medium text-gray-700 mb-1.5">Price Per Day (Rs.)</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                        <span class="text-gray-500 text-sm font-medium">Rs.</span>
                                    </div>
                                    <input type="number" name="price_per_day" id="price_per_day" required value="{{ old('price_per_day', $car->price_per_day) }}" placeholder="5000" min="500"
                                           class="w-full pl-12 pr-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-gray-900 focus:border-gray-900 transition placeholder:text-gray-400">
                                </div>
                                @error('price_per_day')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Availability --}}
                            <div>
                                <label for="is_available" class="block text-sm font-medium text-gray-700 mb-1.5">Availability Status</label>
                                <select name="is_available" id="is_available"
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-gray-900 focus:border-gray-900 transition text-gray-700">
                                    <option value="1" {{ old('is_available', $car->is_available) == 1 ? 'selected' : '' }}>Available for Rent</option>
                                    <option value="0" {{ old('is_available', $car->is_available) == 0 ? 'selected' : '' }}>Unavailable / Maintenance</option>
                                </select>
                                @error('is_available')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Image Upload --}}
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden mb-6">
                    <div class="px-6 py-5 border-b border-gray-100">
                        <h3 class="text-base font-bold text-gray-900">Vehicle Image</h3>
                        <p class="text-sm text-gray-500 mt-0.5">Update the vehicle photo (leave empty to keep current)</p>
                    </div>

                    <div class="p-6">
                        <div class="flex flex-col sm:flex-row gap-5">
                            {{-- Current Image --}}
                            <div class="flex-shrink-0">
                                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Current Image</p>
                                <div class="w-40 h-28 rounded-lg overflow-hidden bg-gray-100 border border-gray-200">
                                    @if($car->image)
                                        <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{-- Upload New --}}
                            <div class="flex-1">
                                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Upload New</p>
                                <div id="upload-area" class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-gray-400 transition-colors cursor-pointer h-28 flex flex-col items-center justify-center" onclick="document.getElementById('image-input').click()">
                                    <div id="upload-placeholder">
                                        <svg class="w-8 h-8 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                        </svg>
                                        <p class="text-xs text-gray-500">Click to upload new image</p>
                                    </div>
                                    <div id="upload-preview" class="hidden">
                                        <p id="preview-name" class="text-sm text-gray-700 font-medium"></p>
                                        <p class="text-xs text-gray-400 mt-1">Click to change</p>
                                    </div>
                                </div>
                                <input type="file" name="image" id="image-input" accept="image/*" class="hidden" onchange="handleUpload(this)">
                                @error('image')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Actions --}}
                <div class="flex items-center justify-between">
                    <a href="{{ route('admin.cars.index') }}" class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                        Cancel
                    </a>
                    <button type="submit" class="px-8 py-3 bg-gray-900 text-white font-semibold text-sm rounded-lg hover:bg-gray-800 active:bg-black transition-colors focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2 inline-flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Update Vehicle
                    </button>
                </div>
            </form>
        </div>

        {{-- ============================================ --}}
        {{-- RIGHT: Current Info --}}
        {{-- ============================================ --}}
        <div class="lg:col-span-1 space-y-6">

            {{-- Current Vehicle Card --}}
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden sticky top-24">
                <div class="px-5 py-4 border-b border-gray-100">
                    <h4 class="text-sm font-bold text-gray-900">Current Details</h4>
                    <p class="text-xs text-gray-500 mt-0.5">This is what customers see now</p>
                </div>

                {{-- Image --}}
                <div class="h-40 bg-gray-100 overflow-hidden">
                    @if($car->image)
                        <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    @endif
                </div>

                <div class="p-5 space-y-4">
                    {{-- Status --}}
                    <div class="flex items-center justify-between">
                        @if($car->is_available)
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                Available
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-red-50 text-red-700 border border-red-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                Unavailable
                            </span>
                        @endif
                        <span class="text-[11px] font-semibold uppercase tracking-wider text-gray-500 bg-gray-100 px-2.5 py-1 rounded capitalize">
                            {{ $car->category }}
                        </span>
                    </div>

                    {{-- Details --}}
                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-widest text-gray-400">{{ $car->brand }}</p>
                        <h3 class="text-lg font-bold text-gray-900 mt-0.5">{{ $car->name }}</h3>
                        <p class="text-sm text-gray-500 mt-0.5">{{ $car->model_year }} Model</p>
                    </div>

                    {{-- Price --}}
                    <div class="pt-4 border-t border-gray-100">
                        <p class="text-[11px] uppercase tracking-wider text-gray-400 font-medium">Daily Rate</p>
                        <p class="text-2xl font-extrabold text-gray-900 mt-0.5">Rs. {{ number_format($car->price_per_day) }}</p>
                    </div>

                    {{-- Meta --}}
                    <div class="pt-4 border-t border-gray-100 space-y-2">
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-gray-500">Vehicle ID</span>
                            <span class="font-semibold text-gray-900">#{{ $car->id }}</span>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-gray-500">Added</span>
                            <span class="font-semibold text-gray-900">{{ $car->created_at->format('d M, Y') }}</span>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-gray-500">Last Updated</span>
                            <span class="font-semibold text-gray-900">{{ $car->updated_at->format('d M, Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Danger Zone --}}
            <div class="bg-white rounded-xl border border-red-200 shadow-sm overflow-hidden">
                <div class="px-5 py-4 border-b border-red-100">
                    <h4 class="text-sm font-bold text-red-700">Danger Zone</h4>
                </div>
                <div class="p-5">
                    <p class="text-xs text-gray-500 mb-3">Permanently remove this vehicle from your fleet. This action cannot be undone.</p>
                    <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this vehicle? This cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full py-2.5 text-xs font-semibold text-red-700 bg-red-50 border border-red-200 rounded-lg hover:bg-red-100 transition inline-flex items-center justify-center gap-1.5">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Delete Vehicle
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script>
        function handleUpload(input) {
            if (input.files && input.files[0]) {
                document.getElementById('upload-placeholder').classList.add('hidden');
                document.getElementById('upload-preview').classList.remove('hidden');
                document.getElementById('preview-name').textContent = input.files[0].name;
            }
        }
    </script>

@endsection