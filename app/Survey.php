<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class Survey extends Model
{
    protected $fillable = [
        'user_id',
        'question_id',
        'option_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function Option()
    {
        return $this->belongsTo(Option::class);
    }
}
