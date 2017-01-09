<?php

namespace IT_Glance_Forum\Http\Controllers\Api;

use Illuminate\Http\Request;
use IT_Glance_Forum\Http\Controllers\Controller;
use IT_Glance_Forum\Models\UserinfoTbl;

class ImageController extends Controller
{
    public function ChangeProfileImage(Request $request){
        try{
            $uid=$request->get('uid');
            $image=$request->get('image');
           // return $image;
            $userinfo=UserinfoTbl::where('user_id','=',$uid)->first();
            if(!$userinfo){
                $userinfo = new UserinfoTbl();//model ko User ko object create
            }
            $userinfo->profile_image = $image;  //setting data from form to table column
            $userinfo->save();
        }
         catch (\Exception $e) {
                    print_r($e->getMessage());
                    die();
                }

    }
}
