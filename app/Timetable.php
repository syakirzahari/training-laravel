<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    public $table = "ref_lecture_groups";

    protected $fillable = [
        'student_id', 'hall_id', 'group_id', 'subject_id', 'time_from', 'time_to' 
    ];
}
