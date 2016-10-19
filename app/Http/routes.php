<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/post','PostsController');
Route::get('/comments','CommentsController@index');
Route::get('/comments/{id}','CommentsController@index');
Route::get('/comments/create','CommentsController@create');
Route::post('/comments','CommentsController@store');
Route::get('/comments/{id}/edit','CommentsController@edit');
Route::put('/comments/{id}','CommentsController@update');
/*
Route::get('/post','PostsController@index');
Route::get('/post/create','PostsController@create');
Route::post('/post','PostsController@store');
Route::get('/post/{id}','PostsController@show');
Route::get('/post/{id}/edit','PostsController@edit');
Route::put('/post/{id}','PostsController@update');
Route::delete('/post/{id}','PostsController@destroy');
*/
//Route::get metodo
//'/post',  urlº
//'PostsController@index' controlador
