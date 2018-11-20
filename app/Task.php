<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }

    public function users()
    {

        return $this->belongsToMany('App\User');

    }
}
