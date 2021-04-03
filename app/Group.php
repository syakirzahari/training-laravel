<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $table = "ref_lecture_groups";

    protected $fillable = [
        'name', 'part', 'total_student'
    ];
}
