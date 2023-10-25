<?php

namespace App\models\Learn;

use Illuminate\Database\Eloquent\Model;

class AnswerLesson extends Model
{
    protected $guarded = [];
    protected $keyType = 'string';
    protected $fillable = ["id", "question_id", "text", "answer_id"];
}
