{{-- @extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-4">
        <!-- Form Pencarian -->
        <form action="{{ route('search') }}" method="GET" class="mb-6">
            <input type="text" name="query" value="{{ request('query') }}" class="w-full border rounded p-2 focus:outline-none focus:ring focus:ring-blue-300" placeholder="Cari anime atau donghua..." required>
            <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Cari</button>
        </form>

        <!-- Hasil Pencarian -->
        @if(isset($results) && count($results) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
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
@endsection --}}
