@extends('layouts.app')

@section('title', 'Sign in')

@section('content')
    <form action="{{ url('/login') }}" method="POST">
        @csrf

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">Sign in</button>
    </form>
@endsection