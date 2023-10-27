<?php

namespace App\models\Vocabulary;

use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
    protected $guarded = [];

    public function QuestionVocabulary(){
        return $this->belongsToMany('App\models\Vocabulary\QuestionVocabulary','question_vocabulary_relationship' );
    }
    
    public function QuestionVocabularyRelationship(){
        return $this->hasMany('App\models\Vocabulary\QuestionVocabularyRelationship','vocabulary_id' );
    }
}
