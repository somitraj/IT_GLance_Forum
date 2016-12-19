<?php namespace IT_Glance_forum\Models;

use Illuminate\Database\Eloquent\Model;

class InternshipDetailTbl extends Model {

    /**
     * Generated
     */

    protected $table = 'internship_detail_tbl';
    protected $fillable = ['id', 'user_id', 'internship_started_date', 'internship_duration', 'remarks'];


    public function usersTbl() {
        return $this->belongsTo('IT_Glance_forum/Models\UsersTbl', 'user_id', 'id');
    }


}
