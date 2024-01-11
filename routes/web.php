<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\TacheController;
use App\Http\Controllers\AttributionController;
use App\Http\Controllers\ConversationController;
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

    Route::middleware('verifAppartenance')->group(function () {
        //Route::get('/projets/indexProjet', [ProjetController::class, 'index'])->name('projets.indexProjet');
        Route::post('/deleteProjet/{n}', [ProjetController::class, 'destroy']);
        Route::get('/showProjet/{n}', [ProjetController::class, 'show']);
        Route::get('/showTaches/{n}', [TacheController::class, 'show']);
    });
    
    //Tache
    Route::middleware('tacheAppartenance')->group(function () {
        Route::get('/Tache/{n}', [TacheController::class, 'showPage']);
        Route::post('/updateTaches/{n}', [TacheController::class, 'update']);
        Route::get('/newTache/{n}', [TacheController::class, 'newPage'])->name('newTache');
        Route::post('/tache/store/{n}', [TacheController::class, 'store'])->name('tache.store');
        Route::post('/updateStatutTache/{n}', [TacheController::class, 'udpateStatut']);
    });

    //Attribution
    //Route::middleware('verifAppartenance')->group(function () {
    Route::POST('/ajouterContact', [AttributionController::class, 'store']);
    Route::GET('/indexAttribution', [AttributionController::class, 'index'])->name('indexAttribution');
    //});

    //Message
    //Route::middleware('verifAppartenance')->group(function () {
    Route::POST('/ajouterMessage', [ConversationController::class, 'store']);
    Route::GET('/refreshConversation', [ConversationController::class, 'show']);
});

//test
Route::get('/test', function () {
    return view('test');
})->name('test');

//route pour une error 404
Route::fallback(function () {
    return view('error/404');
});

//route pour une error 403
Route::fallback(function () {
    return view('error/403');
});


require __DIR__ . '/auth.php';
