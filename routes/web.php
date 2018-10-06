<?php

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


Route::get('todos', 'TodoController@index')->name('todos.index')->middleware('auth');
Route::get('todos/create', 'TodoController@create')->name('todos.create')->middleware('auth');
Route::post('todos', 'TodoController@store')->name('todos.store')->middleware('auth');
Route::delete('todos/{id}', 'TodoController@destroy')->name('todos.destroy')->middleware('auth');
Route::patch('todos/{id}', 'TodoController@toggle')->name('todos.toggle')->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


