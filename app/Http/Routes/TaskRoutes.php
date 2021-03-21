<?php 
use App\Http\Controllers\TaskController;
Route::resource('task', TaskController::class);
Route::post('/task-complete/{id}', [TaskController::class, 'complete'])->name('task.completeTask');
