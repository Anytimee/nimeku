<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class DonghuaController extends Controller
{
    public function index()
    {
        // Ambil data dari Jikan API
        $response = Http::get('https://api.jikan.moe/v4/anime?q=donghua&order_by=score&sort=desc', [
            'q' => 'donghua',
            'type' => 'tv',
        ]);

        // Parse hasil response
        $donghuaList = $response->json()['data'] ?? [];

        return view('donghua.popular', compact('donghuaList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
