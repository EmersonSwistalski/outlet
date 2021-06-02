<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\frontend\FrontCupomController;
use App\Http\Controllers\frontend\FrontProdutoController;
use App\Http\Controllers\HomeController;
use GuzzleHttp\Middleware;
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
    return redirect()->route('index');
});

// ------------- Produtos ------------- //
Route::get('/index', [FrontProdutoController::class,'index'])
    ->name('index');

Route::get('/produtos', [FrontProdutoController::class, 'indexProdutos'])
    ->name('listarProdutos');

Route::get('/produto/novo', [FrontProdutoController::class, 'create'])
    ->name('novoProduto')
    ->middleware('auth');

Route::post('/produto/novo', [FrontProdutoController::class, 'store'])
    ->middleware('auth');

Route::get('/produto/alterar/{id}', [FrontProdutoController::class, 'edit'])
    ->name('alterarProduto')
    ->middleware('auth');

Route::post('/produto/alterar/{id}', [FrontProdutoController::class, 'update'])
    ->middleware('auth');

Route::get('/produto/deletar/{id}', [FrontProdutoController::class, 'destroy'])
    ->name('deletarProduto')
    ->middleware('auth');

Route::get('/produto/{id}', [FrontProdutoController::class, 'show'])
    ->name('exibirProduto');

// ------------- Cupons ------------- //

Route::post('/cupom/aplicar', [HomeController::class, 'cupom'])
    ->name('aplicarCupom');

Route::get('/cupons', [FrontCupomController::class, 'index'])
    ->name('listarCupons');

Route::get('/cupom/novo', [FrontCupomController::class, 'create'])
    ->name('novoCupom')
    ->middleware('auth');

Route::post('/cupom/novo', [FrontCupomController::class, 'store'])
    ->middleware('auth');

Route::get('/cupom/alterar/{id}', [FrontCupomController::class, 'edit'])
    ->name('alterarCupom')
    ->middleware('auth');

Route::post('/cupom/alterar/{id}', [FrontCupomController::class, 'update'])
    ->middleware('auth');

Route::get('/cupom/deletar/{id}', [FrontCupomController::class, 'destroy'])
    ->name('deletarCupom')
    ->middleware('auth');

Route::get('/cupom/{id}', [FrontCupomController::class, 'show']);
    
require __DIR__.'/auth.php';
