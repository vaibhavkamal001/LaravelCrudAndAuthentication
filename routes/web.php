<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudOperation;

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


Route::middleware(['auth'])->group(function () {
    Route::get('home',[CrudOperation::class,"dashboard"])->name("dashboard");
    
    Route::Delete("delete/{id}",[CrudOperation::class,"Delete"])->name("delete");
    
    Route::Post("addtask",[CrudOperation::class,'addTask'])->name('addTask');

    Route::Get("logout",[CrudOperation::class,'logOut'])->name("logOut");   
   
});

Route::middleware(['guest'])->group(function () {

    Route::Post("register",[CrudOperation::class,"register"])->name("register");
    
    Route::Post("login",[CrudOperation::class,"login"])->name("login");
    
    Route::get("login",[CrudOperation::class,"showlogin"])->name("showlogin");
    
    Route::get("register",[CrudOperation::class,"showRegister"])->name("showRegister");

});



