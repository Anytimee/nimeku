@extends('layouts.main')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime Genres</title>
    @vite('resources/js/app.js')
</head>
<body class="bg-grey-500 font-sans ">

    <div class="container mt-10 mx-auto p-6">
        <h1 class="text-3xl text-white font-bold text-center mb-6">Anime Genres</h1>

        @if(count($genres) > 0)
        <div class="grid grid-cols-2 sm:grid-cols-3  md:grid-cols-3 lg:grid-cols-4 gap-6 data-aos="fade-up" data-aos-duration="200"">
            @if (is_array($genres) && count($genres) > 0)
                @foreach ($genres as $genre)
                
                    <div class="bg-black rounded-lg shadow-md p-4 hover:shadow-lg transition ">
                        <a href="{{ $genre['url'] }}">
                        <h2 href="{{ $genre['url'] }}" class="text-lg font-semibold text-white">{{ $genre['name'] }}</h2>
                        </a>
                    </div>
                @endforeach
            @else
                <p class="text-center text-gray-600 col-span-full">No genres found. Please try again later.</p>
            @endif
        </div>  
        @else
            <p class="text-center text-red-600">Failed to load genres, please try again later.</p>
        @endif
    </div>
@endsection
</body>
</html>
