<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/goods/{good}/sheets', 'SheetsController@index');
Route::post('/goods/{good}/sheets', 'SheetsController@store');
Route::get('/goods/{good}/sheets/{sheet}', 'SheetsController@show');
Route::put('/goods/{good}/sheets/{sheet}', 'SheetsController@update');
Route::delete('/goods/{good}/sheets/{sheet}', 'SheetsController@destroy');

Route::get('/sheets/{sheet}/products', 'ProductsController@index');
Route::post('/sheets/{sheet}/products', 'ProductsController@store');
Route::get('/sheets/{sheet}/products/{product}', 'ProductsController@show');
Route::put('/sheets/{sheet}/products/{product}', 'ProductsController@update');
Route::delete('/sheets/{sheet}/products/{product}', 'ProductsController@destroy');

Route::get('/departments', 'DepartmentsController@index');
Route::post('/departments', 'DepartmentsController@index');
Route::get('/departments', 'DepartmentsController@index');
Route::put('/departments', 'DepartmentsController@index');
Route::delete('/departments', 'DepartmentsController@index');

Route::get('/departments', 'DepartmentsController@index');
Route::get('/departments/{department}/goods', 'GoodsController@index');
Route::get('/goods/{good}', 'GoodsController@show');
Route::get('/goods/{good}/skus', 'SKUsController@index');
Route::get('/goods/{good}/skus/{sku}', 'SKUsController@show');

