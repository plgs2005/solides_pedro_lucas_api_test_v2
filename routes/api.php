<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

//Gerenciamento de rotas poderia ser feito com Grupos de Rotas diferentes como versionamento V1 V2 etc..
Route::middleware('auth:api')->group(function () {

    //utilizando para funções especificas para classes construidas personalisadas.
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('me', [AuthController::class, 'me']);

    //note que utilizei a apiResources neste caso para mostrar tecnicas diferentes para construção de rotas
    Route::apiResource('records', RecordController::class);
});
