<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use Trov\Http\Controllers\SitemapController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/sitemap.xml', [SitemapController::class, 'index']);
Route::get('/sitemap', [SitemapController::class, 'pretty']);

Route::middleware('force_trailing_slash')->group(function () {
    Route::name('welcome')->get('/', [PageController::class, 'index']);

    // this needs to be last !!!!!!!!!!!!!!
    Route::name('pages.show')->get('/{page:slug}', [PageController::class, 'show']);
});
