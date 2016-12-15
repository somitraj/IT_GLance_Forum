<?php namespace IT_Glance_Forum/Models;

use Illuminate\Database\Eloquent\Model;

class PosttypeTbl extends Model {

    /**
     * Generated
     */

    protected $table = 'posttype_tbl';
    protected $fillable = ['id', 'post_type'];


    public function postTbls() {
        return $this->hasMany('IT_Glance_Forum/Models\PostTbl', 'post_type_id', 'id');
    }


}
