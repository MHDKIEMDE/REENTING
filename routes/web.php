<?php

use App\Http\Middleware\AdminAuthMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AddController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FiltController;
use App\Http\Controllers\ProController;
use App\Http\Controllers\DemaController;

// Routes pour les pages générales du site


Route::get('/', [MyController::class, 'home'])->name('home');
Route::get('/contact', [MyController::class, 'contact'])->name('home.contact');
Route::get('/service', [MyController::class, 'service'])->name('home.service');
Route::get('/apropos', [MyController::class, 'aproposDeNous'])->name('home.aproposDeNous');
Route::get('/maisons/{maison}/detailes', [MyController::class, 'maisonDetailes'])->name('home.maisonsDetailes');
// Route pour traiter le formulaire de filtrage
Route::post('/home/filtrer', [MyController::class, 'filtrerMaisons'])->name('filtrer.maisons');
// Routes d'authentification
Route::get('/authentification/login', [AuthController::class, 'login']);
Route::get('/authentification/sign', [AuthController::class, 'sign']);


// Authentification requise pour accéder à ces routes
Route::middleware(['auth'])->group(function () {
    // Routes pour la gestion des maisons
    Route::get('/maisons/ajout', [AddController::class, 'addhouse'])->name('maisons.ajout');
    Route::post('/maisons/ajout', [AddController::class, 'ajouterMaison'])->name('maisons.ajouter');
    Route::get('/maisons/{maison}', [AddController::class, 'showHouse'])->name('maisons.show');
    Route::get('/maisons/{maison}/modifier', [AddController::class, 'modifierMaison'])->name('maisons.modifier');
    Route::put('/maisons/{maison}', [AddController::class, 'mettreAJourMaison'])->name('maisons.mettreAJour');
    Route::delete('/maisons/{maison}', [AddController::class, 'supprimerMaison'])->name('maisons.supprimer');
});


// Authentification requise pour accéder à ces routes
Route::middleware(['auth', AdminAuthMiddleware::class])->group(function () {
    // Routes pour la section admin
    Route::prefix('/dashboard/admin')->group(function () {
        Route::get('/users/view/{id}', [AdminController::class, 'viewProfile'])->name('admin.viewUsersProfile');
        Route::get('/apropos', [MyController::class, 'aproposDeNous'])->name('admin.aproposDeNous');
        Route::get('/maisons/{maison}/detailes', [AdminController::class, 'maisonDetailes'])->name('admin.maisonsDetailes');
        // Route pour traiter le formulaire de filtrage
        Route::post('/filtrer', [AdminController::class, 'filtrerMaisons'])->name('admin.filtrerMaisons');
        // Afficher toutes la page d'accueil dans la  section admin
        Route::get('/home', [AdminController::class, 'adminHome'])->name('admin.adminHome');
        // Afficher toutes les maisons dans la section admin
        Route::get('/houses', [AdminController::class, 'showAllHouses'])->name('admin.showAllHouses');
        // Afficher la liste des utilisateurs
        Route::get('/showallusers', [AdminController::class, 'showAllUsers'])->name('admin.showAllUsers');
        // Supprimer un utilisateur
        Route::get('/deleteUser/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');
        // Afficher le formulaire de création d'une maison
        Route::get('/houses/create', [AdminController::class, 'createHouse'])->name('admin.createHouse');
        // Soumettre le formulaire pour ajouter une maison
        Route::post('/houses', [AdminController::class, 'storeHouse'])->name('admin.storeHouse');
        // Afficher le formulaire de modification d'une maison
        Route::get('/houses/{id}/edit', [AdminController::class, 'editHouse'])->name('admin.editHouse');
        // Mettre à jour une maison
        Route::put('/houses/{id}', [AdminController::class, 'updateHouse'])->name('admin.updateHouse');
        // Supprimer une maison
        Route::delete('/houses/{id}', [AdminController::class, 'deleteHouse'])->name('admin.deleteHouse');

        // Afficher le formulaire d'inscription
        Route::get('/register', [AdminController::class, 'showRegistrationForm'])->name('admin.showRegistrationForm');
        // Traitement du formulaire d'inscription
        Route::post('/register', [AdminController::class, 'registerUsers'])->name('admin.registerUsers');
        // Afficher le formulaire de connexion
        Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.showLoginForm');
        // Traitement du formulaire de connexion
        Route::post('/login', [AdminController::class, 'loginUsers'])->name('admin.loginUsers');
    });
});




