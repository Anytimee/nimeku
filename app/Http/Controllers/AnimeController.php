<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('https://api.jikan.moe/v4/top/anime');

    if ($response->successful()) {
        $animes = collect($response->json()['data']); // Ensure you're getting a collection of anime objects
        $perPage = 8; // Number of items per page
        $currentPage = request('page', 1);
        $paginatedAnimes = $animes->forPage($currentPage, $perPage);

        $paginated = new \Illuminate\Pagination\LengthAwarePaginator(
            $paginatedAnimes,
            $animes->count(),
            $perPage,
            $currentPage,
            ['path' => url()->current()]
        );

        return view('index', ['animes' => $paginated]);
    }

    return view('index', ['animes' => collect()]);
    }
    public function topAnime()
    {
        $response = Http::get('https://api.jikan.moe/v4/top/anime');

        if ($response->successful()) {
            $animes = collect($response->json()['data']); // Konversi ke Collection
            $perPage = 8; // Jumlah item per halaman
            $currentPage = request('page', 1);
            $paginatedAnimes = $animes->forPage($currentPage, $perPage);

            // Gunakan paginator
            $paginated = new \Illuminate\Pagination\LengthAwarePaginator(
                $paginatedAnimes,
                $animes->count(),
                $perPage,
                $currentPage,
                ['path' => url()->current()]
            );

            return view('anime.top', ['animes' => $paginated]);
        }

        // Jika gagal, kirim array kosong
        return view('anime.top', '', ['animes' => collect()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show($id)
    {
        // Panggil API Jikan untuk mendapatkan data anime berdasarkan ID
        $response = Http::get("https://api.jikan.moe/v4/anime/{$id}");

        // Periksa apakah respons berhasil
        if ($response->failed()) {
            abort(404, 'Anime not found');
        }

        // Ambil data anime dari respons JSON
        $anime = $response->json('data');

        // Kirim data ke view
        return view('anime.show', compact('anime'));
    }
    public function watch($id, $episode = 1)
    {
        // Panggil API Jikan untuk mendapatkan detail anime
        $response = Http::get("https://api.jikan.moe/v4/anime/{$id}");

        // Cek jika API berhasil merespons
        if ($response->successful()) {
            $data = $response->json()['data'];

            // Format data untuk dikirim ke tampilan
            $anime = [
                'id' => $data['mal_id'],         // ID Anime
                'title' => $data['title'],       // Judul Anime
                'episodes' => $data['episodes'], // Total Episode
                'current_episode' => $episode,  // Episode saat ini
                'video_url' => '/videos/2.mp4', // URL Video Contoh
                'sub' => [
                'default' => 'https://example.com/video-sub.mp4',
                'vidstream' => 'https://example.com/vidstream-sub.mp4',
            ],
            'dub' => [
                'default' => 'https://example.com/video-dub.mp4',
                'vidstream' => 'https://example.com/vidstream-dub.mp4',
                
            ],
            // $animeUrl = "https://www.youtube.com/embed/iqGAW57EudQ&list=RDGMEM6ijAnFTG9nX1G-kbWBUCJA "
            
            ];
            
            return view('watch', compact('anime'));
        } else {
            abort(404, 'Anime not found');
        }
    }
    public function topNime(Request $request)
    {
        // Default page 1
         // Default page 1
    $page = $request->input('page', 1);

    // Jumlah data per halaman
    $perPage = 10;

    // Ambil data dari API dengan query parameter untuk pagination
    $response = Http::get('https://api.jikan.moe/v4/top/anime', [
        'page' => $page,
        'limit' => $perPage
    ]);

    // Mendapatkan data dari respons
    $data = $response->json();

    // Memeriksa apakah pagination dan total ada dalam respons
    $anime = $data['data'];

    // Pastikan 'total' ada dalam respons API
    if (isset($data['pagination']['total'])) {
        $totalPages = ceil($data['pagination']['total'] / $perPage);
    } else {
        // Tentukan jumlah total halaman default jika tidak ada
        $totalPages = 1; // Sesuaikan dengan logika yang diinginkan
    }

    // Mengembalikan view dengan data yang diperlukan
    return view('anime.top', compact('anime', 'page', 'totalPages'));
}
}

    // Metode lainnya tetap sama...

