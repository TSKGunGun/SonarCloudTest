<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/test', function(Request $request){
    return "test ok";
});

Route::get('me', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
