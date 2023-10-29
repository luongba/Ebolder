<?php

namespace App\Exports;

use App\models\User\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::with('HistoryLearn')->with("ExamHistoryFinal")->get();
    }
}
