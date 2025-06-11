@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container mx-auto px-4 py-12 min-h-[calc(100vh-8rem)] flex flex-col justify-center">

    <div class="max-w-5xl mx-auto text-center space-y-12">
        <h1 class="text-4xl font-extrabold text-gray-800">
            Welcome to <span class="text-blue-600">YourLink</span>
        </h1>

        <p class="text-lg text-gray-600 max-w-xl mx-auto">
            Create your free short links in seconds. No hassle, no fees — just
            simple, secure URL shortening.
        </p>

        @guest
        <div class="flex flex-col sm:flex-row sm:justify-center gap-4">
            <a href="{{ route('discord.redirect') }}"
                class="inline-flex items-center justify-center gap-3 bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded shadow font-semibold transition duration-300 ease-in-out">
                <i class="bi bi-discord text-2xl"></i>
                Login with Discord
            </a>

            <a href="{{ route('login') }}"
                class="inline-flex items-center gap-2 px-6 py-3 border border-blue-600 text-blue-600 rounded hover:bg-blue-50 font-semibold transition duration-300 ease-in-out">
                <i class="bi bi-box-arrow-in-right"></i> Login
            </a>

            <a href="{{ route('register') }}"
                class="inline-flex items-center gap-2 px-6 py-3 border border-green-600 text-green-600 rounded hover:bg-green-50 font-semibold transition duration-300 ease-in-out">
                <i class="bi bi-person-plus-fill"></i> Register
            </a>
        </div>

        <div class="mt-16">
            <a href="{{ route('links.create') }}"
                class="inline-block bg-green-600 hover:bg-green-700 text-white px-8 py-4 rounded-lg shadow-lg font-bold text-xl transition duration-300 ease-in-out">
                <i class="bi bi-plus-circle mr-2"></i> Create Your Free Link Now
            </a>
        </div>
        @endguest
    </div>

    @auth
    <section class="mt-20 max-w-5xl mx-auto text-center">
        <h2 class="text-3xl font-bold mb-8">Your Dashboard</h2>
        <p class="text-gray-700 mb-6">
            Welcome back, <strong>{{ auth()->user()->name }}</strong>! Manage your
            links, track stats, and customize your account.
        </p>

        <div class="flex flex-col sm:flex-row gap-6 justify-center">
            <a href="{{ route('pages.home') }}"
                class="py-4 px-6 rounded font-semibold bg-blue-600 text-white hover:bg-blue-700 transition duration-300 ease-in-out">
                Manage Your Links
            </a>
            <a href="{{ route('pages.home') }}"
                class="py-4 px-6 rounded font-semibold bg-green-600 text-white hover:bg-green-700 transition duration-300 ease-in-out">
                View Analytics
            </a>
            <a href="{{ route('account.settings') }}"
                class="py-4 px-6 rounded font-semibold bg-gray-700 text-white hover:bg-gray-800 transition duration-300 ease-in-out">
                Account Settings
            </a>
        </div>
    </section>
    @endauth

    <section class="mt-20 max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold mb-12 text-center">Why Choose YourLink?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <div
                class="bg-white rounded-lg shadow p-8 flex flex-col items-center text-center space-y-4 hover:shadow-lg transition duration-300 ease-in-out">
                <div class="text-indigo-600 text-6xl">
                    <i class="bi bi-speedometer2"></i>
                </div>
                <h3 class="text-xl font-semibold">Blazing Fast</h3>
                <p class="text-gray-600 max-w-sm">
                    Experience ultra-fast link creation and redirection with our
                    optimized infrastructure.
                </p>
            </div>

            <div
                class="bg-white rounded-lg shadow p-8 flex flex-col items-center text-center space-y-4 hover:shadow-lg transition duration-300 ease-in-out">
                <div class="text-indigo-600 text-6xl">
                    <i class="bi bi-shield-lock"></i>
                </div>
                <h3 class="text-xl font-semibold">Secure & Private</h3>
                <p class="text-gray-600 max-w-sm">
                    Your links and data are safe with end-to-end encryption and
                    privacy-first policies.
                </p>
            </div>

            <div
                class="bg-white rounded-lg shadow p-8 flex flex-col items-center text-center space-y-4 hover:shadow-lg transition duration-300 ease-in-out">
                <div class="text-indigo-600 text-6xl">
                    <i class="bi bi-people"></i>
                </div>
                <h3 class="text-xl font-semibold">Discord Integration</h3>
                <p class="text-gray-600 max-w-sm">
                    Log in seamlessly with Discord and manage your links across your
                    communities.
                </p>
            </div>

            <div
                class="bg-white rounded-lg shadow p-8 flex flex-col items-center text-center space-y-4 hover:shadow-lg transition duration-300 ease-in-out">
                <div class="text-indigo-600 text-6xl">
                    <i class="bi bi-bar-chart-line"></i>
                </div>
                <h3 class="text-xl font-semibold">Detailed Stats</h3>
                <p class="text-gray-600 max-w-sm">
                    Track clicks and engagement with intuitive analytics and real-time
                    updates.
                </p>
            </div>

            <div
                class="bg-white rounded-lg shadow p-8 flex flex-col items-center text-center space-y-4 hover:shadow-lg transition duration-300 ease-in-out">
                <div class="text-indigo-600 text-6xl">
                    <i class="bi bi-cloud-upload"></i>
                </div>
                <h3 class="text-xl font-semibold">Flexible Formats</h3>
                <p class="text-gray-600 max-w-sm">
                    Choose between short and long UUID formats for your links
                    depending on your needs.
                </p>
            </div>

            <div
                class="bg-white rounded-lg shadow p-8 flex flex-col items-center text-center space-y-4 hover:shadow-lg transition duration-300 ease-in-out">
                <div class="text-indigo-600 text-6xl">
                    <i class="bi bi-stars"></i>
                </div>
                <h3 class="text-xl font-semibold">Premium Features</h3>
                <p class="text-gray-600 max-w-sm">
                    Upgrade for custom slugs, priority support, and advanced link
                    management tools.
                </p>
            </div>
        </div>
    </section>

    <section class="mt-24 max-w-7xl mx-auto">
        <h2 class="text-3xl font-bold mb-12 text-center">Our Plans</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div
                class="border border-gray-300 rounded-lg p-8 shadow hover:shadow-lg transition duration-300 ease-in-out flex flex-col">
                <h3
                    class="text-2xl font-semibold mb-4 flex items-center justify-center gap-2 text-gray-800">
                    <i class="bi bi-check2-circle text-green-600 text-3xl"></i> Free
                </h3>
                <p class="text-center text-gray-600 mb-8">
                    Perfect to get started with basic URL shortening.
                </p>

                <ul class="flex-1 space-y-4 text-gray-700">
                    <li class="flex items-center gap-2">
                        <i class="bi bi-check-lg text-green-600"></i> Unlimited basic
                        short links
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bi bi-check-lg text-green-600"></i> Short and long
                        UUID formats
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bi bi-x-lg text-red-500"></i> No custom slugs
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bi bi-x-lg text-red-500"></i> No analytics dashboard
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bi bi-check-lg text-green-600"></i> Discord login
                        enabled
                    </li>
                </ul>

                <div class="mt-8">
                    <a href="{{ route('register') }}"
                        class="w-full py-3 rounded font-semibold bg-blue-600 text-white hover:bg-blue-700 transition duration-300 ease-in-out inline-block text-center">
                        Get Started
                    </a>
                </div>
            </div>

            <div
                class="border border-blue-600 rounded-lg p-8 shadow-lg bg-blue-50 flex flex-col">
                <h3
                    class="text-2xl font-semibold mb-4 flex items-center justify-center gap-2 text-blue-700">
                    <i class="bi bi-star-fill text-yellow-400 text-3xl"></i> Pro
                </h3>
                <p class="text-center text-blue-700 mb-8">
                    Great for power users who want more control.
                </p>

                <ul class="flex-1 space-y-4 text-blue-800">
                    <li class="flex items-center gap-2">
                        <i class="bi bi-check-lg text-green-600"></i> Everything in Free
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bi bi-check-lg text-green-600"></i> Access to
                        analytics dashboard
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bi bi-check-lg text-green-600"></i> Priority link
                        creation
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bi bi-x-lg text-red-500"></i> No custom slugs
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bi bi-check-lg text-green-600"></i> Discord login
                        enabled
                    </li>
                </ul>

                <div class="mt-8">
                    <a href="{{ route('register') }}"
                        class="w-full py-3 rounded font-semibold bg-blue-600 text-white hover:bg-blue-700 transition duration-300 ease-in-out inline-block text-center">
                        Upgrade Now
                    </a>
                </div>
            </div>

            <div
                class="border border-yellow-500 rounded-lg p-8 shadow hover:shadow-lg transition duration-300 ease-in-out flex flex-col">
                <h3
                    class="text-2xl font-semibold mb-4 flex items-center justify-center gap-2 text-yellow-700">
                    <i class="bi bi-award-fill text-yellow-500 text-3xl"></i> Premium
                </h3>
                <p class="text-center text-yellow-700 mb-8">
                    Unlock full features with custom slugs & priority support.
                </p>

                <ul class="flex-1 space-y-4 text-yellow-800">
                    <li class="flex items-center gap-2">
                        <i class="bi bi-check-lg text-green-600"></i> Everything in Pro
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bi bi-check-lg text-green-600"></i> Custom slugs &
                        vanity URLs
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bi bi-check-lg text-green-600"></i> Premium support &
                        SLA
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bi bi-check-lg text-green-600"></i> Advanced link
                        management
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="bi bi-check-lg text-green-600"></i> Discord login
                        enabled
                    </li>
                </ul>

                <div class="mt-8">
                    <a href="{{ route('register') }}"
                        class="w-full py-3 rounded font-semibold bg-yellow-500 text-white hover:bg-yellow-600 transition duration-300 ease-in-out inline-block text-center">
                        Go Premium
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
