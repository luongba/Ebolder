<?php

namespace App\models\Read;

use Illuminate\Database\Eloquent\Model;

class QuestionReading extends Model
{
    protected $table = 'questions_reading';
    protected $guarded = [];
    public function AnswerReading(){
        return $this->hasMany('App\models\Read\AnswerReading', 'question_id');
    }
    public function RightAnswerReading(){
        return $this->hasOne('App\models\Read\RightAnswerReading', 'question_id');
    }
}
