<?php

use App\Http\Controllers\AutoController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
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

Route::get('ajax-book-crud', [BookController::class, 'index']);
Route::post('add-update-book',[BookController::class, 'store']);
Route::post('edit-book',[BookController::class, 'edit']);
Route::post('delete-book',[BookController::class, 'destroy']);

Route::get('login', [LoginController::class, 'index']);
Route::post('logeando', [LoginController::class, 'logear']);

Route::get('botonn', [LoginController::class, 'indexb']);
Route::post('cambio', [LoginController::class, 'cambiar']);

Route::get('auto', [AutoController::class, 'index']);
Route::post('crear', [AutoController::class, 'store']);
Route::post('eliminar', [AutoController::class, 'destroy']);
Route::post('editar', [AutoController::class, 'update']);
