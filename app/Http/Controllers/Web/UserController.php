<?php

namespace IT_Glance_Forum\Http\Controllers\Web;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use IT_Glance_Forum\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\FormBuilder;

/**
 * Class UserController
 * @package IT_Glance_Forum\Http\Controllers\Web
 */
class UserController extends Controller
{

    /**
     * @param FormBuilder $formBuilder
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ApplicationForm(FormBuilder $formBuilder, Request $request)
    {
        try {
            $client = new Client(['base_uri' => config('app.REST_API')]);

            $response = $client->request('GET', 'country');
            $data = $response->getBody()->getContents();
            $country = \GuzzleHttp\json_decode($data);

            $response1 = $client->request('GET', 'province');
            $data1 = $response1->getBody()->getContents();
            $province = \GuzzleHttp\json_decode($data1);

            $response2 = $client->request('GET', 'zone');
            $data2 = $response2->getBody()->getContents();
            $zone = \GuzzleHttp\json_decode($data2);

            $response3 = $client->request('GET', 'district');
            $data3 = $response3->getBody()->getContents();
            $district = \GuzzleHttp\json_decode($data3);

            $response4 = $client->request('GET', 'city');
            $data4 = $response4->getBody()->getContents();
            $city = \GuzzleHttp\json_decode($data4);

            /*$response5 = $client->request('GET', 'course');
            $data5 = $response5->getBody()->getContents();
            $course = \GuzzleHttp\json_decode($data5);

            $response6 = $client->request('GET', 'language');
            $data6 = $response6->getBody()->getContents();
            $language = \GuzzleHttp\json_decode($data6);*/

            if ($request->getMethod() == 'POST') { //activates register button
                try {

                    $response = $client->request('POST', 'appsubmit', [ //fetching form datas
                        'form_params' => [
                            'fname' => $request->get('fname'),
                            'mname' => $request->get('mname'),
                            'lname' => $request->get('lname'),
                            'dob' => $request->get('dob'),
                            'gender' => $request->get('gender'),
                            'email' => $request->get('email'),
                            'phone_no' => $request->get('phone_no'),
                            'mobile_no' => $request->get('mobile_no'),
                            'country_id' => $request->get('country'),
                            'province_id' => $request->get('province'),
                            'zone_id' => $request->get('zones'),
                            'district_id' => $request->get('district'),
                            'city_id' => $request->get('city'),
                            'college' => $request->get('college'),
                            'course_type_id' => $request->get('course'),
                            'language_type_id' => $request->get('language'),
                            'whylanguage' => $request->get('whylanguage'),
                        ]
                    ]);
                } catch (\Exception $e) {
                    print_r($e->getMessage());
                    die();
                }
                $request->session()->flash('alert-success', 'Application Sent Successfully!');
            }

            $form = $formBuilder->Create('IT_Glance_Forum\Form\ApplicationForm',
                ['method' => 'POST', 'url' => route('web.application')],
                ['country' => $country, 'province' => $province, 'zone' => $zone, 'district' => $district, 'city' => $city/*,'course'=>$course,'language'=>$language*/]);

            return view('ApplicationForm', compact('form'));


        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }
    public function Demo(){
        return view('Demo');
    }
}
