<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class QuestionVocabulary extends Model
{
    protected $table = "questions_vocabulary";
        protected $guarded = [];
        public function answers()
        {
            return $this->hasMany('App\models\AnswerVocabulary', 'question_id');
        }
        public function right_answers(){
            return $this->hasOne('App\models\RightAnswerVocabulary', 'question_id');
        }
    }
