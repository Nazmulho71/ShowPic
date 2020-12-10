<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumsController;
use App\Http\Controllers\PhotosController;

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

Route::get('/', [AlbumsController::class, 'index'])->name('albums.home');

Route::get('/albums', function () {
    return redirect()->route('albums.home');
});

Route::get('/albums/create', [AlbumsController::class, 'create'])->name('albums.create');
Route::post('/albums/create', [AlbumsController::class, 'store']);

Route::get('/albums/{id}', [AlbumsController::class, 'show'])->name('albums.show');

Route::get('/photos/create/{album}', [PhotosController::class, 'create'])->name('photos.create');
Route::post('/photos/create/{album}', [PhotosController::class, 'store']);

Route::get('/photos/{photo}', [PhotosController::class, 'show'])->name('photos.show');

Route::delete('/photos/{photo}', [PhotosController::class, 'destroy'])->name('photos.destroy');
