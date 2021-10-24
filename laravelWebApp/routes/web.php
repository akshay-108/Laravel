<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\AdminController;
use App\Models\crud;
use App\Models\admin;

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


//  insert data in database
Route::post('create',[CrudController::class,'store']);
// user check 
Route::post('usercheck',[CrudController::class,'userCheck'])->name('usercheck');
 // user logout
 Route::get('userlogout',[CrudController::class,'logout'])->name('userlogout');




// middleware
Route::group(['middleware'=>['checkUser']],function()
{
     //show home page
    Route::get('create',[CrudController::class,'create'])->name('create');
    // user login
    Route::get('userlogin',[CrudController::class,'getLogData'])->name('userlogin');
    // after session generate 
    Route::get('profile',[CrudController::class,'profile']);
});




// admin panel
Route::get('admin',[AdminController::class,'index'])->name('admin.login');

Route::post('admin',[AdminController::class,'checkAdminData']);

// fetch data from database
Route::get('read',[AdminController::class,'show']);

// delete data 
Route::get('delete/{id}',[AdminController::class,'destroy']);

// edit
Route::get('read/{id}',[AdminController::class,'edit']);

//update
Route::post('/read',[AdminController::class,'update']);











