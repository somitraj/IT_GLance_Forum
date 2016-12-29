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

Route::get('/logout',['as'=>'logout',function(){Session::flush();return redirect()->route('web.login');}]);


Route::group(['role' => '1', 'prefix' => 'admin', 'middleware' => 'auth.admin'], function () {

    Route::any('/demo', ['type' => 'main', 'icon' => 'fa_fa-home', 'as' => 'Demo@admin', 'uses' => 'Web\UserController@Demo']);
    Route::any('/home', ['type' => 'main', 'icon' => 'fa_fa-home', 'as' => 'Home@admin', 'uses' => 'Web\UserController@ApplicationForm']);
    Route::any('/articles', ['type' => 'main', 'icon' => 'fa_fa-newspaper-o', 'as' => 'Articles@admin', function () {
        return redirect()->route('Articles@Top_Articles@admin');
    }]);


    Route::group(['prefix' => 'articles'], function () {
    Route::any('/toparticles', ['type' => 'sub', 'icon' => 'fa_fa-briefcase', 'as' => 'Articles@Top_Articles@admin', 'uses' => 'Web\UserController@Demo']);

});
    Route::any('/notification', ['type' => 'main', 'icon' => 'fa_fa-home', 'as' => 'Notification@admin', 'uses' => 'Web\NotificationController@UserNotification']);
    Route::any('/memberlist', ['type' => 'main', 'icon' => 'fa_fa-home', 'as' => 'Members@admin', 'uses' => 'Web\UserController@GetMemberList']);
    Route::any('/logout', ['type' => 'main', 'icon' => 'fa_fa-home', 'as' => 'Logout@admin',function(){Session::flush();return redirect()->route('web.login');}]);

    Route::any('/userdetails/{id}', ['as' => 'web.userdetails','uses' => 'Web\UserController@UserDetails']);
    Route::any('/userapprove/{id}', ['as' => 'web.approve','uses' => 'Web\UserController@UserApprove']);
});



