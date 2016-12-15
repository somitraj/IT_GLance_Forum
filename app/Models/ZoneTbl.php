<?php namespace IT_Glance_Forum/Models;

use Illuminate\Database\Eloquent\Model;

class ZoneTbl extends Model {

    /**
     * Generated
     */

    protected $table = 'zone_tbl';
    protected $fillable = ['id', 'zone', 'country_id'];


    public function countryTbl() {
        return $this->belongsTo('IT_Glance_Forum/Models\CountryTbl', 'country_id', 'id');
    }

    public function addressTbls() {
        return $this->hasMany('IT_Glance_Forum/Models\AddressTbl', 'zone_id', 'id');
    }

    public function districtTbls() {
        return $this->hasMany('IT_Glance_Forum/Models\DistrictTbl', 'zone_id', 'id');
    }


}
