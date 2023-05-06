<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use Inertia\Inertia;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
/*PARA CONTROLAR CON AUTENTICACIÓN Y VERIFICACIÓN DE EMAIL LAS RUTAS*/
/*->middleware(['auth', 'verified'])->name('Welcome');*/
////////////////////////////////////////////////////////////////////////
/*PARA TESTEOS*/
/*Route::get('/2',  function () {
    return Inertia::render('Welcome2');
});*/
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////

Route::get('/', [MainController::class, 'bienvenida'])->name('/');

Route::get('obra/{titulo}', [MainController::class, 'fichaPelicula'])->name('obra');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
