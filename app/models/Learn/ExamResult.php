<?php

namespace App\models\Learn;

use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    protected $guarded = [];

   protected $table = "exam_result";

   public function levels(){
       return $this->belongsTo('App\models\LevelTesting\Level');
   }
}
