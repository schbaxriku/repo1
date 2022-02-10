<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LableController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\AjaxController;

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


Route::prefix('admin')->group(function () {

Route::prefix('languages')->group(function () {

Route::get('/',[LanguageController::class,'index'])->name('index');
Route::post('add',[LanguageController::class,'add'])->name('add');
Route::get('edit/{id}',[LanguageController::class,'edit'])->name('edit');
Route::post('update',[LanguageController::class,'update'])->name('update');
Route::get('delete/{id}',[LanguageController::class,'delete'])->name('delete');
});

Route::prefix('lables')->group(function () {
Route::get('/',[LableController::class,'index'])->name('lables.index');
Route::post('store',[LableController::class,'store'])->name('lables.store');
Route::get('edit/{id}',[LableController::class,'edit'])->name('lables.edit');
Route::post('update',[LableController::class,'update'])->name('lables.update');
Route::get('delete/{id}',[LableController::class,'delete'])->name('lables.delete');
});

Route::prefix('registration')->group(function () {
Route::get('/',[RegistrationController::class,'index'])->name('regist.index');
Route::post('store',[RegistrationController::class,'store'])->name('regist.store');
Route::get('edit/{id}',[RegistrationController::class,'edit'])->name('regist.edit');
Route::post('update/{id}',[RegistrationController::class,'update'])->name('regist.update');
Route::get('delete/{id}',[RegistrationController::class,'delete'])->name('regist.delete');

   
   });

	Route::prefix('company')->group(function () {
	    Route::get('/',[CompanyController::class,'index']);
	    Route::get('/add',[CompanyController::class,'add']);
	    Route::post('/store',[CompanyController::class,'store'])->name('company_store');
	});
	Route::prefix('ajax')->group(function () {
	    Route::post('/get-data',[AjaxController::class,'getData'])->name('get_data_by_ajax');
	});

});