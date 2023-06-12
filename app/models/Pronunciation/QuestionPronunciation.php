<?php

namespace App\models\Pronunciation;

use Illuminate\Database\Eloquent\Model;

class QuestionPronunciation extends Model
{
    protected $table = 'question_pronunciations';
    protected $guarded = [];
    public function AnswerPronunciation(){
        return $this->hasMany('App\models\Pronunciation\AnswerPronunciation', 'question_id');
    }
    public function RightAnswerPronunciation(){
        return $this->hasOne('App\models\Pronunciation\RightAnswerPronunciation', 'question_id');
    }
}
