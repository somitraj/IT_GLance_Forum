<?php

namespace IT_Glance_Forum\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use IT_Glance_Forum\Http\Controllers\Controller;
use IT_Glance_Forum\Models\Users;

/**
 * Class NotificationController
 * @package IT_Glance_Forum\Http\Controllers\Api
 */
class NotificationController extends Controller
{
    /**
     * @return mixed
     */
    public function GetUserNotice()
    {
        try {
            $user = DB::table('users')
                ->join('userinfo_tbl', 'userinfo_tbl.user_id', '=', 'users.id')
                ->select('userinfo_tbl.*', 'users.*')
                ->where('users.status_id', '=', 0)
                ->get()->toArray();

            return $user;

            /* $user = Users::where('status_id', '=', 0)->get()->toArray();
             return $user;*/
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }

    }

    /**
     * @return mixed
     */
    public function GetPostNotice()
    {
        try {
            $posts = DB::table('users')
                ->join('post_tbl', 'post_tbl.user_id', '=', 'users.id')
                ->join('category_tbl', 'category_tbl.id', '=', 'post_tbl.category_id')
                ->select('category_tbl.*', 'users.*', 'post_tbl.*')
                ->where('post_tbl.status_id', '=', 4)
                ->get()->toArray();

            return $posts;

        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }

    }

    /**
     * @return mixed
     */

}
