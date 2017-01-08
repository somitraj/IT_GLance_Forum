<?php

namespace IT_Glance_Forum\Form;

use Kris\LaravelFormBuilder\Form;

/**
 * Class AddressForm
 * @package IT_Glance_Forum\Form
 */
class AddressForm extends Form
{
    public function buildForm()
    {
        try {
            $countries = $this->getFormOption('country');
            $provinces = $this->getFormOption('province');
            $zones = $this->getFormOption('zone');
            $districts = $this->getFormOption('district');
            $cities = $this->getFormOption('city');

            $countryOption = [];
            $provinceOption = [];
            $zoneOption = [];
            $districtOption = [];
            $cityOption = [];


            foreach ($countries->country_tbls as $country) {
                $countryOption[$country->id] = $country->country;
            }
            foreach ($provinces->province_tbls as $province) {
                $provinceOption[$province->id] = $province->province;
            }
            foreach ($zones->zone_tbls as $zone) {
                $zoneOption[$zone->id] = $zone->zone;
            }
            foreach ($districts->district_tbls as $district) {
                $districtOption[$district->id] = $district->district;
            }
            foreach ($cities->city_tbls as $city) {
                $cityOption[$city->id] = $city->city;
            }

            $this
                ->add('country', 'select', [
                        'wrapper' => ['class' => 'form row'],
                        'label' => 'Country',
                        'choices' => $countryOption,
                        'empty_value' => 'Select Country',
                        'label_attr' => ['class' => 'control-label'],
                        'attr' => ['class' => ' form-control field-input']
                    ]
                )
                ->add('province', 'select', [
                        'label' => 'Province',
                        'choices' => $provinceOption,
                        'empty_value' => 'Select Province',
                        'wrapper' => ['class' => 'form row'],
                        'label_attr' => ['class' => ' control-label'],
                        'attr' => ['class' => ' form-control field-input']
                    ]
                )
                ->add('zones', 'select', [
                        'label' => 'Zone',
                        'empty_value' => 'Select Zone',
                        'wrapper' => ['class' => 'form  row'],
                        'label_attr' => ['class' => ' control-label'],
                        'attr' => ['class' => ' form-control field-input']
                    ]
                )
                ->add('district', 'select', [
                        'label' => 'District',
                        'choices' => $districtOption,
                        'empty_value' => 'Select District',
                        'wrapper' => ['class' => 'form  row'],
                        'label_attr' => ['class' => '  control-label'],
                        'attr' => ['class' => ' form-control field-input']
                    ]
                )
                ->add('city', 'select', [
                        'label' => 'City',
                        'choices' => $cityOption,
                        'empty_value' => 'Select City',
                        'wrapper' => ['class' => 'form row'],
                        'label_attr' => ['class' => ' control-label'],
                        'attr' => ['class' => ' form-control field-input']
                    ]
                );
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }
}

