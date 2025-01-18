<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class AnimeStreamController extends Controller
{
    public function fetchAnimeStreamingLinks($episodeId)
    {
        // URL API eksternal
        $url = "API_URL/v2/stream/{$episodeId}";

        try {
            // Melakukan request ke API eksternal
            $response = Http::get($url);

            // Periksa jika response berhasil
            if ($response->successful()) {
                $data = $response->json();

                // Ambil HLS stream links dari data response
                $streamLinks = [
                    'main' => $data['stream']['multi']['main']['url'],
                    'backup' => $data['stream']['multi']['backup']['url']
                ];

                return response()->json($streamLinks);
            } else {
                return response()->json(['error' => 'Failed to fetch stream links'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error fetching stream links', 'message' => $e->getMessage()], 500);
        }
    }
}
