<?php

use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/
Route::get('/home', [CountryController::class, 'index'])->name('home');
Route::get('/home-inverse', [CountryController::class, 'index_inverse'])->name('home.inverse');
Route::get('/', function () {
    return view('welcome');
});
