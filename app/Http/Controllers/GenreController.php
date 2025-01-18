<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class GenreController extends Controller
{
    public function index()
    {
         // Mengambil data dari API Jikan
         $response = Http::get('https://api.jikan.moe/v4/genres/anime');
        
         // Memeriksa apakah request berhasil
         if ($response->successful()) {
             // Mengambil data JSON
             $genres = $response->json()['data'];
             return view('genres', compact('genres'));
         } else {
             return view('genres', ['genres' => []]);
         }
     }
 
     public function showByGenre($genreId)
     {
         // Mengambil daftar anime berdasarkan genre ID
         $response = Http::get("https://api.jikan.moe/v4/anime", [
             'genre' => $genreId
         ]);
 
         if ($response->successful()) {
             $animes = $response->json()['data'];
             return view('anime_by_genre', compact('animes', 'genreId'));
         } else {
             return redirect('/anime-genres')->with('error', 'Failed to load anime for this genre.');
         }
     }
}