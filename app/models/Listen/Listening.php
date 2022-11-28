<?php

namespace App\models\Listen;

use Illuminate\Database\Eloquent\Model;

class Listening extends Model
{
    protected $fillable = ['name', 'description'];
    public function TopicAudioListen(){
        return $this->belongsToMany('App\models\Listen\AudioListening','topic_audio_listen_relationship', 'topic_listen_id', 'audio_listen_id' );
    }
}
