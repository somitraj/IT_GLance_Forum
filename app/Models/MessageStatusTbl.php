<?php namespace IT_Glance_forum\Models;

use Illuminate\Database\Eloquent\Model;

class MessageStatusTbl extends Model {

    /**
     * Generated
     */

    protected $table = 'message_status_tbl';
    protected $fillable = ['id', 'message_id', 'status_id', 'is_read'];


    public function messageTbl() {
        return $this->belongsTo('IT_Glance_forum\Models\MessageTbl', 'message_id', 'id');
    }

    public function statusTbl() {
        return $this->belongsTo('IT_Glance_forum\Models\StatusTbl', 'status_id', 'id');
    }


}
