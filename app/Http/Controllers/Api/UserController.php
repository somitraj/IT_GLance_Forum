<?php

namespace IT_Glance_Forum\Http\Controllers\api;

use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use IT_Glance_Forum\Http\Controllers\Controller;
use IT_Glance_Forum\Models\AddressTbl;
use IT_Glance_Forum\Models\UserinfoTbl;
use IT_Glance_Forum\Models\UsersTbl;


/**
 * Class UserController
 * @package IT_Glance_Forum\Http\Controllers\api
 */
class UserController extends Controller
{
    /**
     * @param Request $request
     * @throws \Exception
     */
    public function ApplicationSubmit(Request $request){
        try{
            $user = new UsersTbl();
            $user->setAttribute('email', $request->get('email'));
            $user->status_id = 0;
            $user->save();

            $address= new AddressTbl();
            $address->country_id = $request->country_id;
            $address->province_id = $request->province_id;
            $address->zone_id = $request->zone_id;
            $address->district_id = $request->district_id;
            $address->city_id = $request->city_id;


            $userinfo = new UserinfoTbl();
            $userinfo->setAttribute('fname', $request->get('fname'));
            $userinfo->setAttribute('mname', $request->get('mname'));
            $userinfo->setAttribute('lname', $request->get('lname'));
            $userinfo->setAttribute('dob', $request->get('dob'));
            $userinfo->setAttribute('gender', $request->get('gender'));
            /*$userinfo->setAttribute('email', $user->email);*/
            $userinfo->phone_no = $request->phone_no;
            $userinfo->mobile_no = $request->mobile_no;
            $userinfo->setAttribute('college', $request->get('college'));
            /*$userinfo->course_type_id = $request->course_type_id;
            $userinfo->language_type_id = $request->language_type_id;*/
            $userinfo->setAttribute('whylanguage', $request->get('whylanguage'));
            $userinfo->address_id=$address->id;
            $userinfo->save();

        }
        catch (\Exception $e) {
            throw $e;
        }
    }
}

