<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime Streaming</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-900 text-white">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-gray-800 p-4 flex items-center justify-between">
            <h1 class="text-xl font-bold">anveshna.</h1>
            <input
                type="text"
                placeholder="Search Anime"
                class="px-4 py-2 rounded bg-gray-700 text-sm text-white focus:outline-none focus:ring focus:ring-blue-500"
            />
        </header>

        <!-- Content -->
        <main class="flex-grow container mx-auto px-4 py-8">
            @yield('content')
        </main>
    </div>
</body>
</html>
