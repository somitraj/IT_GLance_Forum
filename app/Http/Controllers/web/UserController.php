<?php

namespace IT_Glance_Forum\Http\Controllers\web;

use Illuminate\Http\Request;
use IT_Glance_Forum\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\FormBuilder;

class UserController extends Controller
{
    public function ApplicationForm(FormBuilder $formBuilder)
    {
        try {
            $form = $formBuilder->Create('IT_Glance_Forum\Form\ApplicationForm',
                ['method' => 'POST', 'url' => route('web.application')]);
            return view('ApplicationForm', compact('form'));



        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }

}
