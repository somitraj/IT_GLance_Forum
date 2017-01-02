<?php

namespace IT_Glance_Forum\Form;

use Kris\LaravelFormBuilder\Form;

class CourseForm extends Form
{
    public function buildForm()
    {
        $courses = $this->getData('course');
        print_r($courses);die();

        $courseOption = [];

        foreach ($courses->course_tbls as $course) {
            $courseOption[$course->id] = $course->course_name;
        }
        $this
        ->add('course', 'select', [
            'label' => 'Course',
            'choices' => $courseOption,
            'empty_value' => 'Select Course',
            'wrapper' => ['class' => 'form row'],
            'label_attr' => ['class' => ' control-label'],
            'attr' => ['class' => ' form-control field-input']
        ]
    );
    }
}
