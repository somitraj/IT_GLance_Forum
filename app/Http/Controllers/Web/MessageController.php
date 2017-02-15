<?php

namespace IT_Glance_Forum\Http\Controllers\Web;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use IT_Glance_Forum\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function GetMessage(){
        try{
            $client = new Client(['base_uri' => config('app.REST_API')]);
            $id=Auth::user()->id;
            //print_r($id);die();
            $response = $client->request('POST', 'getmessages', [
                'form_params' => [
                    'id' => $id,
                ]]);
            $data = $response->getBody()->getContents();
           // print_r($data);die();
            $msgdata = \GuzzleHttp\json_decode($data);
            //print_r($msgdata);die();
            $now = Carbon::now();

            $currentdateexplode = explode(' ', $now);
            $nowdate = $currentdateexplode[0];
            $nowtime = $currentdateexplode[1];
            return view('Message.MessageHome',compact('msgdata','nowdate','nowtime'));
        }
         catch (\Exception $e) {
                    print_r($e->getMessage());
                    die();
                }

    }
    public function ViewFullMessage($id){
        try{
          //  print_r($id);die();
            $client = new Client(['base_uri' => config('app.REST_API')]);
            $response = $client->request('POST', 'viewfullmessage', [
                'form_params' => [
                    'messageid' => $id,
                ]]);
            $data = $response->getBody()->getContents();
            // print_r($data);die();
            $msgfulldata = \GuzzleHttp\json_decode($data);
            //print_r($msgdata);die();
            return view('Message.MessageView',compact('msgfulldata'));
        }
         catch (\Exception $e) {
                    print_r($e->getMessage());
                    die();
                }

    }
    public function ViewMessageSent(){
        try{
            $id=Auth::user()->id;
            $client = new Client(['base_uri' => config('app.REST_API')]);
            $response = $client->request('POST', 'viewsentmessage', [
                'form_params' => [
                    'uid' => $id,
                ]]);
            $data = $response->getBody()->getContents();
            //print_r($data);die();
            $msgsentdata = \GuzzleHttp\json_decode($data);
            //print_r($msgdata);die();
            $now = Carbon::now();

            $currentdateexplode = explode(' ', $now);
            $nowdate = $currentdateexplode[0];
            $nowtime = $currentdateexplode[1];
            return view('Message.MessageSent',compact('msgsentdata','nowdate','nowtime'));
        }
         catch (\Exception $e) {
                    print_r($e->getMessage());
                    die();
                }

    }
}
