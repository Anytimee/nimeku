<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home - Nimeku</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
@vite('resources/css/app.css') <!-- Pastikan Tailwind sudah diintegrasikan -->
@vite('resources/css/style.css')
<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    {{-- @vite('resources/js/app.jsx') --}}
  />
{{-- @vite('resources/css/app.css') --}}
<style>
    body {
      font-family: Arial, sans-serif;
      background-color: #171e29;
      color: #333;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 20px;
      background: linear-gradient(to bottom, rgba(0, 0, 0, 1) 0%, rgba(255, 0, 0, 0) 100%);
      border-bottom: 1px solid;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .navbar .logo {
      font-size: 1.5em;
      font-weight: bold;
      color: rgba(255, 255, 255, 0.589);
      text-transform: uppercase;
    }

    .navbar ul {
      display: flex;
      list-style: none;
      margin: 0;
      padding: 0;
    }

    .navbar ul li {
      margin: 0 15px;
    }

    .navbar ul li a {
      text-decoration: none;
      color:rgba(255, 255, 255, 0.589);
      font-size: 1em;
      transition: color 0.3s;
    }

    .navbar ul li a:hover {
      color: white;
    }

    .search-box {
      position: relative;
      width: 200px;
    }

    .search-box input {
      width: 100%;
      padding: 8px 10px;
      border: 1px solid #ddd;
      border-radius: 20px;
      outline: none;
      font-size: 0.9em;
      transition: box-shadow 0.3s;
    }

    .search-box input:focus {
      box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .menu-toggle {
      display: none;
      font-size: 1.5em;
      cursor: pointer;
      color: #333;
    }

    @media (max-width: 768px) {
      .navbar ul {
        display: none;
        flex-direction: column;
        background: linear-gradient(to top, rgba(0, 0, 0, 1) 0%, rgba(255, 0, 0, 0) 100%);
        position: absolute;
        top: 60px;
        right: 0;
        width: 100%;
        padding: 10px 0;
        border-top: 1px solid #ddd;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      }

      .navbar ul.active {
        display: flex;
      }

      .menu-toggle {
        display: block;
      }

      .search-box {
        width: 150px;
      }
    }
  </style>
</head>
<body>
  <div id="app"></div>
  <nav class="navbar p-4 fixed top-0 left-0 right-0 z-50 animate__animated animate__fadeInDownBig ">
    <a href="/" class="logo">Nimeku</a>
    <ul>
      <li><a href="/">Home</a></li>
      <li><a href="/genres">Genre</a></li>
      <li><a href="/anime-popular">Popular</a></li>
      <li><a href="/medsos">Media Sosial</a></li>
    </ul>
    {{-- <form action="{{ route('search') }}" method="GET" class="flex items-center space-x-2 text-black">
      <input
          type="text" 
          name="query" 
          value="{{ request('query') }}" 
          class="w-20 mt-2 sm:w-10 lg:w-50 xl:w-72 justify-center border rounded p-2 focus:outline-none focus:ring focus:ring-blue-300" 
          placeholder="Search" 
      >
      <button 
          type="submit" 
          class="bg-pink-200 mt-2 text-white px-4 py-2 rounded hover:bg-pink-600 transition duration-300">
          Search
      </button>
  </form> --}}
    <div class="menu-toggle">&#9776;</div>
  </nav>
  <div class="min-h-screen">
    <!-- Navbar -->
{{-- 
    <div class="max-w-4xl mx-auto p-4">
      <!-- Menampilkan Hasil Pencarian -->
      @if(isset($results) && count($results) > 0)
          <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
              @foreach($results as $item)
                  <div class="border rounded shadow-lg p-4 flex flex-col items-start">
                      <img src="{{ $item['coverImage']['large'] ?? 'default-image.jpg' }}" alt="{{ $item['title']['romaji'] }}" class="w-full mb-4 rounded">
                      <h2 class="text-lg font-bold">{{ $item['title']['romaji'] ?? 'No Title Available' }}</h2>
                      <p class="text-sm text-gray-600">{{ Str::limit(strip_tags($item['description'] ?? 'No description available'), 100) }}</p>
                      <a href="{{ $item['siteUrl'] ?? '#' }}" target="_blank" class="mt-2 text-blue-500 hover:underline">Detail</a>
                  </div>
              @endforeach
          </div>
      @elseif(request('query'))
          <p class="text-center text-gray-600 mt-8">Tidak ada hasil ditemukan untuk "{{ request('query') }}"</p>
      @endif
    </div>

    <!-- Hasil Pencarian -->
    <div class="py-8">
        @yield('content')
    </div>
</div> --}}



  @yield('content')

  <script>
    const menuToggle = document.querySelector('.menu-toggle');
    const navbarUl = document.querySelector('.navbar ul');

    menuToggle.addEventListener('click', () => {
      navbarUl.classList.toggle('active');
    });
  </script>
  </div>
  
</body>
<footer class="bg-gray-800 text-gray-200 py-6">
  <div class="container mx-auto px-4 ">
      <!-- Bagian Atas -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
          <!-- Kolom 1 -->
          <div>
              <h3 class="text-lg font-semibold mb-3">Tentang Kami</h3>
              <p class="text-sm text-gray-400">
                  Kami menyediakan konten anime terbaik untuk komunitas penggemar di seluruh dunia.
              </p>
          </div>
          <!-- Kolom 2 -->
          <div>
              <h3 class="text-lg font-semibold mb-3">Navigasi</h3>
              <ul>
                  <li><a href="/" class="text-sm text-gray-400 hover:text-white">Home</a></li>
                  <li><a href="/popular" class="text-sm text-gray-400 hover:text-white">Anime Populer</a></li>
                  <li><a href="/medsos" class="text-sm text-gray-400 hover:text-white">Contact</a></li>
              </ul>
          </div>
          <!-- Kolom 3 -->
          <div>
              <h3 class="text-lg font-semibold mb-3">Ikuti Kami</h3>
              <ul class="flex space-x-4">
                  <li>
                      <a href="https://www.instagram.com/aghiefaezyp/" class="text-white hover:bg-white">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 50 50" class="h-5 w-5 bg-white rounded hover:bg-gray-300 ">
                          <path d="M 16 3 C 8.8324839 3 3 8.8324839 3 16 L 3 34 C 3 41.167516 8.8324839 47 16 47 L 34 47 C 41.167516 47 47 41.167516 47 34 L 47 16 C 47 8.8324839 41.167516 3 34 3 L 16 3 z M 16 5 L 34 5 C 40.086484 5 45 9.9135161 45 16 L 45 34 C 45 40.086484 40.086484 45 34 45 L 16 45 C 9.9135161 45 5 40.086484 5 34 L 5 16 C 5 9.9135161 9.9135161 5 16 5 z M 37 11 A 2 2 0 0 0 35 13 A 2 2 0 0 0 37 15 A 2 2 0 0 0 39 13 A 2 2 0 0 0 37 11 z M 25 14 C 18.936712 14 14 18.936712 14 25 C 14 31.063288 18.936712 36 25 36 C 31.063288 36 36 31.063288 36 25 C 36 18.936712 31.063288 14 25 14 z M 25 16 C 29.982407 16 34 20.017593 34 25 C 34 29.982407 29.982407 34 25 34 C 20.017593 34 16 29.982407 16 25 C 16 20.017593 20.017593 16 25 16 z"></path>
                          </svg>
                      </a>
                  </li>
                  <li>
                      <a href="#" class="text-gray-400 bg-white">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 50 50" class="h-5 w-5 bg-white rounded hover:bg-gray-300">
                          <path d="M 25 2 C 12.354545 2 2 12.354545 2 25 C 2 37.645455 12.354545 48 25 48 C 37.645455 48 48 37.645455 48 25 C 48 12.354545 37.645455 2 25 2 z M 25 4 C 36.554545 4 46 13.445455 46 25 C 46 25.093716 45.993426 25.185862 45.992188 25.279297 C 45.355643 25.213574 44.619449 25.151947 43.683594 25.113281 C 42.349262 25.058153 40.667887 25.070474 38.767578 25.169922 C 38.842322 24.665304 38.893164 24.152982 38.894531 23.626953 C 38.991361 21.754332 38.362521 20.002464 37.339844 18.455078 C 37.586913 17.601352 37.876747 16.515218 37.949219 15.283203 C 38.031819 13.878925 37.910599 12.321765 36.783203 11.269531 L 36.494141 11 L 36.099609 11 C 33.416539 11 31.580023 12.12321 30.457031 13.013672 C 28.835529 12.386022 27.01222 12 25 12 C 22.976367 12 21.135525 12.391416 19.447266 13.017578 C 18.324911 12.126691 16.486785 11 13.800781 11 L 13.408203 11 L 13.119141 11.267578 C 12.020956 12.287321 11.919778 13.801759 11.988281 15.199219 C 12.048691 16.431506 12.321732 17.552142 12.564453 18.447266 C 11.524489 20.02486 10.900391 21.822018 10.900391 23.599609 C 10.900391 24.101066 10.946801 24.590099 11.013672 25.072266 C 7.8894658 24.970983 5.518755 25.05331 4.0039062 25.191406 C 4.0033241 25.127325 4 25.064213 4 25 C 4 13.445455 13.445455 4 25 4 z M 14.396484 13.130859 C 16.414067 13.322043 17.931995 14.222972 18.634766 14.847656 L 19.103516 15.261719 L 19.681641 15.025391 C 21.263092 14.374205 23.026984 14 25 14 C 26.973016 14 28.737393 14.376076 30.199219 15.015625 L 30.785156 15.273438 L 31.263672 14.847656 C 31.966683 14.222758 33.487184 13.321554 35.505859 13.130859 C 35.774256 13.575841 36.007486 14.208668 35.951172 15.166016 C 35.883772 16.311737 35.577304 17.559658 35.345703 18.300781 L 35.195312 18.783203 L 35.494141 19.191406 C 36.483616 20.540691 36.988121 22.000937 36.902344 23.544922 L 36.900391 23.572266 L 36.900391 23.599609 C 36.900391 26.095064 36.00178 28.092339 34.087891 29.572266 C 32.174048 31.052199 29.152663 32 24.900391 32 C 20.648118 32 17.624827 31.052192 15.710938 29.572266 C 13.797047 28.092339 12.900391 26.095064 12.900391 23.599609 C 12.900391 22.134903 13.429308 20.523599 14.40625 19.191406 L 14.699219 18.792969 L 14.558594 18.318359 C 14.326866 17.530484 14.042825 16.254103 13.986328 15.101562 C 13.939338 14.14294 14.166221 13.537027 14.396484 13.130859 z M 8.8867188 26.019531 C 9.5909207 26.024035 10.397743 26.051943 11.203125 26.080078 C 11.281506 26.399647 11.374577 26.712873 11.484375 27.019531 C 8.1709433 27.091537 5.704398 27.434455 4.1835938 27.728516 C 4.1171404 27.221899 4.0664333 26.710385 4.0371094 26.193359 C 5.1545506 26.089867 6.7502168 26.005867 8.8867188 26.019531 z M 41.113281 26.076172 C 43.242845 26.051402 44.834805 26.164134 45.957031 26.283203 C 45.927668 26.764345 45.879919 27.240812 45.818359 27.712891 C 44.245568 27.413519 41.71721 27.071329 38.314453 27.015625 C 38.411856 26.742348 38.491935 26.461309 38.564453 26.177734 C 39.462674 26.126533 40.338362 26.085185 41.113281 26.076172 z M 37.892578 28.007812 C 41.465652 28.03978 44.085317 28.396925 45.666016 28.699219 C 44.325335 36.167288 39.008358 42.292747 32 44.789062 L 32 39.599609 C 32 38.015041 31.479642 36.267712 30.574219 34.810547 C 30.299322 34.368135 29.975945 33.949736 29.615234 33.574219 C 31.930453 33.11684 33.832364 32.298821 35.3125 31.154297 C 36.44296 30.280162 37.297012 29.208854 37.892578 28.007812 z M 11.908203 28.013672 C 12.505054 29.212023 13.359546 30.281496 14.488281 31.154297 C 16.028825 32.345531 18.031623 33.177838 20.476562 33.623047 C 20.156699 33.951698 19.86578 34.312595 19.607422 34.693359 L 19.546875 34.640625 C 19.552375 34.634325 19.04975 34.885878 18.298828 34.953125 C 17.547906 35.020374 16.621615 35 15.800781 35 C 14.575781 35 14.03621 34.42121 13.173828 33.367188 C 12.696283 32.72356 12.114101 32.202331 11.548828 31.806641 C 10.970021 31.401475 10.476259 31.115509 9.8652344 31.013672 L 9.7832031 31 L 9.6992188 31 C 9.2325521 31 8.7809835 31.03379 8.359375 31.515625 C 8.1485707 31.756544 8.003277 32.202561 8.0976562 32.580078 C 8.1920352 32.957595 8.4308563 33.189581 8.6445312 33.332031 C 10.011254 34.24318 10.252795 36.046511 11.109375 37.650391 C 11.909298 39.244315 13.635662 40 15.400391 40 L 18 40 L 18 44.789062 C 10.997174 42.294717 5.68379 36.176856 4.3378906 28.716797 C 5.863528 28.419405 8.4148311 28.06385 11.908203 28.013672 z M 23.699219 34.099609 L 26.5 34.099609 C 27.312821 34.099609 28.180423 34.7474 28.875 35.865234 C 29.569577 36.983069 30 38.484177 30 39.599609 L 30 45.390625 C 28.396051 45.785878 26.721908 46 25 46 C 23.278092 46 21.603949 45.785878 20 45.390625 L 20 39.599609 C 20 38.508869 20.467828 37.011307 21.208984 35.888672 C 21.950141 34.766037 22.886398 34.099609 23.699219 34.099609 z M 12.308594 35.28125 C 13.174368 36.179258 14.222525 37 15.800781 37 C 16.579948 37 17.552484 37.028073 18.476562 36.945312 C 18.479848 36.945018 18.483042 36.943654 18.486328 36.943359 C 18.36458 37.293361 18.273744 37.645529 18.197266 38 L 15.400391 38 C 14.167057 38 13.29577 37.55443 12.894531 36.751953 L 12.886719 36.738281 L 12.880859 36.726562 C 12.716457 36.421191 12.500645 35.81059 12.308594 35.28125 z"></path>
                          </svg>
                      </a>
                  </li>
              </ul>
          </div>
          <!-- Kolom 4 -->
      </div>
      <!-- Garis Pembatas -->
      <div class="mt-6 border-t border-gray-700 pt-4 text-center ">
          <p class="text-sm text-gray-500">© 2025 Nimeku. Semua Hak Dilindungi.</p>
      </div>
</footer>
</html>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
</script>