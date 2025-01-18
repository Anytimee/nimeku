@extends('layouts.main')
<title>Top Anime</title>
@section('content')
<div class="bg-gray-900 py-12 container mt-24 mx-auto px-4 pt-28">
    <div class="container mx-auto px-4">
      <!-- Judul Section -->
      <div class="text-center mb-8">
        <h1 class="text-4xl font-bold text-yellow-400 mb-20">Top Anime</h1>
      </div>

      <!-- Grid Anime -->
      <div class="grid grid-cols-2 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8 animate__animated animate__FadeInUp">
        @foreach ($anime as $item)
    <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden">
        <a href="{{ route('anime.show', $item['mal_id']) }}" target="_blank">
            <img src="{{ $item['images']['jpg']['image_url'] }}" alt="{{ $item['title'] }}" class="w-full h-56 object-cover hover:opacity-50" />
            <div class="p-4">
                <h2 class="text-lg font-bold text-yellow-300 truncate">{{ $item['title'] }}</h2>
                <p class="mt-2 text-gray-400">Score: <span class="text-yellow-400">{{ $item['score'] }}</span></p>
                <p class="text-gray-400">Episodes: {{ $item['episodes'] ?? 'Unknown' }}</p>
            </div>
        </a>
    </div>
@endforeach
      </div>
      <div class="mt-6">
        <div class="flex justify-center">
            <nav>
                <ul class="flex space-x-4">
                    @if ($page > 1)
                        <li>
                            <a href="{{ route('anime.index', ['page' => $page - 1]) }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Previous</a>
                        </li>
                    @endif
                    <li class="px-4 py-2">{{ $page }} of {{ $totalPages }}</li>
                    @if ($page < $totalPages)
                        <li>
                            <a href="{{ route('anime.index', ['page' => $page + 1]) }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Next</a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>

    </div>
</div>
@endsection