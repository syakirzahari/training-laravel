<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    public $table = "halls";

    protected $fillable = [
        'name', 'place'
    ];
}
