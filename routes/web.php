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



Auth::routes();
Route::group(['middleware'=>['web','auth']], function(){
    Route::get('/home', 'HomeController@check');
});
Route::post('register', 'Auth\RegisterController@store_avatar');
Route::get('profile', 'UserController@profile');

Route::get('/', 'ForumController@index');
Route::post('searchcontent', 'ForumController@searchcontent');
Route::resource('forum','ForumController');
Route::get('forum/{forum}/close', 'ForumController@close');
Route::get('myforum/{user}', 'MyforumController@index');

Route::get('thread/{forum}', 'ThreadController@index');
Route::post('thread/{forum}/searchthread', 'ThreadController@searchthread');
Route::post('thread/{forum}?search_keyword={thread}'. 'ThreadController@search_thread');
Route::post('thread/{forum}', 'ThreadController@store');
Route::get('thread/{id}/edit', 'ThreadController@edit');
Route::put('thread/{id}/update', 'ThreadController@update');
Route::get('thread/{id}/delete', 'ThreadController@destroy');
