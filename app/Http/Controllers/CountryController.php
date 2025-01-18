<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class CountryController extends Controller
{
    public function index()
    {
        // try {
        //     // Panggil API dengan pengaturan tambahan
        //     $response = Http::retry(3, 100)->timeout(30)->get('https://restcountries.com/v3.1/all');

        //     // Pastikan respons berhasil
        //     if ($response->successful()) {
        //         $countries = $response->json();
        //     } else {
        //         $countries = [];
        //     }

        // } catch (\Exception $e) {
        //     // Jika terjadi error, gunakan array kosong
        //     $countries = [];
        //     \Log::error('Gagal mengambil data negara: ' . $e->getMessage());
        // }

        // // Kirim data ke view
        // return view('countries.index', compact('countries'));
    }
}