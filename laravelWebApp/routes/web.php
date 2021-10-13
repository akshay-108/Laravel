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
 //show home page
Route::get('create',[CrudController::class,'create']);
//  insert data in database
Route::post('create',[CrudController::class,'store']);

// fetch data from database
Route::get('create',[CrudController::class,'show']);

// delete data 
Route::get('/{id}',[CrudController::class,'destroy']);

// edit
Route::get('edit/{id}',[CrudController::class,'edit']);

//update
Route::post('edit/{id}',[CrudController::class,'update']);