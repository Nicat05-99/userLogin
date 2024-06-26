<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ShowController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index',[IndexController::class,'index']);
Route::get('/register',[RegisterController::class,'registerIndex'])->name('register-index');
Route::post('/usercreate',[RegisterController::class,'userCreate'])->name('user-create');
Route::get('/confirmation_email_code',[RegisterController::class,'confirmation'])->name('confirmation');
Route::get('/show',[ShowController::class,'show']);

//nicat