<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\EventoController;

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

Route::get('/', WelcomeController::class);

Auth::routes();

Route::get('/eventos', [EventoController::class, 'index']);
Route::get('/eventos/mostrar', [EventoController::class, 'show']);
Route::post('/eventos/agregar', [EventoController::class, 'store']);
Route::post('/eventos/editar/{id}', [EventoController::class, 'edit']);
Route::post('/eventos/eliminar/{id}', [EventoController::class, 'destroy']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
