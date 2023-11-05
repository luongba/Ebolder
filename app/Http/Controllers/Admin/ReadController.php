<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\Exam\Exam;
use App\models\Read\AnswerReading;
use App\models\Read\LevelReading;
use Illuminate\Http\Request;
use App\models\Read\Reading;
use App\models\Read\QuestionReading;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReadController extends Controller
{
    public function listTopic()
    {
        return view('pages.admin.reading.index');
    }

    public function createTopic()
    {
        return view('pages.admin.reading.create');
    }

    public function storeTopic(Request $request)
    {

        try {
            DB::beginTransaction();
            $read = Reading::create([
                "name" => $request->name,
                "content" => $request->contentReading,
                "is_exam" => $request->isExam
            ]);
            foreach ($request->dataQuestion as $key => $value) {
                $res = $read->QuestionReading()->create([
                    "question" => $value['question'],
                    "level" => $value['level'],
                    'type' => $value['type']
                ]);
                if ($value['answer']) {
                    $res->RightAnswerReading()->create([
                        "answer_id" => $value["answer"]
                    ]);
                }


                foreach ($value['dataAns'] as $keyAds => $item) {
                    $res->AnswerReading()->create([
                        "id" => $item['idAns'],
                        'answer_id' => $item['idAns'],
                        "text" => $item['text']
                    ]);
                }
            }
            DB::commit();
            return [
                "status" => 200,
                "errorCode" => 0,
                "message" => "Thêm topic thành công !"
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return [
                "status" => 400,
                "errorCode" => 400,
                "message" => "Thêm topic thất bại !"
            ];
        }


    }

    public function listTopicApi(Request $request)
    {
        try {
            if ($request->is_exam) {
                $dataAll = Reading::where('is_exam', 1)->orderBy('name', 'asc')->paginate(10);
            } else {
                if ($request->search) {
                    $search = strtolower($request->search);
                    $dataAll = Reading::whereRaw('LOWER(name) LIKE ?', ['%' . $search . '%'])
                        ->orderBy('name', 'asc')->paginate(10);
                } else {
                    $dataAll = Reading::orderBy('name', 'asc')->paginate(10);
                }
            }
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "data" => $dataAll,


            ]);
        } catch (\Exception $e) {
            return [
                "status" => 400,
                "errorCode" => 400,
            ];
        }
    }

    public function deleteTopicApi(Request $request)
    {
        try {
            $exam = Exam::where('reading_id', $request->id)->first();
            if ($exam) {
                return [
                    "status" => 400,
                    "errorCode" => 400,
                    "message" => "Topic cannot be deleted as there is an active exam using it."
                ];
            }
            Reading::find($request->id)->delete();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "message" => "Xóa topic thành công !"


            ]);
        } catch (\Exception $e) {
            return [
                "status" => 400,
                "errorCode" => 400,
                "message" => "Delete error !"
            ];
        }
    }

    public function detailTopic($id)
    {
        return view('pages.admin.reading.detail', compact('id'));
    }

    public function detailTopicData(Request $request, $id)
    {
        try {
            $query = new Reading();
            $data = $query->where('id', $id)->with(['QuestionReading' => function ($item) {
                $item->with('AnswerReading')->with('RightAnswerReading');
            }])->first();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "data" => $data,
                "message" => "Lấy chi tiết topic thành công !"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Lấy chi tiết topic thất bại !"
            ]);
        }

//        return view('pages.admin.vocabulary.topic.detail');
    }

    public function deleteQuestionData(Request $request)
    {
        try {
            $query = new QuestionReading();
            $question = $query->where('id', $request->id)->first();
            if (isset($question)) {
                $question->delete();
                AnswerReading::where('question_id', $question->id)->delete();
                return response()->json([
                    "status" => 200,
                    "errorCode" => 0,
                    "message" => "Xóa Question thành công !"
                ]);
            } else {
                return response()->json([
                    "status" => 100,
                    "errorCode" => 0,
                    "message" => "Question Xóa không tồn tại !"
                ]);
            }

        } catch (\Exception $e) {
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Xóa Question thất bại !"
            ]);
        }

//        return view('pages.admin.vocabulary.topic.detail');
    }

    public function deleteAnswerData(Request $request)
    {
        try {
            $query = new AnswerReading();
            $question = $query->where('id', $request->id)->first();
            if (isset($question)) {
                $question->delete();
                return response()->json([
                    "status" => 200,
                    "errorCode" => 0,
                    "message" => "Xóa Answer thành công !"
                ]);
            } else {
                return response()->json([
                    "status" => 100,
                    "errorCode" => 0,
                    "message" => "Answer Xóa không tồn tại !"
                ]);
            }

        } catch (\Exception $e) {
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Xóa Answer thất bại !"
            ]);
        }

