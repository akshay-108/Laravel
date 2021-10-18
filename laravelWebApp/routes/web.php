<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Models\crud;

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

Route::get('/register', function () {
    return view('auth.register');
});
 //show home page
Route::get('create',[CrudController::class,'create']);
//  insert data in database
Route::post('create',[CrudController::class,'store']);

// fetch data from database
Route::get('read',[CrudController::class,'show']);

// delete data 
Route::get('delete/{id}',[CrudController::class,'destroy']);

// edit
Route::get('read/{id}',[CrudController::class,'edit']);

//update
Route::put('read',[CrudController::class,'update']);
















Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
