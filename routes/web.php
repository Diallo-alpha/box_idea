<?php
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IdeeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommentaireController;
use App\Mail\TestEmail;

// Routes pour les utilisateurs
Route::resource('users', UserController::class);

// Groupes de routes pour AuthController
Route::controller(AuthController::class)->group(function () {
    Route::get('/inscription', 'getRegister')->name('get.register'); // Afficher le formulaire d'inscription
    Route::post('/inscription', 'register')->name('register'); // Soumettre le formulaire d'inscription
    Route::get('/connexion', 'getLogin')->name('login'); // Afficher le formulaire de connexion
    Route::post('/connexion', 'login'); // Soumettre le formulaire de connexion
    Route::post('logout', 'logout')->name('auth.logout')->middleware('auth:sanctum'); // Déconnexion de l'utilisateur
});

// Groupes de routes pour CategorieController
Route::resource('categories', CategorieController::class)->parameters([
    'categories' => 'categorie'
])->names([
    'index' => 'categories.index', // Lister toutes les catégories
    'create' => 'categories.create', // Afficher le formulaire de création de catégorie
    'store' => 'categories.store', // Enregistrer une nouvelle catégorie
    'show' => 'categories.show', // Afficher une catégorie spécifique
    'edit' => 'categories.edit', // Afficher le formulaire d'édition de catégorie
    'update' => 'categories.update', // Mettre à jour une catégorie existante
    'destroy' => 'categories.destroy' // Supprimer une catégorie
]);

// Groupes de routes pour IdeeController
Route::resource('idees', IdeeController::class);

// Groupes de routes pour CommentaireController
Route::resource('commentaires', CommentaireController::class);

// Groupes de routes pour AdminController
Route::controller(AdminController::class)->group(function () {
    Route::get('idees/{idee}/status', 'editStatus')->name('idees.editStatus'); // Afficher le formulaire de modification du statut d'une idée
    Route::put('idees/{idee}/status', 'updateStatus')->name('idees.updateStatus'); // Mettre à jour le statut d'une idée
    Route::get('/admin', 'index')->name('admin.index'); // Afficher le tableau de bord de l'administrateur
});
