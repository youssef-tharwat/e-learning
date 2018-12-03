<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attempts extends Model
{
    protected $fillable = [
        'user_id', 'school_id', 'quiz_id', 'attempted' , 'score'
    ];
}
