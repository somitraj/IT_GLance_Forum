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

Route::any('/applicationform', [
    'as' => 'web.application',
    'uses' => 'Web\UserController@ApplicationForm'
]);
Route::any('/loginform', [
    'as' => 'web.login',
    'uses' => 'Web\LoginController@Login'
]);

Route::any('/demo', [
    'as' => 'web.demo',
    'uses' => 'Web\UserController@Demo'
]);

Route::group(['role' => '1', 'prefix' => 'admin', 'middleware' => 'admin.role'], function () {
    Route::any('/home', ['type' => 'main', 'icon' => 'fa_fa-home', 'as' => 'Home@admin', 'uses' => 'Web\UserController@ApplicationForm']);
    Route::any('/articles', ['type' => 'main', 'icon' => 'fa_fa-newspaper-o', 'as' => 'Articles@admin', function () {
        return redirect()->route('Articles@Top_Articles@admin');
    }]);

});
Route::group(['prefix' => 'articles'], function () {
    Route::any('/toparticles', ['type' => 'sub', 'icon' => 'fa_fa-briefcase', 'as' => 'Articles@Top_Articles@admin', 'uses' => 'Web\LoginController@LoginForm']);

});




