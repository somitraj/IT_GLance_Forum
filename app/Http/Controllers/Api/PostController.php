<?php

namespace IT_Glance_Forum\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use IT_Glance_Forum\Http\Controllers\Controller;
use IT_Glance_Forum\Models\EventTbl;
use IT_Glance_Forum\Models\PostTbl;

/**
 * Class PostController
 * @package IT_Glance_Forum\Http\Controllers\Api
 */
class PostController extends Controller
{
    /**
     * @param Request $request
     */
    public function ForumPost(Request $request)
    {
        try {
           //return $request->all();
            $uid = $request->get('uid');
            //return $uid;
            $title = $request->get('posttitle');
            $body = $request->get('postbody');
            //return $body;
            $cid = $request->get('category_id');



            $pos = new PostTbl();
            $pos->setAttribute('post_title', $title);
            $pos->setAttribute('post_body', $body);
            $pos->category_id = $cid;
            $pos->status_id = 4;
            $pos->setAttribute('user_id', $uid);
            $pos->save();

        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }

    }

    /**
     * @param $id
     * @return mixed
     */
    public function GetPostDetails($id)
    {
        try {
            $postdetails = PostTbl::where('id', '=', $id)
                ->first();
            return $postdetails;
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }

    }

    /**
     * @param $id
     */
    public function PostApprove($id)
    {
        try {
            $now=Carbon::now();

            $currentdateexplode = explode(' ', $now);
            $nowdate = $currentdateexplode[0];
            $nowtime = $currentdateexplode[1];
            $now = $nowdate . " " . $nowtime;
            //return $id;
            $post = DB::table('post_tbl')
                ->where('id', $id)
                ->update(['status_id' => 3,'created_at'=>$now
                ]);


        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }

    /**
     * @param Request $request
     */
    public function PostEvent(Request $request)
    {
        try {
            //return $request->all();
            $title = $request->get('event_title');
            $image = $request->get('image');

            $event = new EventTbl();
            $event->setAttribute('event_title', $title);
            $event->setAttribute('start_datetime', $request->get('start'));
            $event->setAttribute('end_datetime', $request->get('end'));
            $event->setAttribute('event_description', $request->get('description'));
            $event->setAttribute('event_location', $request->get('location'));
            $event->status_id = 4;
            $event->setAttribute('user_id', $request->get('uid'));
            $event->event_image = $image;

            $event->save();
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }

    }
}
