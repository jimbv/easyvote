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

Route::get('/', 'App\Http\Controllers\IndexController@index')->name('index'); 
Route::get('/create','App\Http\Controllers\IndexController@index')->name('create');   

Route::post('/create','App\Http\Controllers\IndexController@create')->name('create');   
Route::post('/vote','App\Http\Controllers\IndexController@vote')->name('vote');   
Route::post('/view','App\Http\Controllers\IndexController@view')->name('view');   
Route::view('/error', 'error');    

Route::get('/vote/{code}/','App\Http\Controllers\IndexController@vote')->name('vote'); 
Route::get('/question/{code}/','App\Http\Controllers\IndexController@question')->name('question'); 