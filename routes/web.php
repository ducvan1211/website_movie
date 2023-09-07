<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ResolutionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [IndexController::class, 'home'])->name('trangchu');
Route::get('/danh-muc/{slug}', [IndexController::class, 'genre'])->name('genre');
Route::get('/the-loai/{slug}', [IndexController::class, 'category'])->name('category');
Route::get('/quoc-gia/{slug}', [IndexController::class, 'country'])->name('country');
Route::get('/nam/{year}', [IndexController::class, 'year'])->name('year');
Route::get('/phim/{slug}', [IndexController::class, 'detail'])->name('detail');
Route::get('/xem-phim/{slug}/tap-{ep}', [IndexController::class, 'watch'])->name('watch');
Route::get('/tag/{tag}', [IndexController::class, 'tag'])->name('tag');
Route::get('/tim-kiem', [IndexController::class, 'search'])->name('search');

Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');


// ADMIN

Route::resource('/category', CategoryController::class);
Route::resource('/genre', GenreController::class);
Route::resource('/country', CountryController::class);
Route::resource('/movie', MovieController::class);
Route::resource('/episode', EpisodeController::class);
Route::resource('/resolution', ResolutionController::class);
// AJAX
Route::get('/update-year', [AjaxController::class, 'update_year'])->name('ajax.update_year');
Route::get('/top-view', [AjaxController::class, 'top_view'])->name('ajax.top_view');
Route::get('/movie-view', [AjaxController::class, 'movie_view'])->name('ajax.movie_view');
Route::get('/select-movie', [AjaxController::class, 'select_movie'])->name('ajax.select_movie');
Route::get('/movie-view-default', [AjaxController::class, 'movie_view_default'])->name('ajax.movie_view_default');
