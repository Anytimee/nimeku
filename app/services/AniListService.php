<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AniListService
{
    protected $endpoint = 'https://graphql.anilist.co';

    public function searchAnime($query)
    {
        $response = Http::post($this->endpoint, [
            'query' => '
                query ($search: String) {
                    Media(search: $search, type: ANIME) {
                        id
                        title {
                            romaji
                            english
                            native
                        }
                        description(asHtml: true)
                        coverImage {
                            large
                        }
                        siteUrl
                    }
                }
            ',
            'variables' => [
                'search' => $query,
            ],
        ]);

        return $response->json();
    }
}
