<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Pronunciation\AnswerPronunciation;
use App\models\Pronunciation\LevelPronunciation;
use App\models\Pronunciation\Pronunciation;
use App\models\Pronunciation\QuestionPronunciation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PronunciationController extends Controller
{
    public function listTopic()
    {
        return view('pages.admin.pronunciation.index');
    }

    public function createTopic()
    {
        return view('pages.admin.pronunciation.create');
    }

    public function storeTopic(Request $request)
    {

        try {
            DB::beginTransaction();
            $read = Pronunciation::create([
                "name" => $request->name,
                "content" => $request->contentPronunciation,
                "is_exam" => $request->isExam
            ]);
            foreach ($request->dataQuestion as $key => $value) {
                $res = $read->QuestionPronunciation()->create([
                    "question" => $value['question'],
                    "level" => $value['level'],
                    'type' => $value['type']
                ]);
                if ($value['answer']) {
                    $res->RightAnswerPronunciation()->create([
                        "answer_id" => $value["answer"]
                    ]);
                }


                foreach ($value['dataAns'] as $keyAds => $item) {
                    $res->AnswerPronunciation()->create([
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
                $dataAll = Pronunciation::where('is_exam', 1)->orderBy('name', 'asc')->paginate(10);
            } else {
                if ($request->search) {
                    $search = strtolower($request->search);
                    $dataAll = Pronunciation::whereRaw('LOWER(name) LIKE ?', ['%' . $search . '%'])
                        ->orderBy('name', 'asc')->paginate(10);
                } else {
                    $dataAll = Pronunciation::orderBy('name', 'asc')->paginate(10);
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
            Pronunciation::find($request->id)->delete();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "message" => "Xóa topic thành công !"


            ]);
        } catch (\Exception $e) {
            return [
                "status" => 400,
                "errorCode" => 400,
                "message" => "Xóa topic thất bại !"
            ];
        }
    }

    public function detailTopic($id)
    {
        return view('pages.admin.pronunciation.detail', compact('id'));
    }

    public function detailTopicData(Request $request, $id)
    {
        try {
            $query = new Pronunciation();
            $data = $query->where('id', $id)->with(['QuestionPronunciation' => function ($item) {
                $item->with('AnswerPronunciation')->with('RightAnswerPronunciation');
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
            $query = new QuestionPronunciation();
            $question = $query->where('id', $request->id)->first();
            if (isset($question)) {
                $question->delete();
                AnswerPronunciation::where('question_id', $question->id)->delete();
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
            $query = new AnswerPronunciation();
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
            $check = QuestionPronunciation::where('id', $request->id)->exists();
            if ($check) {
                $question = QuestionPronunciation::where('id', $request->id)->first();
                $question->update(
                    [
                        "question" => $request->question,
                        "level" => $request->level,
                        'type' => $request->type,
                    ]
                );
                if ($request->type == 1) {
                    foreach ($request->dataAns as $keyAds => $item) {
                        $ans = $question->AnswerPronunciation()->find($item['id']);
                        if (isset($ans)) {
                            $ans->update([
                                "text" => $item['text']
                            ]);
                        } else {
                            $question->AnswerPronunciation()->create([
                                "id" => $item['id'],
                                "text" => $item['text'],
                                "answer_id" => $request->right_answers
                            ]);
                        }


                    }

                    $question->RightAnswerPronunciation()->update([
                        "answer_id" => $request->right_answers
                    ]);
                } else {
                    $question->AnswerPronunciation()->delete();
                    foreach ($request->dataAns as $keyAds => $item) {
                        $question->AnswerPronunciation()->create([
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
                $questionCreate = QuestionPronunciation::create([
                    'id' => $request->id,
                    'pronunciation_id' => $request->pronunciation_id,
                    'question' => $request->question,
                    'level' => $request->level,
                    'type' => $request->type,
                ]);
                foreach ($request->dataAns as $keyAds => $item) {
                    $questionCreate->AnswerPronunciation()->create([
                        "id" => $item['id'],
                        "answer_id" => $item['id'],
                        "text" => $item['text']
                    ]);


                }
                if ($request->type == 1) {
                    $questionCreate->RightAnswerPronunciation()->create([
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
            $pronun = Pronunciation::whereId($request->id)->first();
            $pronun->update([
                "name" => $request->name,
                "content" => $request->content,
                "is_exam" => $request->is_exam
            ]);

            $dataQuestion = ($request->dataQuestion);
            $questionPronun = $pronun->QuestionPronunciation()->get()->toArray();
            
            $toDelete = collect($questionPronun)->whereNotIn('id', collect($dataQuestion)->pluck('id'))->all();
            if (count($toDelete)) {
                foreach($toDelete as $item) {
                    QuestionPronunciation::whereId($item['id'])->delete();
                }
            }
            foreach ($dataQuestion as $key => $value) {
                $check =QuestionPronunciation::whereId($value['id'])->exists();
                if (!$check) {
                    $question = $pronun->QuestionPronunciation()->create([
                        'question' => $value['question'],
                        'level' => $value['level'],
                        'type' => $value['type']
                    ]);
                    foreach ($value['dataAns'] as $keyAns => $valueAns) {
                        $question->AnswerPronunciation()->create([
                            'id' => $valueAns['idAns'],
                            'question_id' => $question->id,
                            'text' => $valueAns['text'],
                            "answer_id" => $valueAns['idAns'],
                        ]);
                    }
                    if ($value['answer']) {
                        $question->RightAnswerPronunciation()->create([
                            'answer_id' => $value['answer']
                        ]);
                    }
                } else {
                    QuestionPronunciation::whereId($value['id'])->first()->update([
                        "question" => $value['question'],
                        "level" => $value['level'],
                        "type" => $value['type']
                    ]);
                    if ($value['answer']) {
                        QuestionPronunciation::whereId($value['id'])->first()->RightAnswerPronunciation()->update([
                            "answer_id" => $value["answer"]
                        ]);
                    }
                    QuestionPronunciation::whereId($value['id'])->first()->AnswerPronunciation()->delete();
                    foreach ($value['dataAns'] as $keyAds => $valueAns) {
                        QuestionPronunciation::whereId($value['id'])->first()->AnswerPronunciation()
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
                "message" => "Edit question successfully!"
            ]);

        } catch (\Exception $e) {
            Log::error($e);
            DB::rollBack();
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Failed action !"
            ]);
        }

    }
}
