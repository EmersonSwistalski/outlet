<?php

use App\Http\Controllers\api\CupomController;
use App\Http\Controllers\api\ProdutoController;
use App\Http\Controllers\api\ProdutoCupomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// ------------- Produtos ------------- //
Route::get('/produtos',[ProdutoController::class,'index']);

Route::get('/produto/{id}', [ProdutoController::class,'show']);

Route::post('/produto/novo', [ProdutoController::class, 'store']);

Route::put('/produto/alterar/{id}', [ProdutoController::class, 'update']);

Route::delete('/produto/deletar/{id}', [ProdutoController::class, 'destroy']);

// ------------- Cupons ------------- //
Route::get('/cupons', [CupomController::class, 'index']);

Route::get('/cupom/{id}', [CupomController::class, 'show']);

Route::put('/cupom/alterar/{id}', [CupomController::class, 'update']);

Route::post('/cupom/novo', [CupomController::class, 'store']);

Route::delete('/cupom/deletar/{id}',[CupomController::class,'destroy']);

Route::post('/cupom/aplicar', [ProdutoCupomController::class, 'store']);