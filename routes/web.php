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

Route::resource('product','ProductController');

Route::resource('recipe','RecipeController');
Route::resource('measurement', 'MeasurementController');
Route::resource('ingredient', 'IngredientController');

Route::get('ingredientrecipe/create/{id}', 'IngredientRecipeController@create')->name('ingredientrecipe.create');
route::post('ingredientrecipe', 'IngredientRecipeController@store')->name('ingredientrecipe.store');
route::delete('ingredientrecipe/{id}', 'IngredientRecipeController@destroy')->name('ingredientrecipe.destroy');

Route::resource('production', 'ProductionController');