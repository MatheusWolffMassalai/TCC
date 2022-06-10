<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeralController;
use App\Http\Controllers\FilosController;
use App\Http\Controllers\PerfilController;

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

//Route::get('/', function () {
  //  return view('index');
//});
Auth::routes();

Route::get('/', [App\Http\Controllers\GeralController::class, 'index']);


Route::get('/cnidarios', [App\Http\Controllers\FilosController::class, 'index']);
Route::get('/perfil', [App\Http\Controllers\PerfilController::class, 'index']);

Route::resource('filos', FilosController::class);
Route::resource('perfil', PerfilController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
