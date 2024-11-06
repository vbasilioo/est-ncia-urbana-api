<?php

use App\Http\Controllers\ViaCEP\ViaCEPController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth.api'])->group(function (){
    Route::get('/', [ViaCEPController::class, 'show']);
});