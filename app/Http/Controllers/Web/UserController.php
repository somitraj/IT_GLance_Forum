<?php

namespace IT_Glance_Forum\Http\Controllers\Web;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use IT_Glance_Forum\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\FormBuilder;

class UserController extends Controller
{

    public function ApplicationForm(FormBuilder $formBuilder,Request $request)
    {
        try {
            $client = new Client(['base_uri' => config('app.REST_API')]);
            $response = $client->request('GET', 'country');
            $data = $response->getBody()->getContents();
            $country = \GuzzleHttp\json_decode($data);
            /*print_r($country);die();*/


            $response1 = $client->request('GET', 'province');
            $data1 = $response1->getBody()->getContents();
            $province = \GuzzleHttp\json_decode($data1);

            $response2 = $client->request('GET', 'zone');
            $data2 = $response2->getBody()->getContents();
            $zone = \GuzzleHttp\json_decode($data2);

            $response3 = $client->request('GET', 'district');
            $data3 = $response3->getBody()->getContents();
            $district = \GuzzleHttp\json_decode($data3);

            $response3 = $client->request('GET', 'city');
            $data4 = $response3->getBody()->getContents();
            $city = \GuzzleHttp\json_decode($data4);

            $form = $formBuilder->Create('IT_Glance_Forum\Form\ApplicationForm',
                ['method' => 'POST', 'url' => route('web.application')],
                ['country' => $country,'province'=>$province,'zone'=>$zone,'district'=>$district,'city'=>$city]);

           /* $form = $formBuilder->Create('IT_Glance_Forum\Form\ApplicationForm',
                ['method' => 'POST', 'url' => route('web.application')]);*/
            return view('ApplicationForm', compact('form'));


        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }
}
