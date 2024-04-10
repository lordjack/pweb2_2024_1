<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\MatriculaController;

Route::get('/', function () {
    return view('inicio');
});
/*
//routes/web.php
Route::get('/aluno', [AlunoController::class, "index"]);
//carrega o formulário
Route::get('/aluno/create', [AlunoController::class, "create"]);
//recebe os dados do formulario para ser salvo na função store
Route::post('/aluno', [AlunoController::class, "store"])->name('aluno.store');
//Route::get('/aluno/destroy/{$id}', [AlunoController::class, "destroy"])->name('aluno.destroy');
Route::delete('/aluno/{$aluno}',
 [AlunoController::class, "destroy"])->name('aluno.destroy');

 Route::get('/aluno/edit/{id}', [AlunoController::class, "edit"])
    ->name('aluno.edit');
 Route::post('/aluno',
  [AlunoController::class, "update"])->name('aluno.update');
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('aluno', AlunoController::class);
    Route::post('/aluno/search', [AlunoController::class, "search"])->name('aluno.search');

    Route::resource('professor', ProfessorController::class);
    Route::post('/professor/search', [ProfessorController::class, "search"])->name('professor.search');

    Route::resource('matricula', MatriculaController::class);
    Route::post('/matricula/search', [MatriculaController::class, "search"])->name('matricula.search');
    Route::get('/matricula/detail/{id}',
     [MatriculaController::class, "detail"])->name('matricula.detail');

  /*   Route::get('/matricula/report/',
      [MatriculaController::class, "report"])->name('matricula.report');
*/
      Route::get('/matricula/relatorio/', function () {

        return "<p>teste</p>";

        //npm run build

       } )->name('matricula.relatorio');

});

require __DIR__.'/auth.php';


