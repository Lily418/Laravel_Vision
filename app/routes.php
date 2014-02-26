<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('image/upload_form', 'ImageController@trainUploadForm');
Route::get('image/identify_form', 'ImageController@identifyUploadForm');
Route::post('image/', 'ImageController@uploadImage');
Route::post('image/identify', 'ImageController@identify');
Route::get('image/{id}', 'ImageController@getImage');
Route::get('/', 'BaseController@homePage');