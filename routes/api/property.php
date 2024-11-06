<?php

use App\Http\Controllers\Property\PropertyController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth.api'])->group(function (){
    Route::post('/', [PropertyController::class, 'store']);
    Route::get('/', [PropertyController::class, 'index']);
    Route::get('/{id}', [PropertyController::class, 'show']);
    Route::put('/{id}', [PropertyController::class, 'update']);
    Route::delete('/{id}', [PropertyController::class, 'destroy']);
    Route::patch('/{id}', [PropertyController::class, 'restore']);
});