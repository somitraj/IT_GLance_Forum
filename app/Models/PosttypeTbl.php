<?php namespace IT_Glance_forum\Models;

use Illuminate\Database\Eloquent\Model;

class PosttypeTbl extends Model {

    /**
     * Generated
     */

    protected $table = 'posttype_tbl';
    protected $fillable = ['id', 'post_type'];


    public function postTbls() {
        return $this->hasMany('IT_Glance_forum\Models\PostTbl', 'post_type_id', 'id');
    }


}
