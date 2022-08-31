<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use Trov\Http\Controllers\SitemapController;

// use App\Http\Controllers\FaqController;
// use App\Http\Controllers\PostController;
// use App\Http\Controllers\DiscoverTopicController;
// use App\Http\Controllers\DiscoverArticleController;
// use App\Http\Controllers\AirportController;
// use App\Http\Controllers\SheetController;

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

    // Route::name('faqs.index')->get('/faqs/', [FaqController::class, 'index']);
    // Route::name('faqs.show')->get('/faqs/{faq:slug}/', [FaqController::class, 'show']);

    // Route::name('posts.show')->get('/posts/{post:slug}/', [PostController::class, 'show']);

    // Route::name('discovery-topics.show')->get('/discovery-center/topics/{topic:slug}/', [DiscoveryTopicController::class, 'show']);
    // Route::name('discovery-articles.show')->get('/discovery-center/articles/{article:slug}/', [DiscoveryArticleController::class, 'show']);

    // Route::name('airport.show')->get('/airport/{page:slug}/', [AirportController::class, 'show']);

    // Route::name('sheets.show')->get('/{type}s/{page:slug}/', [SheetsController::class, 'show']);

    // this needs to be last !!!!!!!!!!!!!!
    Route::name('pages.show')->get('/{page:slug}', [PageController::class, 'show']);
});
