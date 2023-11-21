<?php

use App\Http\Controllers\TournamentController;
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
//
Route::get('/tournaments', [TournamentController::class, 'index']);
//
Route::get('/tournaments/create', [TournamentController::class, 'create']);
//
Route::get('/tournaments/{id}', [TournamentController::class, 'show']);
//
Route::post('/tournaments', [TournamentController::class, 'store']);
//
Route::get('/tournaments/{id}/edit', [TournamentController::class, 'edit']);

Route::put('/tournaments/{id}', [TournamentController::class, 'update']);
//
Route::delete('/tournaments/{id}', [TournamentController::class, 'destroy']);

