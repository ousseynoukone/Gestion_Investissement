<?php

use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\InvestissementController;
use App\Http\Controllers\ProjetController;

use App\Http\Controllers\EntrepreneursController;
use App\Http\Controllers\InvestisseursController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjetStatusController;
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
    return view('welcome');
});



Route::group(['middleware' => ['auth', 'checkRole:investisseur']], function() {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('investisseurs', InvestisseursController::class);
    

});



Route::group(['middleware' => ['auth', 'checkRole:entrepreneur']], function() {
    
    Route::resource('entrepreneurs',EntrepreneursController::class);
    Route::get('/projets/status/{id}', [ProjetStatusController::class, 'update'])->name('status.update');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});














Route::middleware('auth')->group(function () {
Route::resource('projets',ProjetController::class);
Route::resource('annonces',AnnonceController::class);
Route::resource('investissements',InvestissementController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
