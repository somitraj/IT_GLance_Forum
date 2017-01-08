<?php

namespace IT_Glance_Forum\Form;

use Kris\LaravelFormBuilder\Form;

class UserEditForm extends Form
{
    public function buildForm()
    {
        $fname = $this->getData('fname');
        $lname = $this->getData('lname');
        $username = $this->getData('username');
        $dob = $this->getData('dob');
        $email = $this->getData('email');
        $phone_no = $this->getData('phone_no');
        $mobile_no = $this->getData('mobile_no');
        $college = $this->getData('college');

        $this
            ->add('fname', 'text', [
                    'wrapper' => ['class' => 'md-form row'],
                    'label' => 'First Name',
                    'label_attr' => ['class' => 'control-label'],
                    'attr' => ['class' => 'form-control field-input'],
                    'rules' => ['required'],
                    'value' => $fname
                ]
            )
            ->add('lname', 'text', [
                    'wrapper' => ['class' => 'md-form row'],
                    'label' => 'Last Name',
                    'label_attr' => ['class' => 'control-label'],
                    'attr' => ['class' => 'form-control field-input'],
                    'rules' => ['required'],
                    'value' => $lname
                ]
            )
            ->add('username', 'text', [
                    'wrapper' => ['class' => 'md-form row'],
                    'label' => 'Username',
                    'label_attr' => ['class' => 'control-label'],
                    'attr' => ['class' => 'form-control field-input'],
                    'rules' => ['required'],
                    'value' => $username
                ]
            )
            ->add('email', 'email', [
                    'wrapper' => ['class' => 'md-form row'],
                    'label' => 'Email Address',
                    'label_attr' => ['class' => '  control-label'],
                    'attr' => ['class' => '  form-control field-input'],
                    'rules' => ['required', 'email', 'unique:registered_users'],
                    'value' => $email

                ]
            )
            ->add('dob', 'date', [
                    'wrapper' => ['class' => 'md-form row'],
                    'label' => 'Date Of Birth',
                    'label_attr' => ['class' => 'control-label active'],
                    'attr' => ['class' => 'form-control field-input'],
                    'value' => $dob

                ]
            )
            ->add('phone_no', 'text', [
                    'wrapper' => ['class' => 'form-group row'],
                    'label' => 'Phone No.',
                    'label_attr' => ['class' => ' control-label'],
                    'attr' => ['class' => '  form-control field-input'],
                    'rules' => ['required'],
                    'value' => $phone_no

                ]
            )
            ->add('mobile_no', 'text', [
                    'wrapper' => ['class' => 'md-form row'],
                    'label' => 'Mobile No.',
                    'label_attr' => ['class' => '  control-label'],
                    'attr' => ['class' => 'form-control field-input'],
                    'value' => $mobile_no

                ]
            )
            ->add('college', 'text', [
                    'wrapper' => ['class' => 'md-form row'],
                    'label' => 'College ',
                    'label_attr' => ['class' => 'control-label'],
                    'attr' => ['class' => 'form-control field-input'],
                    'value' => $college
                ]
            )
            ->add('update', 'submit', ['attr' => ['class' => 'btn btn-primary btn-danger']]);
    }
}
