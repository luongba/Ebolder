<?php

namespace App\Exports;

use App\models\Exam\Exam;
use App\models\User\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class UsersExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths
{
    use Exportable;

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Phone',
            'Exam'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $total = Exam::all()->count();
        $users = User::with("ExamHistoryFinal")->get();
        $customData = [];
        foreach ($users->toArray() as $user) {
            $numberOfUniqueExams = 0;
            if ($user['exam_history_final']) {
                $examIds = array_column($user['exam_history_final'], 'exam_id');
                $examIdCounts = array_count_values($examIds);
                $uniqueExamIds = array_keys($examIdCounts);
                $numberOfUniqueExams = count($uniqueExamIds);
            }
            $customData[] = [
                'name' => $user['name'],
                'email' => $user['email'],
                'phone' => $user['phone'],
                'exam' => $numberOfUniqueExams . '/' . $total,
            ];
        }
        return collect($customData);
    }

    public function styles($sheet)
    {
        return [
            1 => ['font' => ['bold' => true], 'fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => 'C5D9F1']], 'borders' => ['outline' => ['style' => 'thin']]],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 30,
            'C' => 30,
        ];
    }
}
