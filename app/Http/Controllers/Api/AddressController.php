<?php

namespace IT_Glance_Forum\Http\Controllers\Api;

use Illuminate\Http\Request;
use IT_Glance_Forum\Http\Controllers\Controller;
use IT_Glance_Forum\Models\CategoryTbl;
use IT_Glance_Forum\Models\CityTbl;
use IT_Glance_Forum\Models\CountryTbl;
use IT_Glance_Forum\Models\CourseTbl;
use IT_Glance_Forum\Models\DistrictTbl;
use IT_Glance_Forum\Models\LanguageTbl;
use IT_Glance_Forum\Models\ProvinceTbl;
use IT_Glance_Forum\Models\ZoneTbl;

/**
 * Class AddressController
 * @package IT_Glance_Forum\Http\Controllers\Api
 */
class AddressController extends Controller
{

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function GetCountry()
    {
        try {
            return CountryTbl::all();
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function GetProvince()
    {
        try {
            return ProvinceTbl::all();
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function GetZone()
    {
        try {
            return ZoneTbl::all();
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function GetDistrict()
    {
        try {
            return DistrictTbl::all();
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function GetCity()
    {
        try {
            return CityTbl::all();
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function GetCourse()
    {
        try {
            return CourseTbl::all()->toArray();
        } catch (\Exception $e) {
            throw $e;
            //  print_r($e->getMessage());
            // die();
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function GetLanguage()
    {
        try {
            return LanguageTbl::all();
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function GetCategory()
    {
        try {
            return CategoryTbl::all();
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }

}
