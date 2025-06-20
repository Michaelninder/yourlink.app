@extends('layouts.app')

@section('content')
<div class="flex min-h-screen">
    <aside class="w-64 bg-gray-100 border-r p-6 space-y-4">
        <h2 class="text-lg font-bold">Dashboard</h2>
        <nav class="flex flex-col space-y-2">
            <a href="{{ route('dashboard.user') }}" class="text-blue-600 hover:underline">Overview</a>
            <a href="{{ route('account.settings') }}" class="text-blue-600 hover:underline">Account Settings</a>
            @if(auth()->user()?->role === 'admin')
                <a href="{{ route('dashboard.admin') }}" class="text-blue-600 hover:underline">Admin Panel</a>
            @endif
        </nav>
    </aside>

    <main class="flex-1 p-8">
        @yield('dashboard-content')
    </main>
</div>
@endsection
