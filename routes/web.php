<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\accueilController;
use App\Http\Controllers\sessionController;

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

//Accueil : qui relie page d'accueil
Route::get('/', [accueilController::class, 'index'])->name('accueil');

//Session : va me permettre de relier a la vu Connexion et Inscription
Route::get('/session', [sessionController::class, 'index'])->name('session');
