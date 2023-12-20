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

// routes/web.php

use App\Http\Controllers\ExamController;
/**/
Route::get('/exams/create', [ExamController::class, 'create'])->name('exams.create');
Route::post('/exams', [ExamController::class, 'store'])->name('exams.store');
Route::get('/exams', [ExamController::class, 'index'])->name('exams.index');
Route::get('/exams/{id}', [ExamController::class, 'show'])->name('exams.show');
/*Route::get('/exams', [ExamController::class, 'index'])->name('exams.index');
Route::get('/exams/{id}', [ExamController::class, 'show'])->name('exams.show');*/
