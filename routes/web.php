<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmpolyeeController;
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

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout']);
Route::get('add_company_view',[AdminController::class,'addview']);
Route::post('upload_company',[AdminController::class,'upload']);
Route::get('show_company',[AdminController::class,'showcompany']);
Route::get('delete_company/{id}',[AdminController::class,'delete']);
Route::get('update_company/{id}',[AdminController::class,'update']);
Route::post('edit_company/{id}',[AdminController::class,'edit']);
Route::get('add_employee_view',[EmpolyeeController::class,'employeeview']);
Route::post('upload_employee',[EmpolyeeController::class,'upload']);
Route::get('show_employee',[EmpolyeeController::class,'showemployee']);
Route::get('delete_employee/{id}',[EmpolyeeController::class,'delete']);
Route::get('update_employee/{id}',[EmpolyeeController::class,'update']);
Route::post('edit_employee/{id}',[EmpolyeeController::class,'edit']);
