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
Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware'=>['web','auth']], function(){
    
    Route::get('/home', 'HomeController@check');

});

Route::get('profile', 'UserController@profile');
Route::post('register', 'Auth\RegisterController@store_avatar');
Route::resource('/forum','ForumController');

