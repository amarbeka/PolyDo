<?php 
use App\Http\Controllers\ProjectController;
Route::resource('project', ProjectController::class);
Route::post('/project-complete/{id}', [ProjectController::class, 'complete'])->name('project.completeProject');

