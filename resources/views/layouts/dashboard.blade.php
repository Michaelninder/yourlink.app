@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-8 px-6">
    <div class="max-w-7xl mx-auto flex">
        <aside class="w-64 bg-white rounded-xl shadow p-6 mr-6">
            <h2 class="text-xl font-semibold mb-4">Dashboard</h2>
            <ul class="space-y-2 text-gray-700">
                <li><a href="{{ route('dashboard.user') }}" class="hover:text-blue-600">Overview</a></li>
                <li><a href="{{ route('dashboard.links') }}" class="hover:text-blue-600">My Links</a></li>
                <li><a href="{{ route('account.settings') }}" class="hover:text-blue-600">Settings</a></li>
                @if (auth()->user()?->role === 'admin')
                    <hr class="my-2">
                    <li><a href="{{ route('dashboard.admin') }}" class="text-red-600 hover:underline">Admin Panel</a></li>
                    <li><a href="{{ route('admin.links') }}" class="text-red-600 hover:underline">All Links</a></li>
                @endif
            </ul>
        </aside>

        <main class="flex-1">
            @yield('dashboard')
        </main>
    </div>
</div>
@endsection
