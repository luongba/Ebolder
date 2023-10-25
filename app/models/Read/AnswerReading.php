<?php

namespace App\models\Read;

use Illuminate\Database\Eloquent\Model;

class AnswerReading extends Model
{
    protected $table = 'answers_reading';
    protected $guarded = [];
    protected $keyType = 'string';
    protected $fillable = ["id", "question_id", "text", "answer_id"];
}
