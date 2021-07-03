<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\ChangePasswordController;


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

Route::get('/', [PostController::class,'signup'])
    ->name('signup');
Route::get('/puls', [PostController::class,'puls'])
    ->name('puls');
Route::post('/store', [PostController::class,'store'])
    ->name('store');

Route::delete('{pet}/destroy', [PostController::class,'destroy'])
    ->name('destroy')
    ->where('post','[0-9]+');
Route::delete('withdrawal', [HomeController::class,'withdrawal'])
    ->name('withdrawal');
Route::delete('morning-back', [PostController::class,'morning'])
    ->name('morning-back');
Route::delete('noon-back', [PostController::class,'noon'])
    ->name('noon-back');
Route::delete('night-back', [PostController::class,'night'])
    ->name('night-back');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])
    ->name('home');
Route::get('guest', [LoginController::class,'guestLogin'])
    ->name('login.guest');
Route::post('breakfast', [HomeController::class,'breakfast'])
    ->name('breakfast');
Route::post('lunch', [HomeController::class,'lunch'])
    ->name('lunch');
Route::post('dinner', [HomeController::class,'dinner'])
    ->name('dinner');


Route::post('chart', [HomeController::class,'chart'])
    ->name('chart');
Route::post('morning', [HomeController::class,'morning'])
    ->name('morning');
Route::post('noon', [HomeController::class,'noon'])
    ->name('noon');
Route::post('night', [HomeController::class,'night'])
    ->name('night');
Route::post('change', [HomeController::class,'change'])
    ->name('change');


Route::get('/password/change', [ChangePasswordController::class,'edit']);
Route::patch('/password/change',[ChangePasswordController::class,'update'])
    ->name('password.change');









