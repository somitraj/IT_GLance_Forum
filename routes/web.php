<?php

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
Route::get('/logout', ['as' => 'logout', function () {
    Session::flush();
    return redirect()->route('web.login');
}]);


Route::group(['role' => '1', 'prefix' => 'admin', 'middleware' => 'auth.admin'], function () {

    /*    Route::any('/demo', ['type' => 'main', 'icon' => 'fa_fa-home', 'as' => 'Demo@admin', 'uses' => 'Web\UserController@Demo']);*/
    Route::any('/home', ['type' => 'main', 'icon' => 'fa_fa-home', 'as' => 'Home@admin', 'uses' => 'Web\ForumController@Home']);

    Route::any('/articles', ['type' => 'main', 'icon' => 'fa_fa-newspaper-o', 'as' => 'Articles@admin', function () {
        return redirect()->route('Articles@Top_Articles@admin');
    }]);
    Route::group(['prefix' => 'articles'], function () {
        Route::any('/toparticles', ['type' => 'sub', 'icon' => 'fa_fa-briefcase', 'as' => 'Articles@Top_Articles@admin', 'uses' => 'Web\UserController@Home']);
    });

    Route::any('/event', ['type' => 'main', 'icon' => 'glyphicon_glyphicon-calendar', 'as' => 'Event@admin', 'uses' => 'Web\PostController@PostEvent']);
    Route::any('/notification', ['type' => 'main', 'icon' => 'fa_fa-envelope', 'as' => 'Notification@admin', 'uses' => 'Web\NotificationController@UserNotification']);
    Route::any('/profile', ['type' => 'main', 'icon' => 'fa_fa-user', 'as' => 'My_Profile@admin', 'uses' => 'Web\UserController@GetUserProfile']);
    Route::any('/usersettings', ['as' => 'UserSettings@admin', 'uses' => 'Web\UserController@UserProfileSettings']);
    Route::any('/userprojects', ['as' => 'UserProjects@admin', 'uses' => 'Web\UserController@UserProfileProjects']);
    Route::any('/useractivities', ['as' => 'UserActivities@admin', 'uses' => 'Web\UserController@UserProfileActivities']);
    Route::any('/memberlist', ['type' => 'main', 'icon' => 'fa_fa-group', 'as' => 'Members@admin', 'uses' => 'Web\UserController@GetMemberList']);
    Route::any('/internlist', ['icon' => 'fa_fa-home', 'as' => 'Interns@admin', 'uses' => 'Web\UserController@GetInternList']);
    Route::any('/internlist', ['icon' => 'fa_fa-home', 'as' => 'Interns@admin', 'uses' => 'Web\UserController@GetInternList']);
    Route::any('/adminlist', ['icon' => 'fa_fa-home', 'as' => 'Admin@admin', 'uses' => 'Web\UserController@GetAdminList']);
    Route::any('/mentorlist', ['icon' => 'fa_fa-home', 'as' => 'Mentor@admin', 'uses' => 'Web\UserController@GetMentorList']);
    Route::any('/submentorlist', ['icon' => 'fa_fa-home', 'as' => 'Submentor@admin', 'uses' => 'Web\UserController@GetSubMentorList']);
    Route::any('/logout', ['type' => 'main', 'icon' => 'fa_fa-sign-out', 'as' => 'Logout@admin', function () {
        Session::flush();
        return redirect()->route('web.login');
    }]);

    Route::any('/userdetails/{id}', ['as' => 'Userdetails@admin', 'uses' => 'Web\UserController@UserDetails']);
    Route::any('/postdetails/{id}', ['as' => 'Postdetails@admin', 'uses' => 'Web\PostController@PostDetails']);
    Route::any('/userapprove/{id}', ['as' => 'Approve@admin', 'uses' => 'Web\UserController@UserApprove']);
    Route::any('/postapprove/{id}', ['as' => 'PostApprove@admin', 'uses' => 'Web\PostController@PostApprove']);
    Route::any('/post', ['as' => 'Post@admin', 'uses' => 'Web\PostController@Post']);
    Route::any('/postnotice', ['as' => 'Postnotice@admin', 'uses' => 'Web\NotificationController@GetPostNotice']);
    Route::any('/imageupload', ['as' => 'ImageUpload@admin', 'uses' => 'Web\ImageController@ImageUploadPost']);
    Route::any('/eventnotice', ['as' => 'Eventnotice@admin', 'uses' => 'Web\NotificationController@GetEventNotice']);
    Route::any('/specificpost/{id}', ['as' => 'SpecificPost@admin', 'uses' => 'Web\ForumController@GetSpecificPost']);
});


Route::group(['role' => '2', 'prefix' => 'mentor', 'middleware' => 'auth.mentor'], function () {

    Route::any('/home', ['type' => 'main', 'icon' => 'fa_fa-home', 'as' => 'Home@mentor', 'uses' => 'Web\ForumController@Home']);
    Route::any('/event', ['type' => 'main', 'icon' => 'glyphicon_glyphicon-calendar', 'as' => 'Event@mentor', 'uses' => 'Web\PostController@PostEvent']);
    Route::any('/profile', ['type' => 'main', 'icon' => 'fa_fa-user', 'as' => 'My_Profile@mentor', 'uses' => 'Web\UserController@GetUserProfile']);
    Route::any('/imageupload', ['as' => 'ImageUpload@mentor', 'uses' => 'Web\ImageController@ImageUploadPost']);
    Route::any('/usersettings', ['as' => 'UserSettings@mentor', 'uses' => 'Web\UserController@UserProfileSettings']);
    Route::any('/specificpost/{id}', ['as' => 'SpecificPost@mentor', 'uses' => 'Web\ForumController@GetSpecificPost']);
    Route::any('/userprojects', ['as' => 'UserProjects@mentor', 'uses' => 'Web\UserController@UserProfileProjects']);
    Route::any('/useractivities', ['as' => 'UserActivities@mentor', 'uses' => 'Web\UserController@UserProfileActivities']);
    Route::any('/post', ['as' => 'Post@mentor', 'uses' => 'Web\PostController@Post']);

    Route::any('/logout', ['type' => 'main', 'icon' => 'fa_fa-sign-out', 'as' => 'Logout@mentor', function () {
        Session::flush();
        return redirect()->route('web.login');
    }]);

});


