@extends('layouts.app')

@section('title', 'Account Settings')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded shadow">

    <h1 class="text-2xl font-bold mb-6">Account Settings</h1>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('account.settings.update') }}" class="space-y-6">
        @csrf

        {{-- Current Password --}}
        <div>
            <label for="current_password" class="block font-medium mb-1">Current Password</label>
            <input type="password" name="current_password" id="current_password" required
                class="w-full border rounded px-3 py-2 @error('current_password') border-red-500 @enderror">
            @error('current_password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- New Password --}}
        <div>
            <label for="password" class="block font-medium mb-1">New Password</label>
            <input type="password" name="password" id="password" required
                class="w-full border rounded px-3 py-2 @error('password') border-red-500 @enderror" minlength="8" autocomplete="new-password">
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Confirm New Password --}}
        <div>
            <label for="password_confirmation" class="block font-medium mb-1">Confirm New Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required
                class="w-full border rounded px-3 py-2" autocomplete="new-password">
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">
            Update Password
        </button>
    </form>
</div>
@endsection
