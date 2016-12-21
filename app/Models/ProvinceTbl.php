<?php namespace IT_Glance_forum\Models;

use Illuminate\Database\Eloquent\Model;

class ProvinceTbl extends Model {

    /**
     * Generated
     */

    protected $table = 'province_tbl';
    protected $fillable = ['id', 'province'];


    public function addressTbls() {
        return $this->hasMany('IT_Glance_forum\Models\AddressTbl', 'province_id', 'id');
    }


}
