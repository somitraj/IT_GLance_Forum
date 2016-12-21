<?php namespace IT_Glance_forum\Models;

use Illuminate\Database\Eloquent\Model;

class UserinfoTbl extends Model {

    /**
     * Generated
     */

    protected $table = 'userinfo_tbl';
    protected $fillable = ['id', 'user_id', 'fname', 'lname', 'profile_image', 'mobile_no', 'email', 'course_type_id', 'gender', 'dob', 'address_id', 'course_id', 'skill_id', 'phone_no', 'college', 'language_type_id', 'whylanguage'];


    public function addressTbl() {
        return $this->belongsTo('IT_Glance_forum\Models\AddressTbl', 'address_id', 'id');
    }

    public function courseTbl() {
        return $this->belongsTo('IT_Glance_forum\Models\CourseTbl', 'course_type_id', 'id');
    }

    public function languageTbl() {
        return $this->belongsTo('IT_Glance_forum\Models\LanguageTbl', 'language_type_id', 'id');
    }

    public function skillTbl() {
        return $this->belongsTo('IT_Glance_forum\Models\SkillTbl', 'skill_id', 'id');
    }

    public function usersTbl() {
        return $this->belongsTo('IT_Glance_forum\Models\UsersTbl', 'user_id', 'id');
    }


}
