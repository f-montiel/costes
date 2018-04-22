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
	Route::get('/', function () {
	    return view('index');
	});

	Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
	Route::resource('product','ProductController')->middleware('auth');

	Route::resource('recipe','RecipeController')->middleware('auth');
	Route::resource('measurement', 'MeasurementController')->middleware('auth');
	Route::resource('ingredient', 'IngredientController')->middleware('auth');

	Route::get('ingredientrecipe/create/{id}', 'IngredientRecipeController@create')->name('ingredientrecipe.create')->middleware('auth');
	route::post('ingredientrecipe', 'IngredientRecipeController@store')->name('ingredientrecipe.store')->middleware('auth');
	route::delete('ingredientrecipe/{id}', 'IngredientRecipeController@destroy')->name('ingredientrecipe.destroy')->middleware('auth');

	Route::resource('production', 'ProductionController')->middleware('auth');
	Route::get('movement', 'MovementController@index')->name('movement.index')->middleware('auth');

	Route::resource('client', 'ClientController')->middleware('auth');

	Route::resource('sale', 'SaleController')->middleware('auth');
	
	Auth::routes();

