<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\ReconocimientoController;
use App\Models\Reconocimiento;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::get('proyectos/create', [ProyectoController::class,'create'])->middleware(['auth','verified'])->name('proyectos.create');
Route::get('proyectos/{proyectos}/edit', [ProyectoController::class,'edit'])->middleware(['auth','verified'])->name('proyectos.edit');

Route::get('reconocimientos/create', [ReconocimientoController::class,'create'])->middleware(['auth','verified'])->name('reconocimientos.create');
Route::get('reconocimientos/{reconocimientos}/edit', [ReconocimientoController::class,'edit'])->middleware(['auth','verified'])->name('reconocimientos.edit');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
