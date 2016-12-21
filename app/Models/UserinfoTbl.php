<?php namespace IT_Glance_Forum\Models;

use Illuminate\Database\Eloquent\Model;

class UserinfoTbl extends Model {

    /**
     * Generated
     */

    protected $table = 'userinfo_tbl';
    protected $fillable = ['id', 'user_id', 'fname', 'lname', 'profile_image', 'mobile_no', 'email', 'course_type_id', 'gender', 'dob', 'address_id', 'course_id', 'skill_id', 'phone_no', 'college', 'language_type_id', 'whylanguage', 'mname'];


    public function addressTbl() {
        return $this->belongsTo('IT_Glance_Forum\Models\AddressTbl', 'address_id', 'id');
    }

    public function courseTbl() {
        return $this->belongsTo('IT_Glance_Forum\Models\CourseTbl', 'course_type_id', 'id');
    }

    public function languageTbl() {
        return $this->belongsTo('IT_Glance_Forum\Models\LanguageTbl', 'language_type_id', 'id');
    }

    public function skillTbl() {
        return $this->belongsTo('IT_Glance_Forum\Models\SkillTbl', 'skill_id', 'id');
    }

    public function usersTbl() {
        return $this->belongsTo('IT_Glance_Forum\Models\UsersTbl', 'user_id', 'id');
    }


}
