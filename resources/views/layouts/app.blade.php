<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Bakuna Tracker')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

    <nav class="bg-emerald-700 text-white">
        <div class="max-w-6xl mx-auto px-4 py-3 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
            <div class="flex gap-4">
                <a href="/dashboard" class="font-bold">Bakuna Tracker</a>
                @auth
                <a href="/dashboard">Dashboard</a>
                <a href="/schedule">Schedule</a>
                @endauth
            </div>

            <div class="flex items-center gap-3">
                @auth
                    <span>Hi, {{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button class="underline">Logout</button>
                    </form>
                @endauth
                @guest
                    <a href="{{ route('login') }}">Sign in</a>
                @endguest
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto w-full px-4 py-6 flex-1 space-y-6">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-gray-300 text-center text-sm py-4">
        Barangay Matina Crossing Health Center &middot; Bakuna Tracker
    </footer>
</body>
</html>