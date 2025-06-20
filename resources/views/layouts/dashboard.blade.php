@extends('layouts.app')

@section('content')
<div class="flex min-h-screen">
    <aside class="w-64 bg-gray-100 border-r border-gray-200 p-4 space-y-2">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Dashboard</h2>
        <nav class="space-y-1">
            <a href="{{ route('dashboard.user') }}" class="block px-3 py-2 rounded hover:bg-gray-200 {{ request()->routeIs('dashboard.user') ? 'bg-gray-200 font-semibold' : '' }}">User Dashboard</a>
            <a href="{{ route('dashboard.admin') }}" class="block px-3 py-2 rounded hover:bg-gray-200 {{ request()->routeIs('dashboard.admin') ? 'bg-gray-200 font-semibold' : '' }}">Admin Dashboard</a>
            <a href="{{ route('account.settings') }}" class="block px-3 py-2 rounded hover:bg-gray-200">Account Settings</a>
        </nav>
    </aside>a

    <main class="flex-1 p-6">
        @yield('dashboard')
    </main>
</div>
@endsection
