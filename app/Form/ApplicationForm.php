<?php

namespace IT_Glance_Forum\Form;

use Kris\LaravelFormBuilder\Form;

/**
 * Class ApplicationForm
 * @package IT_Glance_Forum\Form
 */
class ApplicationForm extends Form
{
    public function buildForm()
    {
        try {
            $this
                ->add('fname', 'text', [
                        'wrapper' => ['class' => 'form row'],
                        'label' => 'First Name',
                        'label_attr' => ['class' => 'control-label'],
                        'attr' => ['class' => 'form-control field-input'],
                        'rules' => ['required']
                    ]
                )
                ->add('mname', 'text', [
                        'wrapper' => ['class' => 'form row'],
                        'label' => 'Middle Name',
                        'label_attr' => ['class' => 'control-label'],
                        'attr' => ['class' => 'form-control field-input'],
                    ]
                )
                ->add('lname', 'text', [
                        'wrapper' => ['class' => 'form row'],
                        'label' => 'Last Name',
                        'label_attr' => ['class' => 'control-label'],
                        'attr' => ['class' => 'form-control field-input']
                    ]
                )
                ->add('dob', 'date', [
                        'wrapper' => ['class' => 'form row'],
                        'label' => 'Date Of Birth',
                        'label_attr' => ['class' => 'control-label active'],
                        'attr' => ['class' => 'form-control field-input']
                    ]
                )
                ->add('gender', 'select', [
                        'wrapper' => ['class' => 'form row'],
                        'label' => 'Gender ',
                        'choices' => ['Male', 'Female'],
                        'empty_value' => '=== Select Gender ==='
                    ]
                )
                ->add('email', 'email', [
                        'wrapper' => ['class' => 'form row'],
                        'label' => 'Email Address',
                        'label_attr' => ['class' => 'control-label'],
                        'attr' => ['class' => 'form-control field-input'],
                        'rules' => ['required', 'email', 'unique:registered_users']
                    ]
                )
                ->add('cemail', 'email', [
                        'wrapper' => ['class' => 'form row'],
                        'label' => 'Confirm Email',
                        'label_attr' => ['class' => 'control-label'],
                        'attr' => ['class' => 'form-control field-input'],
                        'rules' => ['required', 'email', 'unique:registered_users']
                    ]
                )
                ->add('phone_no', 'text', [
                        'wrapper' => ['class' => 'form row'],
                        'label' => 'Phone No.',
                        'label_attr' => ['class' => 'control-label'],
                        'attr' => ['class' => 'form-control field-input']
                    ]
                )
                ->add('mobile_no', 'text', [
                        'wrapper' => ['class' => 'form row'],
                        'label' => 'Mobile No. ',
                        'label_attr' => ['class' => 'control-label'],
                        'attr' => ['class' => 'form-control field-input']
                    ]
                )
               ->compose(\IT_Glance_Forum\Form\AddressForm::class,
                    ['country' => $this->getData('country'), 'province' => $this->getData('province'), 'zone' => $this->getData('zone'),
                        'district' => $this->getData('district'), 'city' => $this->getData('city')])

                ->add('college', 'text', [
                        'wrapper' => ['class' => 'form row'],
                        'label' => 'College ',
                        'label_attr' => ['class' => 'control-label'],
                        'attr' => ['class' => 'form-control field-input']
                    ]
                )
               /* ->add('course', 'select', [
                    'wrapper' => ['class' => 'form row'],
                    'label' => 'Course ',
                    'choices' => ['BIM', 'BScCSIT'],
                    'empty_value' => '=== Select Course ==='
                ])*/
                ->add('language', 'select', [
                    'wrapper' => ['class' => 'form row'],
                    'label' => 'Language ',
                    'choices' => ['Php', 'Java'],
                    'empty_value' => '=== Select Language To Study ==='
                ])

                ->compose(\IT_Glance_Forum\Form\CourseForm::class,
                    ['course' => $this->getData('course')])


                ->add('comment', 'textarea', [
                        'wrapper' => ['class' => 'form row'],
                        'label' => 'Why This Language ? ',
                        'label_attr' => ['class' => 'control-label'],
                        'attr' => ['class' => 'form-control field-input']
                    ]
                )
                ->add('submit', 'submit', ['attr' => ['class' => 'btn btn-deep-purple']])
                ->add('reset', 'reset', ['attr' => ['class' => 'btn btn-deep-purple']]);
        }
        catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
        }
}
