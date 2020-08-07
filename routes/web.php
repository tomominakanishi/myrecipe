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

Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {
    Route::get('recipe/create', 'Admin\RecipeController@add');
    Route::post('recipe/create', 'Admin\RecipeController@create');
    Route::get('recipe/edit', 'Admin\RecipeController@edit'); 
    Route::post('recipe/edit', 'Admin\RecipeController@update');
    Route::get('recipe', 'Admin\RecipeController@index');
    Route::get('recipe', 'Admin\RecipeController@delete');
    Route::get('category/create','Admin\CategoryController@add');
    Route::post('category/create','Admin\CategoryController@create');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
