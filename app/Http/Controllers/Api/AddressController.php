<?php

namespace IT_Glance_Forum\Http\Controllers\Api;

use Illuminate\Http\Request;
use IT_Glance_Forum\Http\Controllers\Controller;
use IT_Glance_Forum\Models\CityTbl;
use IT_Glance_Forum\Models\CountryTbl;
use IT_Glance_Forum\Models\DistrictTbl;
use IT_Glance_Forum\Models\ProvinceTbl;
use IT_Glance_Forum\Models\ZoneTbl;

class AddressController extends Controller
{
    /**
     * @param Request $request
     */
    public function GetCountry(Request $request){
      try{
          return CountryTbl::all();
      }
       catch (\Exception $e) {
                  print_r($e->getMessage());
                  die();
              }
    }

    public function GetProvince(Request $request){
        try{
            return ProvinceTbl::all();
        }
        catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }
    public function GetZone(Request $request){
        try{
            return ZoneTbl::all();
        }
        catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }
    public function GetDistrict(Request $request){
        try{
            return DistrictTbl::all();
        }
        catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }
    public function GetCity(Request $request){
        try{
            return CityTbl::all();
        }
        catch (\Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }
}
