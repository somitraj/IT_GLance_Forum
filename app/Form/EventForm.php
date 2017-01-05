<?php

namespace IT_Glance_Forum\Form;

use Kris\LaravelFormBuilder\Form;

class EventForm extends Form
{
    public function buildForm()
    {
        try{
            $this
                ->add('event_title','text',[
                        'wrapper' =>['class' => 'md-form row'],
                        'label'=>'Name of Event',
                        'label_attr'=>['class'=>'control-label'],
                        'attr' =>['class' => 'form-control field-input'],
                        'rules'=>['required']
                    ]
                )
                ->add('start', 'datetime-local', [
                        'wrapper' => ['class' => 'md-form row'],
                        'label' => 'Start Date-Time Of Event',
                        'label_attr' => ['class' => 'control-label active'],
                        'attr' => ['class' => 'form-control field-input']
                    ]
                )
                ->add('end', 'datetime-local', [
                        'wrapper' => ['class' => 'md-form row'],
                        'label' => 'End Date-Time Of Event',
                        'label_attr' => ['class' => 'control-label active'],
                        'attr' => ['class' => 'form-control field-input']
                    ]
                )
                ->add('location','text',[
                        'wrapper' =>['class' => 'md-form row'],
                        'label'=>'Location of Event',
                        'label_attr'=>['class'=>'control-label'],
                        'attr' =>['class' => 'form-control field-input'],
                        'rules'=>['required']
                    ]
                )
                ->add('event_image','file', [
                        'wrapper' => ['class' => 'form-group row'],
                        'label'=>'Event Image',
                        'label_attr'=>['class'=>'control-label'],
                        'attr' => ['class' => 'form-control field-input','accept'=>'.jpeg,.png,.jpg']
                    ]
                )
                ->add('description','textarea', [
                        'wrapper' => ['class' => 'form-group row'],
                        'label'=>'Description',
                        'label_attr'=>['class'=>'control-label'],
                        'attr' => ['class' => 'form-control field-input']
                    ]
                )
                ->add('Create Event','submit',['attr' =>['class'=> 'btn btn-deep-purple']])
            ;
        }
         catch (\Exception $e) {
                    print_r($e->getMessage());
                    die();
                }

    }
}
