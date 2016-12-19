<?php namespace IT_Glance_forum\Models;

use Illuminate\Database\Eloquent\Model;

class UsertypeTbl extends Model {

    /**
     * Generated
     */

    protected $table = 'usertype_tbl';
    protected $fillable = ['id', 'user_type'];


    public function usersTbls() {
        return $this->hasMany('IT_Glance_forum/Models\UsersTbl', 'user_type_id', 'id');
    }


}
