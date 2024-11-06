<?php

use App\Http\Controllers\Leasing\LeasingController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth.api'])->group(function (){
    Route::post('/', [LeasingController::class, 'store']);
    Route::get('/', [LeasingController::class, 'index']);
    Route::get('/{id}', [LeasingController::class, 'show']);
    Route::put('/{id}', [LeasingController::class, 'update']);
    Route::delete('/{id}', [LeasingController::class, 'destroy']);
    Route::patch('/{id}', [LeasingController::class, 'restore']);
});