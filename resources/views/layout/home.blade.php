<!DOCTYPE html>
<html lang="en" data-theme="sunset">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Watchlist</title>

    <!-- Styles -->
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.24.0/dist/tabler-icons.min.css">
</head>


<body class="text-white">
    <div class="flex min-h-screen">
        <!-- Sidebar Section -->
        @include('watchlists.partials.sidebar')

        <!-- Main Content Section -->
        <div class="flex-1">
            @yield('content')
        </div>
    </div>

</body>

</html>
