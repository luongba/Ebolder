<?php

namespace App\models\LevelTesting;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $guarded = [];

    public function Learn(){
        return $this->belongsToMany('App\models\Learn\Learn','learn_levels')->orderBy('name');
    }
    public function Reading(){
        return $this->belongsToMany('App\models\Read\Reading','level_readings')->orderBy('name');
    }
    public function Pronunciation(){
        return $this->belongsToMany('App\models\Pronunciation\Pronunciation','level_pronunciations')->orderBy('name');
    }
    public function Vocabulary(){
        return $this->belongsToMany('App\models\Vocabulary\Vocabulary','level_vocabularies')->orderBy('name');
    }
    public function Grammar(){
        return $this->belongsToMany('App\models\Grammar\Grammar','level_grammars')->orderBy('name');
    }
    public function Listen(){
        return $this->belongsToMany('App\models\Listen\Listening','level_listens')->orderBy('name');
    }

    public function Speak(){
        return $this->belongsToMany('App\models\Speak\Speak','level_speaks')->orderBy('name');
    }

    public function ExamResult(){
        return $this->hasOne('App\models\Learn\ExamResult');
    }
    public function QuestionLuyenAm(){
        return $this->belongsToMany('App\models\Speak\QuestionLuyenAm','level_question_luyen_ams');
    }
}
