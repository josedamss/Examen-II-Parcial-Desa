<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculosController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/vehiculos', [VehiculosController::class, 'index'])->name('vehiculos.index');
Route::post('/vehiculos', [VehiculosController::class, 'store'])->name('vehiculos.store');
Route::put('/vehiculos/{vehiculos}', [VehiculosController::class, 'update'])->name('vehiculos.update');
Route::delete('/vehiculos/{vehiculos}', [VehiculosController::class, 'destroy'])->name('vehiculos.destroy');
