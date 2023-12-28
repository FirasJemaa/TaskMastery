<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\TacheController;
//use App\Models\Projet;
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
    return view('accueil');
});

Route::get('/identification', function () {
    return view('identification');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/session', function () {
    return view('session');
})->middleware(['auth', 'verified'])->name('session');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    //Projet
    Route::post('/storeProjet', [ProjetController::class, 'store']);

    //Route::middleware('verifAppartenance')->group(function () {
        Route::post('/deleteProjet/{n}', [ProjetController::class, 'destroy']);
        Route::get('/showProjet/{n}', [ProjetController::class, 'show']);
    //});

    //Tache
    
    //Route::middleware('verifAppartenance')->group(function () {
        Route::post('/updateTaches', [TacheController::class, 'update']);        
        Route::get('/showTaches/{n}', [TacheController::class, 'show']);
    //});
});

//test
Route::get('/tache', function () {
    return view('tache');
})->name('tache');


require __DIR__.'/auth.php';
