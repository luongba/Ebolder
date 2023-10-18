<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Pronunciation\AnswerPronunciation;
use App\models\Pronunciation\Pronunciation;
use App\models\Pronunciation\QuestionPronunciation;
use Illuminate\Support\Facades\DB;

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

    public function listTopicApi()
    {
        try {
            $dataAll = Pronunciation::orderBy('id', 'DESC')->paginate(10);
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
                "message" => "Thao tác thất bại !"
            ]);
        }
    }


    public function addQuestionMultiple(Request $request)
    {


        try {
            $read = Pronunciation::whereId($request->id)->first();
            $read->update([
                "name" => $request->name,
                "content" => $request->contentPronunciation,
                "is_exam" => $request->isExam
            ]);

            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "message" => "thao tác thành công !"
            ]);

        } catch (\Exception $e) {
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Thao tác thất bại !"
            ]);
        }

    }
}
