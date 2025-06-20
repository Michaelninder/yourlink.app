<nav class="bg-gray-50 border-b border-gray-200 py-4">
    <div class="container mx-auto flex justify-between items-center px-4">
        <a href="{{ route('pages.home') }}" class="text-lg font-semibold text-gray-800 flex items-center gap-1">
            <!--i class="bi bi-link-45deg"></i--> YourLink
        </a>

        <div class="flex items-center gap-6 text-sm text-gray-700">
            <a href="{{ route('links.create') }}" class="flex items-center gap-1 hover:text-blue-600 transition">
                <i class="bi bi-plus-circle"></i> Create Link
            </a>

            @auth
                <a href="{{ route('dashboard.adusermin') }}" class="flex items-center gap-1 hover:text-blue-600 transition">
                    <i class="bi bi-person-circle"></i> Dashboard
                </a>

                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('dashboard.admin') }}" class="flex items-center gap-1 text-red-600 hover:text-red-700 transition">
                        <i class="bi bi-shield-lock-fill"></i> Admin Panel
                    </a>
                @endif

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center gap-1 text-blue-600 hover:text-blue-800 transition">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="flex items-center gap-1 hover:text-blue-600 transition">
                    <i class="bi bi-box-arrow-in-right"></i> Login
                </a>
                <a href="{{ route('register') }}" class="flex items-center gap-1 hover:text-blue-600 transition">
                    <i class="bi bi-person-plus-fill"></i> Register
                </a>
            @endauth
        </div>
    </div>
</nav>
