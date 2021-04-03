<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Hall;
use App\Subject;
use App\Day;

class Timetable extends Model
{
    public $table = "student_timetables";

    protected $fillable = [
        'student_id', 'day_id', 'hall_id', 'group_id', 'subject_id', 'time_from', 'time_to' 
    ];

    public function subjects(){
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function days(){
        return $this->belongsTo(Day::class, 'day_id');
    }

    public function halls(){
        return $this->belongsTo(Hall::class, 'hall_id');
    }
}
