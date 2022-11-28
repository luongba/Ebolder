<?php

namespace App\models\Vocabulary;

use Illuminate\Database\Eloquent\Model;

class QuestionVocabulary extends Model
{
    protected $table = "questions_vocabulary";
        protected $guarded = [];
        public function answers()
        {
            return $this->hasMany('App\models\Vocabulary\AnswerVocabulary', 'question_id');
        }
        public function right_answers(){
            return $this->hasOne('App\models\Vocabulary\RightAnswerVocabulary', 'question_id');
        }
    }
