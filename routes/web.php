<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Obra;

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

/*PARA CONTROLAR CON AUTENTICACIÓN LAS RUTAS en este caso con autenticación y verificación de email*/
/*->middleware(['auth', 'verified'])->name('Welcome');*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'obras' => Obra::with('poster')->get(),
    ]);
})->name('/');

Route::get('obra/{id}', function ($id) {
    return Inertia::render('Obra', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'obra' => Obra::with(['poster', 'actors'])->find($id),
    ]);
})->name('obra');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
