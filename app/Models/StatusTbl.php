<?php namespace IT_Glance_Forum\Models;

use Illuminate\Database\Eloquent\Model;

class StatusTbl extends Model {

    /**
     * Generated
     */

    protected $table = 'status_tbl';
    protected $fillable = ['id', 'status'];


    public function usersTbls() {
        return $this->belongsToMany('IT_Glance_Forum\Models\UsersTbl', 'event_tbl', 'status_id', 'user_id');
    }

    public function users1Tbls() {
        return $this->belongsToMany('IT_Glance_Forum\Models\UsersTbl', 'intern_project_tbl', 'status_id', 'user_id');
    }

    public function messageTbls() {
        return $this->belongsToMany('IT_Glance_Forum\Models\MessageTbl', 'message_status_tbl', 'status_id', 'message_id');
    }

    public function eventTbls() {
        return $this->hasMany('IT_Glance_Forum\Models\EventTbl', 'status_id', 'id');
    }

    public function internProjectTbls() {
        return $this->hasMany('IT_Glance_Forum\Models\InternProjectTbl', 'status_id', 'id');
    }

    public function messageStatusTbls() {
        return $this->hasMany('IT_Glance_Forum\Models\MessageStatusTbl', 'status_id', 'id');
    }

    public function postTbls() {
        return $this->hasMany('IT_Glance_Forum\Models\PostTbl', 'status_id', 'id');
    }

    public function users2Tbls() {
        return $this->hasMany('IT_Glance_Forum\Models\UsersTbl', 'status_id', 'id');
    }


}
