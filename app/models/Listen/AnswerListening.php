<?php

namespace App\models\Listen;

use Illuminate\Database\Eloquent\Model;

class AnswerListening extends Model
{
    protected $guarded = [];
    protected $keyType = 'string';
    protected $fillable = ["id", "question_id", "text", "answer_id"];
}
