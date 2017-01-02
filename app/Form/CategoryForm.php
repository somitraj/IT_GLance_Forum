<?php

namespace IT_Glance_Forum\Form;

use Kris\LaravelFormBuilder\Form;

class CategoryForm extends Form
{
    public function buildForm()
    {
        $categories = $this->getData('category');
        /*print_r($categories);
        die();*/
        $categoryOption = [];

        foreach ($categories->category_tbls as $category) {
            $categoryOption[$category->id] = $category->category;
        }
        $this
            ->add('category', 'select', [
                    'wrapper' => ['class' => 'form row'],
                    'label' => 'Category',
                    'choices' => $categoryOption,
                    'empty_value' => 'Select Category',
                    'label_attr' => ['class' => 'control-label hidden' ],
                    'attr' => ['class' => ' form-control field-input ']
                ]
            )
            ->add('posttitle', 'text', [
                    'wrapper' => ['class' => 'form row'],
                    'value' => 'Enter Title',
                    'label_attr' => ['class' => 'control-label hidden' ],
                    'attr' => ['class' => ' form-control field-input ']
                ]
            )
            ->add('postbody', 'textarea', [
                    'wrapper' => ['class' => 'form row'],
                    'empty_value' => 'Enter Title',
                    'label_attr' => ['class' => 'control-label hidden'],
                    'attr' => ['class' => ' form-control field-input ']
                ]
            )
            ->add('submit', 'submit', ['attr' => ['class' => 'btn btn-deep-purple']])
            ->add('reset', 'reset', ['attr' => ['class' => 'btn btn-deep-purple']]);


        ;
    }
}
