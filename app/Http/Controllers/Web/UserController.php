<?php

namespace IT_Glance_Forum\Http\Controllers\Web;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

            $response5 = $client->request('GET', 'course');
            $data5 = $response5->getBody()->getContents();
            $course = \GuzzleHttp\json_decode($data5);

            $response6 = $client->request('GET', 'language');
            $data6 = $response6->getBody()->getContents();
            $language = \GuzzleHttp\json_decode($data6);
            //print_r($language);die();

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
                    /*$data = $response->getBody()->getContents();
                    $details = \GuzzleHttp\json_decode($data);
                    print_r($details);
                    die();*/
                } catch (\Exception $e) {
                    print_r($e->getMessage());
                    die();
                }
                $request->session()->flash('alert-success', 'Application Sent Successfully!');
            }

            $form = $formBuilder->Create('IT_Glance_Forum\Form\ApplicationForm',
                ['method' => 'POST', 'url' => route('web.application')],
                ['country' => $country, 'province' => $province, 'zone' => $zone, 'district' => $district,
                    'city' => $city, 'course' => $course, 'language' => $language]);

            return view('ApplicationForm', compact('form'));


        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }



    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function UserDetails($id)
    {
        try {
            $client = new Client(['base_uri' => config('app.REST_API')]);
            $response = $client->request('GET', 'userdetails/' . $id);
            $data = $response->getBody()->getContents();
            $details = \GuzzleHttp\json_decode($data);
            return view('ViewUserDetails', compact('details'));
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function GetMemberList()
    {
        try {
            $client = new Client(['base_uri' => config('app.REST_API')]);
            $response = $client->request('GET', 'allmemberlist');
            $data = $response->getBody()->getContents();
            $all = \GuzzleHttp\json_decode($data);

            $response1 = $client->request('GET', 'adminlist');
            $data1 = $response1->getBody()->getContents();
            $member1 = \GuzzleHttp\json_decode($data1);

            $response2 = $client->request('GET', 'mentorlist');
            $data2 = $response2->getBody()->getContents();
            $member2 = \GuzzleHttp\json_decode($data2);

            $response3 = $client->request('GET', 'submentorlist');
            $data3 = $response3->getBody()->getContents();
            $member3 = \GuzzleHttp\json_decode($data3);

            $response4 = $client->request('GET', 'internlist');
            $data4 = $response4->getBody()->getContents();
            $member4 = \GuzzleHttp\json_decode($data4);

            return view('MemberList', compact('all', 'member1', 'member2', 'member3', 'member4'));
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }




    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function UserApprove($id)
    {
        try {
            //print_r($id);die();
            $client = new Client(['base_uri' => config('app.REST_API')]);
            $response = $client->request('GET', 'userapprove/' . $id);
            /* $data = $response->getBody()->getContents();
             $all = \GuzzleHttp\json_decode($data);*/
            return redirect('admin/notification');

        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function GetUserProfile()
    {
        $client = new Client(['base_uri' => config('app.REST_API')]);
        $id = Auth::user()->id;
        //print_r($id);die();
        $response = $client->request('POST', 'getuserprofile', [
            'form_params' => [
                'id' => $id,
            ]]);
        $data = $response->getBody()->getContents();
        // print_r($data);die();
        $profiledata = \GuzzleHttp\json_decode($data);
        return view('UserProfile.UserProfile', compact('profiledata'));
    }


    /**
     * @param FormBuilder $formBuilder
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function UserProfileSettings(FormBuilder $formBuilder, Request $request)
    {
        try {
            $id = Auth::user()->id;
            $client = new Client(['base_uri' => config('app.REST_API')]);
            $response = $client->request('POST', 'getuserprofile', [
                'form_params' => [
                    'id' => $id,
                ]]);
            $data = $response->getBody()->getContents();
            $profiledata = \GuzzleHttp\json_decode($data);
            //print_r($profiledata);die();

            if ($request->getMethod() == 'POST') {

                $response1 = $client->request('POST', 'commituseredit', [
                    'form_params' => [
                        'user_id' => $id,
                        'fname' => $request->get('fname'),
                        'lname' => $request->get('lname'),
                        'username' => $request->get('username'),
                        'email' => $request->get('email'),
                        'dob' => $request->get('dob'),
                        'phone_no' => $request->get('phone_no'),
                        'mobile_no' => $request->get('mobile_no'),
                        'college' => $request->get('college'),

                    ]
                ]);
                /* $data = $response1->getBody()->getContents();
                  print_r($data);die();*/
                $request->session()->flash('alert-success', 'Details Updated!');
            }

            foreach ($profiledata as $edituser1) {
                $form = $formBuilder->Create(\IT_Glance_Forum\Form\UserEditForm::class, ['method' => 'POST'],
                    [
                        'id' => $edituser1->id,
                        'fname' => $edituser1->fname,
                        'lname' => $edituser1->lname,
                        'username' => $edituser1->username,
                        'dob' => $edituser1->dob,
                        'email' => $edituser1->email,
                        'mobile_no' => $edituser1->mobile_no,
                        'phone_no' => $edituser1->phone_no,
                        'college' => $edituser1->college,

                    ]);
                return view('UserProfile.UserSettings', compact('profiledata', 'form'));
            }
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }

    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function UserProfileProjects()
    {
        try {
            $client = new Client(['base_uri' => config('app.REST_API')]);
            $id = Auth::user()->id;
            $response = $client->request('POST', 'getuserprofile', [
                'form_params' => [
                    'id' => $id,
                ]]);
            $data = $response->getBody()->getContents();
            $profiledata = \GuzzleHttp\json_decode($data);
            return view('UserProfile.UserProject', compact('profiledata'));
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function UserProfileActivities()
    {
        try {
            $client = new Client(['base_uri' => config('app.REST_API')]);
            $id = Auth::user()->id;
            $response = $client->request('POST', 'getuserprofile', [
                'form_params' => [
                    'id' => $id,
                ]]);
            $data = $response->getBody()->getContents();
            $profiledata = \GuzzleHttp\json_decode($data);
            return view('UserProfile.UserActivities', compact('profiledata'));
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }

    }

    public function Demo(){
        try{
            return view('DynamicTextPractice');
        }
         catch (\Exception $e) {
                    print_r($e->getMessage());
                    die();
                }

    }
}
