<?php

namespace IT_Glance_Forum\Http\Controllers\Web;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use IT_Glance_Forum\Http\Controllers\Controller;

/**
 * Class NotificationController
 * @package IT_Glance_Forum\Http\Controllers\Web
 */
class NotificationController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function UserNotification()
    {
        try {
            $client = new Client(['base_uri' => config('app.REST_API')]);
            $response = $client->request('GET', 'usernotice');
            $data = $response->getBody()->getContents();
            $notice = \GuzzleHttp\json_decode($data);

            $response1 = $client->request('GET', 'usertypelist');
            $data1 = $response1->getBody()->getContents();
            $usertype = \GuzzleHttp\json_decode($data1);
            //print_r($notice);die();
            return view('UserNotification', compact('notice', 'usertype'));
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function GetPostNotice()
    {
        try {
            $client = new Client(['base_uri' => config('app.REST_API')]);
            $response = $client->request('GET', 'postnotice');
            $data = $response->getBody()->getContents();
            $postnotice = \GuzzleHttp\json_decode($data);

            return view('PostNotification', compact('postnotice'));
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }
}
