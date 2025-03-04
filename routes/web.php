<?php

use App\Http\Controllers\UrlShortenerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('api')->middleware('api')->group(function () {
    Route::post('/encode', [UrlShortenerController::class, 'encode']);
    Route::post('/decode', [UrlShortenerController::class, 'decode']);
});
