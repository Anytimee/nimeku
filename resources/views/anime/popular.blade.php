@extends('layouts.main')
<title>Anime Popular</title>
@section('content')
<style> 
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    color: #333;
}


/* Grid Layout for Episodes */


/* Episode Item Styling */


    </style>
        <div class="bg-gray-900 mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-6xl lg:px-8" data-aos="fade-up" data-aos-duration="1000">
    @if (!empty($episodes) && count($episodes) > 0)
        <ul class="grid grid-cols-2 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
            @foreach ($episodes as $episode)
                <a href="{{ route('anime.show', ['id' => $episode['entry']['mal_id']]) }}">
                    <li class="episode-item">
                        <img class="aspect-square w-full lg:h-96 rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-[7/8] h-4/5"
                             src="{{ $episode['entry']['images']['jpg']['image_url'] }}" 
                             alt="{{ $episode['entry']['title'] }}">
                        <h2 class="mt-4 text-center text-lg font-bold text-white">{{ $episode['entry']['title'] }}</h2>
                        <p class="mt-4 text-center text-lg font-bold text-white">
                        </p>
                    </li>
                </a>
            @endforeach
        </ul>
    @else
        <p class="text-center text-white">No popular episodes available at the moment.</p>
    @endif
</div>
<div class="mt-6">
    {{-- <div class="flex justify-center">
        <nav>
            <ul class="flex space-x-4">
                <!-- Previous Page -->
                @if ($page > 1)
                    <li>
                        <a href="{{ route('anime.popular', ['page' => $page - 1]) }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Previous</a>
                    </li>
                @endif

                <!-- Current Page and Total Pages -->
                <li class="px-4 py-2">{{ $page }} of {{ $totalPages }}</li>

                <!-- Next Page -->
                @if ($page < $totalPages)
                    <li>
                        <a href="{{ route('anime.popular', ['page' => $page + 1]) }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Next</a>
                    </li>
                @endif
            </ul>
        </nav>
    </div> --}}
@endsection
</body>
</html>