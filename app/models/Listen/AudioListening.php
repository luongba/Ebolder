<?php

namespace App\models\Listen;

use Illuminate\Database\Eloquent\Model;

class AudioListening extends Model
{
    protected $guarded = [];

    public function questionListening(){
        return $this->hasMany('App\models\Listen\QuestionListening', 'audio_listening_id');
    }
}
