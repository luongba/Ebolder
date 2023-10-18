<?php

namespace App\models\Exam;

use Illuminate\Database\Eloquent\Model;

class ExamHistoryFinal extends Model
{
    protected $guarded = [];
    public function Exam(){
        return $this->belongsTo('App\models\Exam\Exam', 'exam_id');
    }
}
