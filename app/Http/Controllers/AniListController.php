<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class AniListController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query', '');
        $results = [];

        if (!empty($query)) {
            $client = new Client();
            $response = $client->post('https://graphql.anilist.co/', [
                'json' => [
                    'query' => '
                        query ($search: String) {
                            Page(page: 1, perPage: 10) {
                                media(search: $search, type: ANIME) {
                                    title {
                                        romaji
                                    }
                                    coverImage {
                                        large
                                    }
                                    description
                                    siteUrl
                                }
                            }
                        }
                    ',
                    'variables' => [
                        'search' => $query,
                    ]
                ]
            ]);

            $data = json_decode($response->getBody()->getContents(), true);
            $results = $data['data']['Page']['media'];
        }

        return view('layouts.main', compact('results'));
    }
}