Route::group(['role' => '4', 'prefix' => 'intern', 'middleware' => 'auth.intern'], function () {

    Route::any('/home', ['type' => 'main', 'icon' => 'fa_fa-home', 'as' => 'Home@intern', 'uses' => 'Web\ForumController@Home']);

    Route::any('/articles', ['type' => 'main', 'icon' => 'fa_fa-newspaper-o', 'as' => 'Articles@intern', function () {
        return redirect()->route('Articles@Top_Articles@intern');
    }]);
    Route::group(['prefix' => 'articles'], function () {
        Route::any('/toparticles', ['type' => 'sub', 'icon' => 'fa_fa-briefcase', 'as' => 'Articles@Top_Articles@intern', 'uses' => 'Web\UserController@Home']);

    });

    Route::any('/notification', ['type' => 'main', 'icon' => 'fa_fa-home', 'as' => 'Notification@intern', 'uses' => 'Web\NotificationController@UserNotification']);
    Route::any('/memberlist', ['type' => 'main', 'icon' => 'fa_fa-group', 'as' => 'Members@intern', 'uses' => 'Web\UserController@GetMemberList']);
    Route::any('/profile', ['type' => 'main', 'icon' => 'fa_fa-user', 'as' => 'My_Profile@intern', 'uses' => 'Web\UserController@GetUserProfile']);
    Route::any('/imageupload', ['as' => 'ImageUpload@intern', 'uses' => 'Web\ImageController@ImageUploadPost']);
    Route::any('/usersettings', ['as' => 'UserSettings@intern', 'uses' => 'Web\UserController@UserProfileSettings']);
    Route::any('/userprojects', ['as' => 'UserProjects@intern', 'uses' => 'Web\UserController@UserProfileProjects']);
    Route::any('/useractivities', ['as' => 'UserActivities@intern', 'uses' => 'Web\UserController@UserProfileActivities']);
    Route::any('/logout', ['type' => 'main', 'icon' => 'fa_fa-sign-out', 'as' => 'Logout@intern', function () {
        Session::flush();
        return redirect()->route('web.login');
    }]);
    Route::any('/post', ['as' => 'Post@intern', 'uses' => 'Web\PostController@Post']);
    Route::any('/specificpost/{id}', ['as' => 'SpecificPost@intern', 'uses' => 'Web\ForumController@GetSpecificPost']);
});


Route::group(['role' => '3', 'prefix' => 'submentor', 'middleware' => 'auth.submentor'], function () {

    Route::any('/home', ['type' => 'main', 'icon' => 'fa_fa-home', 'as' => 'Home@submentor', 'uses' => 'Web\ForumController@Home']);
    Route::any('/event', ['type' => 'main', 'icon' => 'glyphicon_glyphicon-calendar', 'as' => 'Event@submentor', 'uses' => 'Web\PostController@PostEvent']);

    Route::any('/articles', ['type' => 'main', 'icon' => 'fa_fa-newspaper-o', 'as' => 'Articles@submentor', function () {
        return redirect()->route('Articles@Top_Articles@intern');
    }]);
    Route::group(['prefix' => 'articles'], function () {
        Route::any('/toparticles', ['type' => 'sub', 'icon' => 'fa_fa-briefcase', 'as' => 'Articles@Top_Articles@submentor', 'uses' => 'Web\UserController@Home']);

    });

    Route::any('/memberlist', ['type' => 'main', 'icon' => 'fa_fa-group ', 'as' => 'Members@submentor', 'uses' => 'Web\UserController@GetMemberList']);
    Route::any('/profile', ['type' => 'main', 'icon' => 'fa_fa-user', 'as' => 'My_Profile@submentor', 'uses' => 'Web\UserController@GetUserProfile']);
    Route::any('/imageupload', ['as' => 'ImageUpload@submentor', 'uses' => 'Web\ImageController@ImageUploadPost']);
    Route::any('/usersettings', ['as' => 'UserSettings@submentor', 'uses' => 'Web\UserController@UserProfileSettings']);
    Route::any('/userprojects', ['as' => 'UserProjects@submentor', 'uses' => 'Web\UserController@UserProfileProjects']);
    Route::any('/useractivities', ['as' => 'UserActivities@submentor', 'uses' => 'Web\UserController@UserProfileActivities']);
    Route::any('/logout', ['type' => 'main', 'icon' => 'fa_fa-sign-out', 'as' => 'Logout@submentor', function () {
        Session::flush();
        return redirect()->route('web.login');
    }]);
    Route::any('/post', ['as' => 'Post@submentor', 'uses' => 'Web\PostController@Post']);
    Route::any('/postnotice', ['icon' => 'fa_fa-home', 'as' => 'Postnotice@submentor', 'uses' => 'Web\NotificationController@GetPostNotice']);
    Route::any('/specificpost/{id}', ['as' => 'SpecificPost@submentor', 'uses' => 'Web\ForumController@GetSpecificPost']);
});




