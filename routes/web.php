<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Login;

Route::post('/login', Login::class);
