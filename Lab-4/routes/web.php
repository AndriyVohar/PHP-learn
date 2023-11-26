<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TournamentController;

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

// Route::get('/', function () {
//     return view('welcome');
// }); 

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//
Route::get('/tournaments', [TournamentController::class, 'index'])->middleware(['auth', 'verified'])->name('tournaments.index');
//
Route::get('/tournaments/create', [TournamentController::class, 'create'])->middleware(['auth', 'verified'])->name('tournaments.create');
//
Route::get('/tournaments/{id}', [TournamentController::class, 'show'])->name('tournaments.show');
//
Route::post('/tournaments', [TournamentController::class, 'store'])->middleware(['auth', 'verified'])->name('tournaments.store');
//
Route::get('/tournaments/{id}/edit', [TournamentController::class, 'edit'])->middleware(['auth', 'verified'])->name('tournaments.edit');
//
Route::put('/tournaments/{id}', [TournamentController::class, 'update'])->middleware(['auth', 'verified'])->name('tournaments.update');
//
Route::delete('/tournaments/{id}', [TournamentController::class, 'destroy'])->middleware(['auth', 'verified'])->name('tournaments.destroy');
require __DIR__.'/auth.php';
