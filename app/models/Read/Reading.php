<?php

namespace App\models\Read;

use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{
    protected $table = 'readings';
    protected $guarded = [];
    public function QuestionReading(){
        return $this->hasMany('App\models\Read\QuestionReading', 'reading_id');
    }
}
