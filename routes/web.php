<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublisherController;
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

Route::get('/', [HomeController::class,'home']);
// book
Route::controller(BookController::class)->group(function () {
    Route::get('/add-book', 'add');
    Route::post('/store-book', 'store');
});
Route::controller(AuthorController::class)->group(function () {
    Route::get('/writers', 'writers');
    Route::get('/writer/{id}', 'get_writer');
    Route::get('/add-author', 'index');
    Route::post('/store-author', 'store');
    Route::delete('/delete-author/{id}', 'remove');
});

Route::controller(PublisherController::class)->group(function () {
    Route::get('/add-publisher', 'index');
    Route::post('/store-publisher', 'store');
    Route::delete('/delete-publisher/{id}', 'remove');
});




