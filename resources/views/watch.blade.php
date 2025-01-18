@extends('layouts.main')
<title>{{ $anime['title'] }}</title>
@section('content')
<div class="container mt-10 mx-auto px-4 py-6">
    <!-- Video Player -->
    <div class="aspect-w-16 aspect-h-9 bg-black">
        <video id="videoPlayer" controls class="w-30 h-30">
            <source src="{{ $anime['video_url'] }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <!-- Episode Info -->
    <div class="mt-4">
        <<h1 class="text-2xl font-bold text-white">{{ $anime['title'] }}</h1>
        <p class="text-gray-400">Episode: {{ $anime['current_episode'] }} / {{ $anime['episodes'] }}</p>
    </div>

    <!-- Subtitle/Dub Options -->
    <div class="mt-4 flex gap-4">
        <div>
            <h3 class="text-lg font-bold text-white">SUB</h3>
            <button onclick="changeVideo('{{ $anime['sub']['default'] }}')" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Default</button>
            <button onclick="changeVideo('{{ $anime['sub']['vidstream'] }}')" class="bg-gray-700 hover:bg-gray-800 text-white px-4 py-2 rounded">Vidstream</button>
        </div>
        <div>
            <h3 class="text-lg font-bold text-white">DUB</h3>
            <button onclick="changeVideo('{{ $anime['dub']['default'] }}')" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Default</button>
            <button onclick="changeVideo('{{ $anime['dub']['vidstream'] }}')" class="bg-gray-700 hover:bg-gray-800 text-white px-4 py-2 rounded">Vidstream</button>
        </div>
    </div>

    <!-- Episode List -->
    <div class="mt-6">
        <h3 class="text-lg font-bold text-white mb-2">Episodes</h3>
        <div class="grid grid-cols-4 gap-2">
            @for ($i = 1; $i <= $anime['episodes']; $i++)
                <a href="{{ route('watch', ['id' => $anime['id'], 'episode' => $i]) }}"
                   class="block text-center bg-gray-800 hover:bg-green-100 text-white hover:text-black py-2 rounded">
                    {{ $i }}
                </a>
            @endfor
        </div>
    </div>
</div>

<script>
    function changeVideo(url) {
        const videoPlayer = document.getElementById('videoPlayer');
        videoPlayer.src = url;
        videoPlayer.load();
    }
    loadingElement.classList.remove('hidden'); // Tampilkan spinner
    loadingElement.classList.add('hidden');   // Sembunyikan spinner
</script>
@endsection
