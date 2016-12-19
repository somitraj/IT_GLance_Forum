<?php namespace IT_Glance_forum\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryTbl extends Model {

    /**
     * Generated
     */

    protected $table = 'category_tbl';
    protected $fillable = ['id', 'category'];


    public function postTbls() {
        return $this->hasMany('IT_Glance_forum/Models\PostTbl', 'category_id', 'id');
    }


}
