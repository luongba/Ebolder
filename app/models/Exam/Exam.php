<?php

namespace App\models\Exam;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $guarded = [];

    // public function Learn(){
    //     return $this->hasMany('App\models\Learn\Learn','learn_levels', 'learn_id');
    // }
    public function Reading(){
        return $this->hasMany('App\models\Read\Reading','reading_id');
    }
    public function Pronunciation(){
        return $this->hasMany('App\models\Pronunciation\Pronunciation','pronunciation_id');
    }
    public function Vocabulary(){
        return $this->hasMany('App\models\Vocabulary\Vocabulary','vocabulary_id', );
    }
    public function Grammar(){
        return $this->hasMany('App\models\Grammar\Grammar','grammar_id');
    }
    public function Listen(){
        return $this->hasMany('App\models\Listen\Listening','listening_id');
    }
    public function speak(){
        return $this->hasMany('App\models\Speak\Speak','speaking_id');
    }
    public function talk(){
        return $this->hasMany('App\models\Speak\QuestionLuyenAm','talking_id');
    }
}
