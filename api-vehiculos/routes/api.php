<?php

use App\Http\Controllers\VehiculoController;
use Illuminate\Support\Facades\Route;

Route::apiResource('vehiculos', VehiculoController::class);
