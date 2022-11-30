<?php

namespace App\models\Grammar;

use Illuminate\Database\Eloquent\Model;

class QuestionGrammar extends Model
{
        protected $guarded = [];
        public function answers()
        {
            return $this->hasMany('App\models\Grammar\AnswerGrammar', 'question_id');
        }
        public function right_answers(){
            return $this->hasOne('App\models\Grammar\RightAnswerGrammar', 'question_id');
        }
    
}
