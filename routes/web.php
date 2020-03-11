<?php

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

Route::get('/',"UsersController@index")->name('home');
Route::get('/addUser',"UsersController@create")->name('addUser');
Route::get('/dowload/{id}',"UsersController@show")->name('download');
Route::post('/saveUser',"UsersController@store")->name('saveUser');
Route::get('/deleteUser/{id}',"UsersController@destroy")->name('deleteUser');