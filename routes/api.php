<?php

use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('books')->group(function(){
    Route::post('/',[BookController::class,'store']);
    Route::post('/{id}/reduce-stock',[BookController::class,'store']);
    Route::get('/',[BookController::class,'index']);
    Route::get('/{id}',[BookController::class,'show']);
    Route::put('/{id}',[BookController::class,'update']);
    Route::delete('/{id}',[BookController::class,'destroy']);


});
