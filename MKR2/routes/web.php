<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManufacturersController;

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
    return view('welcome');
});

Route::get('/manufacturers', [ManufacturersController::class, 'index']);
Route::get('/manufacturers/{id}', [ManufacturersController::class, 'show']);
Route::get('/manufacturers/{id}/edit', [ManufacturersController::class, 'edit']);
Route::put('/manufacturers/{id}', [ManufacturersController::class, 'update']);