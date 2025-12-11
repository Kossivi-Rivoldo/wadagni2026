<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\BenevoleController;
use App\Http\Controllers\DonController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\RoleMiddleware;


/*
|--------------------------------------------------------------------------
| Routes publiques
|--------------------------------------------------------------------------
*/

Route::get('/', function () { return view('welcome'); });
/* Route::get('/home', function () { return view('home'); }); */
Route::get('/home', [ArticleController::class, 'home'])->name('home');
Route::get('/actualite', [ArticleController::class, 'index'])->name('actualite');
Route::get('/evenement', [EvenementController::class, 'index'])->name('evenement');


/* Route::get('/don', [DonController::class, 'create'])->name('don.create');
Route::post('/don', [DonController::class, 'store'])->name('don.store'); */


/*
|--------------------------------------------------------------------------
| Authentification (login / logout)
|--------------------------------------------------------------------------
*/

// Formulaire de connexion
Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('login')
    ->middleware('guest');

// Traitement du login
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Déconnexion
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Routes protégées (admin + éditeur)
|--------------------------------------------------------------------------
*/

// Middleware role pour admin et editeur
Route::middleware([RoleMiddleware::class . ':admin,editeur'])->group(function () {

    // Dashboard unique
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    // Articles
    Route::resource('articles', ArticleController::class);

    // Événements
    Route::resource('evenements', EvenementController::class);

    // CRUD Articles
    Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('articles', [ArticleController::class, 'listeArticles'])->name('articles.liste');
    Route::get('articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
    Route::get('articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');

    // CRUD Événements
    Route::get('evenements', [EvenementController::class, 'index'])->name('evenements.index');
    Route::get('evenements/create', [EvenementController::class, 'create'])->name('evenements.create');
    Route::post('evenements', [EvenementController::class, 'store'])->name('evenements.store');
    Route::get('evenements', [EvenementController::class, 'listeEvenements'])->name('evenements.liste');
    Route::get('evenements/{evenement}/edit', [EvenementController::class, 'edit'])->name('evenements.edit');
    Route::put('evenements/{evenement}', [EvenementController::class, 'update'])->name('evenements.update');
    Route::delete('evenements/{evenement}', [EvenementController::class, 'destroy'])->name('evenements.destroy');
        Route::get('dons', [DonController::class, 'create'])->name('don.create');
        Route::post('dons', [DonController::class, 'store'])->name('don.store');
    /*
    |--------------------------------------------------------------------------
    | Routes ADMIN uniquement
    |--------------------------------------------------------------------------
    */
    Route::middleware([RoleMiddleware::class . ':admin'])->group(function () {

        // Gestion des éditeurs (création uniquement par admin)
        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::get('users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('users', [UserController::class, 'store'])->name('users.store');

        // Bénévoles
        Route::get('benevoles', [BenevoleController::class, 'liste'])->name('benevoles.liste');
        Route::get('benevoles/{benevole}', [BenevoleController::class, 'show'])->name('benevoles.show');

        // Dons
       /*  Route::get('dons', [DonController::class, 'index'])->name('dons.index');
        Route::get('dons/{don}', [DonController::class, 'show'])->name('dons.show'); */
        Route::get('/dons/liste', [DonController::class, 'liste'])->name('dons.liste');
        
    });

        // Articles
    Route::get('articles/liste', [ArticleController::class, 'listeArticles'])->name('articles.liste');

    // Événements
    Route::get('evenements/liste', [EvenementController::class, 'listeEvenements'])->name('evenements.liste');


    // Dashboard ou liste des catégories
    Route::get('/categories', [ArticleController::class, 'listeCategorie'])
        ->name('categories.liste');

    // Créer une nouvelle catégorie
    Route::get('/categories/create', [ArticleController::class, 'create'])
        ->name('categories.create');
    Route::post('/categories', [ArticleController::class, 'store_cat'])
        ->name('categories.store');

    // Éditer une catégorie
    Route::get('/categories/{categorie}/edit', [ArticleController::class, 'edit'])
        ->name('categories.edit');
    Route::put('/categories/{categorie}', [ArticleController::class, 'update'])
        ->name('categories.update');

    // Supprimer une catégorie
    Route::delete('/categories/{categorie}', [ArticleController::class, 'destroy'])
        ->name('categories.destroy');

});
