<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

require app_path( 'Http/Routes/LoginSocialRoutes.php');
Auth::routes();
Route::group( [ 'middleware' => 'auth' ], function () {
    require app_path( 'Http/Routes/DashboardRoutes.php');
    require app_path( 'Http/Routes/RoleRoutes.php');
    require app_path( 'Http/Routes/PermissionRoutes.php');
    require app_path( 'Http/Routes/TaskRoutes.php');
    require app_path( 'Http/Routes/UserRoutes.php');
    require app_path( 'Http/Routes/ProjectRoutes.php');
    require app_path( 'Http/Routes/SettingRoutes.php');
    });