<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public function teacher()
    {
        return $this->hasOne('App\Teacher');
    }
}
