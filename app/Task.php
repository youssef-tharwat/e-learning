<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $casts = [
        'options' => 'array',
    ];

    protected $fillable = [
        'quiz_id', 'q', 'options', 'correctIndex', 'correctResponse', 'incorrectResponse',
    ];

    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }

    public function users()
    {

        return $this->belongsToMany('App\User');

    }

    public function task()
    {
        return $this->belongsTo('App\Quiz');

    }

}
