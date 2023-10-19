<?php

namespace App\models\Grammar;

use Illuminate\Database\Eloquent\Model;

class AnswerGrammar extends Model
{
    protected $table = "answer_grammars";
    protected $guarded = [];
    protected $keyType = 'string';
    protected $fillable = ["id", "question_id", "text", "answer_id"];
}
