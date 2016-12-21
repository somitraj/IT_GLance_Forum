<?php namespace IT_Glance_Forum\Models;

use Illuminate\Database\Eloquent\Model;

class FeedbackTbl extends Model {

    /**
     * Generated
     */

    protected $table = 'feedback_tbl';
    protected $fillable = ['id', 'user_id', 'title', 'body'];


    public function usersTbl() {
        return $this->belongsTo('IT_Glance_Forum\Models\UsersTbl', 'user_id', 'id');
    }


}
