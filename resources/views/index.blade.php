@extends('layouts.main')
<style>
  /* a:hover{
    color: palevioletred;
  } */
  .carousel-item {
    display: none;  /* Sembunyikan semua video item kecuali yang aktif */
}

.carousel-item.block {
    display: block;  /* Hanya video yang aktif yang akan tampil */
}

.carousel-item video {
    width: 100%;
    height: auto;
}
</style>

@section('content')

<div class="container mt-10 mx-auto py-12 px-4">
  <!-- Carousel -->
  <div class="relative">
    <div class="carousel w-full overflow-hidden" data-aos="fade-right" data-aos-duration="200">
      <!-- Carousel Items -->
      <div class="carousel-inner relative w-full overflow-hidden">

        <!-- Item 1 -->
        <div class="carousel-item w-full flex justify-center items-center hidden">
          <!-- Video -->
          <video class="w-full h-auto" autoplay loop muted>
            <source src="{{ asset('/videos/1.webm') }}" type="video/webm">
            <source src="{{ asset('videos/video1.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
          </video>
          
          <!-- Nama atau Judul dengan Link -->
          <a href="{{ route('anime.show', ['id' => 40748]) }}" class="absolute bottom-4 left-1/2 transform -translate-x-1/2 text-white bg-gray-800 bg-opacity-50 px-4 py-2 rounded-md text-xl">
            Jujutsu Kaisen
          </a>
        </div>

        <!-- Item 2 -->
        <div class="carousel-item w-full flex justify-center items-center hidden">
          <video class="w-full h-auto" autoplay loop muted>
            <source src="{{ asset('/videos/3.webm') }}" type="video/webm">
            <source src="{{ asset('videos/video2.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
          </video>

          <a href="{{ route('anime.show', ['id' => 16498]) }}" class="absolute bottom-4 left-1/2 transform -translate-x-1/2 text-white bg-gray-800 bg-opacity-50 px-4 py-2 rounded-md text-xl">
            Attack On Titan
          </a>
        </div>

        <!-- Item 3 -->
        <div class="carousel-item w-full flex justify-center items-center hidden">
          <video class="w-full h-auto" autoplay loop muted>
            <source src="{{ asset('/videos/5.webm') }}" type="video/webm">
            <source src="{{ asset('videos/video3.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
          </video>
          <!-- Nama atau Judul dengan Link -->
          <a href="{{ route('anime.show', ['id' => 32281]) }}" class="absolute bottom-4 left-1/2 transform -translate-x-1/2 text-white bg-gray-800 bg-opacity-50 px-4 py-2 rounded-md text-xl">
            Your Name
          </a>
        </div>

      </div>

      <!-- Carousel Controls -->
      <button id="prevBtn" class="absolute top-0 bottom-0 left-0 z-10 px-4 py-2 m-auto bg-gray-800 text-white hover:bg-gray-600">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
      </button>

      <button id="nextBtn" class="absolute top-0 bottom-0 right-0 z-10 px-4 py-2 m-auto bg-gray-800 text-white hover:bg-gray-600">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
      </button>
    </div>
  </div>
</div>
<div id="app"></div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const items = document.querySelectorAll('.carousel-item');
    let currentIndex = 0;

    // Function to show current video item and hide others
    function showItem(index) {
      items.forEach((item, i) => {
        if (i === index) {
          item.classList.remove('hidden');
          item.classList.add('block');
        } else {
          item.classList.remove('block');
          item.classList.add('hidden');
        }
      });
    }

    // Show the first item by default
    showItem(currentIndex);

    prevBtn.addEventListener('click', () => {
      currentIndex = (currentIndex === 0) ? items.length - 1 : currentIndex - 1;
      showItem(currentIndex);
    });

    nextBtn.addEventListener('click', () => {
      currentIndex = (currentIndex === items.length - 1) ? 0 : currentIndex + 1;
      showItem(currentIndex);
    });
  });
</script>

  <div class="bg-gray-900 py-12 container mx-auto px-4 pt-28">
    <div class="container mx-auto px-4">
      <!-- Judul Section -->
      <div class="text-center mb-8">
        <h1 class="text-4xl font-bold text-yellow-400">Top Anime</h1>
        {{-- <p class="text-gray-300 mt-2">Daftar Anime Paling Top</p> --}}
      </div>

      <!-- Grid Anime -->
      <div class="grid grid-cols-2 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8" data-aos="fade-up" data-aos-duration="500">
        @foreach ($animes as $anime)
        <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden">
          <a href="{{ route('anime.show', $anime['mal_id']) }}" target="_blank">
            <img
              src="{{ $anime['images']['jpg']['image_url'] }}"
              alt="{{ $anime['title'] }}"
              class="w-full h-56 object-cover hover:opacity-50"
            />
            <div class="p-4">
              <h2 class="text-lg font-bold text-yellow-300 truncate">{{ $anime['title'] }}</h2>
              <p class="mt-2 text-gray-400">Score: <span class="text-yellow-400">{{ $anime['score'] }}</span></p>
              <p class="text-gray-400">Episodes: {{ $anime['episodes'] ?? 'Unknown' }}</p>
            </div>
          </a>
        </div>
        @endforeach
      </div>      
    </div>
      <!-- Pagination (although it will just show one anime per page) -->
      <div class="mt-8">
        {{ $animes->links() }}
      </div>
    </div>
  </div>
</div>
@endsection