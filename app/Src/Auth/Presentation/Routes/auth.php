<?php

use App\Src\Auth\Infrastructure\Http\LoginController;
use Illuminate\Support\Facades\Route;

Route::post('login',LoginController::class);