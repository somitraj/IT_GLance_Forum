<?php namespace IT_Glance_forum\Models;

use Illuminate\Database\Eloquent\Model;

class AttendanceTbl extends Model {

    /**
     * Generated
     */

    protected $table = 'attendance_tbl';
    protected $fillable = ['id', 'user_id'];


    public function usersTbl() {
        return $this->belongsTo('IT_Glance_forum\Models\UsersTbl', 'user_id', 'id');
    }


}
