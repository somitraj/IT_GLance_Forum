<?php namespace IT_Glance_forum\Models;

use Illuminate\Database\Eloquent\Model;

class FeedbackTbl extends Model {

    /**
     * Generated
     */

    protected $table = 'feedback_tbl';
    protected $fillable = ['id', 'user_id', 'title', 'body'];


    public function usersTbl() {
        return $this->belongsTo('IT_Glance_forum\Models\UsersTbl', 'user_id', 'id');
    }


}
