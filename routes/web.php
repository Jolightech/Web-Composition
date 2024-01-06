<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/

use App\Http\Controllers\EpreuveController;
use App\Http\Controllers\QuestionController;
Route::resource('epreuves', EpreuveController::class);

// Affiche la liste des épreuves
Route::get('/epreuves', [EpreuveController::class, 'index'])->name('epreuves.index');

// Affiche le formulaire de création d'épreuve
Route::get('/epreuves/create', [EpreuveController::class, 'create'])->name('epreuves.create');

// Enregistre une nouvelle épreuve
//Route::post('/epreuves/create', [EpreuveController::class, 'store'])->name('epreuves.store');

// Affiche les détails d'une épreuve
Route::get('/epreuves/{epreuve}', [EpreuveController::class, 'show'])->name('epreuves.show');

// Affiche le formulaire de modification d'une épreuve
Route::get('/epreuves/{epreuve}/modifier', [EpreuveController::class, 'edit'])->name('epreuves.edit');

// Met à jour une épreuve
Route::put('/epreuves/{epreuve}', [EpreuveController::class, 'update'])->name('epreuves.update');

// Supprime une épreuve
Route::delete('/epreuves/{epreuve}', [EpreuveController::class, 'destroy'])->name('epreuves.destroy');






// web.php

// Utilisation de la ressource pour les routes RESTful de QuestionController
Route::resource('questions', QuestionController::class);

// Route personnalisée pour l'affichage du formulaire de création de question liée à une épreuve
Route::get('/questions/create/{epreuve_id}', [QuestionController::class, 'create'])->name('questions.create');