//        return view('pages.admin.vocabulary.topic.detail');
    }

    public function addQuestionSingle(Request $request)
    {
        try {
            $check = QuestionReading::where('id', $request->id)->exists();
            if ($check) {
                $question = QuestionReading::where('id', $request->id)->first();
                $question->update(
                    [
                        "question" => $request->question,
                        "level" => $request->level,
                        'type' => $request->type,
                    ]
                );
                if ($request->type == 1) {
                    foreach ($request->dataAns as $keyAds => $item) {
                        $ans = $question->AnswerReading()->find($item['id']);
                        if (isset($ans)) {
                            $ans->update([
                                "text" => $item['text']
                            ]);
                        } else {
                            $question->AnswerReading()->create([
                                "id" => $item['id'],
                                "text" => $item['text'],
                                "answer_id" => $request->right_answers
                            ]);
                        }


                    }

                    $question->RightAnswerReading()->update([
                        "answer_id" => $request->right_answers
                    ]);
                } else {
                    $question->AnswerReading()->delete();
                    foreach ($request->dataAns as $keyAds => $item) {
                        $question->AnswerReading()->create([
                            "id" => $item['id'],
                            "answer_id" => $item['id'],
                            "text" => $item['text']
                        ]);


                    }
                }
                return response()->json([
                    "status" => 200,
                    "errorCode" => 0,
                    "message" => "Sửa question thành công !"
                ]);

            } else {
                $questionCreate = QuestionReading::create([
                    'id' => $request->id,
                    'reading_id' => $request->reading_id,
                    'question' => $request->question,
                    'level' => $request->level,
                    'type' => $request->type,
                ]);
                foreach ($request->dataAns as $keyAds => $item) {
                    $questionCreate->AnswerReading()->create([
                        "id" => $item['id'],
                        "answer_id" => $item['id'],
                        "text" => $item['text']
                    ]);


                }
                if ($request->type == 1) {
                    $questionCreate->RightAnswerReading()->create([
                        "answer_id" => $request->right_answers
                    ]);
                }
                return response()->json([
                    "status" => 200,
                    "errorCode" => 0,
                    "message" => "Thêm question thành công !"
                ]);
            }


        } catch (\Exception $e) {
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => $e->getMessage()
            ]);
        }
    }


    public function addQuestionMultiple(Request $request)
    {
        try {
            DB::beginTransaction();
            $exam = Exam::where('reading_id', $request->id)->first();
            if ($exam && !$request->isExam) {
                return [
                    "status" => 400,
                    "errorCode" => 400,
                    "message" => "There is an ongoing exam using this topic, so the exam status for this topic cannot be updated."
                ];
            }
            $read = Reading::whereId($request->id)->first();
            $read->update([
                "name" => $request->name,
                "content" => $request->contentReading,
                "is_exam" => $request->isExam
            ]);

            $dataQuestion = ($request->dataQuestion);
            $questionRead = $read->QuestionReading()->get()->toArray();
            
            $toDelete = collect($questionRead)->whereNotIn('id', collect($dataQuestion)->pluck('id'))->all();
            if (count($toDelete)) {
                foreach($toDelete as $item) {
                    QuestionReading::whereId($item['id'])->delete();
                }
            }
            foreach ($dataQuestion as $key => $value) {
                $check =QuestionReading::whereId($value['id'])->exists();
                if (!$check) {
                    $question = $read->QuestionReading()->create([
                        'question' => $value['question'],
                        'level' => $value['level'],
                        'type' => $value['type']
                    ]);
                    foreach ($value['dataAns'] as $keyAns => $valueAns) {
                        $question->AnswerReading()->create([
                            'id' => $valueAns['idAns'],
                            'question_id' => $question->id,
                            'text' => $valueAns['text'],
                            "answer_id" => $valueAns['idAns'],
                        ]);
                    }
                    if ($value['answer']) {
                        $question->RightAnswerReading()->create([
                            'answer_id' => $value['answer']
                        ]);
                    }
                } else {
                    QuestionReading::whereId($value['id'])->first()->update([
                        "question" => $value['question'],
                        "level" => $value['level'],
                        "type" => $value['type']
                    ]);
                    if ($value['answer']) {
                        QuestionReading::whereId($value['id'])->first()->RightAnswerReading()->update([
                            "answer_id" => $value["answer"]
                        ]);
                    }
                    QuestionReading::whereId($value['id'])->first()->AnswerReading()->delete();
                    foreach ($value['dataAns'] as $keyAds => $valueAns) {
                        QuestionReading::whereId($value['id'])->first()->AnswerReading()
                            ->create([
                                'id' => $valueAns['idAns'],
                                'question_id' => $value['id'],
                                'text' => $valueAns['text'],
                                "answer_id" => $valueAns['idAns'],
                            ]);
                    }
                }
            }
            DB::commit();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "message" => "Successfully!"
            ]);

        } catch (\Exception $e) {
            Log::error($e);
            DB::rollBack();
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => $e->getMessage()
            ]);
        }

    }
}
