@extends('layouts.main')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Negara</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen p-6">
    <h1 class="text-3xl font-bold text-center mb-6">Daftar Negara</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($countries as $country)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ $country['flags']['png'] }}" alt="{{ $country['name']['common'] }}" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h2 class="text-lg font-semibold text-gray-800">{{ $country['name']['common'] }}</h2>
                    <p class="text-sm text-gray-600"><strong>Region:</strong> {{ $country['region'] }}</p>
                    <p class="text-sm text-gray-600"><strong>Population:</strong> {{ number_format($country['population']) }}</p>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
