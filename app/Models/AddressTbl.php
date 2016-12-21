<?php namespace IT_Glance_Forum\Models;

use Illuminate\Database\Eloquent\Model;

class AddressTbl extends Model {

    /**
     * Generated
     */

    protected $table = 'address_tbl';
    protected $fillable = ['id', 'local_address', 'temporary_address', 'country_id', 'province_id', 'city_id', 'zone_id', 'district_id'];


    public function cityTbl() {
        return $this->belongsTo('IT_Glance_Forum\Models\CityTbl', 'city_id', 'id');
    }

    public function countryTbl() {
        return $this->belongsTo('IT_Glance_Forum\Models\CountryTbl', 'country_id', 'id');
    }

    public function districtTbl() {
        return $this->belongsTo('IT_Glance_Forum\Models\DistrictTbl', 'district_id', 'id');
    }

    public function provinceTbl() {
        return $this->belongsTo('IT_Glance_Forum\Models\ProvinceTbl', 'province_id', 'id');
    }

    public function zoneTbl() {
        return $this->belongsTo('IT_Glance_Forum\Models\ZoneTbl', 'zone_id', 'id');
    }

    public function userinfoTbls() {
        return $this->hasMany('IT_Glance_Forum\Models\UserinfoTbl', 'address_id', 'id');
    }


}