// Authentification requise pour accéder à ces routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/pro/home', [DemaController::class, 'prohome'])->name('pro.home');
    Route::get('/dashboard/pro/contact', [ProController::class, 'contact'])->name('contact');
    Route::get('/dashboard/pro/service', [ProController::class, 'service'])->name('pro.service');
    Route::get('/dashboard/pro/apropos', [ProController::class, 'aproposDeNous'])->name('aproposDeNous');
    // Afficher toutes les maisons dans la section proprietaire
    Route::get('/dashboard/pro/houses', [ProController::class, 'showAllHouses'])->name('pro.showAllHouses');
    Route::get('/dashboard/pro/houses/create', [ProController::class, 'createHouse'])->name('pro.createHouse');
    // Soumettre le formulaire pour ajouter une maison
    Route::post('/dashboard/pro/houses', [ProController::class, 'storeHouse'])->name('pro.storeHouse');
    // Afficher le formulaire de modification d'une maison
    Route::get('/dashboard/pro/houses/{id}/edit', [ProController::class, 'editHouse'])->name('pro.editHouse');
    // Mettre à jour une maison
    Route::put('/dashboard/pro/houses/{id}', [ProController::class, 'updateHouse'])->name('pro.updateHouse');
    // Supprimer une maison
    Route::delete('/dashboard/pro/houses/{id}', [ProController::class, 'deleteHouse'])->name('pro.deleteHouse');
    Route::put('/dashboard/pro/profile/update', [ProController::class, 'updateProfile'])->name('profile.update');
    Route::get('/dashboard/pro/profile/edit', [ProController::class, 'editProfile'])->name('profile.edit');
    Route::get('/dashboard/pro/profile/profile', [ProController::class, 'showProfile'])->name('profile.show');
});



// Authentification requise pour accéder à ces routes
Route::middleware(['auth'])->group(function () {
    Route::post('/filtrer', [DemaController::class, 'filtrerMaisons'])->name('dema.filtrermaisons');
    Route::get('/dashboard/dema/home', [DemaController::class, 'demahome'])->name('dema.home');
    Route::get('/dashboard/dema/contact', [DemaController::class, 'contact'])->name('dema.contact');
    Route::get('/dashboard/dema/contact', [DemaController::class, 'contact'])->name('dema.contact');
    Route::get('/dashboard/dema/service', [DemaController::class, 'service'])->name('dema.service');
    Route::get('/maisons/{maison}/detailes', [DemaController::class, 'maisonDetailes'])->name('dema.maisonsDetailes');
    Route::get('/dashboard/dema/apropos', [DemaController::class, 'aproposDeNous'])->name('dema.aproposDeNous');
    // Afficher toutes les maisons dans la section demarcheurs
    Route::get('/dashboard/dema/houses', [DemaController::class, 'showAllHouses'])->name('dema.showAllHouses');
    Route::get('/dashboard/dema/houses/create', [DemaController::class, 'createHouse'])->name('dema.createHouse');
    // Soumettre le formulaire pour ajouter une maison
    Route::post('/dashboard/dema/houses', [DemaController::class, 'storeHouse'])->name('dema.storeHouse');
    // Afficher le formulaire de modification d'une maison
    Route::get('/dashboard/dema/houses/{id}/edit', [DemaController::class, 'editHouse'])->name('dema.editHouse');
    // Mettre à jour une maison
    Route::put('/dashboard/dema/houses/{id}', [DemaController::class, 'updateHouse'])->name('dema.updateHouse');
    // Supprimer une maison
    Route::delete('/dashboard/dema/houses/{id}', [DemaController::class, 'deleteHouse'])->name('dema.deleteHouse');
    Route::put('/dashboard/dema/profile/update', [DemaController::class, 'updateProfile'])->name('profile.update');
    Route::get('/dashboard/dema/profile/edit', [DemaController::class, 'editProfile'])->name('profile.edit');
    Route::get('/dashboard/dema/profile/profile', [DemaController::class, 'showProfile'])->name('profile.show');
});
