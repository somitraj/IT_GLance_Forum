<?php namespace IT_Glance_forum\Models;

use Illuminate\Database\Eloquent\Model;

class InternProjectTbl extends Model {

    /**
     * Generated
     */

    protected $table = 'intern_project_tbl';
    protected $fillable = ['id', 'user_id', 'status_id', 'project_started_date', 'project_description', 'project_status', 'project_title', 'project_duration'];


    public function statusTbl() {
        return $this->belongsTo('IT_Glance_forum\Models\StatusTbl', 'status_id', 'id');
    }

    public function usersTbl() {
        return $this->belongsTo('IT_Glance_forum\Models\UsersTbl', 'user_id', 'id');
    }


}
