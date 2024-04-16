<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Login;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', Login::class);
