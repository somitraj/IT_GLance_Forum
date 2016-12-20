<?php

namespace IT_Glance_Forum\Form;

use Kris\LaravelFormBuilder\Form;

class LoginForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('username', 'text', [
                    'wrapper' => ['class' => 'form-group'],
                    'label' => 'Username',
                    'attr' => ['class' => 'form-control field-input'],
                    'rules' => ['required'],
                    'errors' => ['class' => 'text-danger col-md-offset-4'],
                    'label_attr' => ['data-error' => "wrong", 'data-success' => "right"]
                ]
            )

            ->add('password', 'password', [
                    'wrapper' => ['class' => 'form-group'],
                    'attr' => ['class' => 'form-control field-input'],
                    'rules' => ['required', 'min:4'],
                    'errors' => ['class' => 'text-danger col-md-offset-4']

                ]
            )

            ->add('remember me', 'checkbox')
            ->add('Login', 'submit', ['attr' => ['class' => 'btn btn-danger']]);
    }
}
