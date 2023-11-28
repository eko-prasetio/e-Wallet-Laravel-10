<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TopUpController;
use App\Http\Controllers\Api\TransferController;
use App\Http\Controllers\Api\WebHookController;

Route::post('register',[AuthController::class, 'register']);
Route::post('login',[AuthController::class, 'login']);
Route::post('webhooks',[WebHookController::class, 'update']);


//harus menyertakan bearer token
Route::group(['middleware' => 'jwt.verify'], function($router) {
    Route::post('top_ups', [TopUpController::class, 'store']);
    Route::post('transfers', [TransferController::class, 'store']);
});


// Route::middleware('jwt.verify')->get('test', function (Request $request) {
//     return 'success';
// });
