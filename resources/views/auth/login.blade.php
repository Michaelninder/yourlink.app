@extends('layouts.app')

@section('title', __('auth.login'))

@section('content')
<div class="mx-auto w-full max-w-md">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h2 class="text-xl font-semibold mb-4 text-center">
            <i class="bi bi-box-arrow-in-right mr-1"></i> {{ __('auth.login') }}
        </h2>

        @if($errors->any())
            <div class="text-red-600 mb-3 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-gray-700">{{ __('auth.email') }}</label>
                <input type="email" name="email" class="w-full border px-3 py-2 rounded" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="relative">
                <label class="block text-gray-700">{{ __('auth.password') }}</label>
                <input type="password" name="password" id="login_password" class="w-full border px-3 py-2 rounded pr-10" required>
                <span onclick="togglePassword('login_password', 'login_pass_icon')" class="absolute top-8 right-3 cursor-pointer text-gray-500">
                    <i id="login_pass_icon" class="bi bi-eye-fill"></i>
                </span>
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="remember" class="mr-2"> {{ __('auth.remember_me') }}
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded">
                <i class="bi bi-door-open mr-1"></i> {{ __('auth.login') }}
            </button>
        </form>

        <div class="mt-4 text-center text-sm">
            {{ __('auth.no_account') }} 
            <a href="{{ route('register') }}" class="text-blue-500 hover:underline">
                {{ __('auth.register') }}
            </a>
        </div>

        <hr class="my-6">

        <a href="{{ route('discord.redirect') }}" class="btn-discord w-full text-center py-2 rounded flex items-center justify-center mt-4">
            <i class="bi bi-discord text-lg mr-1"></i> {{ __('auth.discord_login') }}
        </a>
    </div>
</div>
@endsection
