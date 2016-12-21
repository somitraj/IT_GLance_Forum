<?php namespace IT_Glance_forum\Models;

use Illuminate\Database\Eloquent\Model;

class StatusTbl extends Model {

    /**
     * Generated
     */

    protected $table = 'status_tbl';
    protected $fillable = ['id', 'status'];


    public function usersTbls() {
        return $this->belongsToMany('IT_Glance_forum\Models\UsersTbl', 'event_tbl', 'status_id', 'user_id');
    }

    public function usersTbls() {
        return $this->belongsToMany('IT_Glance_forum\Models\UsersTbl', 'intern_project_tbl', 'status_id', 'user_id');
    }

    public function messageTbls() {
        return $this->belongsToMany('IT_Glance_forum\Models\MessageTbl', 'message_status_tbl', 'status_id', 'message_id');
    }

    public function eventTbls() {
        return $this->hasMany('IT_Glance_forum\Models\EventTbl', 'status_id', 'id');
    }

    public function internProjectTbls() {
        return $this->hasMany('IT_Glance_forum\Models\InternProjectTbl', 'status_id', 'id');
    }

    public function messageStatusTbls() {
        return $this->hasMany('IT_Glance_forum\Models\MessageStatusTbl', 'status_id', 'id');
    }

    public function postTbls() {
        return $this->hasMany('IT_Glance_forum\Models\PostTbl', 'status_id', 'id');
    }

    public function usersTbls() {
        return $this->hasMany('IT_Glance_forum\Models\UsersTbl', 'status_id', 'id');
    }


}
