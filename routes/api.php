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
    $api->get('getcategory', 'ForumController@GetAllCategory');
    $api->get('getcurrentrole/{utid}', 'ForumController@GetCurrentRole');
    $api->get('getmyquestions/{id}', 'ForumController@GetMyQuestions');
    $api->get('language', 'AddressController@GetLanguage');
    $api->any('userdash', 'ForumController@GetUserDash');
    $api->any('getspecificpost/{id}', 'ForumController@GetSpecificPost');
    $api->any('usernotice', 'NotificationController@GetUserNotice');
    $api->any('changeprofileimage', 'ImageController@ChangeProfileImage');
    $api->any('postnotice', 'NotificationController@GetPostNotice');
    $api->any('usertypelist', 'UserController@GetUserTypeList');
    $api->any('userdetails/{id}', 'UserController@GetUserDetails');
    $api->any('postdetails/{id}', 'PostController@GetPostDetails');
    $api->any('allmemberlist', 'UserController@GetAllMemberList');
    $api->any('internlist', 'UserController@GetInternList');
    $api->any('adminlist', 'UserController@GetAdminList');
    $api->any('mentorlist', 'UserController@GetMentorList');
    $api->any('submentorlist', 'UserController@GetSubMentorList');
    $api->any('userapprove/{id}', 'UserController@UserApprove');
    $api->any('postapprove/{id}', 'PostController@PostApprove');
    $api->any('forumpost', 'PostController@ForumPost');
    $api->any('eventpost', 'EventController@PostEvent');
    $api->any('getevent', 'EventController@GetEvent');
    $api->any('getuserprofile', 'UserController@GetUserProfile');
    $api->any('commituseredit', 'UserController@CommitUserEdit');
});
