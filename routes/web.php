<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DocumentHasWalletController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ResearchController;
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

    //wallets//
    Route::resource('wallets', WalletController::class);
    //end wallets

    //researchs//
    Route::resource('researchs', ResearchController::class);
    //end researchs

    //documents//
    Route::resource('documents',DocumentController::class); 
    //end documents

    //orders//
    Route::resource('orders',OrderController::class); 
    Route::get('orders/download/{output}', [OrderController::class, 'download'])->name('orders.download');
    Route::get('orders/{id}/xml', [OrderController::class, 'xml'])->name('orders.xml');

    //end orders

    //DocumentHasWallet//
    Route::resource('documentsHasWallet',DocumentHasWalletController::class); 
    //end DocumentHasWallet
     
    Route::get('/documenti', [DocumentController::class, 'documenti'])->name('documents.documenti');
    Route::get('/blocchi', [DocumentController::class, 'blocchi'])->name('documents.blocchi');

});

/****************modal*********************/
  Route::group(['prefix'=>'modals','as'=>'modals.'], function(){
    Route::post('/document',function(){ return view("modals.document"); })->name('document');
 });
 /****************end modal*********************/

/****************ajax*********************/
 Route::group(['prefix'=>'ajax','as'=>'ajax.'], function(){
  Route::get('/modal/{model}', [AjaxController::class, 'modal'])->name("modal");
  Route::get('/loadStepOrder', [AjaxController::class, 'loadStepOrder'])->name("loadStepOrder");
});
/****************end modal*********************/