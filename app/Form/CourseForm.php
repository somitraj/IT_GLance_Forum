<?php

namespace IT_Glance_Forum\Form;

use Kris\LaravelFormBuilder\Form;

class CourseForm extends Form
{
    public function buildForm()
    {
        $languages = $this->getFormOption('language');
        // print_r($languages);die();
        $courses = $this->getFormOption('course');
        // print_r($courses);die();


        $languageOption = [];
        $courseOption = [];

        foreach ($languages->language_tbls as $language) {
            $languageOption[$language->id] = $language->language;
        }

        foreach ($courses->course_tbls as $course) {
            $courseOption[$course->id] = $course->course_name;
        }
        $this
            ->add('language', 'select', [
                    'label' => 'Language',
                    'choices' => $languageOption,
                    'empty_value' => 'Select Language',
                    'wrapper' => ['class' => 'form row'],
                    'label_attr' => ['class' => ' control-label'],
                    'attr' => ['class' => ' form-control field-input']
                ]
            )
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
