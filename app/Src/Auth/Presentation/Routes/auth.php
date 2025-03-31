<?php

use App\Src\Auth\Infrastructure\Http\LoginController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function(){
    Route::post('login',LoginController::class);
});