<?php namespace IT_Glance_Forum/Models;

use Illuminate\Database\Eloquent\Model;

class CountryTbl extends Model {

    /**
     * Generated
     */

    protected $table = 'country_tbl';
    protected $fillable = ['id', 'country'];


    public function addressTbls() {
        return $this->hasMany('IT_Glance_Forum/Models\AddressTbl', 'country_id', 'id');
    }

    public function zoneTbls() {
        return $this->hasMany('IT_Glance_Forum/Models\ZoneTbl', 'country_id', 'id');
    }


}
