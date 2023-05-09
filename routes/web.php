<?php

use App\Http\Controllers\FiltrarObrasController;
use App\Http\Controllers\ProfileController;
use App\Models\Obra;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BienvenidaController;
use App\Http\Controllers\ObtenerObraController;
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
/*Route::get('/filter',  function () {
    return Inertia::render('Filter', ['obras' => Obra::with('poster')->limit(16)->get()]);
});*/
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////

Route::get('/', [BienvenidaController::class, 'bienvenida'])->name('/');

Route::get('obra/{titulo}', [ObtenerObraController::class, 'fichaPelicula'])->name('obra');

Route::get('/obras',  [FiltrarObrasController::class, 'cargaInicial'])->name('obras');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
