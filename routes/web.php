<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CollaborateurController;

// Page d'accueil / Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Déconnexion
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Page après connexion : affiche un collaborateur aléatoire
Route::get('/connected', [CollaborateurController::class, 'connected'])->name('connected');

// Liste des collaborateurs + recherche par nom / pays
Route::get('/collaborateurs', [CollaborateurController::class, 'index'])->name('list');
// Ajouter un collaborateur (formulaire et traitement)
Route::get('/collaborateurs/create', [CollaborateurController::class, 'create'])->name('collaborateur.create');
Route::put('/collaborateurs', [CollaborateurController::class, 'store'])->name('collaborateur.store');

// Modifier un collaborateur
Route::get('/collaborateurs/{id}/edit', [CollaborateurController::class, 'edit'])->name('collaborateur.edit');
Route::put('/collaborateurs/{id}/update', [CollaborateurController::class, 'update'])->name('collaborateur.update');
//supprimer collaborateur
Route::delete('/collaborateurs/{id}', [CollaborateurController::class, 'destroy'])->name('collaborateur.destroy');

