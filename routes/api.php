<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TopUpController;

Route::post('register',[AuthController::class, 'register']);
Route::post('login',[AuthController::class, 'login']);

//harus menyertakan bearer token
Route::group(['middleware' => 'jwt.verify'], function($router) {
    Route::post('top_ups', [TopUpController::class, 'store']);
});


// Route::middleware('jwt.verify')->get('test', function (Request $request) {
//     return 'success';
// });
