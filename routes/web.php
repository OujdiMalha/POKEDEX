<?php

// routes/web.php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\HomepageController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\AttaqueController;
use App\Http\Controllers\Admin\TypeController as AdminTypeController;
use App\Http\Controllers\Admin\AttaqueController as AdminAttaqueController;
use App\Http\Controllers\Admin\PokemonController as AdminPokemonController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomepageController as ControllersHomepageController;
use App\Http\Controllers\PokemonPublicController;
use Illuminate\Support\Facades\Route;

// Page d'accueil
Route::get('/', [ControllersHomepageController::class, 'index'])->name('homepage');

// Page "À propos"
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

// Tableau de bord (dashboard)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes pour le profil utilisateur
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar.update');
});

// Détail d'un profil utilisateur
Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');

// Routes pour les Pokémon (public)
Route::get('/pokemon', [PokemonPublicController::class, 'index'])->name('pokemon.index');
Route::get('/pokemon/{id}', [PokemonPublicController::class, 'show'])->name('pokemon.show');

// Gestion des commentairespour les utilisateurs connectés
Route::middleware('auth')->group(function () {
    Route::post('/pokemon/{pokemon}/commentaires', [PokemonPublicController::class, 'addCommentaires'])->name('pokemon.commentaires.add');
    Route::delete('/pokemon/{pokemon}/commentaires/{commentaire}', [PokemonPublicController::class, 'deleteCommentaire'])->name('pokemon.commentaires.delete');
});

// Routes pour l'administration
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('pokemon', AdminPokemonController::class, ['as' => 'admin']);
    Route::resource('types', AdminTypeController::class, ['as' => 'admin']);
    Route::resource('attaques', AdminAttaqueController::class, ['as' => 'admin']);
});

require __DIR__.'/auth.php';
