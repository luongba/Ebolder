<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Exam\Exam;
use App\models\Exam\ExamHistoryFinal;
use DB;
class ExamController extends Controller
{
    public function index(){
        return view('pages.admin.exam.index');
    }
    public function createExam(Request $request)
    {
        try {
            DB::beginTransaction();
            $exam = Exam::create([
                "name" => $request->name,
                'reading_id'=> $request->reading_id,
                // 'vocabulary_id'=> $request->vocabulary_id,
                // 'grammar_id'=> $request->grammar_id,
                'speaking_id'=> $request->speaking_id,
                'listening_id'=> $request->listening_id,
                'writing_id'=> $request->writing_id,
                // 'pronunciation_id'=> $request->pronunciation_id,
                'status'=> $request->status,
            ]);
            DB::commit();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "message" => "Created successfully!"
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Created failed!"
            ]);
        }
    }
    public function getAllExam(Request $request)
    {
        try {
            if ($request->search) {
                $search = strtolower($request->search);
                $exam = Exam::whereRaw('LOWER(name) LIKE ?', ['%' . $search . '%'])
                    ->orderBy('name', 'asc')->get();
            } else {
                $exam = Exam::all();
            }
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "data"=> $exam,
                "message" => "Created successfully!"
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Created failed!"
            ]);
        }
    }
    public function getDetailExam(Request $request, $id)
    {
        try {
            $exam = Exam::whereId($id)->first();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "data"=> $exam,
                "message" => "Created successfully!"
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Created failed!"
            ]);
        }
    }
    public function updateExam(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $exam = Exam::whereId($id)->update([
                "name" => $request->name,
                'reading_id'=> $request->reading_id,
                // 'vocabulary_id'=> $request->vocabulary_id,
                // 'grammar_id'=> $request->grammar_id,
                'speaking_id'=> $request->speaking_id,
                'listening_id'=> $request->listening_id,
                // 'pronunciation_id'=> $request->pronunciation_id,
                'writing_id'=> $request->writing_id,
                'status'=> $request->status,
            ]);
            DB::commit();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "message" => "Updated successfully!"
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Updated failed!"
            ]);
        }
    }
    public function deleteExam(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $exam = Exam::whereId($id)->delete();
            DB::commit();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "message" => "Deleted successfully!"
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Deleted failed!"
            ]);
        }
    }

    public function renderExamList(){
        $exams = Exam::where('status', true)->orderByRaw("SUBSTRING_INDEX(name, ' ', -1) = '(A2-B1)' DESC")
        ->orderBy('name', 'asc')
        ->get();
        return view('pages.frontend.examList', compact('exams'));
    }

    public function renderExamDetail($id)
    {
        return view('pages.frontend.examDetail', compact('id'));
    }


    public function saveHistoryExam(Request $request){
        $exists = ExamHistoryFinal::where('exam_id',$request->exam_id)->where('user_id', $request->user_id)->first();
        if($request->status == 'create'){
            $history = ExamHistoryFinal::create([
                "result_reading" => $request->result_reading,
                "result_speaking"=> $request->result_speaking,
                "result_listening"=> $request->result_listening,
                // "result_vocabulary"=> $request->result_vocabulary,
                // "result_grammar"=> $request->result_grammar,
                "result_writing"=> $request->result_writing,
                // "result_pronunciation"=> $request->result_pronunciation,
                "user_id"=> $request->user_id,
                "exam_id"=> $request->exam_id,
                "time"=> $request->time,
            ]);
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "history" => $history,
                "message" => "Thành công!"
            ]);
        }else {
            $id = isset($request->id) ? $request->id : $exists->id;
            $history = ExamHistoryFinal::whereId($id)->first();
            $history->update([
                "result_reading" =>$history->result_reading ? $history->result_reading:  $request->result_reading,
                "result_speaking"=> $history->result_speaking ? $history->result_speaking: $request->result_speaking,
                "result_listening"=>$history->result_listening ? $history->result_listening: $request->result_listening,
                // "result_vocabulary"=> $history->result_vocabulary ? $history->result_vocabulary: $request->result_vocabulary,
                // "result_grammar"=>$history->result_grammar ? $history->result_grammar: $request->result_grammar,
                "result_writing"=> $history->result_writing ? $history->result_writing: $request->result_writing,
                // "result_pronunciation"=> $history->result_pronunciation ? $history->result_pronunciation: $request->result_pronunciation,
                "user_id"=>$history->user_id ? $history->user_id: $request->user_id,
                "exam_id"=>$history->exam_id ? $history->exam_id: $request->exam_id,
                "time"=> $history->time += $request->time,
            ]);
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "history" => $history,
                "message" => "Thành công!"
            ]);
        }
    }
    public function getAllHistoryForExam($id){
        $exam = Exam::where('id', $id)->first();
        return response()->json([
            "status" => 200,
            "errorCode" => 0,
            "exam" =>$exam,
            "message" => "Thành công!"
        ]);
    }
    public function renderResultView($id){
        $history = ExamHistoryFinal::whereId($id)->first();
        return view('pages.frontend.result', compact('history'));
    }
}
