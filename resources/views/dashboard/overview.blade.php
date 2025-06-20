@extends('layouts.dashboard')

@section('dashboard')
<h1 class="text-2xl font-bold mb-6">Welcome back{{-- , {{ $user->name }} --}}</h1>

{{-- Stats --}}
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

{{-- Quick Actions --}}
<div class="mt-8">
    <h2 class="text-xl font-semibold mb-4">Quick Actions</h2>
    <a href="{{ route('links.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded shadow transition">Create New Link</a>
</div>

{{-- Danger Zone --}}
<div class="mt-12 bg-white shadow rounded-xl p-6 border-t-4 border-red-600">
    <h3 class="text-xl font-semibold text-red-700 mb-4">Danger Zone</h3>
    <p class="text-gray-700">Your data may be deleted at any time. Please make backups if necessary.</p>
</div>
@endsection
