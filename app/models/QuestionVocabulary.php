<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class QuestionVocabulary extends Model
{
    protected $table = "question_vocabulary";
        protected $guarded = [];
        public function answers()
    {
        return $this->hasMany('App\models\AnswerVocabulary', 'question_id');
    }
}
