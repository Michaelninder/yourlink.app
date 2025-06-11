<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'YourLink')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .btn-discord {
            background-color: #7289da;
            color: white;
            transition: background-color 0.2s ease-in-out;
        }

        .btn-discord:hover {
            background-color: #6378bf;
        }

        .btn-discord i {
            margin-right: 0.5rem;
        }

        .btn-outline {
            @apply border px-3 py-2 rounded text-sm font-medium;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

    @include('components.navbar')

    <main class="flex-1 container mx-auto p-4">
        @yield('content')
    </main>

    @include('components.footer')
	
	<script>
	    function togglePassword(id, iconId) {
	        const input = document.getElementById(id);
	        const icon = document.getElementById(iconId);
	        if (input.type === 'password') {
	            input.type = 'text';
	            icon.classList.remove('bi-eye-fill');
	            icon.classList.add('bi-eye-slash-fill');
	        } else {
	            input.type = 'password';
	            icon.classList.remove('bi-eye-slash-fill');
	            icon.classList.add('bi-eye-fill');
	        }
	    }
	</script>

</body>
</html>
