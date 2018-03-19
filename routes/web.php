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