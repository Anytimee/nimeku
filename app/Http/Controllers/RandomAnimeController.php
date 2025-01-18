<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class RandomAnimeController extends Controller
{
    public function randomAnime()
    {
        // Fetch random anime data from Jikan API
        $response = Http::get('https://api.jikan.moe/v4/random/anime');
    
        if ($response->successful()) {
            // Get anime data from response
            $anime = collect($response->json()['data']); // Single random anime, so we use 'data' directly
    
            // If you want pagination with only 1 random anime, you can simulate pagination as a one-item collection
            $perPage = 1; // Number of items per page (1 random anime)
            $currentPage = request('page', 1);
    
            // Create a paginated collection with only 1 anime per page
            $paginatedAnime = new LengthAwarePaginator(
                $anime,
                1, // Total items (just 1 random anime)
                $perPage,
                $currentPage,
                ['path' => url()->current()]
            );
    
            // Return the view with the paginated anime data
            return view('y', ['animes' => $paginatedAnime]);
        }
    
        // If the request to the API fails, return an empty collection
        return view('y', ['animes' => collect()]);
    }
}

