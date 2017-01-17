<?php

namespace IT_Glance_Forum\Http\Controllers\Web;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use IT_Glance_Forum\Http\Controllers\Controller;

class ForumController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function Home()
    {
        try {
            $client = new Client(['base_uri' => config('app.REST_API')]);

            $response = $client->request('GET', 'userdash');
            $data = $response->getBody()->getContents();
            $homedata = \GuzzleHttp\json_decode($data);
            //print_r($homedata);die();

            $response1 = $client->request('GET', 'getcategory');
            $data1 = $response1->getBody()->getContents();
            $category = \GuzzleHttp\json_decode($data1);
            //print_r($data1);die();
            $utypeid = Auth::user()->user_type_id;
            $response2 = $client->request('GET', 'getcurrentrole/' . $utypeid);
            $data2 = $response2->getBody()->getContents();
            $usertype = \GuzzleHttp\json_decode($data2);

            $response3 = $client->request('GET', 'getcomment');
            $data3 = $response3->getBody()->getContents();
            $comment = \GuzzleHttp\json_decode($data3);
            //print_r($homedata);die();

            $now = Carbon::now();

            $currentdateexplode = explode(' ', $now);
            $nowdate = $currentdateexplode[0];
            $nowtime = $currentdateexplode[1];
            return view('Home', compact('homedata', 'category', 'usertype', 'nowdate', 'nowtime','comment'));
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }


    }

    public function GetSpecificPost($id)
    {
        try {
            //print_r($id);die();
            $client = new Client(['base_uri' => config('app.REST_API')]);
            $response = $client->request('GET', 'getspecificpost/' . $id);
            $data = $response->getBody()->getContents();
            //print_r($data);die();
            $homedata = \GuzzleHttp\json_decode($data);
            //print_r($homedata);die();

            $response1 = $client->request('GET', 'getcategory');
            $data1 = $response1->getBody()->getContents();
            $category = \GuzzleHttp\json_decode($data1);

            $utypeid = Auth::user()->user_type_id;
            $response2 = $client->request('GET', 'getcurrentrole/' . $utypeid);
            $data2 = $response2->getBody()->getContents();
            $usertype = \GuzzleHttp\json_decode($data2);

            $now = Carbon::now();

            $currentdateexplode = explode(' ', $now);
            $nowdate = $currentdateexplode[0];
            $nowtime = $currentdateexplode[1];
            return view('Home', compact('homedata', 'category', 'usertype', 'nowdate', 'nowtime'));
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }

    public function GetMyQuestions()
    {
        try {
            //print_r($id);die();
            $client = new Client(['base_uri' => config('app.REST_API')]);
            $id = Auth::user()->id;
            $response = $client->request('GET', 'getmyquestions/' . $id);
            $data = $response->getBody()->getContents();
            $homedata = \GuzzleHttp\json_decode($data);
            //print_r($homedata);die();

            $response1 = $client->request('GET', 'getcategory');
            $data1 = $response1->getBody()->getContents();
            $category = \GuzzleHttp\json_decode($data1);

            $utypeid = Auth::user()->user_type_id;
            $response2 = $client->request('GET', 'getcurrentrole/' . $utypeid);
            $data2 = $response2->getBody()->getContents();
            $usertype = \GuzzleHttp\json_decode($data2);

           /* $response3 = $client->request('GET', 'getcomment');
            $data3 = $response3->getBody()->getContents();
            $comment = \GuzzleHttp\json_decode($data3)*/;

            $now = Carbon::now();

            $currentdateexplode = explode(' ', $now);
            $nowdate = $currentdateexplode[0];
            $nowtime = $currentdateexplode[1];
            return view('Home', compact('homedata', 'category', 'usertype', 'nowdate', 'nowtime'));
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }

    public function PostComment($postid)
    {
        try {
            $client = new Client(['base_uri' => config('app.REST_API')]);
            $comment = \Request::get('comment');
            print_r($comment);die();
            $id = Auth::user()->id;

            $response = $client->request('GET', 'postcomment', [
                'form_params' => [
                    'pid' => $postid,
                    'comment'=>$comment
                ]]);
            $data = $response->getBody()->getContents();
            print_r($data);die();
            $comment = \GuzzleHttp\json_decode($data);
            print_r($comment);die();
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }

    }
}
