<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    public $table = "ref_days";

    protected $fillable = [
        'name'
    ];
}
