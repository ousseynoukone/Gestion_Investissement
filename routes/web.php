<?php

use App\Http\Controllers\InvestissementController;
use App\Http\Controllers\ProjetController;

use App\Http\Controllers\EntrepreneursController;
use App\Http\Controllers\InvestisseursController;
use App\Http\Controllers\ProfileController;
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
Route::resource('projets',ProjetController::class);
Route::resource('investissements',InvestissementController::class);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', 'App\Http\Controllers\DashBoardController@index')->name('dashboard') });

Route::get('/entrepreneurs', function () {
    return view('pages.entrepreneurs.home');
})->name('entrepreneurs.home');

Route::get('/projets', function () {
    return view('pages.entrepreneurs.projets');
})->name('entrepreneurs.projets');

Route::get('/entrepreneurs/annonces', function () {
    return view('pages.entrepreneurs.annonce');
})->name('entrepreneurs.annonces');








Route::get('/investisseurs', function () {
    return view('pages.investisseurs.home');
})->name('investisseurs.home');

Route::get('/investisseurs/annonces', function () {
    return view('pages.investisseurs.annonce');
})->name('investisseurs.annonces');

// Route::get('/investisseurs/annonces', function () {
//     return view('pages.investisseurs.annonces');
// })->name('investisseurs.annonces');

//Declaration des routes pour entrepreneurs et Investisseurs
Route::resource('entrepreneurs',EntrepreneursController::class);
Route::resource('investisseurs', InvestisseursController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
