<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public $table = "subjects";

    protected $fillable = [
        'name', 'subject_code', 
    ];
}
