<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\V1\AuthorController;
use App\Http\Controllers\V1\BookController;

Route::prefix('v1')->middleware('api')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);

    Route::group(['middleware' => 'jwt.verify'], function () {
        Route::post('logout', [AuthController::class, 'unlog']);

        Route::apiResources([
            'authors' => AuthorController::class,
            'books' => BookController::class,
        ]);
    });
});
