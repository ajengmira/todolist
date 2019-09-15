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

/**
* Show Todo Dashboard
*/

Route::get('/', 'TodoController@index');

/**
 * Add Todo
 */
Route::post('/todos/save','TodoController@save');

/**
 * Add Todo
 */
Route::post('/todos/del','TodoController@del');

/**
 * Add Todo
 */
Route::post('/todos/dels','TodoController@dels');


/**
 *  Show create todo form
 */
Route::get('/todos/create', 'TodoController@create');

/**
 * Add Todo
 */
Route::post('/todos','TodoController@store');

/**
 * Show edit todo
 */
Route::get('todos/{todo}/edit', 'TodoController@edit');

/**
 * update todo
 */
Route::put('todos/{todo}', 'TodoController@update');

/**
 * Delete Todo
 */
Route::get('/todos/{todo}/delete', 'TodoController@delete');
