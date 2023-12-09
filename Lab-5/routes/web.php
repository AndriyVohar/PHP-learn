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

//=============================

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
//
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//
// Route::resource('tournaments', TournamentController::class);
//Tournaments route
Route::get('/tournaments', [TournamentController::class, 'index'])->name('tournaments.index');
Route::get('tournaments/{id}', [TournamentController::class, 'show'])->where('id', '[0-9]+')->name('tournament.show');

Route::middleware('auth')->group(function(){
    Route::get('/tournaments/create', [TournamentController::class, 'create'])->name('tournament.create');
    Route::post('/tournaments', [TournamentController::class, 'store'])->name('tournaments.store');
    Route::get('/tournaments/{id}/edit', [TournamentController::class, 'edit'])->where('id', '[0-9]+')->name('tournaments.edit');
    Route::put('/tournaments/{id}', [TournamentController::class, 'update'])->where('id', '[0-9]+')->name('tournaments.update');
    Route::delete('/tournaments/{id}', [TournamentController::class, 'destroy'])->where('id', '[0-9]+')->name('tournaments.destroy');
});
require __DIR__ . '/auth.php';
