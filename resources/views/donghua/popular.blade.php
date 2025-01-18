@extends('layouts.main')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Donghua</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-grey min-h-screen flex flex-col items-center p-6">

    {{-- <h1 class="text-4xl font-bold text-center text-gray-800 mb-8">Daftar Donghua</h1> --}}

    <div class="container grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 w-full max-w-7xl px-4 py-16">
        @foreach ($donghuaList as $donghua)
            <div class=" rounded-lg overflow-hidden">
                <img  src="{{ $donghua['images']['jpg']['image_url'] }}" alt="{{ $donghua['title'] }}" class="aspect-square w-full lg:h-96 rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-[7/8] h-4/5">
                <div class="p-4">
                    <h2 class="text-lg truncate font-semibold text-white">{{ $donghua['title'] }}</h2>
                    <p class="mt-10 shadow-md text-center bg-red-400 rounded-lg text-white">Score: {{ $donghua['score'] }}</p>
                    {{-- <p class="text-white text-sm line-clamp-3">{{ $donghua['synopsis'] }}</p> --}}
                    <div class="mt-4 flex justify-between items-center">
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</body>
</html>
