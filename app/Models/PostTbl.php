<?php namespace IT_Glance_forum\Models;

use Illuminate\Database\Eloquent\Model;

class PostTbl extends Model {

    /**
     * Generated
     */

    protected $table = 'post_tbl';
    protected $fillable = ['id', 'user_id', 'post_title', 'post_body', 'date', 'time', 'status_id', 'post_type_id', 'category_id'];


    public function categoryTbl() {
        return $this->belongsTo('IT_Glance_forum/Models\CategoryTbl', 'category_id', 'id');
    }

    public function posttypeTbl() {
        return $this->belongsTo('IT_Glance_forum/Models\PosttypeTbl', 'post_type_id', 'id');
    }

    public function statusTbl() {
        return $this->belongsTo('IT_Glance_forum/Models\StatusTbl', 'status_id', 'id');
    }

    public function usersTbl() {
        return $this->belongsTo('IT_Glance_forum/Models\UsersTbl', 'user_id', 'id');
    }

    public function usersTbls() {
        return $this->belongsToMany('IT_Glance_forum/Models\UsersTbl', 'comment_tbl', 'post_id', 'user_id');
    }

    public function commentTbls() {
        return $this->hasMany('IT_Glance_forum/Models\CommentTbl', 'post_id', 'id');
    }


}
