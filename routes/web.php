<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
 

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BranchesController;
use App\Http\Controllers\LeafsController;
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

Route::middleware(['auth'])->group(function(){
    Route::middleware(['can:isAdmin'])->group(function(){
        Route::resource('category', CategoryController::class);
    });
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});



