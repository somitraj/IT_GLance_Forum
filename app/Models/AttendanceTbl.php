<?php namespace IT_Glance_Forum\Models;

use Illuminate\Database\Eloquent\Model;

class AttendanceTbl extends Model {

    /**
     * Generated
     */

    protected $table = 'attendance_tbl';
    protected $fillable = ['id', 'user_id'];


    public function usersTbl() {
        return $this->belongsTo('IT_Glance_Forum\Models\UsersTbl', 'user_id', 'id');
    }


}
