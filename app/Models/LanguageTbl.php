<?php namespace IT_Glance_Forum\Models;

use Illuminate\Database\Eloquent\Model;

class LanguageTbl extends Model {

    /**
     * Generated
     */

    protected $table = 'language_tbl';
    protected $fillable = ['id', 'language'];


    public function userinfoTbls() {
        return $this->hasMany('IT_Glance_Forum\Models\UserinfoTbl', 'language_type_id', 'id');
    }


}
