<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AutoCompleteController;
use App\Http\Controllers\PersonaController;
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

Route::get('/hi', function () {
    return view('holamundo');
});

Route::resource('products', ProductController::class);
Route::get('search', [AutoCompleteController::class, 'index'])->name('search');
Route::get('autocomplete', [AutoCompleteController::class, 'autocomplete'])->name('autocomplete');

Route::resource('personas', PersonaController::class);