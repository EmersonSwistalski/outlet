<?php

use App\Http\Controllers\api\ProdutoController;
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

//Exibe todos os produtos
Route::get('/produtos',[ProdutoController::class,'index']);

//Exibe determinado produto
Route::get('/produto/{id}', [ProdutoController::class,'show']);