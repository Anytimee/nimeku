<?php

use App\Http\Controllers\AnimeController;
use App\Http\Controllers\RandomAnimeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PopularController;
use App\Http\Controllers\DonghuaController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\AniListController;
use App\Http\Controllers\Api\EpisodeStreamController;
use App\Http\Controllers\Api\AnimeApiController;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// Route::get('/', 'AnimeController@index')->name('anime.index');
// Route::get('/', [AnimeController::class,'index']);
// Route::get('/animes/{anime}', 'AnimeController@show')->name('animes.show');




Route::get('/', [AnimeController::class, 'index']);
// Route::get('/', [RandomAnimeController::class, 'index']);
Route::get('/top-anime', [AnimeController::class, 'topAnime'])->name('anime.top');
Route::get('/top-anime', [AnimeController::class, 'topNime']);
// Route::get('/top-anime', [AnimeController::class, 'episodes'])->name('anime.top');


Route::get('/popular', function () {
    return view('popular');
});

Route::get('anime-popular/anime/{id}', [PopularController::class, 'getAnimeDetail'])->name('anime.show');
Route::get('/anime-popular', [PopularController::class, 'popularEpisodes']);
Route::get('popular/anime-popular', [PopularController::class, 'popularEpisodes'])->name('anime.popular');
// });
Route::get('/genres', [GenreController::class, 'genres']);
Route::get('/genres', [GenreController::class, 'genre']);
Route::get('/genres', [GenreController::class, 'index']);
Route::get('/genres/{genreId}', [GenreController::class, 'showByGenre']);

Route::get('/anime/{id}', [AnimeController::class, 'show'])->name('anime.show');

Route::get('popular/donghua-popular', [DonghuaController::class, 'index']);


Route::get('/search', [AniListController::class, 'search'])->name('search');

Route::get('/medsos', function () {
    return view('medsos.medsos');
});

Route::get('/countries', [CountryController::class, 'index']);

Route::get('/a', function () {
    return view('home');
});
use App\Http\Controllers\Api\AnimeStreamController;

Route::get('/anime-stream/{episodeId}', [AnimeStreamController::class, 'fetchAnimeStreamingLinks']);
Route::view('/anime', 'anime');
Route::view('/episode', 'episode');
Route::get('/episode-stream/{id}', [EpisodeStreamController::class, 'fetchEpisodeStream']);
Route::get('/watch/{id}/{episode?}', [AnimeController::class, 'watch'])->name('watch');


Route::get('anime/{source}/recent', [AnimeApiController::class, 'getRecentAnime']);


