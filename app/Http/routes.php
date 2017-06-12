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


Route::get('/', 'UserController@loginShow');

/* 个人中心部分 */

Route::any('loginShow', 'UserController@loginShow');
Route::any('registerShow', 'UserController@registerShow');
Route::any('loginOutShow', 'UserController@loginOutShow');


Route::any('login', 'UserController@login');
Route::any('register', 'UserController@register');
Route::any('loginOut', 'UserController@loginOut');

Route::any('signOut', 'UserController@signOut');



/* 文章部分 */

Route::get('artMain/{id}', 'ArticleController@art');
Route::any('artShow', 'ArticleController@show');
Route::any('artAdd', 'ArticleController@add');
Route::any('artDetail/{id}', 'ArticleController@detail');
Route::any('artStore', 'ArticleController@store');
Route::any('artEdit/{id}', 'ArticleController@edit');
Route::any('artUpdate/{id}', 'ArticleController@update');
Route::any('artDelete/{id}', 'ArticleController@delete');
Route::any('artViewCount', 'ArticleController@viewCount');
Route::any('/editor', function () {
    return view('/laravel-u-editor/indexEditor');
});

//Route::any('/register', function () {
//    return view('/auth/register');
//});

Route::any('snow', 'TestContrller@index');



