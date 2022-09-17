<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\ReservationsController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::any('dashboard', [BooksController::class, 'index'])->name('dashboard')->middleware(['auth']);

Route::resource('books', BooksController::class);
Route::resource('reservations', ReservationsController::class);


require __DIR__.'/auth.php';
