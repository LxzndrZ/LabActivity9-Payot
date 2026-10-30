@extends('layouts.app')
@section('title', 'Sign in')

@section('content')
<div class="min-h-[70vh] flex items-center justify-center">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md overflow-hidden">

        <div class="bg-emerald-700 text-white px-6 py-5 text-center">
            <h1 class="text-xl font-bold">Bakuna Tracker</h1>
            <p class="text-sm text-emerald-100">Barangay Matina Crossing Health Center</p>
        </div>

        <form method="POST" action="/login" class="p-6 space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                       placeholder="Email" autofocus
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" id="password" name="password"
                          placeholder="Password"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                    class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded px-3 py-2 transition">
                Sign in
            </button>
        </form>
    </div>
</div>
@endsection