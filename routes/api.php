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

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', ['namespace' => "IT_Glance_Forum\Http\Controllers\Api"], function ($api) {
    $api->any('appsubmit', 'UserController@ApplicationSubmit');
    $api->any('login', 'LoginController@Login');
    $api->get('country', 'AddressController@GetCountry');
    $api->get('province', 'AddressController@GetProvince');
    $api->get('zone', 'AddressController@GetZone');
    $api->get('district', 'AddressController@GetDistrict');
    $api->get('city', 'AddressController@GetCity');
    $api->get('course', 'AddressController@GetCourse');
    $api->get('category', 'AddressController@GetCategory');
    $api->get('language', 'AddressController@GetLanguage');
    $api->any('usernotice', 'NotificationController@GetUserNotice');
    $api->any('postnotice', 'NotificationController@GetPostNotice');
    $api->any('eventnotice', 'NotificationController@GetEventNotice');
    $api->any('usertypelist', 'UserController@GetUserTypeList');
    $api->any('userdetails/{id}', 'UserController@GetUserDetails');
    $api->any('postdetails/{id}', 'PostController@GetPostDetails');
    $api->any('allmemberlist', 'UserController@GetAllMemberList');
    $api->any('internlist', 'UserController@GetInternList');
    $api->any('userapprove/{id}', 'UserController@UserApprove');
    $api->any('postapprove/{id}', 'PostController@PostApprove');
    $api->any('forumpost', 'PostController@ForumPost');
    $api->any('eventpost', 'PostController@PostEvent');

});
