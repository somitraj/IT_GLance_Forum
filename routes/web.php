<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::any('/applicationform',[
    'as'=>'web.application',
    'uses'=>'web\UserController@ApplicationForm'
]);
Route::any('/loginform',[
    'as'=>'web.login',
    'uses'=>'web\LoginController@Login'
]);

Route::group(['usertype'=>'1','middleware'=>'admin.role'],function()
{
    Route::any('/applicationform',[
        'as'=>'web.application',
        'uses'=>'web\UserController@ApplicationForm'
    ]);
});

Route::group(['usertype'=>'2','middleware'=>'mentor.role'],function()
{
    Route::any('/applicationform',[
        'as'=>'web.application',
        'uses'=>'web\UserController@ApplicationForm'
    ]);
});

Route::group(['usertype'=>'3','middleware'=>'submentor.role'],function()
{
    Route::any('/applicationform',[
        'as'=>'web.application',
        'uses'=>'web\UserController@ApplicationForm'
    ]);
});

Route::group(['usertype'=>'4','middleware'=>'intern.role'],function()
{
    Route::any('/applicationform',[
        'as'=>'web.application',
        'uses'=>'web\UserController@ApplicationForm'
    ]);
});
