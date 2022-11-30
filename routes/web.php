<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeralController;
use App\Http\Controllers\FilosController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\comentarioController;
use App\Http\Controllers\ExercicioController;

use App\Http\Controllers\RankingArtigosVisitadosController;
use App\Http\Controllers\RankingCriarArtigosController;
use App\Http\Controllers\RankingCriarExerciciosController;
use App\Http\Controllers\RankingEdicoesFeitasController;
use App\Http\Controllers\RankingJulgarSugestoesdeEdicaoController;
use App\Http\Controllers\RankingResolucaoExerciciosController;


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
Route::post('/perfil', [App\Http\Controllers\PerfilController::class, 'index']);
Route::get('/confirmaedicao', [App\Http\Controllers\EdicaoController::class, 'index']);
Route::post('/confirmaedicao/update', [App\Http\Controllers\EdicaoController::class, 'update']);
Route::get('/rankinggeral', [App\Http\Controllers\RankingGeralController::class, 'index']);
Route::get('/rankingartigosvisitados', [App\Http\Controllers\RankingArtigosVisitadosController::class, 'index']);
Route::get('/rankingcriarartigos', [App\Http\Controllers\RankingCriarArtigosController::class, 'index']);
Route::get('/rankingcriarexercicios', [App\Http\Controllers\RankingCriarExerciciosController::class, 'index']);
Route::get('/rankingjulgarsugestoesdeedicao', [App\Http\Controllers\RankingJulgarSugestoesdeEdicaoController::class, 'index']);
Route::get('/rankingresolucaoexercicios', [App\Http\Controllers\RankingResolucaoExerciciosController::class, 'index']);
Route::get('/rankingedicoesfeitas', [App\Http\Controllers\RankingEdicoesFeitasController::class, 'index']);
Route::get('/criartopico/{id}', [App\Http\Controllers\FilosController::class, 'create'])->name('topicocreate');
Route::post('/criartopico/criar', [App\Http\Controllers\FilosController::class, 'store'])->name('topico');
Route::get('/novotopico', [App\Http\Controllers\NovoTopico::class, 'index'])->name('novotopico');
Route::get('/confirmar', [App\Http\Controllers\NovoTopico::class, 'store'])->name('novotopico');







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
Route::resource('artigo', ExercicioController::class);
Route::resource('artigo', ExercicioController::class);
Route::resource('artigo', ExercicioController::class);
Route::resource('artigo', ExercicioController::class);
Route::resource('artigo', ExercicioController::class);
Route::resource('artigo', ExercicioController::class);
Route::resource('artigo', ExercicioController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');