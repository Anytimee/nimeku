<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class PopularController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function popularEpisodes()
    {
        // URL API Jikan
        $url = 'https://api.jikan.moe/v4/watch/promos/popular';

        // Mengambil data dari API
        $response = Http::get($url);

        // Periksa apakah permintaan berhasil
        if ($response->successful()) {
            $episodes = $response->json()['data']; // Ambil data episode
            return view('anime.popular', ['episodes' => $episodes]); // Kirim ke view
        } else {
            return view('anime.popular-episodes', ['episodes' => []]); // Kirim array kosong jika gagal
        }
        // Ambil halaman saat ini dari query string, default adalah halaman 1
        $page = $request->input('page', 1);

        // Jumlah data per halaman
        $perPage = 10;

        // Ambil data dari API dengan query parameter untuk pagination
        $response = Http::get('https://api.jikan.moe/v4/watch/promos/popular', [
            'page' => $page,
            'limit' => $perPage
        ]);

        // Mendapatkan data JSON dari respons API
        $data = $response->json();

        // Periksa jika respons berhasil dan memiliki data
        if (!isset($data['data'])) {
            abort(404, 'Promos not found');
        }

        $promos = $data['data'];

        // Periksa apakah kunci pagination ada
        if (isset($data['pagination']) && isset($data['pagination']['total'])) {
            // Mendapatkan total halaman dan total data
            $totalPages = ceil($data['pagination']['total'] / $perPage);
        } else {
            // Jika pagination atau total tidak ada, set total halaman ke 1
            $totalPages = 1;
        }

        // Kirim data ke view dengan nama variabel yang sesuai
        return view('anime.popular', compact('promos', 'page', 'totalPages'));
    }
//     public function index(Request $request)
// {
//     // URL API Jikan untuk episode populer
//     $url = 'https://api.jikan.moe/v4/watch/promos/popular';

//     // Ambil halaman saat ini dari query string, default halaman 1
//     $page = $request->input('page', 1);

//     // Jumlah data per halaman
//     $perPage = 10;

//     // Mengambil data dari API dengan parameter query untuk pagination
//     $response = Http::get($url, [
//         'page' => $page,
//         'limit' => $perPage
//     ]);

//     // Periksa apakah permintaan berhasil
//     if ($response->successful()) {
//         $data = $response->json();

//         // Periksa apakah ada data dalam respons
//         if (isset($data['data'])) {
//             $episodes = $data['data'];

//             // Mendapatkan total halaman dari pagination
//             $totalPages = isset($data['pagination']['total']) ? ceil($data['pagination']['total'] / $perPage) : 1;

//             // Kirim data ke view dengan variabel yang sesuai
//             return view('index', compact('episodes', 'page', 'totalPages'));
//         } else {
//             // Jika data tidak ada, tampilkan halaman dengan array kosong
//             return view('index', ['episodes' => [], 'page' => $page, 'totalPages' => 1]);
//         }
//     } else {
//         // Jika permintaan gagal, tampilkan halaman dengan array kosong
//         return view('index', ['episodes' => [], 'page' => $page, 'totalPages' => 1]);
//     }
// }

    /**
     * Show the form for creating a new resource.
     */
    public function getAnimeDetail($id)
    {
        // Ambil detail anime berdasarkan ID dari API
        $response = Http::get("https://api.jikan.moe/v4/anime/{$id}");

        if ($response->successful()) {
            $anime = $response->json()['data'];  // Ambil data anime
            return view('anime.show', compact('anime'));
        }

        return abort(404, 'Anime not found.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
