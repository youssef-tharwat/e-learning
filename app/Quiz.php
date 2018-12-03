<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{

    protected $fillable = [
        'name', 'level', 'assigned_by', 'completed', 'assigned'
    ];

    public function task()
    {
        return $this->hasMany('App\Task');

    }
}
