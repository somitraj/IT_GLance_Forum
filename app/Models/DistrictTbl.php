<?php namespace IT_Glance_forum\Models;

use Illuminate\Database\Eloquent\Model;

class DistrictTbl extends Model {

    /**
     * Generated
     */

    protected $table = 'district_tbl';
    protected $fillable = ['id', 'district', 'zone_id'];


    public function zoneTbl() {
        return $this->belongsTo('IT_Glance_forum/Models\ZoneTbl', 'zone_id', 'id');
    }

    public function addressTbls() {
        return $this->hasMany('IT_Glance_forum/Models\AddressTbl', 'district_id', 'id');
    }

    public function cityTbls() {
        return $this->hasMany('IT_Glance_forum/Models\CityTbl', 'district_id', 'id');
    }


}
