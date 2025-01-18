@extends('layouts.main')

@section('content')
<div class="bg-grey">
  <div class="container mt-44 mx-auto px-4 pt-28">
    <div class="title">Top Anime</div>
    <a href="#" class="button">Lihat Semua ></a>
  </div>

  <div class="bg-grey">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-6xl lg:px-8 ">
      <ul class="grid grid-cols-2 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
        @foreach ($animes as $anime)
          <li class="anime-item">
            <a href="{{ url('/anime/' . $anime['mal_id']) }}">
              <img class="aspect-square w-full rounded-lg bg-gray-200 object-cover xl:aspect-[7/8] h-4/5"
                   src="{{ $anime['images']['jpg']['image_url'] }}"
                   alt="{{ $anime['title'] }}">
              <h2 class="mt-4 text-center truncate text-lg font-bold text-white">{{ $anime['title'] }}</h2>
              <p class="shadow-md text-center bg-red-400 rounded-lg text-white">Score: {{ $anime['score'] }}</p>
            </a>
          </li>
        @endforeach
      </ul>

      <!-- Menambahkan link paginasi -->
      <div class="mt-4">
        {{ $animes->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
