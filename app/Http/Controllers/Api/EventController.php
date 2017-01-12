<?php

namespace IT_Glance_Forum\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use IT_Glance_Forum\Http\Controllers\Controller;
use IT_Glance_Forum\Models\EventTbl;

class EventController extends Controller
{
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
            /*$event->status_id = 4;*/
            $event->setAttribute('user_id', $request->get('uid'));
            $event->event_image = $image;

            $event->save();
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }

    }
    public function GetEvent(){
        try{
            $event = DB::table('users')
                ->join('userinfo_tbl', 'userinfo_tbl.user_id', '=', 'users.id')
                ->join('event_tbl', 'event_tbl.user_id', '=', 'users.id')
                ->select('userinfo_tbl.*', 'users.*','event_tbl.*')
                ->orderBy('event_tbl.created_at','desc')
                ->get()->toArray();

            return $event;
        }
        catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }

    }
}
