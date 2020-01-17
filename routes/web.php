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

Route::get('/', 'RelationController@index');
Route::get('/rel/{id?}', 'RelationController@rel');
Route::get('/menytomenyrel/{id?}', 'RelationController@menytomenyrel');
Route::get('/userprofile/{id?}', 'RelationController@userprofile');
Route::get('/userposts/{id?}', 'RelationController@userposts');
