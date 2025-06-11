@extends('layouts.app')

@section('title', __('auth.register'))

@section('content')
<div class="mx-auto w-full max-w-md">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h2 class="text-xl font-semibold mb-4 text-center">
            <i class="bi bi-person-plus-fill mr-1"></i> {{ __('auth.register') }}
        </h2>

        @if($errors->any())
            <div class="text-red-600 mb-3 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-gray-700">{{ __('auth.username') }}</label>
                <input type="text" name="username" class="w-full border px-3 py-2 rounded" value="{{ old('username') }}">
            </div>

            <div>
                <label class="block text-gray-700">{{ __('auth.email') }}</label>
                <input type="email" name="email" class="w-full border px-3 py-2 rounded" value="{{ old('email') }}" required>
            </div>

            <div class="relative">
                <label class="block text-gray-700">{{ __('auth.password') }}</label>
                <input type="password" name="password" id="register_password" class="w-full border px-3 py-2 rounded pr-10" required>
                <span onclick="togglePassword('register_password', 'register_pass_icon')" class="absolute top-8 right-3 cursor-pointer text-gray-500">
                    <i id="register_pass_icon" class="bi bi-eye-fill"></i>
                </span>
            </div>

            <div class="relative">
                <label class="block text-gray-700">{{ __('auth.confirm_password') }}</label>
                <input type="password" name="password_confirmation" id="register_password_confirmation" class="w-full border px-3 py-2 rounded pr-10" required>
                <span onclick="togglePassword('register_password_confirmation', 'register_confirm_icon')" class="absolute top-8 right-3 cursor-pointer text-gray-500">
                    <i id="register_confirm_icon" class="bi bi-eye-fill"></i>
                </span>
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="autologin" class="mr-2" checked> {{ __('auth.auto_login') }}
            </div>

            <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded">
                <i class="bi bi-check2-circle mr-1"></i> {{ __('auth.register') }}
            </button>
        </form>

        <div class="mt-4 text-center text-sm">
            {{ __('auth.have_account') }} 
            <a href="{{ route('login') }}" class="text-blue-500 hover:underline">
                {{ __('auth.login') }}
            </a>
        </div>

        <hr class="my-6">

        <a href="{{ route('discord.redirect') }}" class="btn-discord w-full text-center py-2 rounded flex items-center justify-center mt-4">
            <i class="bi bi-discord text-lg mr-1"></i> {{ __('auth.discord_register') }}
        </a>
    </div>
</div>
@endsection
