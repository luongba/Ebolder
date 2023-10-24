<?php

namespace App\models\Pronunciation;

use Illuminate\Database\Eloquent\Model;

class AnswerPronunciation extends Model
{
    protected $guarded = [];
    protected $keyType = 'string';
    protected $fillable = ["id", "question_id", "text", "answer_id"];
}
