<?php namespace IT_Glance_Forum\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model {

    /**
     * Generated
     */

    protected $table = 'users';
    protected $fillable = ['id', 'username', 'password', 'email', 'user_type_id', 'status_id'];


    public function statusTbl() {
        return $this->belongsTo('IT_Glance_Forum\Models\StatusTbl', 'status_id', 'id');
    }

    public function usertypeTbl() {
        return $this->belongsTo('IT_Glance_Forum\Models\UsertypeTbl', 'user_type_id', 'id');
    }

    public function postTbls() {
        return $this->belongsToMany('IT_Glance_Forum\Models\PostTbl', 'comment_tbl', 'user_id', 'post_id');
    }

    public function statusTbls1() {
        return $this->belongsToMany('IT_Glance_Forum\Models\StatusTbl', 'event_tbl', 'user_id', 'status_id');
    }


    public function attendanceTbls() {
        return $this->hasMany('IT_Glance_Forum\Models\AttendanceTbl', 'user_id', 'id');
    }

    public function commentTbls() {
        return $this->hasMany('IT_Glance_Forum\Models\CommentTbl', 'user_id', 'id');
    }

    public function eventTbls() {
        return $this->hasMany('IT_Glance_Forum\Models\EventTbl', 'user_id', 'id');
    }

    public function feedbackTbls() {
        return $this->hasMany('IT_Glance_Forum\Models\FeedbackTbl', 'user_id', 'id');
    }

    public function internProjectTbls() {
        return $this->hasMany('IT_Glance_Forum\Models\InternProjectTbl', 'user_id', 'id');
    }

    public function internshipDetailTbls() {
        return $this->hasMany('IT_Glance_Forum\Models\InternshipDetailTbl', 'user_id', 'id');
    }

    public function messageTbls() {
        return $this->hasMany('IT_Glance_Forum\Models\MessageTbl', 'receiver_userid', 'id');
    }

    public function messageTbls1() {
        return $this->hasMany('IT_Glance_Forum\Models\MessageTbl', 'sender_userid', 'id');
    }

    public function postTbls1() {
        return $this->hasMany('IT_Glance_Forum\Models\PostTbl', 'user_id', 'id');
    }

    public function userinfoTbls() {
        return $this->hasMany('IT_Glance_Forum\Models\UserinfoTbl', 'user_id', 'id');
    }

    public function workingTbls() {
        return $this->hasMany('IT_Glance_Forum\Models\WorkingTbl', 'user_id', 'id');
    }


}
