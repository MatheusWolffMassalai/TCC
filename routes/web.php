<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeralController;
use App\Http\Controllers\FilosController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\comentarioController;
use App\Http\Controllers\ExercicioController;


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

//Route::post('/', function () {
//  return view('index');
//});
Auth::routes();

Route::get('/', [App\Http\Controllers\GeralController::class, 'index'])->name('index');


Route::get('/filos/{id}', [App\Http\Controllers\FilosController::class, 'index'])->name('filoindex');
Route::post('/perfil', [App\Http\Controllers\PerfilController::class, 'index']);
Route::post('/comentario', [App\Http\Controllers\ReceitaController::class, 'store'])->name('comentario');
Route::get('/artigo/criar', [App\Http\Controllers\ArtigoController::class, 'index']);
Route::post('/artigo/salvar', [App\Http\Controllers\ArtigoController::class, 'store']);


Route::group(['prefix' => 'exercicio'], function () {
    Route::post('store', [App\Http\Controllers\ExercicioController::class, 'store']);
    Route::get('mostrar/{id}', [App\Http\Controllers\ExercicioController::class, 'index']);
    Route::get('criar', [App\Http\Controllers\ExercicioController::class, 'create']);
});

//Route::post('/perfil', [App\Http\Controllers\PerfilController::class, 'index'])->name('index');


Route::resource('filos', FilosController::class);
Route::resource('perfil', PerfilController::class);
Route::resource('comentario', comentarioController::class);
Route::resource('exercicio', ExercicioController::class);
Route::resource('artigo', ExercicioController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');