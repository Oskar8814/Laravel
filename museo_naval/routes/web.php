<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BarcoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth'])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::get('/dashboard', [BarcoController::class, 'index'])->name('dashboard');
    Route::get('/barcos/{id}/edit', [BarcoController::class, 'edit'])->name('barcos.edit'); // Nueva ruta de edición
    Route::put('/barcos/{id}', [BarcoController::class, 'update'])->name('barcos.update'); // Ruta para actualizar en la bbdd
    Route::delete('/barcos/{id}', [BarcoController::class, 'destroy'])->name('barcos.destroy');// Ruta para eliminar
    Route::get('/barcos/create', [BarcoController::class, 'create'])->name('barcos.create');// Ruta para Crear un barco
    Route::post('/barcos', [BarcoController::class, 'store'])->name('barcos.store'); //Ruta para guardar el barco en la bbdd


});

require __DIR__.'/auth.php';
