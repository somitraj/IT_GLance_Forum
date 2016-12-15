<?php namespace IT_Glance_Forum/Models;

use Illuminate\Database\Eloquent\Model;

class MessageStatusTbl extends Model {

    /**
     * Generated
     */

    protected $table = 'message_status_tbl';
    protected $fillable = ['id', 'message_id', 'status_id', 'is_read'];


    public function messageTbl() {
        return $this->belongsTo('IT_Glance_Forum/Models\MessageTbl', 'message_id', 'id');
    }

    public function statusTbl() {
        return $this->belongsTo('IT_Glance_Forum/Models\StatusTbl', 'status_id', 'id');
    }


}
