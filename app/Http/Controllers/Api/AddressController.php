<?php

namespace IT_Glance_Forum\Http\Controllers\Api;

use Illuminate\Http\Request;
use IT_Glance_Forum\Http\Controllers\Controller;
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
     * @param Request $request
     */
    public function GetCountry(Request $request)
    {
        try {
            return CountryTbl::all();
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function GetProvince(Request $request)
    {
        try {
            return ProvinceTbl::all();
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function GetZone(Request $request)
    {
        try {
            return ZoneTbl::all();
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function GetDistrict(Request $request)
    {
        try {
            return DistrictTbl::all();
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function GetCity(Request $request)
    {
        try {
            return CityTbl::all();
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function GetCourse(Request $request)
    {
        try {
            return CourseTbl::all();
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function GetLanguage(Request $request)
    {
        try {
            return LanguageTbl::all();
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }
}
