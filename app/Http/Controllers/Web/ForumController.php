<?php

namespace IT_Glance_Forum\Http\Controllers\Web;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
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

            $now=Carbon::now();

            $currentdateexplode = explode(' ', $now);
            $nowdate = $currentdateexplode[0];
            $nowtime = $currentdateexplode[1];
            return view('Home', compact('homedata','nowdate','nowtime'));
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }


    }
}
