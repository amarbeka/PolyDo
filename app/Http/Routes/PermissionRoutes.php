<?php 
use App\Http\Controllers\PermissionController;
Route::resource('permissions', PermissionController::class);
Route::post('/permission-deleted/{id}', [PermissionController::class, 'getdestroy'])->name('permissions.getdestroy');
