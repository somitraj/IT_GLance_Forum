<?php

namespace IT_Glance_Forum\Http\Controllers\Web;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use IT_Glance_Forum\Http\Controllers\Controller;
use IT_Glance_Forum\User;
use Kris\LaravelFormBuilder\FormBuilder;

/**
 * Class LoginController
 * @package IT_Glance_Forum\Http\Controllers\Web
 */
class LoginController extends Controller
{
    /**
     * @param FormBuilder $formBuilder
     * @param Request $request
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function Login(FormBuilder $formBuilder, Request $request)
    {
        try {
            if (Auth::check()) {   //checks user is logged in and if logged in and user try to go back to login page,home is returned
                if (Auth::user()->user_type_id == 1) {
                    return redirect('admin/home');
                } elseif (Auth::user()->user_type_id == 2) {
                    return redirect('mentor/home');
                } elseif (Auth::user()->user_type_id == 3) {
                    return redirect('submentor/home');
                } else {
                    return redirect('intern/home');
                }

            } else {
                $form = $formBuilder->Create('IT_Glance_Forum\Form\LoginForm',
                    ['method' => 'POST', 'url' => route('web.login')]);
                if ($request->getMethod() == 'POST') {//activates login button
                    try {
                        $client = new Client(['base_uri' => config('app.REST_API')]);
                        //print_r($client);die();
                        // print_r($request->get('username'));die();
                        $response = $client->request('POST', 'login', [
                            'form_params' => [
                                'username' => $request->get('username'),
                                'password' => $request->get('password')

                            ]

                        ]);
                        $data = $response->getBody()->getContents();
                        // print_r($data);die();
                        $userApi = \GuzzleHttp\json_decode($data);
                        /*print_r($userApi->user->id);die();*/
                        $user = new User();
                        //print_r($user);die();
                        $user->id = $userApi->user->id;
                        $user->username = $userApi->user->username;
                        $user->password = $userApi->user->password;
                        $user->user_type_id = $userApi->user->user_type_id;
                        $user->status_id = $userApi->user->status_id;
                        //print_r($user);die();
                        Auth::login($user);
                        return $this->UserCheck();
                    } catch (\Exception $e) {
                        throw  $e;
                    }
                }
                return view('LoginForm', compact('form'));
            }
        } catch (\Exception $e) {
            $validator = Validator::make(Input::all(), []);
            if ($e->getCode() == 500) {
                $error = json_decode($e->getResponse()->getBody()->getContents());
                if (array_key_exists('code', $error)) {
                    if ($error->code == \IT_Glance_Forum\ExceptionCode::INVALID_USER) {
                        $validator->errors()->add('username', $error->message);
                    } elseif ($error->code == \IT_Glance_Forum\ExceptionCode::INVALID_PASSWORD) {
                        $validator->errors()->add('password', $error->message);
                    } else {
                        print_r($e->getMessage());
                        die();
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

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function UserCheck()
    {
        /*print_r('a');
        die();*/
        if (Auth::check()) {

            // print_r(Auth::user()->user_type_id);die();
            if (Auth::user()->user_type_id == 1) {
                return redirect()->route('Home@admin');
            } else if (Auth::user()->user_type_id == 2) {
                // print_r(Auth::user());die();
                return redirect()->route('Home@mentor');
            } else if (Auth::user()->user_type_id == 3) {
                return redirect()->route('Home@submentor');
                //return redirect()->to('/');
            } else {
                return redirect()->route('Home@intern');
            }

        }

    }
}

