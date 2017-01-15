<?php

namespace IT_Glance_Forum\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use IT_Glance_Forum\Http\Controllers\Controller;
use IT_Glance_Forum\Models\CategoryTbl;
use IT_Glance_Forum\Models\UsertypeTbl;

class ForumController extends Controller
{
    public function GetUserDash(){
        try{
            $data = DB::table('post_tbl')
                ->join('users', 'users.id', '=', 'post_tbl.user_id')
                ->join('userinfo_tbl', 'userinfo_tbl.user_id', '=', 'users.id')
                ->join('category_tbl', 'category_tbl.id', '=', 'post_tbl.category_id')
                ->join('usertype_tbl', 'usertype_tbl.id', '=', 'users.user_type_id')
                ->select('users.*', 'category_tbl.*','userinfo_tbl.*','usertype_tbl.*','post_tbl.*')
                ->where('post_tbl.status_id', '=', 3)
                ->orderBy('post_tbl.created_at','desc')
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
                ->orderBy('post_tbl.created_at','desc')
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

    public function GetAllCategory(){
        $cat=CategoryTbl::all()->toArray();
        return $cat;
    }
    public function GetCurrentRole($utid){
        try{
            $utypeid=UsertypeTbl::where('id','=',$utid)->get()->toArray();
            return $utypeid;
        }
         catch (\Exception $e) {
                    print_r($e->getMessage());
                    die();
                }

    }
    public function GetMyQuestions($id){
        try{
            $myqn = DB::table('post_tbl')
                ->join('users', 'users.id', '=', 'post_tbl.user_id')
                ->join('userinfo_tbl', 'userinfo_tbl.user_id', '=', 'users.id')
                ->join('category_tbl', 'category_tbl.id', '=', 'post_tbl.category_id')
                ->select('users.*', 'category_tbl.*','userinfo_tbl.*','post_tbl.*')
                ->where('post_tbl.user_id', '=', $id)
                ->where('post_tbl.status_id', '=', 3)
                ->orderBy('post_tbl.created_at','desc')
                ->get()->toArray();
            return $myqn;
        }
        catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }

    }
}
