<?php namespace IT_Glance_Forum\Models;

use Illuminate\Database\Eloquent\Model;

class MessageTbl extends Model {

    /**
     * Generated
     */

    protected $table = 'message_tbl';
    protected $fillable = ['id', 'sender_userid', 'receiver_userid', 'message', 'subject'];


    public function usersTbl() {
        return $this->belongsTo('IT_Glance_Forum\Models\UsersTbl', 'receiver_userid', 'id');
    }

    public function usersTbl1() {
        return $this->belongsTo('IT_Glance_Forum\Models\UsersTbl', 'sender_userid', 'id');
    }

    public function statusTbls() {
        return $this->belongsToMany('IT_Glance_Forum\Models\StatusTbl', 'message_status_tbl', 'message_id', 'status_id');
    }

    public function messageStatusTbls() {
        return $this->hasMany('IT_Glance_Forum\Models\MessageStatusTbl', 'message_id', 'id');
    }


}
