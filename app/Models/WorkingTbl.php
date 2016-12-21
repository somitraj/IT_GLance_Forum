<?php namespace IT_Glance_forum\Models;

use Illuminate\Database\Eloquent\Model;

class WorkingTbl extends Model {

    /**
     * Generated
     */

    protected $table = 'working_tbl';
    protected $fillable = ['id', 'user_id', 'company_name', 'started_date', 'company_address', 'working_position'];


    public function usersTbl() {
        return $this->belongsTo('IT_Glance_forum\Models\UsersTbl', 'user_id', 'id');
    }


}
