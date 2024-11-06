<?php

use App\Builder\ReturnApi;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return ReturnApi::success('API em atividade.');
});

Route::prefix('/auth')->group(base_path('routes/api/auth.php'));

Route::prefix('/users')->group(base_path('routes/api/user.php'));

Route::prefix('/addresses')->group(base_path('routes/api/address.php'));

Route::prefix('/leases')->group(base_path('routes/api/leasing.php'));

Route::prefix('/properties')->group(base_path('routes/api/property.php'));

Route::prefix('/via-cep')->group(base_path('routes/api/via-cep.php'));