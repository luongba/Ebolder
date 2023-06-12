<?php

namespace App\models\Pronunciation;

use Illuminate\Database\Eloquent\Model;

class Pronunciation extends Model
{
    protected $table = 'pronunciations';
    protected $guarded = [];
    public function QuestionPronunciation(){
        return $this->hasMany('App\models\Pronunciation\QuestionPronunciation', 'pronunciation_id');
    }
}
