<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
    protected $guarded = [];

    public function QuestitonVocabulary(){
        return $this->belongsToMany('App\models\QuestionVocabulary','question_vocabulary_relationship' );
    }
}
