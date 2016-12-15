<?php namespace IT_Glance_Forum/Models;

use Illuminate\Database\Eloquent\Model;

class SkillTbl extends Model {

    /**
     * Generated
     */

    protected $table = 'skill_tbl';
    protected $fillable = ['id', 'skills'];


    public function userinfoTbls() {
        return $this->hasMany('IT_Glance_Forum/Models\UserinfoTbl', 'skill_id', 'id');
    }


}
