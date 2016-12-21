<?php

namespace IT_Glance_Forum\Http\Controllers\Web;

use ExceptionCode;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use IT_Glance_Forum\Http\Controllers\Controller;
use IT_Glance_Forum\User;
use Kris\LaravelFormBuilder\FormBuilder;

class LoginController extends Controller
{
    public function Login(FormBuilder $formBuilder, Request $request)
    {
        try {
            if (Auth::check()) {   //checks user is logged in and if logged in and user try to go back to login page,home is returned
                return view('ApplicationForm', compact('form'));

            } else {
                $form = $formBuilder->Create('IT_Glance_Forum\Form\LoginForm',
                    ['method' => 'POST', 'url' => route('web.login')]);
                if ($request->getMethod() == 'POST') {//activates login button
                    try {
                        $client = new Client(['base_uri' => config('app.REST_API')]);

                        $response = $client->request('POST', 'login', [
                            'form_params' => [

                                'username' => $request->get('username'),
                                'password' => $request->get('password')

                            ]

                        ]);
                        $userApi = \GuzzleHttp\json_decode($response->getBody()->getContents())->user; //api bata json format bata ako lai decode gareko

                        $user = new User();
                        $user->id = $userApi->id;
                        $user->username = $userApi->username;
                        $user->password = $userApi->password;
                        $user->user_type_id = $userApi->user_type_id;
                        Auth::login($user);

                        return $this->UserCheck();
                    } catch (\Exception $e) {
                        throw  $e;
                    }
                }
                return view('LoginForm', compact('form'));
            }
        } catch (\Exception $e) {
            $validator=Validator::make(Input::all(),[]);
            if ($e->getCode() == 500) {
                $error = json_decode($e->getResponse()->getBody()->getContents());
                if (array_key_exists('code', $error)) {
                    if ($error->code == \IT_Glance_Forum\ExceptionCode::INVALID_USER) {
                        $validator->errors()->add('username', $error->message);
                    } elseif ($error->code == \IT_Glance_Forum\ExceptionCode::INVALID_PASSWORD) {
                        $validator->errors()->add('password', $error->message);
                    } else {
                        $validator->errors()->add('global', $error->message);
                    }

                } else {
                    $validator->errors()->add('global', $error->message);
                }
                $errors = $validator;
                return redirect()->back()->withErrors($validator);
            }
        }


    }

    public function UserCheck()
    {
        if (Auth::check()) {
            // print_r(Auth::user()->user_type_id);die();
            if (Auth::user()->user_type_id == 1) {
                return redirect()->route('web.application');
            } else if (Auth::user()->user_type_id == 2) {
                // print_r(Auth::user());die();
                return redirect()->route('web.application');
            } else if (Auth::user()->user_type_id == 3) {
                return redirect()->route('web.application');
                //return redirect()->to('/');
            } else {
                return redirect()->route('web.application');
            }

        }

    }
}

