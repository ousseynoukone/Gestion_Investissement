<?php

use App\Http\Controllers\InvestissementController;
use App\Http\Controllers\ProjetController;
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


