<?php namespace IT_Glance_Forum\Models;

use Illuminate\Database\Eloquent\Model;

class CityTbl extends Model {

    /**
     * Generated
     */

    protected $table = 'city_tbl';
    protected $fillable = ['id', 'city', 'district_id'];


    public function districtTbl() {
        return $this->belongsTo('IT_Glance_Forum\Models\DistrictTbl', 'district_id', 'id');
    }

    public function addressTbls() {
        return $this->hasMany('IT_Glance_Forum\Models\AddressTbl', 'city_id', 'id');
    }


}
