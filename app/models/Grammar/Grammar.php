<?php

namespace App\models\Grammar;

use Illuminate\Database\Eloquent\Model;

class Grammar extends Model
{
    protected $guarded = [];

    public function QuestionGrammar(){
        return $this->belongsToMany('App\models\Grammar\QuestionGrammar','question_grammar_relationship' );
    }
}
