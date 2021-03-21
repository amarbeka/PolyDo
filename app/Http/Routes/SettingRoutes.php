<?php 
use App\Http\Controllers\SettingController;
Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
Route::post('setting/change-password', [SettingController::class, 'change'])->name('setting.change');
Route::get('profile', [SettingController::class, 'profile'])->name('setting.profile');
Route::post('profile/change', [SettingController::class, 'profileChange'])->name('setting.profileChange');
