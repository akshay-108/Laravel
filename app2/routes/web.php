<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Crud2Controller;

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

Route::get('insert',[Crud2Controller::class,'index']);

//insert data
Route::post('insert',[Crud2Controller::class,'store']);

// fetch data
Route::get('insert',[Crud2Controller::class,'show']);
