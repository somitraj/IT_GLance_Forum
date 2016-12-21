<?php namespace IT_Glance_forum\Models;

use Illuminate\Database\Eloquent\Model;

class CommentTbl extends Model {

    /**
     * Generated
     */

    protected $table = 'comment_tbl';
    protected $fillable = ['id', 'post_id', 'user_id', 'comment'];


    public function postTbl() {
        return $this->belongsTo('IT_Glance_forum\Models\PostTbl', 'post_id', 'id');
    }

    public function usersTbl() {
        return $this->belongsTo('IT_Glance_forum\Models\UsersTbl', 'user_id', 'id');
    }


}
