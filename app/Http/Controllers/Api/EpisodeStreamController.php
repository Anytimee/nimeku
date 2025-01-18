<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class EpisodeStreamController extends Controller
{
    public function fetchEpisodeStream($id)
    {
        $cacheKey = "episodeStream_{$id}";

        // Cek apakah data sudah ada di cache
        $cachedData = Cache::get($cacheKey);
        if ($cachedData) {
            return response()->json($cachedData);
        }

        try {
            // Lakukan permintaan ke API eksternal (misalnya API stream episode)
            $response = Http::get("API_URL/v1/stream/{$id}");
            $episodeStream = $response->json();

            // Simpan data ke cache
            Cache::put($cacheKey, $episodeStream, 3600); // Cache selama 1 jam

            return response()->json($episodeStream);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error fetching episode stream'], 500);
        }
    }
}

