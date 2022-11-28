<?php

namespace App\models\Vocabulary;

use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
    protected $guarded = [];

    public function QuestitonVocabulary(){
        return $this->belongsToMany('App\models\Vocabulary\QuestionVocabulary','question_vocabulary_relationship' );
    }
}
