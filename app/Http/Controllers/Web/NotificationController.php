<?php

namespace IT_Glance_Forum\Http\Controllers\Web;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use IT_Glance_Forum\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function UserNotification(){
        try{
            $client = new Client(['base_uri' => config('app.REST_API')]);
            $response = $client->request('GET', 'usernotice');
            $data = $response->getBody()->getContents();
            $notice = \GuzzleHttp\json_decode($data);

            $response1= $client->request('GET', 'usertypelist');
            $data1 = $response1->getBody()->getContents();
            $usertype = \GuzzleHttp\json_decode($data1);
            //print_r($notice);die();
            return view('UserNotification', compact('notice','usertype'));
        }
        catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }
}