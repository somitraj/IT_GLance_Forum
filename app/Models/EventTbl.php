<?php namespace IT_Glance_forum\Models;

use Illuminate\Database\Eloquent\Model;

class EventTbl extends Model {

    /**
     * Generated
     */

    protected $table = 'event_tbl';
    protected $fillable = ['id', 'event_title', 'event_description', 'event_date', 'event_location', 'event_image', 'user_id', 'status_id'];


    public function usersTbl() {
        return $this->belongsTo('IT_Glance_forum\Models\UsersTbl', 'user_id', 'id');
    }

    public function statusTbl() {
        return $this->belongsTo('IT_Glance_forum\Models\StatusTbl', 'status_id', 'id');
    }


}
