<?php namespace IT_Glance_Forum/Models;

use Illuminate\Database\Eloquent\Model;

class DistrictTbl extends Model {

    /**
     * Generated
     */

    protected $table = 'district_tbl';
    protected $fillable = ['id', 'district', 'zone_id'];


    public function zoneTbl() {
        return $this->belongsTo('IT_Glance_Forum/Models\ZoneTbl', 'zone_id', 'id');
    }

    public function addressTbls() {
        return $this->hasMany('IT_Glance_Forum/Models\AddressTbl', 'district_id', 'id');
    }

    public function cityTbls() {
        return $this->hasMany('IT_Glance_Forum/Models\CityTbl', 'district_id', 'id');
    }


}
