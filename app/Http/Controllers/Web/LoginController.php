<?php

namespace IT_Glance_Forum\Http\Controllers\Web;

use Illuminate\Http\Request;
use IT_Glance_Forum\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\FormBuilder;

class LoginController extends Controller
{
    public function Login(FormBuilder $formBuilder)
    {
        try {

            $form = $formBuilder->Create('IT_Glance_Forum\Form\LoginForm',
                ['method' => 'POST', 'url' => route('web.login')]);
            return view('LoginForm', compact('form'));


        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }
}
