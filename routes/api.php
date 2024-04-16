<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testController;

Route::get('/test', testController::class);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/me', function(Request $request){
        return $request->user();
    });
});
