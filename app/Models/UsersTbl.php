<?php namespace IT_Glance_forum\Models;

use Illuminate\Database\Eloquent\Model;

class UsersTbl extends Model {

    /**
     * Generated
     */

    protected $table = 'users_tbl';
    protected $fillable = ['id', 'username', 'password', 'email', 'user_type_id', 'status_id'];


    public function statusTbl() {
        return $this->belongsTo('IT_Glance_forum/Models\StatusTbl', 'status_id', 'id');
    }

    public function usertypeTbl() {
        return $this->belongsTo('IT_Glance_forum/Models\UsertypeTbl', 'user_type_id', 'id');
    }

    public function postTbls() {
        return $this->belongsToMany('IT_Glance_forum/Models\PostTbl', 'comment_tbl', 'user_id', 'post_id');
    }

    public function statusTbls() {
        return $this->belongsToMany('IT_Glance_forum/Models\StatusTbl', 'event_tbl', 'user_id', 'status_id');
    }

    public function statusTbls() {
        return $this->belongsToMany('IT_Glance_forum/Models\StatusTbl', 'intern_project_tbl', 'user_id', 'status_id');
    }

    public function attendanceTbls() {
        return $this->hasMany('IT_Glance_forum/Models\AttendanceTbl', 'user_id', 'id');
    }

    public function commentTbls() {
        return $this->hasMany('IT_Glance_forum/Models\CommentTbl', 'user_id', 'id');
    }

    public function eventTbls() {
        return $this->hasMany('IT_Glance_forum/Models\EventTbl', 'user_id', 'id');
    }

    public function feedbackTbls() {
        return $this->hasMany('IT_Glance_forum/Models\FeedbackTbl', 'user_id', 'id');
    }

    public function internProjectTbls() {
        return $this->hasMany('IT_Glance_forum/Models\InternProjectTbl', 'user_id', 'id');
    }

    public function internshipDetailTbls() {
        return $this->hasMany('IT_Glance_forum/Models\InternshipDetailTbl', 'user_id', 'id');
    }

    public function messageTbls() {
        return $this->hasMany('IT_Glance_forum/Models\MessageTbl', 'receiver_userid', 'id');
    }

    public function messageTbls() {
        return $this->hasMany('IT_Glance_forum/Models\MessageTbl', 'sender_userid', 'id');
    }

    public function postTbls() {
        return $this->hasMany('IT_Glance_forum/Models\PostTbl', 'user_id', 'id');
    }

    public function userinfoTbls() {
        return $this->hasMany('IT_Glance_forum/Models\UserinfoTbl', 'user_id', 'id');
    }

    public function workingTbls() {
        return $this->hasMany('IT_Glance_forum/Models\WorkingTbl', 'user_id', 'id');
    }


}
