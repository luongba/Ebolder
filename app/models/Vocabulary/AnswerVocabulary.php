<?php

namespace App\models\Vocabulary;

use Illuminate\Database\Eloquent\Model;

class AnswerVocabulary extends Model
{
    protected $table = "answers_vocabulary";
    protected $keyType = 'string';
    protected $fillable = ["id", "question_id", "text", "answer_id"];
}
