<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    public $table = "ref_positions";

    protected $fillable = [
        'name'
    ];
}
