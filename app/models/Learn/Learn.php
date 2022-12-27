<?php

namespace App\models\Learn;

use Illuminate\Database\Eloquent\Model;

class Learn extends Model
{
    protected $guarded = [];

    public function QuestionLesson()
    {
        return $this->hasMany('App\models\Learn\QuestionLesson', 'learn_id');
    }
}
