@extends('layouts.dashboard')

@section('dashboard-content')
<h1 class="text-2xl font-bold mb-6">Welcome back, {{ $user->name }}</h1>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
    <div class="p-6 bg-white shadow rounded-lg">
        <h2 class="text-xl font-semibold text-gray-800">Total Links</h2>
        <p class="text-3xl font-bold text-blue-600">{{ $links_count }}</p>
    </div>
    <div class="p-6 bg-white shadow rounded-lg">
        <h2 class="text-xl font-semibold text-gray-800">Total Views</h2>
        <p class="text-3xl font-bold text-green-600">{{ $views_count }}</p>
    </div>
</div>

<div class="mt-8">
    <h2 class="text-xl font-semibold mb-4">Quick Actions</h2>
    <a href="{{ route('links.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded shadow transition">
        + Create New Link
    </a>
</div>

<div class="mt-12 border-t pt-6">
    <h2 class="text-xl font-semibold mb-4 text-red-600">Danger Zone</h2>
    <p class="mb-2 text-gray-600">Delete your account or remove all data associated with it.</p>
    <button class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded">Delete Account</button>
</div>
@endsection
