<?php

namespace App\models\Speak;

use Illuminate\Database\Eloquent\Model;

class AnswerSpeak extends Model
{
    protected $guarded = [];
    protected $keyType = 'string';
    protected $fillable = ["id", "question_id", "text", "answer_id"];
}
