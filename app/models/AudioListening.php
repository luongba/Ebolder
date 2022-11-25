<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AudioListening extends Model
{
    protected $guarded = [];

    public function questionListening(){
        return $this->hasMany('App\models\QuestionListening', 'audio_listening_id');
    }
}
