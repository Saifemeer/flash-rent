<x-guest-layout>
    <div class="min-h-screen bg-gray-50 flex items-center justify-center p-4 sm:p-6">

        <div class="w-full max-w-[420px]">

            {{-- Logo --}}
            <div class="text-center mb-8">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2.5">
                    <div class="w-10 h-10 bg-gray-900 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/>
                        </svg>
                    </div>
                    <div class="flex items-baseline">
                        <span class="text-2xl font-extrabold text-gray-900 tracking-tight">Drive</span>
                        <span class="text-2xl font-extrabold text-gray-400 tracking-tight">Fleet</span>
                    </div>
                </a>
            </div>

            {{-- Card --}}
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-8">

                {{-- Header --}}
                <div class="text-center mb-7">
                    <h1 class="text-xl font-bold text-gray-900">Create your account</h1>
                    <p class="text-sm text-gray-500 mt-1">Start booking premium vehicles today</p>
                </div>

                {{-- Form --}}
                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    {{-- Name --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">Full Name</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="John Doe"
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-gray-900 focus:border-gray-900 transition placeholder:text-gray-400 bg-gray-50 focus:bg-white">
                        @error('name')
                            <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="you@example.com"
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-gray-900 focus:border-gray-900 transition placeholder:text-gray-400 bg-gray-50 focus:bg-white">
                        @error('email')
                            <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Min 8 characters"
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-gray-900 focus:border-gray-900 transition placeholder:text-gray-400 bg-gray-50 focus:bg-white">
                        @error('password')
                            <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Confirm Password --}}
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1.5">Confirm Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Re-enter password"
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-gray-900 focus:border-gray-900 transition placeholder:text-gray-400 bg-gray-50 focus:bg-white">
                        @error('password_confirmation')
                            <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Terms --}}
                    <div class="flex items-start gap-2">
                        <input id="terms" type="checkbox" required
                               class="w-4 h-4 rounded border-gray-300 text-gray-900 focus:ring-gray-900 mt-0.5">
                        <label for="terms" class="text-sm text-gray-600 leading-snug">
                            I agree to the <a href="#" class="text-gray-900 font-medium hover:underline">Terms</a> and <a href="#" class="text-gray-900 font-medium hover:underline">Privacy Policy</a>
                        </label>
                    </div>

                    {{-- Submit --}}
                    <button type="submit" class="w-full py-2.5 bg-gray-900 text-white font-semibold text-sm rounded-lg hover:bg-gray-800 active:bg-black transition focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2">
                        Create Account
                    </button>
                </form>
            </div>

            {{-- Footer --}}
            <p class="text-center text-sm text-gray-500 mt-6">
                Already have an account?
                <a href="{{ route('login') }}" class="font-semibold text-gray-900 hover:underline">Sign in</a>
            </p>

            <p class="text-center text-xs text-gray-400 mt-4">
                &copy; {{ date('Y') }} DriveFleet. All rights reserved.
            </p>
            {{-- Login page bottom --}}
<a href="{{ route('terms') }}" class="text-gray-600 hover:text-gray-900 underline">Terms</a> and 
<a href="{{ route('privacy') }}" class="text-gray-600 hover:text-gray-900 underline">Privacy Policy</a>
        </div>

    </div>
</x-guest-layout>