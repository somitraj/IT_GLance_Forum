<?php namespace IT_Glance_forum\Models;

use Illuminate\Database\Eloquent\Model;

class CourseTbl extends Model {

    /**
     * Generated
     */

    protected $table = 'course_tbl';
    protected $fillable = ['id', 'course_name', 'course_description', 'course_icon'];


    public function userinfoTbls() {
        return $this->hasMany('IT_Glance_forum/Models\UserinfoTbl', 'course_type_id', 'id');
    }


}
