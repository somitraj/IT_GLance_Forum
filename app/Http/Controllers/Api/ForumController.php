<?php

namespace IT_Glance_Forum\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use IT_Glance_Forum\Http\Controllers\Controller;

class ForumController extends Controller
{
    public function GetUserDash(){
        try{
            $data = DB::table('post_tbl')
                ->join('users', 'users.id', '=', 'post_tbl.user_id')
                ->join('userinfo_tbl', 'userinfo_tbl.user_id', '=', 'users.id')
                ->join('category_tbl', 'category_tbl.id', '=', 'post_tbl.category_id')
                ->select('users.*', 'category_tbl.*','userinfo_tbl.*','post_tbl.*')
                ->where('post_tbl.status_id', '=', 3)
                ->get()->toArray();
            return $data;
            /*$user = Users::where('status_id', '=', 1)->get()->toArray();
            return $user;*/
        }
         catch (\Exception $e) {
                    print_r($e->getMessage());
                    die();
                }

    }
    public function GetSpecificPost($id){
        try{
            //return 'hi';
            $data = DB::table('post_tbl')
                ->join('users', 'users.id', '=', 'post_tbl.user_id')
                ->join('userinfo_tbl', 'userinfo_tbl.user_id', '=', 'users.id')
                ->join('category_tbl', 'category_tbl.id', '=', 'post_tbl.category_id')
                ->select('users.*', 'category_tbl.*','userinfo_tbl.*','post_tbl.*')
                ->where('category_tbl.category', '=', $id)
                ->where('post_tbl.status_id', '=', 3)
                ->get()->toArray();
            return $data;
            /*$user = Users::where('status_id', '=', 1)->get()->toArray();
            return $user;*/
        }
        catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }

    }
}
