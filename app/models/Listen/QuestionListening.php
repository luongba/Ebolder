<?php

namespace App\models\Listen;

use Illuminate\Database\Eloquent\Model;

class QuestionListening extends Model
{
    protected $table = 'question_listenings';
    protected $guarded = [];

    public function answerListening(){
        return $this->hasMany('App\models\Listen\AnswerListening', 'question_id');
    }
    public function rightAnswers(){
        return $this->hasOne('App\models\Listen\RightAnswerListening', 'question_id');
    }
}
