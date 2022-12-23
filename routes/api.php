<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class,'login']);

Route::group(['prefix'=>'movies','middleware'=>['auth','role:admin']],function($router){
    Route::get('',[MovieController::class,'index'])->withoutMiddleware(['role:admin'])->can('read movies');
    Route::get('/{id}',[MovieController::class,'show'])->withoutMiddleware(['role:admin'])->can('read movies');
    Route::post('',[MovieController::class,'create']);
    Route::put('/{id}',[MovieController::class,'update']);
    Route::delete('/{id}',[MovieController::class,'destroy']);
});
