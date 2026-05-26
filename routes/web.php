<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// 1. Redirección automática al registro 
Route::get('/', function () {
    return redirect()->route('register'); 
});

// 2. RUTAS DE REGISTRO MANUAL
Route::get('/register', [UserController::class, 'create'])->name('register'); // Muestra formulario manual
Route::post('/register', [UserController::class, 'store'])->name('register.store'); // Procesa formulario manual

// 3. RUTAS DE GOOGLE (SOCIALITE)
Route::get('/auth/google', [UserController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [UserController::class, 'handleGoogleCallback']);

// 4. VENTANA TRAS REGISTRO CON GOOGLE (Completar Perfil)
Route::get('/complete-profile', [UserController::class, 'showCompleteProfile'])->name('complete.profile');
Route::post('/complete-profile/store', [UserController::class, 'storeGoogleUser'])->name('complete.profile.store');