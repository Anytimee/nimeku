@extends('layouts.main')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $anime['title'] }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
    body{
        background-color: #171e29;
    }
    .synopsis {
        overflow
    }
    /* Animasi Fade-In dan Slide-Up */
@keyframes fadeInUp {
    0% {
        opacity: 0;
        transform: translateY(20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Apply Animasi ke kelas */
.animate-fadeInUp {
    animation: fadeInUp 1s ease-out forwards;
}

/* Opsional: Membuat animasi Overlay dan Teks Fade-In */
@keyframes fadeInOverlay {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 0.5;
    }
}

.animate-fadeInOverlay {
    animation: fadeInOverlay 1.2s ease-out forwards;
}
</style>
<body class="bg-grey">
    <div class="container mt-20 mx-auto p-6">
        <header class="text-center mb-8">
            <h1 class="text-3xl text-white font-bold mb-4">{{ $anime['title'] }}</h1>
        </header>

        <div class="flex flex-col md:flex-row bg-grey rounded-lg shadow-lg overflow-hidden">
            <!-- Gambar Anime -->
            <div class="flex-none md:w-1/3 mb-6 md:mb-0">
                <img src="{{ $anime['images']['jpg']['large_image_url'] }}" alt="{{ $anime['title'] }}" class="rounded-lg shadow-lg w-full h-auto">
            </div>

            <!-- Detail Anime -->
            <div class="bg-gray-900 md:w-2/3 p-6">
                <div x-data="{ expanded: false }" class="italic text-gray-400 mb-6">
                    <p 
                        x-bind:class="{ 'line-clamp-3': !expanded }" 
                        class="line-clamp-3">
                        {{ $anime['synopsis'] }}
                    </p>
                    <button 
                        @click="expanded = !expanded" 
                        class="text-blue-500 hover:underline mt-2">
                        <span class="text-white font-bold" x-show="!expanded">Lihat Semua</span>
                        <span class="text-white font-bold" x-show="expanded">Sembunyikan</span>
                    </button>
                </div>

                <!-- Info Anime -->
                <div class=" bg-gray-900 grid grid-cols-2 md:grid-cols-3 gap-4 text-white text-sm">
                    <div><span class="font-bold">Tipe:</span> {{ $anime['type'] }}</div>
                    <div><span class="font-bold">Episode:</span> {{ $anime['episodes'] ?? 'N/A' }}</div>
                    <div><span class="font-bold">Status:</span> {{ $anime['status'] }}</div>
                    <div><span class="font-bold">Tayang:</span> {{ $anime['aired']['string'] }}</div>
                    <div><span class="font-bold">Durasi:</span> {{ $anime['duration'] }}</div>
                    <div><span class="font-bold">Skor:</span> {{ $anime['score'] ?? 'N/A' }}</div>
                    <div><span class="font-bold">Rating:</span> {{ $anime['rating'] }}</div>
                    <div><span class="font-bold">Genre:</span> 
                        @foreach ($anime['genres'] as $genre)
                            {{ $genre['name'] }}{{ !$loop->last ? ',' : '' }}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center">
            <a href="{{ route('watch', ['id' => $anime['mal_id']]) }}" class=" mt-2 sm:mr-80 mx-auto text-center text-black px-20 sm:px-44 uppercase font-bold bg-white rounded p-full justify-center hover:bg-black  hover:text-white shadow-md">Watch</a>

        </div>

        <!-- Tombol Kembali -->
        <div class="mt-20 text-center">
            <a href="{{ url('/') }}" class="text-blue-600 hover:underline">Kembali ke Home</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</body>
</html>
