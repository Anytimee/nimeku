<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class AnimeApiController extends Controller
{
    public function getRecentAnime($source)
    {
        // Misalnya mengambil data dari API eksternal
        $response = Http::get("http://localhost:3001/{$source}/recent");

        // Mengembalikan data JSON ke frontend
        return response()->json($response->json());
    }
}
