<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = [
        'text',
        'question_id'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
