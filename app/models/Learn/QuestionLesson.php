<?php

namespace App\models\Learn;

use Illuminate\Database\Eloquent\Model;

class QuestionLesson extends Model
{
    protected $guarded = [];
    public function AnswerLesson(){
        return $this->hasMany('App\models\Learn\AnswerLesson', 'question_id');
    }
    public function RightAnswerLesson(){
        return $this->hasMany('App\models\Learn\RightAnswerLesson', 'question_id');
    }
}
