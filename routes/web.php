<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\DocumentController;

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

Route::get('/', function () {return redirect()->route('home'); });
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
 

Route::group(['middleware' => ['auth']], function() {

    //role and permission
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    //end role and permission
    //users//
    Route::resource('users', UserController::class);
    Route::get('/myprofile', [UserController::class, 'myProfile'])->name('users.myProfile');
    //end users
    Route::resource('documents',DocumentController::class); // per ora non presenti permessi xke probabilmente sara pagina test

});
