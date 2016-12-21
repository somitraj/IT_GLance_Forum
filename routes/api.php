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
$api->version('v1',['namespace'=>"IT_Glance_Forum\Http\Controllers\Api"], function ($api) {
    $api->any('appsubmit', 'UserController@ApplicationSubmit');
    $api->any('login', 'LoginController@Login');
    $api->get('country', 'AddressController@GetCountry');
    $api->get('province', 'AddressController@GetProvince');
    $api->get('zone', 'AddressController@GetZone');
    $api->get('district', 'AddressController@GetDistrict');
    $api->get('city', 'AddressController@GetCity');

});
